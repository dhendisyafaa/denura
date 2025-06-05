<?php
include_once __DIR__ . '/transaksiRepository.php';

function getAllTransaksiService()
{
  return getAllTransaksiRepo();
}

function getTransaksiByIdService($id)
{
  return getTransaksiByIdRepo($id);
}

function addTransaksiService($idBooking, $metodePembayaran, $totalHarga, $statusPembayaran, $tglPembayaran)
{
  // Validasi sederhana
  if (empty($idBooking) || empty($metodePembayaran) || empty($totalHarga) || empty($statusPembayaran)) {
    return false;
  }

  return addTransaksiRepo($idBooking, $metodePembayaran, $totalHarga, $statusPembayaran, $tglPembayaran);
}

function updateTransaksiService($idTransaksi, $metodePembayaran, $totalHarga, $statusPembayaran, $tglPembayaran)
{
  if (empty($idTransaksi) || empty($metodePembayaran) || empty($totalHarga) || empty($statusPembayaran)) {
    return false;
  }

  return updateTransaksiRepo($idTransaksi, $metodePembayaran, $totalHarga, $statusPembayaran, $tglPembayaran);
}

function deleteTransaksiService($idTransaksi)
{
  return deleteTransaksiRepo($idTransaksi);
}
