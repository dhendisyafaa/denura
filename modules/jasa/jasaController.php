<?php
include_once(__DIR__ . "/jasaService.php");

function getAllJasa()
{
    return getAllJasaService();
}

function getJasaById($id)
{
    return getJasaByIdService($id);
}
