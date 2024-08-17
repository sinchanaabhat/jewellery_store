<?php
// Database connection
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

// SQL query to fetch all details from products table
$sql = "SELECT * FROM customer";
$result = $conn->query($sql);

// Check if any data is returned
if ($result->num_rows > 0) {
    // Output data in a table
    echo "<h2 style='text-align: center; margin-top: 20px;'>Customer Details:</h2>";
    echo "<table style='border-collapse: collapse; width: 100%; margin: 20px auto;'>";
    echo "<tr><th style='border: 1px solid #dddddd; text-align: center; padding: 8px;'>CID</th><th style='border: 1px solid #dddddd; text-align: center; padding: 8px;'>Full Name</th><th style='border: 1px solid #dddddd; text-align: center; padding: 8px;'>Address</th><th style='border: 1px solid #dddddd; text-align: center; padding: 8px;'>Phone No</th><th style='border: 1px solid #dddddd; text-align: center; padding: 8px;'>Email</th>";
    // Output each row of data
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='border: 1px solid #dddddd; text-align: center; padding: 8px;'>" . $row['CID'] . "</td>";
        echo "<td style='border: 1px solid #dddddd; text-align: center; padding: 8px;'>" . $row['full_name'] . "</td>";
        echo "<td style='border: 1px solid #dddddd; text-align: center; padding: 8px;'>" . $row['address'] . "</td>";
        echo "<td style='border: 1px solid #dddddd; text-align: center; padding: 8px;'>" . $row['phone_no'] . "</td>";
        echo "<td style='border: 1px solid #dddddd; text-align: center; padding: 8px;'>" . $row['email'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<div style='text-align:center; margin-top: 20px;'>";
    echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='customers.html'\">DONE</button>";
    echo "</div>";
} else {
    echo "<p style='text-align: center; margin-top: 20px;'>No customers found.</p>";

    echo "<div style='text-align:center; margin-top: 20px;'>";
    echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='customers.html'\">DONE</button>";
    echo "</div>";
}

// Close connection
$conn->close();
?>

