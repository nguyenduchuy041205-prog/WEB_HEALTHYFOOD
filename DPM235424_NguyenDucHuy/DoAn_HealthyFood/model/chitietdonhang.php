<?php
class CHITIETDONHANG
{
    public function them_chitietdonhang($donhang_id, $mathang_id, $dongia, $soluong)
    {
        $db = DATABASE::connect();
        try {
            $thanhtien = $dongia * $soluong;

            $sql = "INSERT INTO chitietdonhang(donhang_id, mathang_id, dongia, soluong, thanhtien) 
                    VALUES (:donhang_id, :mathang_id, :dongia, :soluong, :thanhtien)";

            $cmd = $db->prepare($sql);
            $cmd->bindValue(":donhang_id", $donhang_id);
            $cmd->bindValue(":mathang_id", $mathang_id);
            $cmd->bindValue(":dongia", $dongia);
            $cmd->bindValue(":soluong", $soluong);
            $cmd->bindValue(":thanhtien", $thanhtien);

            return $cmd->execute();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }



    public function lay_chitiet_theodonhang($donhang_id)
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT ct.*, m.tenmathang, m.hinhanh 
                FROM chitietdonhang ct
                JOIN mathang m ON ct.mathang_id = m.id
                WHERE ct.donhang_id = :donhang_id";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":donhang_id", $donhang_id);
            $cmd->execute();
            return $cmd->fetchAll();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
?>