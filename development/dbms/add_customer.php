<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jewellery";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Function to generate the next customer ID
function generateCustomerId($mysqli) {
    $sql = "SELECT MAX(cid) as max_id FROM customer";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $max_id = $row["max_id"];
        if ($max_id) {
            $next_id = intval(substr($max_id, 1)) + 1;
        } else {
            $next_id = 1;
        }
        return "C" . str_pad($next_id, 2, "0", STR_PAD_LEFT);
        echo "<br>Generated TID: " . $tid . "<br>";
    } else {
        return "C01";
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $phone_no = $_POST['phone_no'];
    $email = $_POST['email'];

    // Validate and sanitize input (you should add more robust validation as needed)
    $full_name = htmlspecialchars($full_name);
    $address = htmlspecialchars($address);
    $phone_no = intval($phone_no); // Convert to integer
    $email = htmlspecialchars($email);

    // Generate Customer ID
    $cid = generateCustomerId($mysqli);

    // Prepare SQL statement
    $sql = "INSERT INTO customer (cid, full_name, address, phone_no, email) VALUES (?, ?, ?, ?, ?)";
    
    // Attempt to execute the prepared statement
    if ($stmt = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sssis", $cid, $full_name, $address, $phone_no, $email);
        
        // Execute the statement
        if ($stmt->execute()) {
            // Product added successfully
            echo "<div style='text-align:center; font-style: oblique ; font-size: 150%;'>" ;
            echo "<h2>Customer added successfully.</h2>";
           
            echo "</div>";

            echo "<div style='text-align:center; margin-top: 20px;'>";
            echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='customers.html'\">DONE</button>";
            echo "</div>";

        } else {
            // Something went wrong
            echo "Error: " . $mysqli->error;

            echo "<div style='text-align:center; margin-top: 20px;'>";
            echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='customers.html'\">DONE</button>";
            echo "</div>";
        }

        // Close statement
        $stmt->close();
    } else {
        // Something went wrong
        echo "Error: " . $mysqli->error;
    }
}

// Close connection
$mysqli->close();
?>
