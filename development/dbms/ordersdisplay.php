<?php
// Database connection details
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

// SQL query to fetch order details
$sql = "SELECT DISTINCT o.OID, o.PID, o.SID, o.quantity, o.price, p.pname, p.price as product_price, o.received
        FROM orders o
        INNER JOIN products p ON o.PID = p.PID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table style='border-collapse: collapse; width: 100%;'>";
    echo "<tr><th>OID</th><th>PID</th><th>SID</th><th>Product Name</th><th>Quantity</th><th>Total Price</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>" . $row["OID"] . "</td>";
        echo "<td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>" . $row["PID"] . "</td>";
        echo "<td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>" . $row["SID"] . "</td>";
        echo "<td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>" . $row["pname"] . "</td>";
        echo "<td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>" . $row["quantity"] . "</td>";
       
        $total_price = $row["quantity"] * $row["product_price"] * 0.9;
        echo "<td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>" . $total_price . "</td>";
        echo "<td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>";
        if ($row["received"] == 0) {
            echo "<form method='post' action='try2.php'>";
            echo "<input type='hidden' name='OID' value='" . $row["OID"] . "'>";
            echo "<input type='hidden' name='PID' value='" . $row["PID"] . "'>";
            echo "<input type='hidden' name='quantity' value='" . $row["quantity"] . "'>";
            echo "<input type='submit' name='received' value='Received'>";
            echo "</form>";
            echo "<form method='post' action='cancel_order.php'>";
            echo "<input type='hidden' name='OID' value='" . $row["OID"] . "'>";
            echo "<input type='submit' name='cancel' value='Cancel'>";
            echo "</form>";
        } else {
            echo "Order Received";
        }
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<div style='text-align:center; margin-top: 20px;'>";
    echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='order.html'\">DONE</button>";
    echo "</div>";
} else {
    echo "0 results";
    echo "<div style='text-align:center; margin-top: 20px;'>";
    echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='order.html'\">DONE</button>";
    echo "</div>";
}

// Close connection
$conn->close();
?>
