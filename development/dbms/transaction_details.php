<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <style>
       body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
    margin-top: 20px;
    color: #333;
}

table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 8px;
    text-align: left;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

    </style>
</head>
<body>
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

// SQL query to retrieve transaction details including customer and product information
$sql = "SELECT 
            t.TID, cp.CID, p.PID, 
            c.full_name, 
            p.pname, t.tdate, t.tamount 
        FROM 
            transaction t 
        JOIN 
             cust_prod cp ON t.TID=cp.TID
        JOIN 
               customer c ON cp.cid=c.cid  
        JOIN 
            products p ON cp.PID = p.PID" ;
          

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data in a table
    echo "<h2>Transaction Details:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>TID</th><th>CID</th><th>PID</th><th>Customer Name</th><th>Product Name</th><th>Date</th><th>Amount</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['TID'] . "</td>";
        echo "<td>" . $row['CID'] . "</td>";
        echo "<td>" . $row['PID'] . "</td>";
        echo "<td>" . $row['full_name'] . "</td>";
        echo "<td>" . $row['pname'] . "</td>";
        echo "<td>" . $row['tdate'] . "</td>";
        echo "<td>" . $row['tamount'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<div style='text-align:center; margin-top: 20px;'>";
    echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='transactions.html'\">DONE</button>";
    echo "</div>";
} else {
    echo "No transactions found.";

    echo "<div style='text-align:center; margin-top: 20px;'>";
    echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='transactions.html'\">DONE</button>";
    echo "</div>";
}

$conn->close();
?>
</body>
<html>