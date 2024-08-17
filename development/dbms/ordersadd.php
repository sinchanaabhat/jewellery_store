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

// Function to get the next available Order ID
function getNextOrderID($conn) {
    // Query to fetch the maximum order ID from the database
    $sql_last_oid = "SELECT MAX(SUBSTRING(OID, 4)) AS last_oid FROM orders";
    $result_last_oid = $conn->query($sql_last_oid);
    
    // Extract the last order ID number
    $row_last_oid = $result_last_oid->fetch_assoc();
    $last_oid_number = intval($row_last_oid['last_oid']);

    // Calculate the next order ID number
    $next_oid_number = $last_oid_number + 1;

    // Return the next order ID with proper formatting
    return 'OID' . str_pad($next_oid_number, 2, '0', STR_PAD_LEFT);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from form and sanitize
    $productType = sanitize_input($_POST['productType']);
    $quantity = sanitize_input($_POST['quantity']);

    // Fetch PID based on product type
    $sql_pid = "SELECT PID FROM products WHERE pname = ?";
    $stmt_pid = $conn->prepare($sql_pid);
    $stmt_pid->bind_param("s", $productType);
    $stmt_pid->execute();
    $stmt_pid->bind_result($pid);
    $stmt_pid->fetch();
    $stmt_pid->close();

    // Fetch SID based on supplier name
    $supplierName = sanitize_input($_POST['supplier']);
    $sql_sid = "SELECT SID FROM supplier WHERE sname = ?";
    $stmt_sid = $conn->prepare($sql_sid);
    $stmt_sid->bind_param("s", $supplierName);
    $stmt_sid->execute();
    $stmt_sid->bind_result($sid);
    $stmt_sid->fetch();
    $stmt_sid->close();

    // Check if PID and SID are not null
    if ($pid !== null && $sid !== null) {
        // Generate the Order ID
        $oid = getNextOrderID($conn);

        // Calculate total price with discount
        $sql_price = "SELECT price FROM products WHERE PID = ?";
        $stmt_price = $conn->prepare($sql_price);
        $stmt_price->bind_param("s", $pid);
        $stmt_price->execute();
        $stmt_price->bind_result($price);
        $stmt_price->fetch();
        $stmt_price->close();
        $totalPrice = $quantity * $price * 0.9;

        // Prepare SQL statement for order insertion
        $sql_insert = "INSERT INTO orders (OID, PID, SID, quantity, price) VALUES (?, ?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("sssss", $oid, $pid, $sid, $quantity, $totalPrice);

        // Execute order insertion
        if ($stmt_insert->execute()) {
            // Order placed successfully
            echo "<div style='text-align:center; font-style: oblique; font-size: 150%;'>";
            echo "<h2>Order placed successfully.</h2>";
            echo "</div>";
            echo "<div style='text-align:center; margin-top: 20px;'>";
            echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='order.html'\">DONE</button>";
            echo "</div>";
        } else {
            // Error in order insertion
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }

        // Close statement for order insertion
        $stmt_insert->close();
    } else {
        // Product or supplier not found
        echo "Product or supplier not found!";
    }
}

$conn->close();
?>
