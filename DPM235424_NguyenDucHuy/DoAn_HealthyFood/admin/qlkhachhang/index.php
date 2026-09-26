<?php
session_start();
require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/donhang.php");

if (!isset($_SESSION["nguoidung"]) || $_SESSION["nguoidung"]["loai"] != 1) {
    header("Location: ../ktnguoidung/index.php");
    exit();
}

$nd = new NGUOIDUNG();
$dh = new DONHANG();
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "danhsach";
switch ($action) {
    case "danhsach":
        $khachhang = $nd->laydanhsachkhachhang();
        $khachhang = $nd->laydanhsachkhachhang_kem_doanhthu();
        include("main.php");
        break;

    case "vohieu":
        if (isset($_GET["id"]))
            $nd->doitrangthai($_GET["id"], 0);
        header("Location: index.php");
        break;

    case "kichhoat":
        if (isset($_GET["id"]))
            $nd->doitrangthai($_GET["id"], 1);
        header("Location: index.php");
        break;

    case "xoa":
        if (isset($_GET["id"]))
            $nd->xoanguoidung($_GET["id"]);
        header("Location: index.php");
        break;
    case "lichsu":
        if (isset($_GET["id"])) {
            $kh_id = $_GET["id"];

            $kh_info = $nd->laythongtin_theo_id($kh_id);

            $ds_donhang = $dh->laydonhangtheokhachhang($kh_id);

            include("lichsu.php");
        }
        break;

    default:
        $khachhang = $nd->laydanhsachkhachhang();
        include("main.php");
        break;
}
?>