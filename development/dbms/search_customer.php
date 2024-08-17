<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jewellery";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get search query
$search = $_POST['search'];

// Search for the product
$sql = "SELECT * FROM customer WHERE CID = '$search' OR full_name = '$search'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data in a table with borders
    echo "<h2 style='text-align: center;'>Search Results:</h2>";
    echo "<table style='border-collapse: collapse; width: 100%; margin: 20px auto; border: 1px solid #ddd;'>";
    echo "<tr><th style='border: 1px solid #ddd; padding: 8px; text-align: center;'>CID</th><th style='border: 1px solid #ddd; padding: 8px; text-align: center;'>Full Name</th><th style='border: 1px solid #ddd; padding: 8px; text-align: center;'>Address</th><th style='border: 1px solid #ddd; padding: 8px; text-align: center;'>Phone No</th><th style='border: 1px solid #ddd; padding: 8px; text-align: center;'>Email</th>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='border: 1px solid #ddd; padding: 8px; text-align: center;'>" . $row['CID'] . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px; text-align: center;'>" . $row['full_name'] . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px; text-align: center;'>" . $row['address'] . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px; text-align: center;'>" . $row['phone_no'] . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px; text-align: center;'>" . $row['email'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<div style='text-align:center; margin-top: 20px;'>";
    echo "<br><br><button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='customers.html'\">DONE</button>";
    echo "</div>";
} else {
    echo "<p style='text-align: center; margin-top: 20px;'>No customers found.</p>";

    echo "<div style='text-align:center; margin-top: 20px;'>";
    echo "<br><br><button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='customers.html'\">DONE</button>";
    echo "</div>";
}

$conn->close();
?>
