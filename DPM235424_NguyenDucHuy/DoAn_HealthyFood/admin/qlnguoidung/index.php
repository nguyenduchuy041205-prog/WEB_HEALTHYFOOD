<?php
session_start();
require("../../model/database.php");
require("../../model/nguoidung.php");

// Kiểm tra quyền Admin (loai = 1)
if (!isset($_SESSION["nguoidung"]) || $_SESSION["nguoidung"]["loai"] != 1) {
    header("Location: ../ktnguoidung/index.php");
    exit();
}

$nd = new NGUOIDUNG();
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "list";

switch ($action) {
    case "list":
        // Sử dụng hàm lấy toàn bộ danh sách để đổ vào main.php
        $nguoidung = $nd->laydanhsachnguoidung();
        include("main.php");
        break;

    case "them":
        include("themnguoidung.php");
        break;

    case "xulythem":
        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        $hoten = $_POST["txthoten"];
        $sdt = $_POST["txtsdt"];
        $diachi = $_POST["txtdiachi"];
        $loai = $_POST["optloai"];

        if ($nd->kiemtraemailtontai($email)) {
            echo "<script>alert('Email này đã được sử dụng!'); window.history.back();</script>";
        } else {
            $nd->themnguoidung($email, $matkhau, $hoten, $sdt, $diachi, $loai);
            header("Location: index.php");
        }
        break;

    case "sua":
        $id = $_GET["id"];
        $u = $nd->laythongtin_theo_id($id);
        include("sua.php");
        break;

    case "xulysua":
        $id = $_POST["txtid"];
        $hoten = $_POST["txthoten"];
        $sdt = $_POST["txtsdt"];
        $diachi = $_POST["txtdiachi"];
        $matkhau_moi = $_POST["txtmatkhau"];

        $nd->capnhatthongtin($id, $hoten, $sdt, $diachi);

        if (!empty($matkhau_moi)) {
            $nd->capnhatmatkhau($id, $matkhau_moi);
        }

        header("Location: index.php");
        break;

    case "doitrangthai":
        $id = $_GET["id"];
        $trangthai = $_GET["trangthai"];
        $nd->doitrangthai($id, $trangthai);
        header("Location: index.php");
        break;

    case "xoa":
        $id = $_GET["id"];
        $nd->xoanguoidung($id);
        header("Location: index.php");
        break;
}
?>