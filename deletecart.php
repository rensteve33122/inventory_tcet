<?php
$db = mysqli_connect('localhost', 'root', '', 'inventorymanagement');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST['product_id'])) {
    // Get the product id and quantity from the cart table
    $pid = $_POST['product_id'];
    $result = mysqli_query($db, "SELECT * FROM cart WHERE product_id = $pid");
    $row = mysqli_fetch_assoc($result);
    $quantity = $row['quantity'];

    // Delete the product from the cart table
    $result = mysqli_query($db,"DELETE FROM cart WHERE product_id = $pid");

    if ($result === true) {
        // Update the product quantity in the product table
        $sqlupdate = "UPDATE product SET quantity = (quantity + $quantity) WHERE product_id = $pid";
        mysqli_query($db, $sqlupdate);
    }
    header("Location:cart.php");
    exit;
}
?>
