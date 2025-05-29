<?php
include "../../config/conn.php";

function registerUserRepo($data)
{
  global $conn;
  $query = "INSERT INTO user (namaLengkap, noTelp, email, password, tipeUser) VALUES (?, ?, ?, ?, 'Klien')";
  $stmt = mysqli_prepare($conn, $query);
  if (!$stmt)
    return false;
  mysqli_stmt_bind_param($stmt, 'ssss', $data['namaLengkap'], $data['noTelp'], $data['email'], $data['password']);
  return mysqli_stmt_execute($stmt);
}

function isEmailExist($email)
{
  global $conn;
  $query = "SELECT id FROM user WHERE email = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);

  return mysqli_stmt_num_rows($stmt) > 0;
}
