<?php
include_once(__DIR__ . "/jasaRepository.php");

function getAllJasaService()
{
  return getAllJasaRepo();
}

function getJasaByIdService($id)
{
  return getJasaByIdRepo($id);
}

function createJasaService($id_user, $jenis_jasa)
{
  // Validasi idUser
  if (!is_numeric($id_user) || $id_user <= 0) {
    return false;
  }

  return insertJasaRepo($id_user, $jenis_jasa);
}

function updateJasaService($id_jasa, $id_user, $jenis_jasa)
{
  // Validasi idJasa dan idBarang
  if (!is_numeric($id_jasa) || $id_jasa <= 0 || !is_numeric($id_user) || $id_user <= 0) {
    return false;
  }

  return updateJasaRepo($id_jasa, $id_user, $jenis_jasa);
}

function deleteJasaService($id_jasa)
{
  if (!is_numeric($id_jasa) || $id_jasa <= 0)
    return false;
  return deleteJasaRepo($id_jasa);
}