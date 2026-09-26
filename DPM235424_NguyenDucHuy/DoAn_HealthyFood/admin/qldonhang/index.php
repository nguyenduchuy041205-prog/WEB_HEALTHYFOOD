<?php
session_start();
require("../../model/database.php");
require("../../model/donhang.php");

if (!isset($_SESSION["nguoidung"]) || $_SESSION["nguoidung"]["loai"] != 1) {
    header("Location: ../ktnguoidung/index.php");
    exit();
}

$dh_model = new DONHANG();

$action = "list";
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
}

switch ($action) {
    case "list":
    case "danhsach":
        $ds_donhang = $dh_model->laydonhang();
        include("main.php");
        break;

    case "detail":
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $dh = $dh_model->laydonhangtheoid($id);
            $chitiet = $dh_model->laychitietdonhang($id);
            include("detail.php");
        }
        break;

    case "sua":
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $donhang_ht = $dh_model->laydonhangtheoid($id);
            include("sua.php");
        }
        break;

    case "xuly_sua":
        $id = $_POST["txtid"];
        $trangthai = $_POST["optTrangthai"];
        $dh_model->capnhattrangthai($id, $trangthai);
        header("Location: index.php");
        break;

    case "inhoadon":
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $donhang = $dh_model->laydonhangtheoid($id);
            $chitiet = $dh_model->laychitietdonhang($id);
            include("inhoadon.php");
        }
        break;

    case "xoa":
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            if ($dh_model->xoadonhang($id)) {
                $_SESSION["thongbao"] = "Đã xóa đơn hàng thành công!";
                $_SESSION["loai_thongbao"] = "success";
            } else {
                $_SESSION["thongbao"] = "Lỗi: Không thể xóa đơn hàng!";
                $_SESSION["loai_thongbao"] = "error";
            }
        }
        header("Location: index.php");
        exit();
        break;

    default:
        $ds_donhang = $dh_model->laydonhang();
        include("main.php");
        break;
}
?>