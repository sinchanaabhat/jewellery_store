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

// Function to sanitize input
function sanitize_input($data) {
    // Remove whitespace and HTML tags
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if input is provided
if(isset($_POST['input'])) {
    // Sanitize input
    $input = sanitize_input($_POST['input']);

    // Fetch product types from the products table based on the user's input
    $sql = "SELECT DISTINCT pname FROM products WHERE LOWER(pname) LIKE '%$input%' LIMIT 5";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row['pname'] . "</li>";
        }
    } else {
        echo "<li>No matching product types found</li>";
    }
} else {
    echo "<li>No input provided</li>";
}

$conn->close();
?>
