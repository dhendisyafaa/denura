<?php
include __DIR__ . '/loginService.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $user = loginUserService($email, $password);

  if ($user) {
    $_SESSION['userId'] = $user['idUser'];
    $_SESSION['tipeUser'] = $user['tipeUser'];
    $_SESSION['namaLengkap'] = $user['namaLengkap'];
    header("Location: ../../../../dashboard.php");
    exit;
  } else {
    echo "Login gagal: Email atau password salah.";
  }
}
