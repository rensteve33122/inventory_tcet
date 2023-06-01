<?php
$db = mysqli_connect('localhost', 'root', '', 'inventorymanagement');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_GET['id'])) {
    // Check if the user has confirmed the deletion
    if (isset($_GET['confirm'])) {
        // Delete the product from the database
        $result = mysqli_query($db,"DELETE FROM product WHERE product_id=".$_GET['id']);
        if($result===true) {
            echo "success";
        }
        header("Location:table.php");
        exit;
    } else {
        // Ask the user to confirm the deletion
        echo "<script>
            if (confirm('Are you sure you want to delete this product?')) {
                window.location.href = 'delete.php?id=" . $_GET['id'] . "&confirm=1';
            } else {
                window.location.href = 'table.php';
            }
        </script>";
    }
}
?>