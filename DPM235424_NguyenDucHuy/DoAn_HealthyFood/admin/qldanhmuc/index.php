<?php
session_start();
require("../../model/database.php");
require("../../model/danhmuc.php");

$dm = new DANHMUC();
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "list";

switch ($action) {
    case "list":
        $danhmuc = $dm->laydanhmuc();
        include("main.php");
        break;

    case "edit":
        $danhmuc = $dm->laydanhmuc();
        $dm_edit = $dm->laydanhmuctheoid($_GET["id"]);
        include("main.php");
        break;

    case "xulythem":
        $ten = $_POST["txtten"];
        $dm->themdanhmuc($ten);

        $_SESSION["thongbao"] = "Đã thêm danh mục '$ten' thành công!";
        $_SESSION["loai_thongbao"] = "success";

        header("Location: index.php");
        exit();
        break;

    case "xulysua":
        $id = $_POST["txtid"];
        $ten = $_POST["txtten"];
        $dm->suadanhmuc($id, $ten);

        $_SESSION["thongbao"] = "Đã cập nhật danh mục thành công!";
        $_SESSION["loai_thongbao"] = "success";

        header("Location: index.php");
        exit();
        break;

    case "xoa":
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            if ($dm->xoadanhmuc($id)) {
                $_SESSION["thongbao"] = "Đã xóa danh mục thành công!";
                $_SESSION["loai_thongbao"] = "success";
            } else {
                $_SESSION["thongbao"] = "Lỗi! Không thể xóa danh mục này (có thể đang chứa món ăn).";
                $_SESSION["loai_thongbao"] = "error";
            }
        }
        header("Location: index.php");
        exit();
        break;
    case "kichhoat":
        if (isset($_GET["id"]) && isset($_GET["trangthai"])) {
            $id = $_GET["id"];
            $trangthai = $_GET["trangthai"];

            $dm->doitrangthai($id, $trangthai);

            $_SESSION["thongbao"] = "Đã cập nhật trạng thái hiển thị!";
            $_SESSION["loai_thongbao"] = "success";
        }
        header("Location: index.php");
        exit();
        break;
}
?>