<?php
// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'inventorymanagement');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Create the logs table if it doesn't exist
mysqli_query($db, "CREATE TABLE IF NOT EXISTS logs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_id INT(6) NOT NULL,
    product_name VARCHAR(50) NOT NULL,
    Model VARCHAR(50) NOT NULL,
    serialnumber VARCHAR(50) NOT NULL,
    description TEXT,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    studentnumber VARCHAR(10) NOT NULL,
    date DATE NOT NULL
)");

// Retrieve one row of data from the borrow table
$result = mysqli_query($db, "SELECT * FROM borrow LIMIT 1");

// Insert the data into the logs table
if ($row = mysqli_fetch_assoc($result)) {
    $sql = "INSERT INTO logs (product_id, product_name, Model, serialnumber, description, firstname, lastname, studentnumber, date) 
            VALUES ('".$row['product_id']."', '".$row['product_name']."', '".$row['Model']."', '".$row['serialnumber']."', '".$row['description']."', '".$row['firstname']."', '".$row['lastname']."', '".$row['studentnumber']."', '".$row['date']."')";
    mysqli_query($db, $sql);

    // Set the quantity to 1 in the product table
    $product_id = $row['product_id'];
    mysqli_query($db, "UPDATE product SET quantity = 1 WHERE product_id = '$product_id'");

    // Delete the data from the borrow table
    $product_id = $row['product_id'];
    mysqli_query($db, "DELETE FROM borrow WHERE product_id = '$product_id'");

    // Redirect to return.php
    header("Location: return.php");
    exit();
} else {
    echo "No data found in the borrow table.";
}
?>