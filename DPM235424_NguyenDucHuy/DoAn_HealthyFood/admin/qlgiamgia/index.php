<?php
session_start();
require("../../model/database.php");
require("../../model/danhmuc.php");
require("../../model/mathang.php");


if (!isset($_SESSION["nguoidung"])) {
    header("Location: ../index.php");
    exit();
}


$dm = new DANHMUC();
$mh = new MATHANG();

$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "list";

switch ($action) {
    case "list":
        $danhmuc = $dm->laydanhmuc();
        $mathang = $mh->laymathang();
        include("main.php");
        break;

    case "xuly_giamgia":
        $kieugiam = $_POST["kieugiam"];
        $phantram = $_POST["phantram"];

        if ($kieugiam == "mon") {
            $mathang_id = $_POST["mathang_id"];
            $mh->capnhat_giamgia_mathang($mathang_id, $phantram);
            $msg = "Đã cập nhật giảm giá cho món ăn thành công!";
        } else if ($kieugiam == "danhmuc") {
            $danhmuc_id = $_POST["danhmuc_id"];
            $mh->capnhat_giamgia_danhmuc($danhmuc_id, $phantram);
            $msg = "Đã cập nhật giảm giá cho toàn bộ danh mục thành công!";
        }

        $_SESSION["thongbao"] = $msg;

        header("Location: index.php?action=list");
        break;

    case "xoa_tatca":
        $mh->xoa_tatca_giamgia();
        $_SESSION["thongbao"] = "Đã khôi phục giá gốc cho toàn bộ món ăn!";
        header("Location: index.php?action=list");
        break;
    default:
        break;
}
?>