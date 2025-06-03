<?php
include_once __DIR__ . '/../../config/conn.php';

function getAllJadwalRepo()
{
  global $conn;
  $query = "SELECT * FROM jadwal";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    error_log("Query failed: " . mysqli_error($conn));
    return [];
  }

  $jadwal = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $jadwal[] = $row;
  }

  return $jadwal;
}

function getJadwalByIdRepo($id)
{
  global $conn;
  $query = "SELECT * FROM jadwal WHERE idJadwal = ?";
  $stmt = mysqli_prepare($conn, $query);
  if (!$stmt) return null;

  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $jadwal = mysqli_fetch_assoc($result);
  mysqli_stmt_close($stmt);

  return $jadwal ?: null;
}

function insertJadwalRepo($idBooking, $tanggal, $jamMulai, $jamSelesai, $catatan)
{
  global $conn;
  $query = "INSERT INTO jadwal (idBooking, tanggal, jamMulai, jamSelesai, catatan) VALUES (?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $query);
  if (!$stmt) {
    error_log("Prepare insert failed: " . mysqli_error($conn));
    return false;
  }

  mysqli_stmt_bind_param($stmt, "issss", $idBooking, $tanggal, $jamMulai, $jamSelesai, $catatan);
  $success = mysqli_stmt_execute($stmt);
  if (!$success) {
    error_log("Insert jadwal gagal: " . mysqli_error($conn));
  }
  mysqli_stmt_close($stmt);

  return $success;
}

function updateJadwalRepo($idJadwal, $idBooking, $tanggal, $jamMulai, $jamSelesai, $catatan)
{
  global $conn;
  $query = "UPDATE jadwal SET idBooking = ?, tanggal = ?, jamMulai = ?, jamSelesai = ?, catatan = ? WHERE idJadwal = ?";
  $stmt = mysqli_prepare($conn, $query);
  if (!$stmt) {
    error_log("Prepare update failed: " . mysqli_error($conn));
    return false;
  }

  mysqli_stmt_bind_param($stmt, "issssi", $idBooking, $tanggal, $jamMulai, $jamSelesai, $catatan, $idJadwal);
  $success = mysqli_stmt_execute($stmt);
  if (!$success) {
    error_log("Update jadwal gagal: " . mysqli_error($conn));
  }
  mysqli_stmt_close($stmt);

  return $success;
}

function deleteJadwalRepo($idJadwal)
{
  global $conn;
  $query = "DELETE FROM jadwal WHERE idJadwal = ?";
  $stmt = mysqli_prepare($conn, $query);
  if (!$stmt) return false;

  mysqli_stmt_bind_param($stmt, "i", $idJadwal);
  $success = mysqli_stmt_execute($stmt);
  if (!$success) {
    error_log("Delete jadwal gagal: " . mysqli_error($conn));
  }
  mysqli_stmt_close($stmt);

  return $success;
}

function bookingExists($idBooking)
{
  global $conn;
  $query = "SELECT 1 FROM booking WHERE idBooking = ?";
  $stmt = mysqli_prepare($conn, $query);
  if (!$stmt) return false;

  mysqli_stmt_bind_param($stmt, "i", $idBooking);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  $exists = mysqli_stmt_num_rows($stmt) > 0;
  mysqli_stmt_close($stmt);

  return $exists;
}