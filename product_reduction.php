<?php
// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'inventorymanagement');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the product ID from the form
    $product_id = $_POST['product_id'];
    
    // Get the quantity borrowed from the form
    $quantity_borrowed = $_POST['quantity_borrowed'];
    
    // Get the current quantity of the product
    $query = "SELECT quantity FROM product WHERE product_id=$product_id";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $current_quantity = $row['quantity'];
    
    // Calculate the new quantity
    $new_quantity = $current_quantity - $quantity_borrowed;
    
    // Update the quantity in the database
    $query = "UPDATE product SET quantity=$new_quantity, quantity_borrowed=$quantity_borrowed WHERE product_id=$product_id";
    mysqli_query($db, $query);
    
    // Redirect back to the product list
    header("Location: cart.php");
    exit();
}

// Close the database connection
mysqli_close($db);
?>
