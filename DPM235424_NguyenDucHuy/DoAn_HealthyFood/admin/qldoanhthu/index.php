<?php
session_start();
require("../../model/database.php");
require("../../model/donhang.php");

$dh = new DONHANG();
$action = "list";
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
}

switch ($action) {
    case "list":
        $nam_chon = isset($_REQUEST["txtnam"]) ? $_REQUEST["txtnam"] : date("Y");

        $data_doanhthu = $dh->lay_doanh_thu_theo_thang($nam_chon);

        $values = array_fill(1, 12, 0);
        foreach ($data_doanhthu as $row) {
            $values[(int) $row['thang']] = (float) $row['doanhthu'];
        }

        include("main.php");
        break;
}
?>