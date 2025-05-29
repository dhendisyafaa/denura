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
