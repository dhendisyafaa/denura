<?php
include_once __DIR__ . '/../../config/conn.php';

function getAllPortofolioRepo()
{
  global $conn;
  $query = "SELECT * FROM portofolio";
  $result = mysqli_query($conn, $query);
  $data = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }

  return $data;
}

function getPortofolioByIdRepo($id)
{
  global $conn;
  $query = "SELECT * FROM portofolio WHERE idPortofolio = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  return mysqli_fetch_assoc($result);
}

function addPortofolioRepo($idUser, $judulKarya, $linkPortofolio, $deskripsi, $tipeKarya, $tglUpload)
{
  global $conn;
  $query = "INSERT INTO portofolio (idUser, judulKarya, linkPortofolio, deskripsi, tipeKarya, tglUpload) VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "isssss", $idUser, $judulKarya, $linkPortofolio, $deskripsi, $tipeKarya, $tglUpload);
  return mysqli_stmt_execute($stmt);
}

function updatePortofolioRepo($idPortofolio, $judulKarya, $linkPortofolio, $deskripsi, $tipeKarya)
{
  global $conn;
  $query = "UPDATE portofolio SET judulKarya = ?, linkPortofolio = ?, deskripsi = ?, tipeKarya = ? WHERE idPortofolio = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "ssssi", $judulKarya, $linkPortofolio, $deskripsi, $tipeKarya, $idPortofolio);
  return mysqli_stmt_execute($stmt);
}

function deletePortofolioRepo($idPortofolio)
{
  global $conn;
  $query = "DELETE FROM portofolio WHERE idPortofolio = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "i", $idPortofolio);
  return mysqli_stmt_execute($stmt);
}
