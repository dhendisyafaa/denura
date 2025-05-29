<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Register</title>
</head>

<body>
  <h2>Form Register</h2>
  <form action="../modules/user/userController.php" method="POST">
    <input type="hidden" name="action" value="insert">

    <label for="namaLengkap">Nama Lengkap:</label>
    <input type="text" name="namaLengkap" required><br>

    <label for="noTelp">No. Telp:</label>
    <input type="text" name="noTelp" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" required><br>

    <button type="submit">Register</button>
  </form>
</body>

</html>