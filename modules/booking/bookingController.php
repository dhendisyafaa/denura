<?php
include __DIR__ . '/../../config/conn.php';
include_once __DIR__ . '/bookingService.php';

function getAllBooking()
{
  return getAllBookingService();
}

function getBookingById($id)
{
  return getBookingByIdService($id);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['tambahBooking'])) {
  $idJasa = intval($_POST['idJasa']);
  $lokasi = $_POST['lokasi'];
  $paketPilihan = $_POST['paketPilihan'];
  $status = $_POST['status'];

  $result = createBookingService($idJasa, $lokasi, $paketPilihan, $status);

  header("Location: ../../views/booking/index.php?status=" . ($result ? "success" : "error"));
  exit;
}

// handle edit
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['editBooking'])) {
  $idBooking = intval($_POST['idBooking']);
  $idJasa = intval($_POST['idJasa']);
  $lokasi = $_POST['lokasi'];
  $paketPilihan = $_POST['paketPilihan'];
  $status = $_POST['status'];

  $result = updateBookingService($idBooking, $idJasa, $lokasi, $paketPilihan, $status);

  if ($result) {
    header("Location: ../../views/booking/index.php?status=updated");
  } else {
    header("Location: ../../views/booking/editBooking.php?id=$idBooking&status=failed");
  }

}

// handle delete
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['hapusBooking'])) {
  $idBooking = intval($_POST['idBooking']);
  $result = deleteBookingService($idBooking);

  header("Location: ../../views/booking/index.php?status=" . ($result ? "deleted" : "delete_failed"));
}
?>