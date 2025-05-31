<?php
include_once(__DIR__ . "/penyewaanRepository.php");

function getAllPenyewaanService()
{
  return getAllPenyewaanRepo();
}

function getPenyewaanByIdService($id)
{
  return getPenyewaanByIdRepo($id);
}

function createPenyewaanService($id_jasa, $id_barang, $tgl_sewa, $tgl_pengembalian, $harga_sewa)
{
  // Validasi idJasa dan idBarang
  if (!is_numeric($id_jasa) || $id_jasa <= 0 || !is_numeric($id_barang) || $id_barang <= 0) {
    return false;
  }
  // Validasi tgl
  if (empty($tgl_sewa) || empty($tgl_pengembalian) || strtotime($tgl_sewa) === false || strtotime($tgl_pengembalian) === false) {
    return false;
  }
  // Validasi harga
  if (!is_numeric($harga_sewa) || $harga_sewa <= 0) {
    return false;
  }

  return insertPenyewaanRepo($id_jasa, $id_barang, $tgl_sewa, $tgl_pengembalian, $harga_sewa);
}

function updateSewaService($id_sewa, $id_jasa, $id_barang, $tgl_sewa, $tgl_pengembalian, $harga_sewa)
{
  // Validasi idJasa dan idBarang
  if (!is_numeric($id_sewa) || $id_sewa <= 0 || !is_numeric($id_jasa) || $id_jasa <= 0 || !is_numeric($id_barang) || $id_barang <= 0) {
    return false;
  }
  // Validasi tgl
  if (empty($tgl_sewa) || empty($tgl_pengembalian) || strtotime($tgl_sewa) === false || strtotime($tgl_pengembalian) === false) {
    return false;
  }
  // Validasi harga
  if (!is_numeric($harga_sewa) || $harga_sewa <= 0) {
    return false;
  }

  return updateSewaRepo($id_sewa, $id_jasa, $id_barang, $tgl_sewa, $tgl_pengembalian, $harga_sewa);
}

function deleteSewaService($id_sewa)
{
  if (!is_numeric($id_sewa) || $id_sewa <= 0)
    return false;
  return deleteSewaRepo($id_sewa);
}