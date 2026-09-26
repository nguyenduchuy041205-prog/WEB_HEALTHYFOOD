<?php
session_start();
require("../model/database.php");
require("../model/mathang.php");
require("../model/nguoidung.php");
require("../model/donhang.php");
require("../model/giohang.php");

if (!isset($_SESSION["nguoidung"]) || $_SESSION["nguoidung"]["loai"] != 1) {
    header("Location: ktnguoidung/index.php");
    exit();
}

$mh = new MATHANG();
$nd = new NGUOIDUNG();
$dh = new DONHANG();

$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "macdinh";

include("inc/top.php");

switch ($action) {
    case "macdinh":
        $ds_donhang = $dh->laydonhang();
        $soluong_mh = count($mh->laymathang());
        $soluong_nd = count($nd->laydanhsachnguoidung());
        $soluong_dh = count($ds_donhang);

        $tong_doanhthu = 0;
        if ($ds_donhang) {
            foreach ($ds_donhang as $d) {
                if ($d["trangthai"] == 2) {
                    $tong_doanhthu += $d["tongtien"];
                }
            }
        }

        include("main.php");
        break;

}

include("inc/bottom.php");
?>