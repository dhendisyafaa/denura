<?php
include_once __DIR__ . '/portofolioService.php';
session_start();

function getAllPortofolio()
{
    return getAllPortofolioService();
}

function getPortofolioById($id)
{
    return getPortofolioByIdService($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambahPortofolio'])) {
    $idUser = $_POST['idUser'];
    $judulKarya = $_POST['judulKarya'];
    $deskripsi = $_POST['deskripsi'];
    $tipeKarya = $_POST['tipeKarya'];
    $tglUpload = date('Y-m-d'); // Tanggal hari ini

    $success = addPortofolioService($idUser, $judulKarya, $deskripsi, $tipeKarya, $tglUpload);

    if ($success) {
        header("Location: ../../views/portofolio/index.php");
        exit;
    } else {
        echo "Gagal menambahkan portofolio";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editPortofolio'])) {
    $idPortofolio = $_POST['idPortofolio'];
    $judulKarya = $_POST['judulKarya'];
    $deskripsi = $_POST['deskripsi'];
    $tipeKarya = $_POST['tipeKarya'];

    $success = updatePortofolioService($idPortofolio, $judulKarya, $deskripsi, $tipeKarya);

    if ($success) {
        header("Location: ../../views/portofolio/index.php");
        exit;
    } else {
        echo "Gagal mengupdate portofolio";
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['hapusPortofolio'])) {
    $idPortofolio = intval($_POST['idPortofolio']);
    $result = deletePortofolioService($idPortofolio);

    header("Location: ../../views/portofolio/index.php?status=" . ($result ? "deleted" : "delete_failed"));
}