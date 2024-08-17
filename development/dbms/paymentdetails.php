<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jewellery"; // Replace 'your_database_name' with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch payID, SID, sname, pname, price, and pdate
$sql = "SELECT sp.payID, sp.SID, s.sname, sp.PID, p.pname, p.price, py.pdate
        FROM supp_prod sp
        JOIN supplier s ON sp.SID = s.SID
        JOIN products p ON sp.PID = p.PID
        JOIN payment py ON sp.payID = py.payID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1' class='styled-table'>";
    echo "<tr><th>PayID</th><th>SID</th><th>SName</th><th>PID</th><th>PName</th><th>Price</th><th>PDate</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["payID"] . "</td>";
        echo "<td>" . $row["SID"] . "</td>";
        echo "<td>" . $row["sname"] . "</td>";
        echo "<td>" . $row["PID"] . "</td>";
        echo "<td>" . $row["pname"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "<td>" . $row["pdate"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    echo "<div style='text-align:center; margin-top: 20px;'>";
    echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='payments.html'\">DONE</button>";
    echo "</div>";
} else {
    echo "0 results";
    echo "<div style='text-align:center; margin-top: 20px;'>";
    echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='payments.html'\">DONE</button>";
    echo "</div>";
}

// Close connection
$conn->close();
?>

<style>
    .styled-table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ddd;
    }

    .styled-table th, .styled-table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .styled-table th {
        background-color: #f2f2f2;
        font-weight: bold;
        color: #333;
    }
</style>
