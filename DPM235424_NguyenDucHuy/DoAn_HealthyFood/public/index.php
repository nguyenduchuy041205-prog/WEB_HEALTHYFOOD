<?php
session_start();
require("../model/database.php");
require("../model/danhmuc.php");
require("../model/mathang.php");
require("../model/giohang.php");
require("../model/donhang.php");
require("../model/chitietdonhang.php");
$dh = new DONHANG();
$dm = new DANHMUC();
$mh = new MATHANG();
$ctdh = new CHITIETDONHANG();
$danhmuc = $dm->laydanhmuchienthi();
$monnoibat = $mh->laymathangnoibat();
$monbanchay = $mh->laymathangbanchay();
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "null";

switch ($action) {
    case "null":
        $mathang = $mh->laymathang();
        $monnoibat = $mh->laymathangnoibat();
        $monbanchay = $mh->laymathangbanchay();
        include("main.php");
        break;

    case "group":
        if (isset($_REQUEST["id"])) {
            $madm = $_REQUEST["id"];
            $mathang = $mh->laymathangtheodanhmuc($madm);

            $dm_ht = $dm->laydanhmuctheoid($madm);
            $tendanhmuc = $dm_ht["tendanhmuc"];

            include("group.php");
        }
        break;

    case "detail":
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $mh->tangluotxem($id);
            $mhct = $mh->laymathangtheoid($id);

            $dm_ht = $dm->laydanhmuctheoid($mhct["danhmuc_id"]);
            $tendm = $dm_ht["tendanhmuc"];

            $mathang = $mh->laymathangtheodanhmuc($mhct["danhmuc_id"]);
            include("detail.php");
        }
        break;

    case "giohang":
        $giohang = laygiohang();
        include("cart.php");
        break;

    case "chovaogio":
        if (isset($_REQUEST["id"])) {
            $id = $_REQUEST["id"];
            $soluong = isset($_REQUEST["soluong"]) ? $_REQUEST["soluong"] : 1;
            themhangvaogio($id, $soluong);
        }
        $giohang = laygiohang();
        include("cart.php");
        break;

    case "capnhatgio":
        if (isset($_REQUEST["mh"])) {
            foreach ($_REQUEST["mh"] as $id => $soluong) {
                if ($soluong > 0)
                    capnhatsoluong($id, $soluong);
                else
                    xoamotmathang($id);
            }
        }
        $giohang = laygiohang();
        include("cart.php");
        break;

    case "xoagiohang":
        xoagiohang();
        $giohang = laygiohang();
        include("cart.php");
        break;
    case "thanhtoan":
        if (!isset($_SESSION["khachhang"])) {
            echo "<script>
                    alert('Bạn cần đăng nhập tài khoản Khách hàng để thực hiện thanh toán!'); 
                    window.location='/DoAn_HealthyFood/admin/ktnguoidung/index.php'; 
                  </script>";
            break;
        }
        $giohang = laygiohang();
        include("checkout.php");
        break;

    case "hoantatthanhtoan":
        if (!isset($_SESSION["khachhang"])) {
            header("Location: index.php?action=giohang");
            break;
        }

        $hoten = $_POST["txthoten"];
        $sdt = $_POST["txtsdt"];
        $diachi = $_POST["txtdiachi"];
        $nguoidung_id = $_SESSION["khachhang"]["id"];

        $tongtien = 0;
        foreach ($_SESSION["giohang"] as $id => $soluong) {
            $mathang_info = $mh->laymathangtheoid($id);
            $gia_ban = $mathang_info["gia"] * (1 - $mathang_info["giamgia"] / 100);
            $tongtien += $gia_ban * $soluong;
        }

        $donhang_id = $dh->them_donhang($nguoidung_id, $tongtien, $hoten, $sdt, $diachi);

        foreach ($_SESSION["giohang"] as $id => $soluong) {
            $mathang_info = $mh->laymathangtheoid($id);

            $dongia_thuc_te = $mathang_info["gia"] * (1 - $mathang_info["giamgia"] / 100);

            $ctdh->them_chitietdonhang($donhang_id, $id, $dongia_thuc_te, $soluong);

            $mh->tangluotban($id, $soluong);
        }

        xoagiohang();
        include("message.php");
        break;
    case "lichsudonhang":
        if (isset($_SESSION["khachhang"])) {
            $id_khachhang = $_SESSION["khachhang"]["id"];
            $ds_donhang = $dh->laydonhangtheokhachhang($id_khachhang);
            include("orders.php");
        } else {
            header("Location: index.php");
        }
        break;
    case "chitietdonhang":
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $dh_info = $dh->laydonhangtheoid($id);
            $ct_donhang = $ctdh->lay_chitiet_theodonhang($id);
            include("order_detail.php");
        }
        break;

    case "huydon":
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            if ($dh->capnhattrangthai($id, 3)) {
                $_SESSION["thongbao"] = "Đã hủy đơn hàng #DH$id thành công!";
                $_SESSION["loai_thongbao"] = "success";
            } else {
                $_SESSION["thongbao"] = "Không thể hủy đơn hàng lúc này.";
                $_SESSION["loai_thongbao"] = "error";
            }
        }
        header("Location: index.php?action=lichsudonhang");
        exit();
        break;
    case "xoadonhang":
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            if ($dh->xoadonhang($id)) {
                $_SESSION["thongbao"] = "Đơn hàng #DH$id đã được xóa khỏi lịch sử!";
                $_SESSION["loai_thongbao"] = "success";
            } else {
                $_SESSION["thongbao"] = "Lỗi: Không thể xóa đơn hàng này.";
                $_SESSION["loai_thongbao"] = "error";
            }
        }
        header("Location: index.php?action=lichsudonhang");
        exit();
        break;
    case "search":
        if (isset($_REQUEST["txtsearch"])) {
            $keyword = $_REQUEST["txtsearch"];
            $mathang = $mh->timkiemmathang($keyword);

            $tieude = "Kết quả tìm kiếm cho: '" . htmlspecialchars($keyword) . "'";
            include("main.php");
        }
        break;

    case "tatca":
        $mathang = $mh->laymathang();
        $tieude = "Tất cả món ăn tại Fit'n Ngon";
        include("main.php");
        break;
    default:
        header("Location: index.php");
        break;

}
?>