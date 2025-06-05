<?php
include "../../config/conn.php";

function getAllUserRepo()
{
  global $conn;
  $query = "SELECT * FROM user";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    error_log("Query failed: " . mysqli_error($conn));
    return [];
  }

  $user = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $user[] = $row;
  }

  return $user;
}

function getUserByIdRepo($idUser)
{
  global $conn;
  $query = "SELECT * FROM user WHERE idUser = ?";
  $stmt = mysqli_prepare($conn, $query);
  if (!$stmt) {
    error_log("Prepare statement failed: " . mysqli_error($conn));
    return null;
  }

  mysqli_stmt_bind_param($stmt, "i", $idUser);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (!$result) {
    error_log("Execute failed: " . mysqli_error($conn));
    return null;
  }

  return mysqli_fetch_assoc($result);
}

function registerUserRepo($data)
{
  global $conn;
  $query = "INSERT INTO user (namaLengkap, noTelp, email, password, tipeUser) VALUES (?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $query);
  if (!$stmt)
    return false;
  mysqli_stmt_bind_param($stmt, 'sssss', $data['namaLengkap'], $data['noTelp'], $data['email'], $data['password'], $data['tipeUser']);
  return mysqli_stmt_execute($stmt);
}

function isEmailExist($email)
{
  global $conn;
  $query = "SELECT idUser FROM user WHERE email = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);

  return mysqli_stmt_num_rows($stmt) > 0;
}

function updateUserRepo($data)
{
  global $conn;
  $query = "UPDATE user SET namaLengkap = ?, noTelp = ?, email = ?, tipeUser = ? WHERE idUser = ?";
  $stmt = mysqli_prepare($conn, $query);
  if (!$stmt) {
    error_log("Prepare statement failed: " . mysqli_error($conn));
    return false;
  }

  mysqli_stmt_bind_param($stmt, 'ssssi', $data['namaLengkap'], $data['noTelp'], $data['email'], $data['tipeUser'], $data['idUser']);
  return mysqli_stmt_execute($stmt);
}

function deleteUserRepo($idUser)
{
  global $conn;
  $query = "DELETE FROM user WHERE idUser = ?";
  $stmt = mysqli_prepare($conn, $query);
  if (!$stmt) {
    error_log("Prepare statement failed: " . mysqli_error($conn));
    return false;
  }

  mysqli_stmt_bind_param($stmt, "i", $idUser);
  return mysqli_stmt_execute($stmt);
}