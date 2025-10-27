<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Suppliers - Online Shopping Management System</title>
<style>
body {
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(135deg, #d7e1ec, #ffffff);
  text-align: center;
  margin: 0;
  padding: 0;
}
h2 {
  color: #2c3e50;
  margin-top: 40px;
}
table {
  width: 80%;
  margin: 30px auto;
  border-collapse: collapse;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  border-radius: 10px;
  overflow: hidden;
}
th {
  background-color: #34495e;
  color: #fff;
  padding: 12px;
}
td {
  padding: 10px;
  border-bottom: 1px solid #ddd;
}
tr:hover {
  background-color: #ecf0f1;
}
button {
  margin: 20px;
  padding: 10px 18px;
  background: #2980b9;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}
button:hover {
  background: #1f6691;
  transform: translateY(-2px);
}
</style>
</head>
<body>
<h2>Suppliers List</h2>

<?php
$sql = "
SELECT s.name AS supplier_name, s.contact, p.name AS product_name
FROM suppliers s
LEFT JOIN products p ON s.product_id = p.product_id
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table>
          <tr>
            <th>Supplier Name</th>
            <th>Contact</th>
            <th>Product Supplied</th>
          </tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['supplier_name']}</td>
            <td>{$row['contact']}</td>
            <td>{$row['product_name']}</td>
          </tr>";
  }
  echo "</table>";
} else {
  echo "<p>No suppliers found.</p>";
}
?>

<a href="index.php"><button>⬅ Back to Home</button></a>

</body>
</html>
