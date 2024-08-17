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

// Function to get the next available Supplier ID
function getNextSupplierID($conn) {
    $sql = "SELECT MAX(SUBSTRING(SID, 2)) AS max_id FROM supplier";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $next_id = $row['max_id'] + 1;
    return "S" . str_pad($next_id, 2, '0', STR_PAD_LEFT);
}

// Get values from form and sanitize
$sid = getNextSupplierID($conn); // Auto-generate Supplier ID
$sname = sanitize_input($_POST['sname']);
$address = sanitize_input($_POST['address']);
$phone_no = sanitize_input($_POST['phone_no']);

// Prepare SQL statement for supplier insertion
$sql_supplier = "INSERT INTO supplier (SID, sname, address, phone_no) VALUES (?, ?, ?, ?)";
$stmt_supplier = $conn->prepare($sql_supplier);
$stmt_supplier->bind_param("ssss", $sid, $sname, $address, $phone_no);

// Execute supplier query
if ($stmt_supplier->execute()) {
    echo "<div style='text-align:center; font-style: oblique; font-size: 150%;'>";
    echo "<h2>Supplier added successfully.</h2>";
    echo "</div>";
    echo "<div style='text-align:center; margin-top: 20px;'>";
    echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='suppliers.html'\">DONE</button>";
    echo "</div>";
} else {
    echo "Error: " . $sql_supplier . "<br>" . $conn->error;
    echo "<div style='text-align:center; margin-top: 20px;'>";
    echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='suppliers.html'\">DONE</button>";
    echo "</div>";
}

// Close statement and connection
$stmt_supplier->close();
$conn->close();
?>
