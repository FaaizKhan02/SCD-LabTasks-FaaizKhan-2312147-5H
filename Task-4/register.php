<?php
include 'db_connect.php';
session_start();

$message = '';
if (isset($_POST['register'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm = $_POST['confirm_password'];

  if ($password !== $confirm) {
    $message = "❌ Passwords do not match!";
  } else {
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed')";
    if ($conn->query($sql)) {
      header("Location: login.php?registered=1");
      exit();
    } else {
      $message = "⚠️ Error: Email may already exist.";
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register - Student Management</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Create Account</h2>
    <?php if (!empty($message)): ?>
      <p class="error"><?= $message ?></p>
    <?php endif; ?>
    <form method="POST">
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="password" name="confirm_password" placeholder="Confirm Password" required>
      <button type="submit" name="register">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
  </div>
</body>
</html>