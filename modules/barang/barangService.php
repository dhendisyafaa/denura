<?php

include_once __DIR__ . "/barangRepository.php";

function getAllBarangService()
{
  return getAllBarangRepo();
}

function getBarangByIdService($id)
{
  if ($id <= 0)
    return null;
  return getBarangByIdRepo($id);
}

function createBarangService($nama_barang, $harga, $stok, $urlGambar)
{
  if (empty($nama_barang) || $harga <= 0 || $stok < 0) {
    return false;
  }

  return insertBarangRepo($nama_barang, $harga, $stok, $urlGambar);
}

function updateBarangService($idBarang, $namaBarang, $stok, $harga, $urlGambar)
{
  if (empty($namaBarang) || $harga <= 0 || $stok < 0 || $idBarang <= 0)
    return false;

  return updateBarangRepo($idBarang, $namaBarang, $stok, $harga, $urlGambar);
}

function deleteBarangService($idBarang)
{
  if ($idBarang <= 0)
    return false;
  return deleteBarangRepo($idBarang);
}