<?php
include_once __DIR__ . '/jadwalRepository.php';

function getAllJadwalService()
{
  return getAllJadwalRepo();
}

function getJadwalByIdService($id)
{
  if ($id <= 0) return null;
  return getJadwalByIdRepo($id);
}

function createJadwalService($idBooking, $tanggal, $jamMulai, $jamSelesai, $catatan)
{
  if (
    $idBooking <= 0 || empty($tanggal) || empty($jamMulai) || empty($jamSelesai)
  ) {
    return false;
  }

  if (!validateDate($tanggal) || !validateTime($jamMulai) || !validateTime($jamSelesai)) {
    return false;
  }

  if (!bookingExists($idBooking)) {
    return false;
  }

  return insertJadwalRepo($idBooking, $tanggal, $jamMulai, $jamSelesai, $catatan);
}

function updateJadwalService($idJadwal, $idBooking, $tanggal, $jamMulai, $jamSelesai, $catatan)
{
  if (
    $idJadwal <= 0 || $idBooking <= 0 || empty($tanggal) || empty($jamMulai) || empty($jamSelesai)
  ) {
    return false;
  }

  if (!validateDate($tanggal) || !validateTime($jamMulai) || !validateTime($jamSelesai)) {
    return false;
  }

  if (!bookingExists($idBooking)) {
    return false;
  }

  return updateJadwalRepo($idJadwal, $idBooking, $tanggal, $jamMulai, $jamSelesai, $catatan);
}

function deleteJadwalService($idJadwal)
{
  if ($idJadwal <= 0) return false;
  return deleteJadwalRepo($idJadwal);
}

function validateDate($date)
{
  $d = DateTime::createFromFormat('Y-m-d', $date);
  return $d && $d->format('Y-m-d') === $date;
}

function validateTime($time)
{
  return preg_match('/^\d{2}:\d{2}(:\d{2})?$/', $time);
}