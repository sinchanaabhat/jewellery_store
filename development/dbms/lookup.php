
<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "root"; // Your database username
    $password = ""; // Your database password
    $dbname = "jewellery"; // Your database name
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetching customer ID based on full name
    $full_name = $_POST['full_name'];
    $sql = "SELECT cid FROM customer WHERE full_name='$full_name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $cid = $row['cid'];
        echo "<div style='text-align:center; font-style: oblique ; font-size: 150%;'>";
        echo "Customer ID: " . $cid . "<br>";
        echo"<div>";
    } else {
        echo "<div style='text-align:center; font-style: oblique ; font-size: 150%;'>";
        echo "Customer not found<br>";
        echo"<div>";
    }

    // Fetch product ID and quantity based on product name
    $product_name = $_POST['product_name'];
    $sql = "SELECT pid, quantity FROM products WHERE pname='$product_name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pid = $row['pid'];
        $product_quantity = $row['quantity'];
        echo "<div style='text-align:center; font-style: oblique ; font-size: 100%;'>";
        echo "<br>Product ID: " . $pid . "<br>";
        echo"<div>";
        // Fetch quantity from form
        $quantity = $_POST['quantity'];
        if ($quantity < 1) {
            echo "Quantity must be at least 1.<br>";
        } elseif ($quantity > $product_quantity) {
            echo "Insufficient quantity available.<br>";
        } else {
            echo "<div style='text-align:center; font-style: oblique ; font-size: 100%;'>";
            echo "<br>Quantity: " . $quantity . "<br>";
            echo"<div>";
            // Generating TID
            $sql_tid = "SELECT MAX(SUBSTRING(tid, 2)) AS max_tid FROM cust_prod";
            $result_tid = $conn->query($sql_tid);
            if ($result_tid->num_rows > 0) {
                $row_tid = $result_tid->fetch_assoc();
                $max_tid = $row_tid['max_tid'];
            }
            $next_tid = $max_tid + 1;
            $tid = "T" . str_pad($next_tid, 2, "0", STR_PAD_LEFT);
            echo "<div style='text-align:center; font-style: oblique ; font-size: 100%;'>";
            echo "<br>Generated TID: " . $tid . "<br>";
            echo"<div>";
            // Update product quantity
            $updated_quantity = $product_quantity - $quantity;
            $sql_update = "UPDATE products SET quantity='$updated_quantity' WHERE pid='$pid'";
            if ($conn->query($sql_update) === TRUE) {
               

                // Inserting data into cust_prod table
                $sql_insert = "INSERT INTO cust_prod (cid, pid, tid, quantity) VALUES ('$cid', '$pid', '$tid', '$quantity')";
                if ($conn->query($sql_insert) === TRUE) {
                    echo "<div style='text-align:center; font-style: oblique ; font-size: 100%;'>" ;
                    echo "<br>Record inserted successfully!";
                    echo"<div>";
                    echo "<div style='text-align:center; margin-top: 20px;'>";
    echo "<button style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;' onclick=\"window.location.href='customers.html'\">DONE</button>";
    echo "</div>";
                } else {
                    echo "<div style='text-align:center; font-style: oblique ; font-size: 100%;'>";
                    echo "<br>Error inserting record: " . $conn->error;
                    echo "</div>";
                }
            } else {
                echo "Error updating product quantity: " . $conn->error;
            }
        }
    } else {
        echo "<div style='text-align:center; font-style: oblique ; font-size: 150%;'>";
        echo "<br>Product not found<br>";
        echo "</div>";
        echo "<div style='text-align:center; '>";
        echo "<br><br><button onclick=\"window.location.href='customers.html'\">DONE</button>";
        echo "</div>";
    }

    // Closing database connection
    $conn->close();
}
?>
