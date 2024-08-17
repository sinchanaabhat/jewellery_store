<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jewellery";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user inputs
    $metal = $_POST["metal"];
    $percentage = $_POST["percentage"];

    // Validate inputs (you can add more validation if needed)
    if (empty($metal)) {
        echo "Metal type is required.";
    } elseif (empty($percentage)) {
        echo "Percentage is required.";
    } else {
        // Update prices based on the percentage
        $sql = "UPDATE products SET price = price * (1 + ? / 100) WHERE metal = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ds", $percentage, $metal);
        if ($stmt->execute()) {
            echo "<div style='text-align:center; font-style: oblique ; font-size: 150%;'>" ;
            echo "<h2  >Prices updated successfully.</h2>";
            echo "<div style='text-align:center; margin-top: 20px;'>";
            echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='products.html'\">DONE</button>";
            echo "</div>";
        } else {
            echo "Error updating prices: " . $mysqli->error;
            echo "<div style='text-align:center; margin-top: 20px;'>";
            echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='products.html'\">DONE</button>";
            echo "</div>";
        }
    }
} else {
    // Redirect to the form page if accessed directly
    header("Location: productupdate.html");
    exit();
}

$mysqli->close(); // Close the database connection
?>
