<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jewellery"; // Replace 'your_database_name' with your actual database name

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user inputs
    $product_name = $_POST["product_name"];
    $weight = $_POST["weight"];

    // Validate inputs (you can add more validation if needed)
    if (empty($product_name)) {
        echo "Product name is required.";
    } elseif (empty($weight)) {
        echo "Weight is required.";
    } else {
        // Update weight in the database
        $sql = "UPDATE products SET weight = ? WHERE pname = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ds", $weight, $product_name);
        if ($stmt->execute()) {
            echo "<div style='text-align:center; font-style: oblique ; font-size: 150%;'>" ;
            echo "<h2>Weight updated successfully.</h2>";
            echo "<div style='text-align:center; margin-top: 20px;'>";
            echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='products.html'\">DONE</button>";
            echo "</div>";
        } else {
            echo "Error updating weight: " . $mysqli->error;
            echo "<div style='text-align:center; margin-top: 20px;'>";
            echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='products.html'\">DONE</button>";
            echo "</div>";
        }
    }
} else {
    // If accessed directly, redirect to the form page
    header("Location: productform.html");
    exit();
}

$mysqli->close(); // Close the database connection
?>
