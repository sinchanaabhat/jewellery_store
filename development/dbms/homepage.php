<?php
// Connect to your database
include 'connect.php';

// Get today's date
$today = date("Y-m-d");

// Query to fetch total amount of payments happened today
$sql = "SELECT SUM(tamount) AS total_amount FROM transaction WHERE DATE(tdate) = '$today'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    $row = $result->fetch_assoc();
    $total_amount = $row["total_amount"];
    echo "Total amount of transactions today: Rs." . number_format($total_amount, 2);
} else {
    echo "No payments happened today.";
}

// Close database connection
$conn->close();
?>
