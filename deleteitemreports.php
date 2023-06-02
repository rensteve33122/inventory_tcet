<?php
$db = mysqli_connect('localhost', 'root', '', 'inventorymanagement');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_GET['id'])) {
    // Delete the product from the database
    $result = mysqli_query($db, "DELETE FROM itemreports WHERE product_id=" . $_GET['id']);
    if ($result === true) {
        header("Location: itemreports.php");
        exit;
    } else {
        echo "Error deleting product: " . mysqli_error($db);
    }
}
?>
