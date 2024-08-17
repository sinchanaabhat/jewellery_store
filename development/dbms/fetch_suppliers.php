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

    // Fetch suppliers from the supplier table based on the user's input
    $sql = "SELECT DISTINCT sname FROM supplier WHERE LOWER(sname) LIKE '%$input%' LIMIT 5";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row['sname'] . "</li>";
        }
    } else {
        echo "<li>No matching suppliers found</li>";
    }
} else {
    echo "<li>No input provided</li>";
}

$conn->close();
?>
