<?php
include_once __DIR__ . "/userRepository.php";

function registerUserService($data)
{
  if (isEmailExist($data['email'])) {
    echo "Email sudah terdaftar!";
    return false;
  }

  // Hash password
  $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
  return registerUserRepo($data);
}

function getAllUserService()
{
  return getAllUserRepo();
}