<?php
include_once(__DIR__ . "/penyewaanService.php");

function getAllPenyewaan()
{
    return getAllPenyewaanService();
}

function getPenyewaanById($id)
{
    return getPenyewaanByIdService($id);
}