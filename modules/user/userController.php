<?php
include __DIR__ . '/../../config/conn.php';
include_once __DIR__ . '/userService.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'insert') {
  // Simple sanitasi
  $data = [
    'namaLengkap' => htmlspecialchars(trim($_POST['namaLengkap'])),
    'noTelp' => htmlspecialchars(trim($_POST['noTelp'])),
    'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
    'password' => $_POST['password'],
  ];

  // Validasi manual
  if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    echo "Email tidak valid!";
    exit;
  }

  if (strlen($data['password']) < 6) {
    echo "Password minimal 6 karakter";
    exit;
  }

  if (registerUserService($data)) {
    header("Location: ../../../index.php");
    exit;
  } else {
    echo "Data gagal disimpan";
  }
}

