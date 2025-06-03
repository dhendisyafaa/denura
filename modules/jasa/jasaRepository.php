<?php
include_once(__DIR__ . "/../../config/conn.php");

function getAllJasaRepo()
{
  global $conn;
  $query = "SELECT * FROM jasa";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    error_log("Query failed: " . mysqli_error($conn));
    return [];
  }

  $jasa = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $jasa[] = $row;
  }

  return $jasa;
}

function getJasaByIdRepo($id)
{
  global $conn;
  $query = "SELECT * FROM jasa WHERE idJasa = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $jasa = mysqli_fetch_assoc($result);
  mysqli_stmt_close($stmt);
  return $jasa;
}

function insertJasaRepo($id_user, $jenis_jasa)
{
  global $conn;
  $query = "INSERT INTO jasa (idUser, jenisJasa) VALUES (?, ?)";
  $stmt = mysqli_prepare($conn, $query);

  if (!$stmt) {
    die("Prepare failed: " . mysqli_error($conn));
  }

  mysqli_stmt_bind_param($stmt, "is", $id_user, $jenis_jasa);
  $success = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  return $success;
}

function updateJasaRepo($id_jasa, $id_user, $jenis_jasa)
{
  global $conn;
  $query = "UPDATE jasa SET idUser = ?, jenisJasa = ? WHERE idJasa = ?";
  $stmt = mysqli_prepare($conn, $query);
  if (!$stmt)
    return false;

  mysqli_stmt_bind_param($stmt, "isi", $id_user, $jenis_jasa, $id_jasa);
  $success = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  return $success;
}

function deleteJasaRepo($id_jasa)
{
  global $conn;
  $query = "DELETE FROM jasa WHERE idJasa = ?";
  $stmt = mysqli_prepare($conn, $query);
  if (!$stmt)
    return false;

  mysqli_stmt_bind_param($stmt, "i", $id_jasa);
  $success = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  return $success;
}