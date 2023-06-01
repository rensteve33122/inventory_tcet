<?php
// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'inventorymanagement');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the product_id and quantity values from the $_POST superglobal
    $product_id = $_POST["product_id"];
    $quantity = $_POST["quantity"];

    // Retrieve one row of data from the cart table
    $result = mysqli_query($db, "SELECT * FROM cart WHERE product_id = '$product_id'");

    if ($row = mysqli_fetch_assoc($result)) {
        // Check if there is enough quantity to reduce by the given quantity
        $current_quantity = $row["quantity"];
        $new_quantity = $current_quantity - $quantity;

        if ($new_quantity >= 0) {
            // Reduce the quantity by the given quantity in the cart table
            $sql = "UPDATE cart SET quantity = $new_quantity WHERE product_id = $product_id";
            mysqli_query($db, $sql);

            // Insert the data into the student table with the relevant columns
            $sql = "INSERT INTO student (product_id, firstname, lastname, studentnumber, description, itemserialborrow, itemborrow, date) 
                    VALUES ('".$row['product_id']."', '".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['studentnumber']."', '".$row['description']."', '".$row['serialnumber']."', '".$row['product_name']."', '".$_POST['date']."')";
            mysqli_query($db, $sql);

            // Redirect to student.php
            header("Location: student.php");
            exit();
        } else {
            // Display an error message
            echo "Sorry, there is not enough quantity in stock.";
        }
    } else {
        // Display an error message
        echo "Product not found in the cart.";
    }
} else {
    // Retrieve the product_id and quantity values from the $_GET superglobal
    if (isset($_GET["product_id"])) {
        $product_id = $_GET["product_id"];
        $quantity = 1;

        // Retrieve one row of data from the cart table
        $result = mysqli_query($db, "SELECT * FROM cart WHERE product_id = '$product_id'");

        if ($row = mysqli_fetch_assoc($result)) {
            // Insert the data into the student table with the relevant columns
            $sql = "INSERT INTO student (product_id, firstname, lastname, studentnumber, description, itemserialborrow, itemborrow, date) 
                    VALUES ('".$row['product_id']."', '".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['studentnumber']."', '".$row['description']."', '".$row['serialnumber']."', '".$row['product_name']."', '".$_POST['date']."')";
            mysqli_query($db, $sql);

            // Reduce the quantity by 1 in the cart table
            $new_quantity = $row['quantity'] - 1;
            $sql = "UPDATE cart SET quantity = $new_quantity WHERE product_id = $product_id";
            mysqli_query($db, $sql);

            // Redirect to student.php
            header("Location: student.php");
            exit();
        } else {
            echo "No data found in the cart table.";
        }
    } else {
        echo "Product ID is missing.";
    }
}

mysqli_close($db);
?>
