<?php
class NGUOIDUNG
{
    public function kiemtradangnhap($email, $matkhau)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung WHERE email=:email AND matkhau=:matkhau AND trangthai=1";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":email", $email);
            $cmd->bindValue(":matkhau", $matkhau);
            $cmd->execute();
            return $cmd->fetch();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function laythongtinnguoidung($email)
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung WHERE email=:e";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":e", $email);
            $cmd->execute();
            return $cmd->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function laydanhsachnguoidung()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung ORDER BY loai DESC";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function laydanhsachkhachhang()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung WHERE loai = 0 ORDER BY id DESC";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll();
        } catch (PDOException $e) {
            return null;
        }
    }

    public function themnguoidung($email, $matkhau, $hoten, $sdt, $diachi, $loai)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO nguoidung(email, matkhau, hoten, sodienthoai, diachi, loai, trangthai) 
                VALUES (:email, :matkhau, :hoten, :sdt, :diachi, :loai, 1)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":email", $email);
            $cmd->bindValue(":matkhau", $matkhau);
            $cmd->bindValue(":hoten", $hoten);
            $cmd->bindValue(":sdt", $sdt);
            $cmd->bindValue(":diachi", $diachi);
            $cmd->bindValue(":loai", $loai);
            return $cmd->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function doitrangthai($id, $trangthai)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung SET trangthai=:trangthai WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":trangthai", $trangthai);
            $cmd->bindValue(":id", $id);
            return $cmd->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function xoanguoidung($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM nguoidung WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            return $cmd->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function kiemtraemailtontai($email)
    {
        $db = DATABASE::connect();
        $sql = "SELECT id FROM nguoidung WHERE email=:email";
        $cmd = $db->prepare($sql);
        $cmd->bindValue(":email", $email);
        $cmd->execute();
        return $cmd->fetch();
    }

    public function kiemtra_quenmk($email, $sdt)
    {
        $db = DATABASE::connect();
        $sql = "SELECT id FROM nguoidung WHERE email=:email AND sodienthoai=:sdt AND trangthai=1";
        $cmd = $db->prepare($sql);
        $cmd->bindValue(":email", $email);
        $cmd->bindValue(":sdt", $sdt);
        $cmd->execute();
        return $cmd->fetch();
    }

    public function capnhatmatkhau($id, $matkhau)
    {
        $db = DATABASE::connect();
        $sql = "UPDATE nguoidung SET matkhau=:mk WHERE id=:id";
        $cmd = $db->prepare($sql);
        $cmd->bindValue(":mk", $matkhau);
        $cmd->bindValue(":id", $id);
        return $cmd->execute();
    }

    public function capnhatthongtin($id, $hoten, $sdt, $diachi)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung SET hoten=:hoten, sodienthoai=:sdt, diachi=:diachi WHERE id=:id";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":hoten", $hoten);
            $cmd->bindValue(":sdt", $sdt);
            $cmd->bindValue(":diachi", $diachi);
            $cmd->bindValue(":id", $id);
            return $cmd->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function kiemtra_matkhau_cu($id, $matkhau_cu)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT id FROM nguoidung WHERE id=:id AND matkhau=:matkhau";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->bindValue(":matkhau", $matkhau_cu);
            $cmd->execute();
            return $cmd->fetch();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function doimatkhau($id, $matkhau_moi)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung SET matkhau=:matkhau WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":matkhau", $matkhau_moi);
            $cmd->bindValue(":id", $id);
            return $cmd->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
    public function laydanhsachkhachhang_kem_doanhthu()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT n.*, 
                COUNT(d.id) as so_don_hang,
                
                SUM(CASE WHEN d.trangthai = 2 THEN d.tongtien ELSE 0 END) as tong_chi_tra
                
                FROM nguoidung n
                LEFT JOIN donhang d ON n.id = d.nguoidung_id
                WHERE n.loai = 0
                GROUP BY n.id
                ORDER BY tong_chi_tra DESC";

            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll();
        } catch (PDOException $e) {
            return array();
        }
    }
    public function laythongtin_theo_id($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung WHERE id = :id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            return $cmd->fetch();
        } catch (PDOException $e) {
            return null;
        }
    }
}
?>