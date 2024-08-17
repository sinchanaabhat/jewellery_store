<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Details</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    h2 {
        text-align: center;
        color: #333;
    }

    form {
        max-width: 400px;
        margin: 20px auto;
        background: #fff;
        padding: 30px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="number"],
    input[type="date"] {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button[type="submit"] {
        background-color: #4caf50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
        background-color: #45a049;
    }

    #transactionDetails {
        margin-top: 20px;
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    #transactionDetails p {
        margin-bottom: 10px;
        text-align: center;
    }
</style>
</head>
<body>
<h2>Enter Transaction ID</h2>
<form method="post">
  <label for="tid">Transaction ID:</label><br>
  <input type="text" id="tid" name="tid"><br><br>
  <button type="submit" name="fetchTransaction">Fetch Details</button>
</form>

<div id="transactionDetails">
<?php
if(isset($_POST['tid'])) {
    $tid = $_POST['tid'];
    
    // Database connection
    $servername = "localhost"; // Change this according to your MySQL server
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password
    $database = "jewellery"; // Change this to your MySQL database name
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Fetch transaction details
    $sql = "SELECT cp.cid, c.full_name, cp.pid, p.pname, cp.quantity, p.price 
            FROM cust_prod cp
            INNER JOIN customer c ON cp.cid = c.cid
            INNER JOIN products p ON cp.pid = p.pid
            WHERE cp.tid = '$tid'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<h2>Transaction Details</h2>";
            echo "<p><strong>Customer ID:</strong> " . $row['cid'] . "</p>";
            echo "<p><strong>Full Name:</strong> " . $row['full_name'] . "</p>";
            echo "<p><strong>Product ID:</strong> " . $row['pid'] . "</p>";
            echo "<p><strong>Product Name:</strong> " . $row['pname'] . "</p>";
            echo "<p><strong>Quantity:</strong> " . $row['quantity'] . "</p>";
            echo "<p><strong>Total Amount:</strong> " . $row['quantity'] * $row['price'] . "</p>";
        }
    } else {
        echo "No transaction found for the given ID.";
    }
    $conn->close();
}
?>

</div>

<h2>Enter Transaction Details</h2>
<form id="transactionForm" method="post">
<label for="tid">Transaction ID:</label><br>
  <input type="text" id="tid" name="tid"><br>
  <label for="tamount">Transaction Amount:</label><br>
  <input type="text" id="tamount" name="tamount"><br>
  <label for="tdate">Transaction Date:</label><br>
  <input type="date" id="tdate" name="tdate"><br>
  <label for="tmethod">Transaction Method:</label><br>
  <input type="text" id="tmethod" name="tmethod"><br><br>
  <button type="submit" name="submitTransaction">Submit Transaction</button>
</form>

<div style="text-align:center;">
    <a href="transactions.html" class="button">BACK</a>
</div>

<?php
if(isset($_POST['submitTransaction'])) {
    // Fetch input values
    $tid=$_POST['tid'];
    $tamount = $_POST['tamount'];
    $tdate = $_POST['tdate'];
    $tmethod = $_POST['tmethod'];

    // Database connection
    $servername = "localhost"; // Change this according to your MySQL server
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password
    $database = "jewellery"; // Change this to your MySQL database name
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert transaction details into database
    $sql = "INSERT INTO transaction (tid,tamount, tdate, tmethod) VALUES ('$tid','$tamount', '$tdate', '$tmethod')";
    if ($conn->query($sql) === TRUE) {
        // Transaction submitted successfully
        echo "<div style='text-align:center;'>";
        echo "<p>Transaction submitted successfully!</p>";
        echo "<div style='text-align:center; margin-top: 20px;'>";
        echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='transactions.html'\">DONE</button>";
        echo "</div>";
        // Hide the form
        echo "<script>document.getElementById('transactionForm').style.display = 'none';</script>";
    } else {
        // Transaction already exists or error occurred
        echo "<div style='text-align:center;'>";
        echo "<p>Transaction already submitted or an error occurred.</p>";
        echo "<div style='text-align:center; margin-top: 20px;'>";
        echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='transactions.html'\">DONE</button>";
        echo "</div>";
    }

    $conn->close();
}
?>
</body>
</html>
