<?php

include_once __DIR__ . '/bookingRepository.php';

function getAllBookingService()
{
  return getAllBookingRepo();
}

function getBookingByIdService($id)
{
  if ($id <= 0)
    return null;
  return getBookingByIdRepo($id);
}

function createBookingService($idJasa, $lokasi, $paketPilihan, $status)
{
  $allowedPaket = ['Fotografi', 'Videografi', 'Kombinasi'];
  $allowedStatus = ['Pending', 'Terkonfirmasi', 'Selesai'];

  if (
    $idJasa <= 0 || empty($lokasi) ||
    !in_array($paketPilihan, $allowedPaket) ||
    !in_array($status, $allowedStatus)
  ) {
    return false;
  }

  return insertBookingRepo($idJasa, $lokasi, $paketPilihan, $status);
}

function updateBookingService($idBooking, $idJasa, $lokasi, $paketPilihan, $status)
{
  $allowedPaket = ['Fotografi', 'Videografi', 'Kombinasi'];
  $allowedStatus = ['Pending', 'Terkonfirmasi', 'Selesai'];

  if (
    $idBooking <= 0 || $idJasa <= 0 || empty($lokasi) ||
    !in_array($paketPilihan, $allowedPaket) ||
    !in_array($status, $allowedStatus)
  ) {
    return false;
  }

  return updateBookingRepo($idBooking, $idJasa, $lokasi, $paketPilihan, $status);
}

function deleteBookingService($idBooking)
{
  if ($idBooking <= 0)
    return false;
  return deleteBookingRepo($idBooking);
}