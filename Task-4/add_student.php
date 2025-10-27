<?php
include 'db_connect.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$message = '';

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $roll_no = $_POST['roll_no'];
    $email = $_POST['email'];
    $marks = $_POST['marks'];
    $department = $_POST['department'];

    $sql = "INSERT INTO students (name, roll_no, email, marks, department) VALUES ('$name', '$roll_no', '$email', '$marks', '$department')";
    
    if ($conn->query($sql)) {
        header("Location: dashboard.php");
        exit();
    } else {
        $message = "Error adding student: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Student - Student Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <h2>🎓 Student Management</h2>
        <div>
            <a href="dashboard.php">Dashboard</a>
            <a href="add_student.php">Add Student</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="content">
        <div class="container">
            <h2>Add New Student</h2>
            
            <?php if ($message): ?>
                <p class="error"><?= $message ?></p>
            <?php endif; ?>

            <form method="POST">
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="text" name="roll_no" placeholder="Roll Number" required>
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="number" name="marks" placeholder="Marks" min="0" max="100" required>
                <input type="text" name="department" placeholder="Department" required>
                <button type="submit" name="save">Add Student</button>
            </form>
            
            <p><a href="dashboard.php">← Back to Dashboard</a></p>
        </div>
    </div>
</body>
</html>