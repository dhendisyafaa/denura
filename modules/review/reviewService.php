<?php
include_once __DIR__ . "/reviewRepository.php";

function isValidDateTime($dateTime)
{
    $dt = DateTime::createFromFormat('Y-m-d\TH:i', $dateTime);
    if ($dt && $dt->format('Y-m-d\TH:i') === $dateTime) {
        return true;
    }
    $dt = DateTime::createFromFormat('Y-m-d H:i:s', $dateTime);
    if ($dt && $dt->format('Y-m-d H:i:s') === $dateTime) {
        return true;
    }
    return false;
}

function getAllReviewService()
{
  return getAllReviewRepo();
}

function getReviewByIdService($id)
{
  if ($id <= 0) return null;
  return getReviewByIdRepo($id);
}

function jasaExists($idJasa) {
    global $conn;
    $stmt = mysqli_prepare($conn, "SELECT 1 FROM jasa WHERE idJasa = ?");
    mysqli_stmt_bind_param($stmt, "i", $idJasa);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result) !== null;
}

function createReviewService($idJasa, $rating, $komentar, $tglReview)
{

    if (!jasaExists($idJasa)) {
    return false;
    }

    if ($idJasa <= 0 || empty($komentar) || $rating < 1 || $rating > 5 || empty($tglReview) || !isValidDateTime($tglReview)) {
        return false;
    }

    $dt = new DateTime($tglReview);
    $tglReviewFormatted = $dt->format('Y-m-d H:i:s');

    return insertReviewRepo($idJasa, $rating, $komentar, $tglReviewFormatted);
}

function updateReviewService($idReview, $idJasa, $rating, $komentar, $tglReview)
{
    if ($idReview <= 0 || $idJasa <= 0 || empty($komentar) || $rating < 1 || $rating > 5 || empty($tglReview) || !isValidDateTime($tglReview)) {
        return false;
    }

    if (!jasaExists($idJasa)) {
        return false;
    }

    $dt = new DateTime($tglReview);
    $tglReviewFormatted = $dt->format('Y-m-d H:i:s');

    return updateReviewRepo($idReview, $idJasa, $rating, $komentar, $tglReviewFormatted);
}

function deleteReviewService($idReview)
{
  if ($idReview <= 0) return false;
  return deleteReviewRepo($idReview);
}
