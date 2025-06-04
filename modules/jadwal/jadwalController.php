<?php
include __DIR__ . '/../../config/conn.php';
include_once __DIR__ . '/JadwalService.php';

function getAllJadwal()
{
  return getAllJadwalService();
}

function getJadwalById($id)
{
  return getJadwalByIdService($id);
}

// handle tambah
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['tambahJadwal'])) {
  $idBooking = intval($_POST['idBooking']);
  $tanggal = $_POST['tanggal'];
  $jamMulai = $_POST['jamMulai'];
  $jamSelesai = $_POST['jamSelesai'];
  $catatan = $_POST['catatan'];

  $result = createJadwalService($idBooking, $tanggal, $jamMulai, $jamSelesai, $catatan);

  header("Location: ../../views/jadwal/index.php?status=" . ($result ? "success" : "error"));
  exit;
}

// handle edit
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['editJadwal'])) {
  $idJadwal = intval($_POST['idJadwal']);
  $idBooking = intval($_POST['idBooking']);
  $tanggal = $_POST['tanggal'];
  $jamMulai = $_POST['jamMulai'];
  $jamSelesai = $_POST['jamSelesai'];
  $catatan = $_POST['catatan'];

  $result = updateJadwalService($idJadwal, $idBooking, $tanggal, $jamMulai, $jamSelesai, $catatan);

  header("Location: ../../views/jadwal/index.php?status=" . ($result ? "updated" : "update_failed"));
  exit;
}

// handle delete
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['hapusJadwal'])) {
  $idJadwal = intval($_POST['idJadwal']);
  $result = deleteJadwalService($idJadwal);

  header("Location: ../../views/jadwal/index.php?status=" . ($result ? "deleted" : "delete_failed"));
  exit;
}
?>