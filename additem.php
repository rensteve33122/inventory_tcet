<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<?php


// initializing variables
$item_name = "";
$Model   = "";


// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'inventorymanagement');
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }



// Create table if not exists
$query = "CREATE TABLE IF NOT EXISTS product (
  product_id INT AUTO_INCREMENT PRIMARY KEY,
  
  product_name VARCHAR(255),
  Model VARCHAR(255),
  quantity INT,
  serialnumber VARCHAR(255),
  description VARCHAR(255),
  datecreated DATE
)";

if (mysqli_query($db, $query)) {
echo "Table created successfully";
} else {
echo "Error creating table: " . mysqli_error($db);
}






// Add item
if (isset($_POST['add'])) {
  // receive all input values from the form
  $item_name = mysqli_real_escape_string($db, $_POST['product_name']);
  $Model = mysqli_real_escape_string($db, $_POST['Model']);
  $quant = mysqli_real_escape_string($db, $_POST['quant']);
  $serialnumber = mysqli_real_escape_string($db, $_POST['serialnumber']);
  $description = mysqli_real_escape_string($db, $_POST['description']);

  // Get the current date
  $datecreated = date("Y-m-d");

  $query = "INSERT INTO product (product_name, Model, quantity, serialnumber, description, datecreated) 
            VALUES ('$item_name', '$Model', '$quant', '$serialnumber', '$description', '$datecreated')";

  if (mysqli_query($db, $query)) {
      echo "<script>alert('Successfully stored');</script>";
  } else {
      echo "<script>alert('Something went wrong!!!');</script>";
  }

  header('location: table.php');
}
?>
<!--

<!DOCTYPE html>
<html>
<head>
	<title>Add Item</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
<form method="POST" class="form-inline" action="additem.php">
  <div class="form-group">
    <label for="name">Product Name</label>
    <input type="text" class="form-control" name="product_name">
    
  </div>
  <div class="form-group">
    <label for="name">Price</label>
    <input type="text" class="form-control" name="price">
  </div>
  <div>
        <label for="name">Quantity</label>
        <input type="number" name="quant" id="quant" min="1" max="">
    </div>
  <button type="submit" class="btn btn-default" name="add">Add item</button>
</form> 

<div>
<a href="table.php">Home</a>
</div>
</body>
</html>
<!-->