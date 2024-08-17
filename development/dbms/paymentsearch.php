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

if(isset($_POST['supplierID'])) {
    $supplierID = $_POST['supplierID'];

    // Fetch supplier details along with product, payment details, and pamount based on the supplier ID provided by the user
    $sql = "SELECT s.sid, s.sname, sp.pid, p.pname, sp.payID, py.pdate, py.pamount
            FROM supplier s
            JOIN supp_prod sp ON s.sid = sp.sid
            JOIN products p ON sp.pid = p.pid
            JOIN payment py ON sp.payID = py.payID
            WHERE s.sid = '$supplierID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display supplier details
        echo "<h2 style='text-align: center; margin-top: 20px;'>Payment Details:</h2>";
        echo "<table style='border-collapse: collapse; width: 100%; margin: 20px auto;'>";
         echo "<table border='1';>";
        echo "<tr><th>SID</th><th>SName</th><th>PID</th><th>PName</th><th>PayID</th><th>PDate</th><th>PAmount</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["sid"] . "</td>";
            echo "<td>" . $row["sname"] . "</td>";
            echo "<td>" . $row["pid"] . "</td>";
            echo "<td>" . $row["pname"] . "</td>";
            echo "<td>" . $row["payID"] . "</td>";
            echo "<td>" . $row["pdate"] . "</td>";
            echo "<td>" . $row["pamount"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        echo "<div style='text-align:center; margin-top: 20px;'>";
        echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='payments.html'\">DONE</button>";
        echo "</div>";
    } else {
        echo "No supplier found for the provided supplier ID.";
        echo "No payment found for the provided payID.";
        echo "<div style='text-align:center; margin-top: 20px;'>";
        echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='payments.html'\">DONE</button>";
        echo "</div>";
    }
}

// Close connection
$conn->close();
?>
