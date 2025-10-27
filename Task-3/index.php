<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Online Shopping Management System</title>
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
  margin: 10px;
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
<h1>Welcome to Online Shopping Management System</h1>

<?php
$result = $conn->query("SELECT * FROM customers");
if ($result->num_rows > 0) {
  echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['customer_id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['phone']}</td></tr>";
  }
  echo "</table>";
} else {
  echo "<p>No customers found.</p>";
}
?>

<div>
  <a href="orders.php"><button>View Orders</button></a>
  <a href="products.php"><button>View Products</button></a>
  <a href="suppliers.php"><button>View Suppliers</button></a>
</div>

</body>
</html>
