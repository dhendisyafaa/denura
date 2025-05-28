<?php
include "../config/conn.php";

function getAllUsers()
{
  global $conn;
  $query = "SELECT * FROM user";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    error_log("Query failed: " . mysqli_error($conn));
    return [];
  }

  $users = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
  }

  return $users;
}
function getUserById($id)
{
  global $conn;
  $query = "SELECT * FROM user WHERE id = ?";
  $stmt = mysqli_prepare($conn, $query);

  if (!$stmt) {
    error_log("Prepare failed: " . mysqli_error($conn));
    return null;
  }

  mysqli_stmt_bind_param($stmt, 'i', $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (!$result) {
    error_log("Execute failed: " . mysqli_error($conn));
    return null;
  }

  return mysqli_fetch_assoc($result);
}

function registerUser($namaLengkap, $noTelp, $email, $password)
{
  global $conn;
  $query = "INSERT INTO user (namaLengkap, noTelp, email, password, tipeUser) VALUES ('$namaLengkap', '$noTelp', '$email', '$password', 'Klien')";
  return mysqli_query($conn, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'insert') {
  $nama = $_POST["nama"];
  $umur = $_POST["umur"];
  $alamat = $_POST["alamat"];

  if (registerUser($koneksi, $nama, $umur, $alamat)) {
    header("Location: index.php");
    exit;
  } else {
    echo "Data gagal disimpan";
  }
}
// function registerUser($namaLengkap, $noTelp, $email, $password)
// {
//   global $conn;
//   $query = "INSERT INTO user (namaLengkap, noTelp, email, password, tipeUser) VALUES ('$namaLengkap', '$noTelp', '$email', '$password', 'Klien')";
//   // $stmt = mysqli_prepare($conn, $query);

//   // if (!$stmt) {
//   //   error_log("Prepare failed: " . mysqli_error($conn));
//   //   return false;
//   // }

//   // mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $password);
//   // $result = mysqli_stmt_execute($stmt);

//   // if (!$result) {
//   //   error_log("Execute failed: " . mysqli_error($conn));
//   //   return false;
//   // }

//   return true;
// }
function updateUser($id, $name, $email, $password)
{
  global $conn;
  $query = "UPDATE user SET name = ?, email = ?, password = ? WHERE id = ?";
  $stmt = mysqli_prepare($conn, $query);

  if (!$stmt) {
    error_log("Prepare failed: " . mysqli_error($conn));
    return false;
  }

  mysqli_stmt_bind_param($stmt, 'sssi', $name, $email, $password, $id);
  $result = mysqli_stmt_execute($stmt);

  if (!$result) {
    error_log("Execute failed: " . mysqli_error($conn));
    return false;
  }

  return true;
}
function deleteUser($id)
{
  global $conn;
  $query = "DELETE FROM user WHERE id = ?";
  $stmt = mysqli_prepare($conn, $query);

  if (!$stmt) {
    error_log("Prepare failed: " . mysqli_error($conn));
    return false;
  }

  mysqli_stmt_bind_param($stmt, 'i', $id);
  $result = mysqli_stmt_execute($stmt);

  if (!$result) {
    error_log("Execute failed: " . mysqli_error($conn));
    return false;
  }

  return true;
}
function searchUsers($keyword)
{
  global $conn;
  $query = "SELECT * FROM user WHERE name LIKE ? OR email LIKE ?";
  $stmt = mysqli_prepare($conn, $query);

  if (!$stmt) {
    error_log("Prepare failed: " . mysqli_error($conn));
    return [];
  }

  $searchTerm = '%' . $keyword . '%';
  mysqli_stmt_bind_param($stmt, 'ss', $searchTerm, $searchTerm);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (!$result) {
    error_log("Execute failed: " . mysqli_error($conn));
    return [];
  }

  $users = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
  }

  return $users;
}
function getUserCount()
{
  global $conn;
  $query = "SELECT COUNT(*) as count FROM user";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    error_log("Query failed: " . mysqli_error($conn));
    return 0;
  }

  $row = mysqli_fetch_assoc($result);
  return $row['count'];
}