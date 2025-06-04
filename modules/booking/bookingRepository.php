<?php

include_once __DIR__ . '/../../config/conn.php';

function getAllBookingRepo()
{
  global $conn;
  $query = "SELECT * FROM booking";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    error_log("Query failed: " . mysqli_error($conn));
    return [];
  }

  $booking = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $booking[] = $row;
  }

  return $booking;
}

function getBookingByIdRepo($id)
{
  global $conn;
  $query = "SELECT * FROM booking WHERE idBooking
   = ?";
  $stmt = mysqli_prepare($conn, $query);
  if (!$stmt) {
    error_log("Prepare failed: " . mysqli_error($conn));
    return null;
  }

  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $booking = mysqli_fetch_assoc($result);
  mysqli_stmt_close($stmt);

  return $booking ?: null;
}

function insertBookingRepo($idJasa, $lokasi, $paketPilihan, $status)
{
  global $conn;
  $query = "INSERT INTO booking (idJasa, lokasi, paketPilihan, status) VALUES (?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $query);

  if (!$stmt) {
    die("Prepare failed: " . mysqli_error($conn));
  }

  mysqli_stmt_bind_param($stmt, "isss", $idJasa, $lokasi, $paketPilihan, $status);
  $success = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  return $success;
}


function updateBookingRepo($idBooking, $idJasa, $lokasi, $paketPilihan, $status)
{
  global $conn;
  $query = "UPDATE booking SET idJasa = ?, lokasi = ?, paketPilihan = ?, status = ? WHERE idBooking = ?";
  $stmt = mysqli_prepare($conn, $query);

  if (!$stmt)
    return false;

  mysqli_stmt_bind_param($stmt, "isssi", $idJasa, $lokasi, $paketPilihan, $status, $idBooking);
  $success = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  return $success;
}

function deleteBookingRepo(
  $idBooking
) {
  global $conn;
  $query = "DELETE FROM booking WHERE idBooking
   = ?";
  $stmt = mysqli_prepare($conn, $query);
  if (!$stmt)
    return false;

  mysqli_stmt_bind_param(
    $stmt,
    "i",
    $idBooking
  );
  $success = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  return $success;
}