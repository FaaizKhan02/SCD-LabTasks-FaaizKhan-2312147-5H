<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "localhost";
$username = "root"; // Change if needed
$password = "";
$dbname = "onlineshopping";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);

// ================= CREATE TABLES ===================
$conn->query("CREATE TABLE IF NOT EXISTS customers (
  customer_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  phone VARCHAR(20)
)");

$conn->query("CREATE TABLE IF NOT EXISTS categories (
  category_id INT AUTO_INCREMENT PRIMARY KEY,
  category_name VARCHAR(100)
)");

$conn->query("CREATE TABLE IF NOT EXISTS products (
  product_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  price DECIMAL(10,2),
  category_id INT,
  FOREIGN KEY (category_id) REFERENCES categories(category_id)
)");

$conn->query("CREATE TABLE IF NOT EXISTS orders (
  order_id INT AUTO_INCREMENT PRIMARY KEY,
  customer_id INT,
  order_date DATE,
  FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
)");

$conn->query("CREATE TABLE IF NOT EXISTS order_items (
  item_id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT,
  product_id INT,
  quantity INT,
  FOREIGN KEY (order_id) REFERENCES orders(order_id),
  FOREIGN KEY (product_id) REFERENCES products(product_id)
)");

$conn->query("CREATE TABLE IF NOT EXISTS suppliers (
  supplier_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  contact VARCHAR(50),
  product_id INT,
  FOREIGN KEY (product_id) REFERENCES products(product_id)
)");

// ================= INSERT SAMPLE DATA ===================

// Insert Customers
$check = $conn->query("SELECT COUNT(*) AS count FROM customers");
$row = $check->fetch_assoc();
if ($row['count'] == 0) {
  $conn->query("INSERT INTO customers (name, email, phone) VALUES
    ('Ali Khan', 'ali@example.com', '03001234567'),
    ('Sara Ahmed', 'sara@example.com', '03004567891'),
    ('Bilal Iqbal', 'bilal@example.com', '03007891234'),
    ('Hina Malik', 'hina@example.com', '03006543210'),
    ('Usman Tariq', 'usman@example.com', '03009876543'),
    ('Zara Noor', 'zara@example.com', '03001112223'),
    ('Hamza Rafiq', 'hamza@example.com', '03003445566'),
    ('Ayesha Rehan', 'ayesha@example.com', '03007778899'),
    ('Taimoor Ali', 'taimoor@example.com', '03002223344'),
    ('Noor Fatima', 'noor@example.com', '03005556677')
  ");
}

// Insert Categories
$check = $conn->query("SELECT COUNT(*) AS count FROM categories");
$row = $check->fetch_assoc();
if ($row['count'] == 0) {
  $conn->query("INSERT INTO categories (category_name) VALUES
    ('Electronics'), ('Clothing'), ('Groceries'), ('Books'), ('Fitness')
  ");
}

// Insert Products
$check = $conn->query("SELECT COUNT(*) AS count FROM products");
$row = $check->fetch_assoc();
if ($row['count'] == 0) {
  $conn->query("INSERT INTO products (name, price, category_id) VALUES
    ('Smartphone', 55000, 1),
    ('T-Shirt', 1200, 2),
    ('Rice Bag 10kg', 2500, 3),
    ('Novel - The Alchemist', 900, 4),
    ('Dumbbells Set', 4000, 5)
  ");
}

// Insert Suppliers
$check = $conn->query("SELECT COUNT(*) AS count FROM suppliers");
$row = $check->fetch_assoc();
if ($row['count'] == 0) {
  $conn->query("INSERT INTO suppliers (name, contact, product_id) VALUES
    ('TechHub Electronics', '021-5566778', 1),
    ('Clothify Garments', '042-7788990', 2),
    ('FitZone Equipment', '051-4455667', 5)
  ");
}

// Insert Orders
$check = $conn->query("SELECT COUNT(*) AS count FROM orders");
$row = $check->fetch_assoc();
if ($row['count'] == 0) {
  $conn->query("INSERT INTO orders (customer_id, order_date) VALUES
    (1, '2025-10-01'),
    (2, '2025-10-02'),
    (3, '2025-10-03'),
    (4, '2025-10-04'),
    (5, '2025-10-05')
  ");
}

// Insert Order Items
$check = $conn->query("SELECT COUNT(*) AS count FROM order_items");
$row = $check->fetch_assoc();
if ($row['count'] == 0) {
  $conn->query("INSERT INTO order_items (order_id, product_id, quantity) VALUES
    (1, 1, 2),
    (1, 2, 1),
    (2, 3, 3),
    (3, 4, 1),
    (4, 5, 2),
    (5, 2, 4)
  ");
}

