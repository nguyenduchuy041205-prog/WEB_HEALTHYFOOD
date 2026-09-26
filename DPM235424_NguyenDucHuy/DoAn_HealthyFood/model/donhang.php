<?php
class DONHANG
{
    public function them_donhang($nguoidung_id, $tongtien, $hoten, $sdt, $diachi)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO donhang(nguoidung_id, ngaydat, tongtien, tennguoinhan, sodienthoainhan, diachinhan, trangthai) 
                VALUES(:nguoidung_id, NOW(), :tongtien, :ten, :sdt, :diachi, 0)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":nguoidung_id", $nguoidung_id);
            $cmd->bindValue(":tongtien", $tongtien);
            $cmd->bindValue(":ten", $hoten);
            $cmd->bindValue(":sdt", $sdt);
            $cmd->bindValue(":diachi", $diachi);
            $cmd->execute();

            return $dbcon->lastInsertId();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function luudonhang($nguoidung_id, $tongtien, $ten, $sdt, $diachi)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO donhang(nguoidung_id, ngaydat, tongtien, tennguoinhan, sodienthoainhan, diachinhan, trangthai) 
                VALUES(:user_id, NOW(), :tongtien, :ten, :sdt, :diachi, 0)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":user_id", $nguoidung_id);
            $cmd->bindValue(":tongtien", $tongtien);
            $cmd->bindValue(":ten", $ten);
            $cmd->bindValue(":sdt", $sdt);
            $cmd->bindValue(":diachi", $diachi);
            $cmd->execute();
            return $dbcon->lastInsertId();
        } catch (PDOException $e) {
            exit("Lỗi lưu đơn hàng: " . $e->getMessage());
        }
    }

    public function luuchitietdonhang($donhang_id, $mathang_id, $dongia, $soluong, $thanhtien)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO chitietdonhang(donhang_id, mathang_id, dongia, soluong, thanhtien) 
                VALUES(:dh_id, :mh_id, :gia, :sl, :tt)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":dh_id", $donhang_id);
            $cmd->bindValue(":mh_id", $mathang_id);
            $cmd->bindValue(":gia", $dongia);
            $cmd->bindValue(":sl", $soluong);
            $cmd->bindValue(":tt", $thanhtien);
            return $cmd->execute();
        } catch (PDOException $e) {
            exit("Lỗi lưu chi tiết: " . $e->getMessage());
        }
    }
    public function laydonhang()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT d.*, n.hoten FROM donhang d 
                    JOIN nguoidung n ON d.nguoidung_id = n.id 
                    ORDER BY d.id DESC";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function capnhattrangthai($id, $trangthai)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE donhang SET trangthai=:trangthai WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":trangthai", $trangthai);
            $cmd->bindValue(":id", $id);
            return $cmd->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function laychitietdonhang($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT ct.*, m.tenmathang, m.hinhanh, m.calo, m.protein 
                FROM chitietdonhang ct 
                JOIN mathang m ON ct.mathang_id = m.id 
                WHERE ct.donhang_id = :id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            return $cmd->fetchAll();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function laydonhangtheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM donhang WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            return $cmd->fetch();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function laydonhangtheokhachhang($nguoidung_id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM donhang WHERE nguoidung_id=:id ORDER BY id DESC";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $nguoidung_id);
            $cmd->execute();
            return $cmd->fetchAll();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function xoadonhang($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $dbcon->beginTransaction();

            $sql1 = "DELETE FROM chitietdonhang WHERE donhang_id = :id";
            $cmd1 = $dbcon->prepare($sql1);
            $cmd1->bindValue(":id", $id);
            $cmd1->execute();

            $sql2 = "DELETE FROM donhang WHERE id = :id";
            $cmd2 = $dbcon->prepare($sql2);
            $cmd2->bindValue(":id", $id);
            $cmd2->execute();

            $dbcon->commit();
            return true;
        } catch (PDOException $e) {
            $dbcon->rollBack();
            exit($e->getMessage());
        }
    }
    public function lay_doanh_thu_theo_thang($nam)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT MONTH(ngaydat) as thang, SUM(tongtien) as doanhthu 
                FROM donhang 
                WHERE trangthai = 2 AND YEAR(ngaydat) = :nam
                GROUP BY MONTH(ngaydat)
                ORDER BY MONTH(ngaydat)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":nam", $nam);
            $cmd->execute();
            return $cmd->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }
}
?>