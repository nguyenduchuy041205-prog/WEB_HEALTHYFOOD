<?php
session_start();
ob_start();
require("../../model/database.php");
require("../../model/danhmuc.php");
require("../../model/mathang.php");

if (!isset($_SESSION["nguoidung"]) || $_SESSION["nguoidung"]["loai"] != 1) {
    header("Location: ../ktnguoidung/index.php");
    exit();
}

$dm = new DANHMUC();
$mh = new MATHANG();

$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "list";

switch ($action) {
    case "list":
        $mathang = $mh->laymathang();
        $danhmuc = $dm->laydanhmuc();
        include("main.php");
        break;

    case "add":
        $danhmuc = $dm->laydanhmuc();
        include("addform.php");
        break;

    case "xulythem":
        $ten = $_POST["txtten"] ?? "";
        $gia = $_POST["txtgia"] ?? 0;
        $mota = $_POST["txtmota"] ?? "";
        $calo = $_POST["txtcalo"] ?? 0;
        $protein = $_POST["txtprotein"] ?? 0;
        $danhmuc_id = $_POST["txtdanhmuc"] ?? null;

        $hinhanh = "";
        if (isset($_FILES["fhinhanh"]) && $_FILES["fhinhanh"]["name"] != "") {
            $hinhanh = basename($_FILES["fhinhanh"]["name"]);
            move_uploaded_file($_FILES["fhinhanh"]["tmp_name"], "../../images/products/" . $hinhanh);
        }

        if ($danhmuc_id == null) {
            $_SESSION["thongbao"] = "Lỗi: Chưa chọn danh mục!";
            $_SESSION["loai_thongbao"] = "error";
            header("Location: index.php?action=add");
            exit();
        }

        $mh->themmathang($ten, $mota, $gia, $hinhanh, $danhmuc_id, $calo, $protein);

        $_SESSION["thongbao"] = "Đã thêm món '$ten' thành công!";
        $_SESSION["loai_thongbao"] = "success";

        header("Location: index.php");
        exit();
        break;

    case "update":
        if (isset($_GET["id"])) {
            $m = $mh->laymathangtheoid($_GET["id"]);
            $danhmuc = $dm->laydanhmuc();
            include("updateform.php");
        }
        break;

    case "xulysua":
        $id = $_POST["txtid"];
        $ten = $_POST["txtten"];
        $gia = $_POST["txtgia"];
        $mota = $_POST["txtmota"];
        $calo = $_POST["txtcalo"];
        $protein = $_POST["txtprotein"];
        $danhmuc_id = $_POST["txtdanhmuc"];
        $giamgia = $_POST["txtgiamgia"] ?? 0;

        $hinhanh = $_POST["txtanhcu"];
        $duongdan = "../../images/products/";

        if (isset($_FILES["fhinhanh"]) && $_FILES["fhinhanh"]["name"] != "") {
            if (!empty($hinhanh) && file_exists($duongdan . $hinhanh)) {
                unlink($duongdan . $hinhanh);
            }
            $hinhanh = basename($_FILES["fhinhanh"]["name"]);
            move_uploaded_file($_FILES["fhinhanh"]["tmp_name"], $duongdan . $hinhanh);
        }

        $mh->suamathang($id, $ten, $mota, $gia, $hinhanh, $danhmuc_id, $calo, $protein, $giamgia);

        $_SESSION["thongbao"] = "Đã cập nhật món '$ten' thành công!";
        $_SESSION["loai_thongbao"] = "success";

        header("Location: index.php");
        exit();
        break;

    case "delete":
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            if ($mh->xoamathang($id)) {
                $_SESSION["thongbao"] = "Đã xóa món ăn thành công!";
                $_SESSION["loai_thongbao"] = "success";
            } else {
                $_SESSION["thongbao"] = "Lỗi! Không thể xóa món này (có thể do ràng buộc dữ liệu).";
                $_SESSION["loai_thongbao"] = "error";
            }
        }
        header("Location: index.php");
        exit();
        break;
    default:
        header("Location: index.php");
        break;
}
?>