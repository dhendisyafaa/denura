<?php
include_once __DIR__ . '/portofolioRepository.php';

function getAllPortofolioService()
{
  return getAllPortofolioRepo();
}

function getPortofolioByIdService($id)
{
  return getPortofolioByIdRepo($id);
}

function addPortofolioService($idUser, $judulKarya, $deskripsi, $tipeKarya, $tglUpload)
{
  // Validasi sederhana
  if (empty($judulKarya) || empty($deskripsi) || empty($tipeKarya)) {
    return false;
  }

  return addPortofolioRepo($idUser, $judulKarya, $deskripsi, $tipeKarya, $tglUpload);
}

function updatePortofolioService($idPortofolio, $judulKarya, $deskripsi, $tipeKarya)
{
  if (empty($judulKarya) || empty($deskripsi) || empty($tipeKarya)) {
    return false;
  }

  return updatePortofolioRepo($idPortofolio, $judulKarya, $deskripsi, $tipeKarya);
}

function deletePortofolioService($idPortofolio)
{
  return deletePortofolioRepo($idPortofolio);
}
