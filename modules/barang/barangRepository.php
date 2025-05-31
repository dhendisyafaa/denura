<?php

include "../../config/conn.php";

function getAllBarangRepo()
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

function getBarangByIdRepo($id)
{
  global $conn;
  $query = "SELECT * FROM barang WHERE idBarang = ?";
  $stmt = mysqli_prepare($conn, $query);
  if (!$stmt)
    return null;

  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $barang = mysqli_fetch_assoc($result);
  mysqli_stmt_close($stmt);

  return $barang ?: null;
}

function insertBarangRepo($nama_barang, $harga, $stok)
{
  global $conn;
  $query = "INSERT INTO barang (namaBarang, hargaBarang, stok) VALUES (?, ?, ?)";
  $stmt = mysqli_prepare($conn, $query);

  if (!$stmt) {
    die("Prepare failed: " . mysqli_error($conn));
  }

  mysqli_stmt_bind_param($stmt, "sii", $nama_barang, $harga, $stok);
  $success = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  return $success;
}

function updateBarangRepo($idBarang, $namaBarang, $stok, $harga)
{
  global $conn;
  $query = "UPDATE barang SET namaBarang = ?, stok = ?, hargaBarang = ? WHERE idBarang = ?";
  $stmt = mysqli_prepare($conn, $query);
  if (!$stmt)
    return false;

  mysqli_stmt_bind_param($stmt, "siii", $namaBarang, $stok, $harga, $idBarang);
  $success = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  return $success;
}

function deleteBarangRepo($idBarang)
{
  global $conn;
  $query = "DELETE FROM barang WHERE idBarang = ?";
  $stmt = mysqli_prepare($conn, $query);
  if (!$stmt)
    return false;

  mysqli_stmt_bind_param($stmt, "i", $idBarang);
  $success = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  return $success;
}