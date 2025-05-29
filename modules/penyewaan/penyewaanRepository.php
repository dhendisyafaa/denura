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
