<?php
include 'db_connect.php';
session_start();

$message = '';

if (isset($_SESSION['user'])) {
  header("Location: dashboard.php");
  exit();
}
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $result = $conn->query("SELECT * FROM users WHERE email='$email'");
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
      $_SESSION['user'] = $row['name'];
      header("Location: dashboard.php");
      exit();
    } else {
      $message = "❌ Incorrect password!";
    }
  } else {
    $message = "⚠️ No account found with this email!";
  }
}

if (isset($_GET['registered'])) {
  $message = "✅ Registration successful! Please login.";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login - Student Management</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    <?php if (!empty($message)): ?>
      <p class="error"><?= $message ?></p>
    <?php endif; ?>
    <form method="POST">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" name="login">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register</a></p>
  </div>
</body>
</html>