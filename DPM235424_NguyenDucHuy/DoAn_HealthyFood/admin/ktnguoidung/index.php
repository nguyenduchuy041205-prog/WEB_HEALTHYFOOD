<?php
session_start();
require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/mathang.php");
require("../../model/danhmuc.php");
require("../../model/giohang.php");
$nd = new NGUOIDUNG();
$dm = new DANHMUC();
$danhmuc = $dm->laydanhmuc();
$action = "macdinh";
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
}

switch ($action) {
    case "xuly_dangnhap":
        $email = $_POST["txtemail"];
        $matkhau = md5($_POST["txtmatkhau"]);

        $user = $nd->kiemtradangnhap($email, $matkhau);
        if ($user) {
            if ($user["trangthai"] == 1) {
                if ($user["loai"] == 1) {
                    $_SESSION["nguoidung"] = $user;
                    header("Location: ../index.php");
                    exit();
                } else {
                    $_SESSION["khachhang"] = $user;
                    header("Location: ../../public/index.php");
                    exit();
                }
            } else {
                $error = "Tài khoản đang bị khóa!";
                include("main.php");
            }
        } else {
            $error = "Sai email hoặc mật khẩu!";
            include("main.php");
        }
        break;

    case "dangxuat":
        if (isset($_SESSION["nguoidung"])) {
            unset($_SESSION["nguoidung"]);
            header("Location: ../../public/index.php");
            exit();
        }

        if (isset($_SESSION["khachhang"])) {
            unset($_SESSION["khachhang"]);
            header("Location: ../../public/index.php");
            exit();
        }

        header("Location: ../../public/index.php");
        break;

        header("Location: index.php");
        break;
    case "dangky":
        include("register.php");
        break;

    case "xuly_dangky":
        $email = $_POST["txtemail"];
        $matkhau = md5($_POST["txtmatkhau"]);
        $hoten = $_POST["txthoten"];
        $sdt = $_POST["txtsdt"];
        $diachi = $_POST["txtdiachi"];

        if ($nd->kiemtraemailtontai($email)) {
            $error = "Email này đã được sử dụng!";
            include("register.php");
        } else {
            $nd->themnguoidung($email, $matkhau, $hoten, $sdt, $diachi, 0);
            echo "<script>alert('Đăng ký thành công! Hãy đăng nhập.'); window.location='index.php';</script>";
        }
        break;
    case "quenmatkhau":
        include("forgot_password.php");
        break;

    case "xuly_quenmatkhau":
        $email = $_POST["txtemail"];
        $sdt = $_POST["txtsdt"];
        $matkhaumoi = md5($_POST["txtmatkhaumoi"]);

        $user = $nd->kiemtra_quenmk($email, $sdt);
        if ($user) {
            $nd->capnhatmatkhau($user['id'], $matkhaumoi);

            $_SESSION["thongbao"] = "Đổi mật khẩu thành công!";
            $_SESSION["loai_thongbao"] = "success";

            header("Location: index.php");
            exit();
        } else {
            $_SESSION["thongbao"] = "Thông tin Email hoặc Số điện thoại không chính xác!";
            $_SESSION["loai_thongbao"] = "error";
            header("Location: index.php?action=quenmatkhau");
            exit();
        }
        break;
    case "hoso":
        if (!isset($_SESSION["khachhang"]) && !isset($_SESSION["nguoidung"])) {
            header("Location: index.php");
            exit();
        }

        if (isset($_SESSION["khachhang"])) {
            $user = $_SESSION["khachhang"];
        } else {
            $user = $_SESSION["nguoidung"];
        }

        if (!isset($danhmuc)) {
            $danhmuc = $dm->laydanhmuc();
        }
        include("profile.php");
        break;

    case "xulycapnhathoso":
        $id = $_POST["txtid"];
        $hoten = $_POST["txthoten"];
        $sdt = $_POST["txtsdt"];
        $diachi = $_POST["txtdiachi"];

        $nd->capnhatthongtin($id, $hoten, $sdt, $diachi);

        if (isset($_SESSION["khachhang"])) {
            $_SESSION["khachhang"]["hoten"] = $hoten;
            $_SESSION["khachhang"]["sodienthoai"] = $sdt;
            $_SESSION["khachhang"]["diachi"] = $diachi;
        } elseif (isset($_SESSION["nguoidung"])) {
            $_SESSION["nguoidung"]["hoten"] = $hoten;
            $_SESSION["nguoidung"]["sodienthoai"] = $sdt;
            $_SESSION["nguoidung"]["diachi"] = $diachi;
        }

        $_SESSION["thongbao_thanhcong"] = "Thông tin cá nhân của bạn đã được cập nhật!";

        header("Location: index.php?action=hoso");
        exit();
        break;
    case "doimatkhau":
        $id = $_SESSION["nguoidung"]["id"] ?? $_SESSION["khachhang"]["id"] ?? null;

        if ($id) {
            $user = $nd->laythongtin_theo_id($id);
        } else {
            header("Location: index.php?action=dangnhap");
            exit();
        }

        include("doimatkhau.php");
        break;

    case "xulydoimatkhau":
        $id = $_POST["txtid"];
        $matkhau_cu = md5($_POST["txtmatkhau_cu"]);
        $matkhau_moi = md5($_POST["txtmatkhau_moi"]);
        $nhaplai_moi = md5($_POST["txtnhaplai_moi"]);

        if (!$nd->kiemtra_matkhau_cu($id, $matkhau_cu)) {
            $_SESSION["thongbao_loi"] = "Mật khẩu cũ không chính xác!";
            header("Location: index.php?action=doimatkhau");
            exit();
        } elseif ($_POST["txtmatkhau_moi"] != $_POST["txtnhaplai_moi"]) {
            $_SESSION["thongbao_loi"] = "Mật khẩu mới nhập lại không khớp!";
            header("Location: index.php?action=doimatkhau");
            exit();
        } else {
            $nd->doimatkhau($id, $matkhau_moi);
            $_SESSION["thongbao_thanhcong"] = "Mật khẩu của bạn đã được cập nhật thành công!";
            header("Location: index.php?action=hoso");
            exit();
        }
        break;
    default:
        include("main.php");
        break;
}
?>