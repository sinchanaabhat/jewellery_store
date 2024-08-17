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

// Function to generate a unique payID
function generatePayID($conn) {
    $sql_last_payID = "SELECT MAX(RIGHT(payID, 2)) AS last_payID FROM supp_prod";
    $result_last_payID = $conn->query($sql_last_payID);
    $row_last_payID = $result_last_payID->fetch_assoc();
    $last_payID_number = intval($row_last_payID['last_payID']);
    $next_payID_number = $last_payID_number + 1;
    return 'PAY' . str_pad($next_payID_number, 2, '0', STR_PAD_LEFT);
}

// Function to check if the order has been received
function isOrderReceived($conn, $OID) {
    $sql = "SELECT * FROM orders WHERE OID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $OID);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['received'] == 1; // Check if the 'received' column is set to 1
    }
    return false;
}

// Check if the form has been submitted
if(isset($_POST['received'])) {
    // Sanitize input data
    $OID = $_POST['OID'];
    $PID = $_POST['PID'];
    $quantity = $_POST['quantity'];

    // Check if the order has already been received
    if (!isOrderReceived($conn, $OID)) {
        // Prepare SQL statement to update product quantity
        $sql_update_product = "UPDATE products SET quantity = quantity + ? WHERE PID = ?";
        $stmt_update_product = $conn->prepare($sql_update_product);
        $stmt_update_product->bind_param("is", $quantity, $PID);

        // Execute product quantity update
        if ($stmt_update_product->execute()) {
            // Generate payID
            $payID = generatePayID($conn);

            // Prepare SQL statement to insert data into supp_prod table
            $sql_insert_supp_prod = "INSERT INTO supp_prod (SID, PID, quantity, payID) SELECT SID, PID, quantity, ? FROM orders WHERE OID = ?";
            $stmt_insert_supp_prod = $conn->prepare($sql_insert_supp_prod);
            $stmt_insert_supp_prod->bind_param("ss", $payID, $OID);

            // Execute supp_prod insertion
            if ($stmt_insert_supp_prod->execute()) {
                // Mark the order as received
                $sql_mark_received = "UPDATE orders SET received = 1 WHERE OID = ?";
                $stmt_mark_received = $conn->prepare($sql_mark_received);
                $stmt_mark_received->bind_param("s", $OID);
                $stmt_mark_received->execute();
                $stmt_mark_received->close();

                echo "<h2>Order received</h2>";
                echo "<p>New payID generated: $payID</p>";

                // Display notification message
                echo "<div style='text-align:center; margin-top: 20px;'>";
                echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='order.html'\">DONE</button>";
                echo "</div>";
            } else {
                echo "Error inserting into supp_prod table: " . $stmt_insert_supp_prod->error;
            }
            $stmt_insert_supp_prod->close();
        } else {
            echo "Error updating product quantity: " . $stmt_update_product->error;
        }
        $stmt_update_product->close();
    } else {
        echo "<h2>Order already received</h2>";
    }
}

// Close connection
$conn->close();
?>
