<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jewellery";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle cancel action
if(isset($_POST['cancel'])) {
    // Sanitize input to prevent SQL injection
    $order_id = $conn->real_escape_string($_POST['OID']);

    // Prepare and execute the delete query
    $sql = "DELETE FROM orders WHERE OID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $order_id); // Assuming OID is an integer
    if ($stmt->execute()) {
        echo "Order canceled successfully";
        echo "<div style='text-align:center; margin-top: 20px;'>";
        echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='order.html'\">DONE</button>";
        echo "</div>";
    } else {
        echo "Error canceling order: " . $conn->error;
        echo "<div style='text-align:center; margin-top: 20px;'>";
        echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='order.html'\">DONE</button>";
        echo "</div>";
    }
    $stmt->close();
}

// Close connection
$conn->close();
?>
