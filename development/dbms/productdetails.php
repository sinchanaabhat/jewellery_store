<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jewellery";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch all details from products table
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Check if any data is returned
if ($result->num_rows > 0) {
    // Output data in a table
    echo "<h2>Product Details:</h2>";
    echo "<table border='1' class='styled-table'>";
    echo "<colgroup>";
    echo "<col style='width: 12.5%;'>";
    echo "<col style='width: 12.5%;'>";
    echo "<col style='width: 12.5%;'>";
    echo "<col style='width: 12.5%;'>";
    echo "<col style='width: 12.5%;'>";
    echo "<col style='width: 12.5%;'>";
    echo "<col style='width: 12.5%;'>";
    
    echo "</colgroup>";
    echo "<tr><th>Product ID</th><th>Name</th><th>Type</th><th>Metal</th><th>Weight (in gms)</th><th>Quantity</th><th>Price (per piece)</th></tr>";
    // Output each row of data
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td align='center'>" . $row['pid'] . "</td>";
        echo "<td align='center'>" . $row['pname'] . "</td>";
        echo "<td align='center'>" . $row['ptype'] . "</td>";
        echo "<td align='center'>" . $row['metal'] . "</td>";
       
        echo "<td align='center'>" . $row['weight'] . "</td>";
        echo "<td align='center'>" . $row['quantity'] . "</td>";
        echo "<td align='center'>" . $row['price'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<div style='text-align:center; margin-top: 20px;'>";
    echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='products.html'\">DONE</button>";
    echo "</div>";
} else {
    echo "No products found.";
    echo "<div style='text-align:center; margin-top: 20px;'>";
    echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='products.html'\">DONE</button>";
    echo "</div>";
}

// Close connection
$conn->close();
?>

<style>
    .styled-table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ddd;
    }

    .styled-table th, .styled-table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .styled-table th {
        background-color: #f2f2f2;
        font-weight: bold;
        color: #333;
    }
</style>
