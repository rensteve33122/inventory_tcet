<?php
// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'inventorymanagement');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Retrieve the row ID from the GET parameters
$id = $_GET['id'];

// Retrieve one row of data from the product table
$result = mysqli_query($db, "SELECT * FROM product WHERE product_id = '$id'");

// Insert the data into the cart table
if ($row = mysqli_fetch_assoc($result)) {
    $sql = "INSERT INTO cart (product_name, Model, quantity, serialnumber, description) 
            VALUES ('".$row['product_name']."', '".$row['Model']."', '".$row['quantity']."', '".$row['serialnumber']."', '".$row['description']."')";
    mysqli_query($db, $sql);
    $cqty=$row['quantity']-1;
    $sql1 = "UPDATE product SET quantity = $cqty WHERE product_id = $id";
    mysqli_query($db, $sql1);
    
    // Redirect to cart.php
    header("Location: student.php");
    exit();
} else {
    echo "No data found in the product table.";
}
?>
