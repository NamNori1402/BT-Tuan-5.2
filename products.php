<?php

function ketNoiDB() {
    $con = new mysqli('localhost', 'root', '', 'arm');
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    return $con;
}

function themSanPhamDB($MaSP, $TenSP, $Gia, $DVT, $NCC) {
    $con = ketNoiDB();
    $sql = 'INSERT INTO products VALUES ("'.$MaSP.'", "'.$TenSP.'", "'.$Gia.'", "'.$DVT.'", "'.$NCC.'")';
    $i = $con->query($sql);
    return $i;
}

function hienThiSanPham() {
    $con = ketNoiDB();
    $result = $con->query('SELECT * FROM products');
    return $result;
}

function updateSanPhamDB($MaSP, $TenSP, $Gia, $DVT, $NCC) {
    $con = ketNoiDB();
    $sql = 'UPDATE products SET TenSP="'.$TenSP.'", Gia="'.$Gia.'", DVT="'.$DVT.'", NCC="'.$NCC.'" WHERE MaSP="'.$MaSP.'"';
    $i = $con->query($sql);
    return $i;
}
?>
