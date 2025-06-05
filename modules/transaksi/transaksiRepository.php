<?php
include_once __DIR__ . '/../../config/conn.php';

function getAllTransaksiRepo()
{
  global $conn;
  $query = "SELECT * FROM transaksi";
  $result = mysqli_query($conn, $query);
  $data = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }

  return $data;
}

function getTransaksiByIdRepo($id)
{
  global $conn;
  $query = "SELECT * FROM transaksi WHERE idTransaksi = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  return mysqli_fetch_assoc($result);
}

function addTransaksiRepo($idBooking, $metodePembayaran, $totalHarga, $statusPembayaran, $tglPembayaran)
{
  global $conn;
  $query = "INSERT INTO transaksi (idBooking, metodePembayaran, totalHarga, statusPembayaran, tglPembayaran) VALUES (?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "issss", $idBooking, $metodePembayaran, $totalHarga, $statusPembayaran, $tglPembayaran);
  return mysqli_stmt_execute($stmt);
}

function updateTransaksiRepo($idTransaksi, $metodePembayaran, $totalHarga, $statusPembayaran, $tglPembayaran)
{
  global $conn;
  $query = "UPDATE transaksi SET metodePembayaran = ?, totalHarga = ?, statusPembayaran = ?, tglPembayaran = ? WHERE idTransaksi = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "ssssi", $metodePembayaran, $totalHarga, $statusPembayaran, $tglPembayaran, $idTransaksi);
  return mysqli_stmt_execute($stmt);
}
function deleteTransaksiRepo($idTransaksi)
{
  global $conn;
  $query = "DELETE FROM transaksi WHERE idTransaksi = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "i", $idTransaksi);
  return mysqli_stmt_execute($stmt);
}
