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

// SQL query to fetch supplier information with product names, address, and phone number
$sql = "SELECT distinct s.SID, s.sname, s.address, s.phone_no, p.PID, p.pname
        FROM supplier s
        INNER JOIN supp_prod sp ON s.SID = sp.SID
        INNER JOIN products p ON sp.PID = p.PID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table style='border-collapse: collapse; width: 100%;'>";
    echo "<tr><th style='border: 1px solid #ddd; padding: 8px; text-align: center;'>SID</th><th style='border: 1px solid #ddd; padding: 8px; text-align: center;'>Name</th><th style='border: 1px solid #ddd; padding: 8px; text-align: center;'>Address</th><th style='border: 1px solid #ddd; padding: 8px; text-align: center;'>Phone No</th>
    <th style='border: 1px solid #ddd; padding: 8px; text-align: center;'>PID</th><th style='border: 1px solid #ddd; padding: 8px; text-align: center;'>Product name</th>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>" . $row["SID"] . "</td>";
        echo "<td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>" . $row["sname"] . "</td>";
        echo "<td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>" . $row["address"] . "</td>";
        echo "<td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>" . $row["phone_no"] . "</td>";
        echo "<td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>" . $row["PID"] . "</td>";
        echo "<td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>" . $row["pname"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<div style='text-align:center; margin-top: 20px;'>";
    echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='suppliers.html'\">DONE</button>";
    echo "</div>";

} else {
    echo "0 results";
    echo "<div style='text-align:center; margin-top: 20px;'>";
    echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='suppliers.html'\">DONE</button>";
    echo "</div>";
}

// Close connection
$conn->close();
?>
