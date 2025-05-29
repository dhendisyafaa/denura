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
