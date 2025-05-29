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
