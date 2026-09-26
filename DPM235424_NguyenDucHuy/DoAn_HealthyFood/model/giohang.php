<?php
if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = array();
}

function themhangvaogio($id, $soluong)
{
    if (isset($_SESSION['giohang'][$id])) {
        $_SESSION['giohang'][$id] += round($soluong, 0);
    } else {
        $_SESSION['giohang'][$id] = round($soluong, 0);
    }
}

function capnhatsoluong($id, $soluong)
{
    if (isset($_SESSION['giohang'][$id])) {
        $_SESSION['giohang'][$id] = round($soluong, 0);
    }
}

function xoamotmathang($id)
{
    if (isset($_SESSION['giohang'][$id])) {
        unset($_SESSION['giohang'][$id]);
    }
}

function laygiohang()
{
    $mh = array();
    $mh_db = new MATHANG();

    if (!isset($_SESSION['giohang']) || empty($_SESSION['giohang']))
        return $mh;

    foreach ($_SESSION['giohang'] as $id => $soluong) {
        $m = $mh_db->laymathangtheoid($id);

        if ($m && is_array($m)) {
            // --- LOGIC GIẢM GIÁ MỚI ---
            $gia_goc = $m['gia'];
            $giam_gia = $m['giamgia']; // Đây là % giảm (VD: 10)

            // Tính giá bán thực tế sau khi giảm %
            $gia_ban = $gia_goc * (1 - $giam_gia / 100);

            $solg = intval($soluong);
            // Thành tiền tính trên giá đã giảm
            $thtien = round($gia_ban * $solg, 0);

            $mh[$id]['tenmathang'] = $m['tenmathang'];
            $mh[$id]['hinhanh'] = $m['hinhanh'];
            $mh[$id]['gia_goc'] = $gia_goc;   // Giữ lại để hiện giá cũ (có gạch ngang)
            $mh[$id]['gia'] = $gia_ban;       // Giá thực tế khách phải trả
            $mh[$id]['soluong'] = $solg;
            $mh[$id]['thanhtien'] = $thtien;
            $mh[$id]['giamgia'] = $giam_gia;
        } else {
            unset($_SESSION['giohang'][$id]);
        }
    }
    return $mh;
}

function demhangtronggio()
{
    if (isset($_SESSION["giohang"]) && is_array($_SESSION["giohang"])) {
        return count($_SESSION["giohang"]);
    }
    return 0;
}

function tinhtiengiohang()
{
    $tong = 0;
    $giohang = laygiohang(); // Hàm này giờ đã trả về giá ĐÃ GIẢM
    foreach ($giohang as $item) {
        $tong += $item['thanhtien'];
    }
    return $tong;
}

function xoagiohang()
{
    $_SESSION['giohang'] = array();
}
?>