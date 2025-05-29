<?php
include __DIR__ . '/../config/conn.php';

function getAllBarang() 
{
    global $conn;
    $query = "SELECT * FROM barang";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        error_log("Query failed: " . mysqli_error($conn));
        return [];
    }

    $barang = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $barang[] = $row;
    }

    return $barang;
}

function getBarangById($id)
{
    global $conn;
    $query = "SELECT * FROM barang WHERE idBarang = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $barang = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    return $barang;
}

// Tambahkan fungsi insert barang
function insertBarang($nama_barang, $harga, $stok)
{
    global $conn;
    $query = "INSERT INTO barang (namaBarang, hargaBarang, stok) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "sii", $nama_barang, $stok, $harga);
    $success = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $success;
}

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['tambahBarang'])) {
    $nama_barang = $_POST['namaBarang'];
    $stok = intval($_POST['stok']);
    $harga = intval($_POST['hargaBarang']);

    $result = insertBarang($nama_barang, $harga, $stok);

    if ($result) {
        header("Location: ../views/barang/index.php?status=success");
        exit;
    } else {
        header("Location: ../views/barang/index.php?status=error");
        exit;
    }
}

function updateBarang($idBarang, $namaBarang, $stok, $harga)
{
    global $conn;
    $query = "UPDATE barang SET namaBarang = ?, stok = ?, hargaBarang = ? WHERE idBarang = ?";
    $stmt = mysqli_prepare($conn, $query);

    if (!$stmt) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "siii", $namaBarang, $stok, $harga, $idBarang);
    $success = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $success;
}

// handle edit
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['editBarang'])) {
    $idBarang = intval($_POST['idBarang']);
    $namaBarang = $_POST['namaBarang'];
    $stok = intval($_POST['stok']);
    $harga = intval($_POST['hargaBarang']);

    $result = updateBarang($idBarang, $namaBarang, $stok, $harga);

    header("Location: ../views/barang/index.php?status=" . ($result ? "updated" : "update_failed"));
    exit;
}

function deleteBarang($idBarang)
{
    global $conn;
    $query = "DELETE FROM barang WHERE idBarang = ?";
    $stmt = mysqli_prepare($conn, $query);

    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "i", $idBarang);
    $success = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $success;
}

// handle delete
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['hapusBarang'])) {
    $idBarang = intval($_POST['idBarang']);
    $result = deleteBarang($idBarang);

    header("Location: ../views/barang/index.php?status=" . ($result ? "deleted" : "delete_failed"));
}
?>