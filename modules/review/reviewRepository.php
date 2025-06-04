<?php
include "../../config/conn.php";

function getAllReviewRepo()
{
  global $conn;
  $query = "SELECT * FROM review";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    error_log("Query failed: " . mysqli_error($conn));
    return [];
  }

  $review = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $review[] = $row;
  }

  return $review;
}

function getReviewByIdRepo($id)
{
  global $conn;
  $query = "SELECT * FROM review WHERE idReview = ?";
  $stmt = mysqli_prepare($conn, $query);
  if (!$stmt)
    return null;

  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $review = mysqli_fetch_assoc($result);
  mysqli_stmt_close($stmt);

  return $review ?: null;
}

function insertReviewRepo($idJasa, $rating, $komentar, $tglReview)
{
  global $conn;
  $query = "INSERT INTO review (idJasa, rating, komentar, tglReview) VALUES (?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $query);
  if (!$stmt)
    return false;

  mysqli_stmt_bind_param($stmt, "iiss", $idJasa, $rating, $komentar, $tglReview);
  $success = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  return $success;
}

function updateReviewRepo($idReview, $idJasa, $rating, $komentar, $tglReview)
{
  global $conn;
  $query = "UPDATE review SET idJasa = ?, rating = ?, komentar = ?, tglReview = ? WHERE idReview = ?";
  $stmt = mysqli_prepare($conn, $query);
  if (!$stmt)
    return false;

  mysqli_stmt_bind_param($stmt, "iissi", $idJasa, $rating, $komentar, $tglReview, $idReview);
  $success = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  return $success;
}

function deleteReviewRepo($idReview)
{
  global $conn;
  $query = "DELETE FROM review WHERE idReview = ?";
  $stmt = mysqli_prepare($conn, $query);
  if (!$stmt)
    return false;

  mysqli_stmt_bind_param($stmt, "i", $idReview);
  $success = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  return $success;
}
