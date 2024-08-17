<?php
// Establish connection to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jewellery";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if PID or pname is set
    if (!empty($_POST['pid'])) {
        // Using prepared statement to prevent SQL injection
        $sql = "DELETE FROM products WHERE PID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_POST['pid']);
    } elseif (!empty($_POST['pname'])) {
        // Using prepared statement to prevent SQL injection
        $sql = "DELETE FROM products WHERE pname = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_POST['pname']);
    } else {
        echo "<h2>Please provide either Product ID or Product Name.</h2>";
        exit;
    }

    // Execute the delete query
    $stmt->execute();

    // Check the number of affected rows
    if ($stmt->affected_rows > 0) {
        echo "<div style='text-align:center; font-style: oblique ; font-size: 150%;'>" ;
        echo "<h2>Product deleted successfully.</h2>";
        
    } else {
        echo "<div style='text-align:center; font-style: oblique ; font-size: 150%;'>" ;
        echo "<h2>Product not found or already deleted.</h2>";
    }

    // Display "DONE" button
    echo "<div style='text-align:center; margin-top: 20px;'>";
    echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='products.html'\">DONE</button>";
    echo "</div>";

    // Close the statement
    $stmt->close();
}

$conn->close();
?>
