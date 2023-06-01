<?php
$db = mysqli_connect('localhost', 'root', '', 'inventorymanagement');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Delete all data from the cart table
$result = mysqli_query($db,"DELETE FROM cart");
if($result===true) {
    echo "All data from the cart table has been deleted successfully";
} else {
    echo "Error deleting data: " . mysqli_error($db);
}
header("Location:cart.php");
exit;
?>
