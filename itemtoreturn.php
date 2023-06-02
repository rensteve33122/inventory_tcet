<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
    exit();
}

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "inventorymanagement");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch the product record from the product table
    $select_query = "SELECT * FROM product WHERE product_id = '$product_id'";
    $select_result = $conn->query($select_query);

    if ($select_result->num_rows > 0) {
        // Retrieve the product data
        $row = $select_result->fetch_assoc();
        $product_name = $row['product_name'];
        $model = $row['Model'];
        $serial_number = $row['serialnumber'];
        $description = $row['description'];

        // Insert the product data into the itemreports table
        $insert_query = "INSERT INTO itemreports (product_name, Model, serialnumber, description) 
                        VALUES ('$product_name', '$model', '$serial_number', '$description')";
        if ($conn->query($insert_query) === TRUE) {
            // Delete the product from the product table
            $delete_query = "DELETE FROM product WHERE product_id = '$product_id'";
            if ($conn->query($delete_query) === TRUE) {
                // Item successfully returned and deleted, you can redirect to the table.php page or any other desired page
                header('location: table.php');
                exit();
            } else {
                echo "Error deleting product: " . $conn->error;
            }
        } else {
            echo "Error inserting product into itemreports table: " . $conn->error;
        }
    } else {
        echo "Product not found";
    }

    $conn->close();
} else {
    echo "Invalid request";
}
