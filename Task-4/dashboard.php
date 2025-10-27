<?php
include 'db_connect.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$search = $_GET['search'] ?? '';
$sort = $_GET['sort'] ?? '';

$query = "SELECT * FROM students WHERE name LIKE '%$search%' OR roll_no LIKE '%$search%'";
if ($sort == 'name') {
    $query .= " ORDER BY name ASC";
} elseif ($sort == 'marks') {
    $query .= " ORDER BY marks DESC";
}

$result = $conn->query($query);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard - Student Management</title>
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
    <h3>Welcome, <?= $_SESSION['user'] ?> 👋</h3>
    <form method="GET" class="search-sort">
      <input type="text" name="search" placeholder="Search by name or roll no" value="<?= $search ?>">
      <select name="sort">
        <option value="">Sort By</option>
        <option value="name" <?= $sort=='name'?'selected':'' ?>>Name</option>
        <option value="marks" <?= $sort=='marks'?'selected':'' ?>>Marks</option>
      </select>
      <button type="submit">Search</button>
    </form>

    <table>
      <tr>
        <th>ID</th><th>Name</th><th>Roll No</th><th>Email</th><th>Marks</th><th>Department</th><th>Actions</th>
      </tr>
      <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['roll_no'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['marks'] ?></td>
        <td><?= $row['department'] ?></td>
        <td>
          <a href="edit_student.php?id=<?= $row['id'] ?>">Edit</a> |
          <a href="delete_student.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this student?')">Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </table>
  </div>
</body>
</html>

