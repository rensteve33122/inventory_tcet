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

    // Retrieve one row of data from the product table
    $result = mysqli_query($db, "SELECT * FROM product WHERE product_id = '$product_id'");

    if ($row = mysqli_fetch_assoc($result)) {
        // Check if there is enough quantity to reduce by the given quantity
        $current_quantity = $row["quantity"];
        $new_quantity = $current_quantity - $quantity;

        if ($new_quantity >= 0) {
            // Reduce the quantity by the given quantity in the database
            $sql = "UPDATE product SET quantity = $new_quantity WHERE product_id = $product_id";
            mysqli_query($db, $sql);

            // Insert the data into the cart table with the product_id
            $sql = "INSERT INTO cart (product_id, product_name, Model, quantity, serialnumber, description) 
                    VALUES ('".$row['product_id']."', '".$row['product_name']."', '".$row['Model']."', '".$quantity."', '".$row['serialnumber']."', '".$row['description']."')";
            mysqli_query($db, $sql);

            // Redirect to cart.php
            header("Location: student.php");
            exit();
        } else {
            // Display an error message
            echo "Sorry, there is not enough quantity in stock.";
        }
    } else {
        // Display an error message
        echo "Product not found.";
    }
} else {
  // Retrieve the product_id and quantity values from the $_GET superglobal
  if(isset($_GET["product_id"])){
    $product_id = $_GET["product_id"];
    $quantity = 1;

    // Retrieve one row of data from the product table
    $result = mysqli_query($db, "SELECT * FROM product WHERE product_id = '$product_id'");

    if ($row = mysqli_fetch_assoc($result)) {
        // Insert the data into the cart table with the product_id
        $sql = "INSERT INTO cart (product_id, product_name, Model, quantity, serialnumber, description) 
                VALUES ('".$row['product_id']."', '".$row['product_name']."', '".$row['Model']."', '".$quantity."', '".$row['serialnumber']."', '".$row['description']."')";
        mysqli_query($db, $sql);

        // Reduce the quantity by 1 in the product table
        $new_quantity = $row['quantity'] - 1;
        $sql = "UPDATE product SET quantity = $new_quantity WHERE product_id = $product_id";
        mysqli_query($db, $sql);

        // Redirect to student.php
        header("Location: student.php");
        exit();
    } else {
        echo "No data found in the product table.";
    }
  } else {
    echo "Product ID is missing.";
  }
}
mysqli_close($db);
?>
