<?php
include 'db_connect.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: dashboard.php");
    exit();
}

$conn->query("DELETE FROM students WHERE id=$id");
header("Location: dashboard.php");
exit();
?>