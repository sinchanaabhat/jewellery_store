<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "jewellery";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve OID from form
    $oid = $_POST['oid'];

    // Prepare SQL statement with a prepared statement and join operations
    $sql = "SELECT o.OID, o.PID, p.pname, o.SID, s.sname, o.quantity, o.price 
            FROM orders o
            JOIN products p ON o.PID = p.PID
            JOIN supplier s ON o.SID = s.SID
            WHERE o.OID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $oid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Display results if there are any
        echo "<h2>Search Results</h2>";
        echo "<table border='1'>";
        echo "<tr><th>OID</th><th>PID</th><th>Product Name</th><th>SID</th><th>Supplier Name</th><th>Quantity</th><th>Price</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["OID"]."</td><td>".$row["PID"]."</td><td>".$row["pname"]."</td><td>".$row["SID"]."</td><td>".$row["sname"]."</td><td>".$row["quantity"]."</td><td>".$row["price"]."</td></tr>";
        }
        echo "</table>";

        echo "<div style='text-align:center; margin-top: 20px;'>";
        echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='order.html'\">DONE</button>";
        echo "</div>";
    } else {
        // No results found
        echo "<p>No orders found with the provided Order ID.</p>";

        echo "<div style='text-align:center; margin-top: 20px;'>";
        echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='order.html'\">DONE</button>";
        echo "</div>";
    }

    // Close prepared statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
