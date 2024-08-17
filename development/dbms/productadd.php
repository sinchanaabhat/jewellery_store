<?php
// Assuming you have already defined your database connection parameters
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

// Function to generate PID with leading zeros
function generatePID($highest_pid) {
    $pid_number = intval(substr($highest_pid, 1)) + 1; // Extract number, increment, and convert to integer
    return 'P' . str_pad($pid_number, 2, '0', STR_PAD_LEFT); // Format with leading zeros
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch highest PID from the database
    $sql_max_pid = "SELECT MAX(pid) AS highest_pid FROM products";
    $result_max_pid = $mysqli->query($sql_max_pid);
    $row_max_pid = $result_max_pid->fetch_assoc();
    $highest_pid = $row_max_pid['highest_pid'];

    // Generate PID
    $pid = generatePID($highest_pid);

    // Collect other form data
    $pname = $_POST['pname'];
    $ptype = $_POST['ptype'];
    $metal = $_POST['metal'];
    $weight = $_POST['weight'];
    
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Sanitize input (you should add more robust validation as needed)
    $pname = htmlspecialchars($pname);
    $ptype = htmlspecialchars($ptype);
    $metal = htmlspecialchars($metal);
    $weight = floatval($weight); // Convert to float
    
    $quantity = intval($quantity); // Convert to integer
    $price = floatval($price); // Convert to float

    // Prepare SQL statement
    $sql = "INSERT INTO products (pid, pname, ptype, metal, weight,  quantity, price) VALUES (?, ?,  ?, ?, ?, ?, ?)";

    // Attempt to execute the prepared statement
    if ($stmt = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("ssssddi", $pid, $pname, $ptype, $metal, $weight,  $quantity, $price); // "i" indicates the type integer, "s" indicates the type string, "d" indicates the type double/float
        
        // Execute the statement
        if ($stmt->execute()) {
            // Product added successfully
            echo "<div style='text-align:center; font-style: oblique ; font-size: 150%;'>" ;
            echo "<h2>Product added successfully.</h2>";
            echo "</div>";

            echo "<div style='text-align:center; margin-top: 20px;'>";
            echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='products.html'\">DONE</button>";
            echo "</div>";
        } else {
            // Something went wrong
            echo "Error: " . $mysqli->error;
            echo "<div style='text-align:center; margin-top: 20px;'>";
            echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='products.html'\">DONE</button>";
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
