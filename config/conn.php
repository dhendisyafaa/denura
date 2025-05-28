<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "db_denura-studio";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
  error_log("Database connection failed: " . mysqli_connect_error());
  exit;
}
?>