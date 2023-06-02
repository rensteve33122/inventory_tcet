<?php
$db = mysqli_connect('localhost', 'root', '', 'inventorymanagement');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_GET['id'])) {
    // Check if the user has confirmed the deletion
    if (isset($_GET['confirm'])) {
        // Delete the product from the database
        $result = mysqli_query($db,"DELETE FROM logs WHERE product_id=".$_GET['id']);
        if($result===true) {
            echo "success";
        }
        header("Location:reports.php");
        exit;
    } else {
        // Ask the user to confirm the deletion
        echo "<script>
            if (confirm('Do you want to delete this database?')) {
                window.location.href = 'deletereport.php?id=" . $_GET['id'] . "&confirm=1';
            } else {
                window.location.href = 'reports.php';
            }
        </script>";
    }
}
?>