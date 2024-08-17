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

if(isset($_POST['payID'], $_POST['pdate'], $_POST['pmethod'])) {
    $payID = $_POST['payID'];
    $pdate = $_POST['pdate'];
    $pmethod = $_POST['pmethod'];

    

    // Fetch SID, total quantity, total price, and product price based on the payID provided by the user
    $sql = "SELECT s.SID, SUM(s.quantity) AS total_quantity, SUM(p.price * s.quantity) AS total_price
            FROM supp_prod s
            JOIN products p ON s.PID = p.PID
            WHERE s.payID = '$payID'
            GROUP BY s.SID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Insert payment details into payment table
        while ($row = $result->fetch_assoc()) {
            $SID = $row['SID'];
            $pamount = $row['total_price'];

            // Insert payment details into payment table
            $insert_sql = "INSERT INTO payment (payID, SID, pdate, pamount, pmethod)
                           VALUES ('$payID', '$SID', '$pdate', '$pamount', '$pmethod')";
            if ($conn->query($insert_sql) === TRUE) {
                echo "<div style='text-align:center; font-style: oblique ; font-size: 150%;'>" ;
                echo "<h2>Payment details inserted successfully!</h2>";
                
            echo "<div style='text-align:center; margin-top: 20px;'>";
            echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='payments.html'\">DONE</button>";
            echo "</div>";

            } else {
                echo "Error inserting payment details: " . $conn->error;
                echo "<div style='text-align:center; margin-top: 20px;'>";
                echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='payments.html'\">DONE</button>";
                echo "</div>";
            }
        }
    } else {
        echo "No payment found for the provided payID.";
        echo "<div style='text-align:center; margin-top: 20px;'>";
        echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='payments.html'\">DONE</button>";
        echo "</div>";
    }
}

// Close connection
$conn->close();
?>
