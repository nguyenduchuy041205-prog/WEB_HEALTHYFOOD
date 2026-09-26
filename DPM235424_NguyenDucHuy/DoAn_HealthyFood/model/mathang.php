<?php
class MATHANG
{
    public function laymathang()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT m.* FROM mathang m 
                    JOIN danhmuc d ON m.danhmuc_id = d.id 
                    WHERE m.trangthai = 1 AND d.trangthai = 1 
                    ORDER BY m.id DESC";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }


    public function laymathangtheodanhmuc($danhmuc_id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT m.* FROM mathang m 
                    JOIN danhmuc d ON m.danhmuc_id = d.id 
                    WHERE m.danhmuc_id=:madm AND m.trangthai = 1 AND d.trangthai = 1 
                    ORDER BY m.id DESC";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":madm", $danhmuc_id);
            $cmd->execute();
            return $cmd->fetchAll();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function laymathangtheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT m.*, d.tendanhmuc 
                    FROM mathang m 
                    JOIN danhmuc d ON m.danhmuc_id = d.id 
                    WHERE m.id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function themmathang($ten, $mota, $gia, $hinh, $dm_id, $calo, $pro)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO mathang(tenmathang, mota, gia, hinhanh, danhmuc_id, calo, protein, luotxem, luotban, giamgia, trangthai) 
                VALUES(:ten, :mota, :gia, :hinh, :dm, :calo, :pro, 0, 0, 0, 1)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":ten", $ten);
            $cmd->bindValue(":mota", $mota);
            $cmd->bindValue(":gia", $gia);
            $cmd->bindValue(":hinh", $hinh);
            $cmd->bindValue(":dm", $dm_id);
            $cmd->bindValue(":calo", $calo);
            $cmd->bindValue(":pro", $pro);
            $cmd->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function xoamathang($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM mathang WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);

            return $cmd->execute();

        } catch (PDOException $e) {
            return false;
        }
    }
    public function tangluotxem($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE mathang SET luotxem=luotxem+1 WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function suamathang($id, $ten, $mota, $gia, $hinh, $dm_id, $calo, $pro, $giamgia)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE mathang 
                SET tenmathang=:ten, mota=:mota, gia=:gia, hinhanh=:hinh, 
                    danhmuc_id=:dm, calo=:calo, protein=:pro, giamgia=:giam 
                WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":ten", $ten);
            $cmd->bindValue(":mota", $mota);
            $cmd->bindValue(":gia", $gia);
            $cmd->bindValue(":hinh", $hinh);
            $cmd->bindValue(":dm", $dm_id);
            $cmd->bindValue(":calo", $calo);
            $cmd->bindValue(":pro", $pro);
            $cmd->bindValue(":giam", $giamgia);
            $cmd->bindValue(":id", $id);
            return $cmd->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function timkiemmathang($keyword)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT m.* FROM mathang m 
                    JOIN danhmuc d ON m.danhmuc_id = d.id 
                    WHERE m.tenmathang LIKE :key AND m.trangthai = 1 AND d.trangthai = 1 
                    ORDER BY m.id DESC";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":key", "%" . $keyword . "%");
            $cmd->execute();
            return $cmd->fetchAll();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function laymathangnoibat()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT m.* FROM mathang m 
                    JOIN danhmuc d ON m.danhmuc_id = d.id 
                    WHERE m.trangthai = 1 AND d.trangthai = 1 
                    ORDER BY m.luotxem DESC LIMIT 3";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function laymathangbanchay()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT m.* FROM mathang m 
                    JOIN danhmuc d ON m.danhmuc_id = d.id 
                    WHERE m.trangthai = 1 AND d.trangthai = 1 
                    ORDER BY m.luotban DESC LIMIT 3";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function tangluotban($id, $soluong)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE mathang 
                SET luotban = luotban + :soluong 
                WHERE id = :id";

            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":soluong", $soluong, PDO::PARAM_INT);
            $cmd->bindValue(":id", $id, PDO::PARAM_INT);

            return $cmd->execute();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function capnhat_giamgia_mathang($id, $phantram)
    {
        $db = DATABASE::connect();
        $sql = "UPDATE mathang SET giamgia = :phantram WHERE id = :id";
        $cmd = $db->prepare($sql);
        $cmd->bindValue(":phantram", $phantram);
        $cmd->bindValue(":id", $id);
        return $cmd->execute();
    }

    public function capnhat_giamgia_danhmuc($danhmuc_id, $phantram)
    {
        $db = DATABASE::connect();
        $sql = "UPDATE mathang SET giamgia = :phantram WHERE danhmuc_id = :dm_id";
        $cmd = $db->prepare($sql);
        $cmd->bindValue(":phantram", $phantram);
        $cmd->bindValue(":dm_id", $danhmuc_id);
        return $cmd->execute();
    }
    public function xoa_tatca_giamgia()
    {
        $db = DATABASE::connect();
        $sql = "UPDATE mathang SET giamgia = 0";
        $cmd = $db->prepare($sql);
        return $cmd->execute();
    }
}
?>