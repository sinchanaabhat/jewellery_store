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

// Get search query
$search = $_POST['search'];

// Search for the transaction
$sql = "SELECT * FROM transaction WHERE TID = '$search'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data in a table
    echo "<h2>Search Results:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>TID</th><th>Date</th><th>Amount</th><th>Method</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['TID'] . "</td>";
        echo "<td>" . $row['tdate'] . "</td>";
        echo "<td>" . $row['tamount'] . "</td>";
        echo "<td>" . $row['tmethod'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No transactions found.";
}

$conn->close();
 ?>
</body>
</html>


