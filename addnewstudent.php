<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

$conn = new mysqli("localhost", "root", "", "inventorymanagement");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['add'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $studentnumber = $_POST['studentnumber'];
    $date = $_POST['date'];
    $position = $_POST['position'];
    $collegeunit = $_POST['collegeunit'];
    $event = $_POST['event'];

    // Create the "borrow" table if it doesn't exist
    $createTableQuery = "CREATE TABLE IF NOT EXISTS borrow (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        product_id INT(6) NOT NULL,
        product_name VARCHAR(50) NOT NULL,
        Model VARCHAR(50) NOT NULL,
        serialnumber VARCHAR(50) NOT NULL,
        description TEXT,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        studentnumber VARCHAR(10) NOT NULL,
        date DATE NOT NULL,
        position VARCHAR(50) NOT NULL,
        collegeunit VARCHAR(50) NOT NULL,
        event VARCHAR(50) NOT NULL,
        FOREIGN KEY (product_id) REFERENCES cart(product_id)
    )";

    $conn->query($createTableQuery);

    // Iterate over each item in the cart
    $cartQuery = "SELECT * FROM cart";
    $cartResult = $conn->query($cartQuery);

    while ($row = $cartResult->fetch_assoc()) {
        $productId = $row['product_id'];
        $productName = $row['product_name'];
        $model = $row['Model'];
        $serialNumber = $row['serialnumber'];
        $description = $row['description'];

        // Insert the borrower's information for each item in the cart
        $insertQuery = "INSERT INTO borrow (product_id, product_name, Model, serialnumber, description, firstname, lastname, studentnumber, date, position, collegeunit, event) 
                        VALUES ('$productId', '$productName', '$model', '$serialNumber', '$description', '$firstname', '$lastname', '$studentnumber', '$date', '$position', '$collegeunit', '$event' )";

        $conn->query($insertQuery);
    }

    // Disable foreign key checks temporarily
    $disableForeignKeyChecksQuery = "SET FOREIGN_KEY_CHECKS = 0";
    $conn->query($disableForeignKeyChecksQuery);

    // Clear the cart after borrowing
    $clearCartQuery = "TRUNCATE TABLE cart";
    $conn->query($clearCartQuery);

    // Enable foreign key checks again
    $enableForeignKeyChecksQuery = "SET FOREIGN_KEY_CHECKS = 1";
    $conn->query($enableForeignKeyChecksQuery);

    // Redirect to the cart page
    header("Location: cart.php");
    exit();
}

$conn->close();
?>