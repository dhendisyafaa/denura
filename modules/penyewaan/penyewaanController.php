<?php
include_once(__DIR__ . "/penyewaanService.php");

function getAllPenyewaan()
{
    return getAllPenyewaanService();
}

function getPenyewaanById($id)
{
    return getPenyewaanByIdService($id);
}

function getHargaBarang($id_barang) {
    global $conn;
    $stmt = mysqli_prepare($conn, "SELECT hargaBarang FROM barang WHERE idBarang = ?");
    mysqli_stmt_bind_param($stmt, "i", $id_barang);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $harga);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    return intval($harga);
}

// handle create
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['tambahPenyewaan'])) {
    $id_jasa = isset($_POST['idJasa']) ? intval($_POST['idJasa']) : 0;
    $id_barang = isset($_POST['idBarang']) ? intval($_POST['idBarang']) : 0;
    $tgl_sewa = isset($_POST['tglSewa']) ? date('Y-m-d H:i:s', strtotime($_POST['tglSewa'])) : '';
    $tgl_pengembalian = isset($_POST['tglPengembalian']) ? date('Y-m-d H:i:s', strtotime($_POST['tglPengembalian'])) : '';
    $harga_sewa = getHargaBarang($id_barang);
    $result = createPenyewaanService($id_jasa, $id_barang, $tgl_sewa, $tgl_pengembalian, $harga_sewa);
    
    if ($result) {
        header("Location: ../../views/penyewaan/index.php?status=success");
        exit;
    } else {
        header("Location: ../../views/penyewaan/index.php?status=error");
        exit;
    }
}
//handle update
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['editPenyewaan'])) {
    $id_sewa = intval($_POST['idSewa']);
    $id_jasa = isset($_POST['idJasa']) ? intval($_POST['idJasa']) : 0;
    $id_barang = isset($_POST['idBarang']) ? intval($_POST['idBarang']) : 0;
    $tgl_sewa = isset($_POST['tglSewa']) ? date('Y-m-d H:i:s', strtotime($_POST['tglSewa'])) : '';
    $tgl_pengembalian = isset($_POST['tglPengembalian']) ? date('Y-m-d H:i:s', strtotime($_POST['tglPengembalian'])) : '';
    $harga_sewa = getHargaBarang($id_barang);
    $result = updateSewaService($id_sewa, $id_jasa, $id_barang, $tgl_sewa, $tgl_pengembalian, $harga_sewa);

    header("Location: ../../views/penyewaan/index.php?status=" . ($result ? "updated" : "update_failed"));
    exit;
}

// handle delete
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['hapusPenyewaan'])) {
    $id_sewa = intval($_POST['idSewa']);
    $result = deleteSewaService($id_sewa);

    header("Location: ../../views/penyewaan/index.php?status=" . ($result ? "deleted" : "delete_failed"));
}