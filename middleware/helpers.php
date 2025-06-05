<?php
function requireAdminOnly()
{
  session_start();
  if ($_SESSION['tipeUser'] !== 'Admin') {
    header('Location: /');
    exit;
  }
}

function requireNonClient()
{
  session_start();
  $tipeUser = $_SESSION['tipeUser'] ?? null;
  if (!in_array($tipeUser, ['Admin', 'Fotografer', 'Videografer'])) {
    header('Location: /');
    exit;
  }
}
