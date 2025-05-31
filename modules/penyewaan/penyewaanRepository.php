<?php
include_once(__DIR__ . "/../../config/conn.php");

function getAllPenyewaanRepo()
{
  global $conn;
  $query = "SELECT * FROM penyewaan";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    error_log("Query failed: " . mysqli_error($conn));
    return [];
  }

  $penyewaan = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $penyewaan[] = $row;
  }

  return $penyewaan;
}

function getPenyewaanByIdRepo($id)
{
  global $conn;
  $query = "SELECT * FROM penyewaan WHERE idSewa = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $penyewaan = mysqli_fetch_assoc($result);
  mysqli_stmt_close($stmt);
  return $penyewaan;
}

function insertPenyewaanRepo($id_jasa, $id_barang, $tgl_sewa, $tgl_pengembalian, $harga_sewa)
{
  global $conn;
  $query = "INSERT INTO penyewaan (idJasa, idBarang, tglSewa, tglPengembalian, hargaSewa) VALUES (?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $query);

  if (!$stmt) {
    die("Prepare failed: " . mysqli_error($conn));
  }

  mysqli_stmt_bind_param($stmt, "iissi", $id_jasa, $id_barang, $tgl_sewa, $tgl_pengembalian, $harga_sewa);
  $success = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  return $success;
}

function updateSewaRepo($id_sewa, $id_jasa, $id_barang, $tgl_sewa, $tgl_pengembalian, $harga_sewa)
{
  global $conn;
  $query = "UPDATE penyewaan SET idJasa = ?, idBarang = ?, tglSewa = ?, tglPengembalian = ?, hargaSewa = ? WHERE idSewa = ?";
  $stmt = mysqli_prepare($conn, $query);
  if (!$stmt)
    return false;

  mysqli_stmt_bind_param($stmt, "iissii", $id_jasa, $id_barang, $tgl_sewa, $tgl_pengembalian, $harga_sewa, $id_sewa);
  $success = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  return $success;
}

function deleteSewaRepo($id_sewa)
{
  global $conn;
  $query = "DELETE FROM penyewaan WHERE idSewa = ?";
  $stmt = mysqli_prepare($conn, $query);
  if (!$stmt)
    return false;

  mysqli_stmt_bind_param($stmt, "i", $id_sewa);
  $success = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  return $success;
}