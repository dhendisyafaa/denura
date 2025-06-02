<?php
include_once __DIR__ . '/userRepository.php';

function loginUserService($email, $password)
{
  $user = getUserByEmail($email);
  if ($user && password_verify($password, $user['password'])) {
    return $user;
  }
  return false;
}
