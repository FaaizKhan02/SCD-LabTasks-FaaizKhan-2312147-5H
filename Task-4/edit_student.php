<?php
include 'db_connect.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'] ?? null;
$message = '';

if (!$id) {
    header("Location: dashboard.php");
    exit();
}

$res = $conn->query("SELECT * FROM students WHERE id=$id");
if ($res->num_rows == 0) {
    header("Location: dashboard.php");
    exit();
}
$student = $res->fetch_assoc();

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $roll_no = $_POST['roll_no'];
    $email = $_POST['email'];
    $marks = $_POST['marks'];
    $department = $_POST['department'];

    $sql = "UPDATE students SET name='$name', roll_no='$roll_no', email='$email', marks='$marks', department='$department' WHERE id=$id";
    
    if ($conn->query($sql)) {
        header("Location: dashboard.php");
        exit();
    } else {
        $message = "Error updating student: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student - Student Management</title>
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
            <h2>Edit Student</h2>
            
            <?php if ($message): ?>
                <p class="error"><?= $message ?></p>
            <?php endif; ?>

            <form method="POST">
                <input type="text" name="name" placeholder="Full Name" value="<?= $student['name'] ?>" required>
                <input type="text" name="roll_no" placeholder="Roll Number" value="<?= $student['roll_no'] ?>" required>
                <input type="email" name="email" placeholder="Email Address" value="<?= $student['email'] ?>" required>
                <input type="number" name="marks" placeholder="Marks" value="<?= $student['marks'] ?>" min="0" max="100" required>
                <input type="text" name="department" placeholder="Department" value="<?= $student['department'] ?>" required>
                <button type="submit" name="save">Update Student</button>
            </form>
            
            <p><a href="dashboard.php">← Back to Dashboard</a></p>
        </div>
    </div>
</body>
</html>
