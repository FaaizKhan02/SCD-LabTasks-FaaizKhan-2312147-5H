<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>All Products - Online Shopping Management System</title>
<style>
body {
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(135deg, #d7e1ec, #ffffff);
  margin: 0;
  padding: 0;
  text-align: center;
}
h1 {
  color: #2c3e50;
  margin-top: 40px;
}
table {
  margin: 30px auto;
  border-collapse: collapse;
  width: 80%;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  border-radius: 10px;
  overflow: hidden;
}
th, td {
  border: none;
  padding: 12px;
  text-align: center;
}
th {
  background-color: #2c3e50;
  color: white;
}
tr:nth-child(even) {
  background-color: #f8f9fa;
}
tr:hover {
  background-color: #eaf2f8;
}
button {
  background-color: #3498db;
  color: white;
  border: none;
  padding: 10px 18px;
  margin: 20px 10px;
  border-radius: 6px;
  cursor: pointer;
  font-size: 15px;
  transition: 0.3s;
}
button:hover {
  background-color: #2c80b4;
  transform: translateY(-2px);
}
</style>
</head>
<body>

<h1>All Products</h1>

<?php
// Fetch products with their category name
$query = "
SELECT p.product_id, p.name AS product_name, c.category_name, p.price
FROM products p
LEFT JOIN categories c ON p.category_id = c.category_id
ORDER BY p.product_id
";

$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
  echo "<table>
          <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Price (PKR)</th>
          </tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['product_id']}</td>
            <td>{$row['product_name']}</td>
            <td>{$row['category_name']}</td>
            <td>{$row['price']}</td>
          </tr>";
  }
  echo "</table>";
} else {
  echo "<p>No products found in the database.</p>";
}
?>

<a href="index.php"><button>⬅ Back to Home</button></a>

</body>
</html>
