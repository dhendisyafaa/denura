<?php
include "../controllers/userController.php";
$result = registerUser("John Doe", "8888", "dhendi@gmail.com", "password123");
if ($result) {
  echo "User registered successfully.";
  echo $result;
} else {
  echo "Failed to register user.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

</body>

</html>