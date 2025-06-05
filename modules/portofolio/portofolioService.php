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

function addPortofolioService($idUser, $judulKarya, $linkPortofolio, $deskripsi, $tipeKarya, $tglUpload)
{
  if (empty($judulKarya) || empty($deskripsi) || empty($tipeKarya)) {
    return false;
  }

  return addPortofolioRepo($idUser, $judulKarya, $linkPortofolio, $deskripsi, $tipeKarya, $tglUpload);
}

function updatePortofolioService($idPortofolio, $judulKarya, $linkPortofolio, $deskripsi, $tipeKarya)
{
  if (empty($judulKarya) || empty($deskripsi) || empty($tipeKarya)) {
    return false;
  }

  return updatePortofolioRepo($idPortofolio, $judulKarya, $linkPortofolio, $deskripsi, $tipeKarya);
}

function deletePortofolioService($idPortofolio)
{
  return deletePortofolioRepo($idPortofolio);
}
