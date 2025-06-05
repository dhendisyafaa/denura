<?php
include_once __DIR__ . '/transaksiService.php';
session_start();

function getAllTransaksi()
{
    return getAllTransaksiService();
}

function getTransaksiById($id)
{
    return getTransaksiByIdService($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambahTransaksi'])) {
    $idBooking = $_POST['idBooking'];
    $metodePembayaran = $_POST['metodePembayaran'];
    $totalHarga = $_POST['totalHarga'];
    $statusPembayaran = $_POST['statusPembayaran'];
    $tglPengembalian = date('Y-m-d'); // Tanggal hari ini

    $success = addTransaksiService($idBooking, $metodePembayaran, $totalHarga, $statusPembayaran, $tglPengembalian);

    if ($success) {
        header("Location: ../../views/transaksi/index.php");
        exit;
    } else {
        echo "Gagal menambahkan transaksi";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editTransaksi'])) {
    $idTransaksi = $_POST['idTransaksi'];
    $metodePembayaran = $_POST['metodePembayaran'];
    $totalHarga = $_POST['totalHarga'];
    $statusPembayaran = $_POST['statusPembayaran'];
    $tglPembayaran = date('Y-m-d');

    $success = updateTransaksiService($idTransaksi, $metodePembayaran, $totalHarga, $statusPembayaran, $tglPembayaran);

    if ($success) {
        header("Location: ../../views/transaksi/index.php");
        exit;
    } else {
        echo "Gagal mengupdate transaksi";
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['hapusTransaksi'])) {
    $idTransaksi = intval($_POST['idTransaksi']);
    $result = deleteTransaksiService($idTransaksi);

    header("Location: ../../views/transaksi/index.php?status=" . ($result ? "deleted" : "delete_failed"));
}