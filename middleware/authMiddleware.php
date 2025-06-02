<?php
session_start();

if (!isset($_SESSION['userId'])) {
  header("Location: ../views/login.php");
  exit;
}

if (isset($_SESSION['tipeUser']) && $_SESSION['tipeUser'] === 'Klien') {
  header("Location: ../index.php");
  exit;
}
