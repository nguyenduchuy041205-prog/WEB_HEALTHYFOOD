<?php
class DANHMUC
{
    public function laydanhmuc()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM danhmuc";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function laydanhmuctheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM danhmuc WHERE id=:id";
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
    public function themdanhmuc($tendm)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO danhmuc(tendanhmuc) VALUES(:ten)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":ten", $tendm);
            return $cmd->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function xoadanhmuc($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM danhmuc WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            return $cmd->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function suadanhmuc($id, $tendm)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE danhmuc SET tendanhmuc=:ten WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":ten", $tendm);
            $cmd->bindValue(":id", $id);
            return $cmd->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function doitrangthai($id, $trangthai)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE danhmuc SET trangthai=:trangthai WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":trangthai", $trangthai);
            $cmd->bindValue(":id", $id);
            return $cmd->execute();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function laydanhmuchienthi()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM danhmuc WHERE trangthai=1 ORDER BY id DESC";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
?>