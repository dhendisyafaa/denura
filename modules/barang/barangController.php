<?php
include __DIR__ . '/../../config/conn.php';
include_once __DIR__ . '/barangService.php';

function getAllBarang()
{
    return getAllBarangService();
}

function getBarangById($id)
{

    return getBarangByIdService($id);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['tambahBarang'])) {
    $nama_barang = $_POST['namaBarang'];
    $stok = intval($_POST['stok']);
    $harga = intval($_POST['hargaBarang']);

    $result = createBarangService($nama_barang, $harga, $stok);

    if ($result) {
        header("Location: ../../views/barang/index.php?status=success");
        exit;
    } else {
        header("Location: ../../views/barang/index.php?status=error");
        exit;
    }
}

// handle edit
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['editBarang'])) {
    $idBarang = intval($_POST['idBarang']);
    $namaBarang = $_POST['namaBarang'];
    $stok = intval($_POST['stok']);
    $harga = intval($_POST['hargaBarang']);

    $result = updateBarangService($idBarang, $namaBarang, $stok, $harga);

    header("Location: ../../views/barang/index.php?status=" . ($result ? "updated" : "update_failed"));
    exit;
}

// handle delete
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['hapusBarang'])) {
    $idBarang = intval($_POST['idBarang']);
    $result = deleteBarangService($idBarang);

    header("Location: ../../views/barang/index.php?status=" . ($result ? "deleted" : "delete_failed"));
}
?>