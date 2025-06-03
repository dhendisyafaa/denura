<?php
include __DIR__ . '/../../config/conn.php';
include_once __DIR__ . '/reviewService.php';

function getAllReview()
{
    return getAllReviewService();
}

function getReviewById($id)
{
    return getReviewByIdService($id);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['tambahReview'])) {
    $idJasa = intval($_POST['idJasa']);
    $rating = intval($_POST['rating']);
    $komentar = $_POST['komentar'];
    $tglReview = str_replace('T', ' ', $_POST['tglReview']) . ':00';

    $result = createReviewService($idJasa, $rating, $komentar, $tglReview);

    header("Location: ../../views/review/index.php?status=" . ($result ? "success" : "error"));
    exit;
}

// handle edit
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['editReview'])) {
    $idReview = intval($_POST['idReview']);
    $idJasa = intval($_POST['idJasa']);
    $rating = intval($_POST['rating']);
    $komentar = $_POST['komentar'];
    $tglReview = $_POST['tglReview'];

    $result = updateReviewService($idReview, $idJasa, $rating, $komentar, $tglReview);

    if (!$result) {
        error_log("Failed to update review: idReview=$idReview, idJasa=$idJasa, rating=$rating, komentar=$komentar, tglReview=$tglReview");
    }

    header("Location: ../../views/review/index.php?status=" . ($result ? "updated" : "update_failed"));
    exit;
}

// handle delete
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['hapusReview'])) {
    $idReview = intval($_POST['idReview']);
    $result = deleteReviewService($idReview);

    header("Location: ../../views/review/index.php?status=" . ($result ? "deleted" : "delete_failed"));
    exit;
}
