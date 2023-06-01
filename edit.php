<?php

include('config.php');

if (isset($_POST['submit']))
{
$id=$_POST['id'];
$name=mysqli_real_escape_string($db, $_POST['product_name']);
$Model=mysqli_real_escape_string($db, $_POST['Model']);
$quant=mysqli_real_escape_string($db, $_POST['quantity']);
$serialnumber=mysqli_real_escape_string($db, $_POST['serialnumber']);
$description=mysqli_real_escape_string($db, $_POST['description']);

mysqli_query($db,"UPDATE product SET product_name='$name', Model='$Model', quantity='$quant', serialnumber='$serialnumber', description='$description' WHERE product_id='$id'");

header("Location:table.php");
}


if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
{

$id = $_GET['id'];
$result = mysqli_query($db,"SELECT * FROM product WHERE product_id=".$_GET['id']);

$row = mysqli_fetch_array($result);

if($row)
{

$id = $row['product_id'];
$name = $row['product_name'];
$Model = $row['Model'];
$quant=$row['quantity'];
$serialnumber=$row['serialnumber'];
$description=$row['description'];
}
else
{
echo "No results!";
}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Edit Item</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f1f1f1;
		}
		.container {
			max-width: 600px;
			margin: 0 auto;
			padding: 20px;
			background-color: #fff;
			border: 1px solid #ddd;
			box-shadow: 0px 0px 10px #ccc;
		}
		h1 {
			text-align: center;
			margin-bottom: 30px;
		}
		form label {
			display: block;
			margin-bottom: 10px;
			font-weight: bold;
		}
		form input[type="text"] {
			width: 100%;
			padding: 10px;
			border: 1px solid #ddd;
			border-radius: 5px;
			box-sizing: border-box;
			margin-bottom: 20px;
			font-size: 16px;
		}
		form input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
		}
		form input[type="submit"]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Edit Item</h1>
		<form action="" method="post" action="edit.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
			<label for="product_name">Item Name <em>*</em></label>
			<input type="text" name="product_name" value="<?php echo $name; ?>" required/>

            
			<label for="Model">Model <em>*</em></label>
			<input type="text" name="Model" value="<?php echo $Model ?>" required/>


			<!-- <label for="quantity">Quantity <em>*</em></label>
			<input type="text" name="quantity" value="<?php echo $quant;?>" required/> -->


			<label for="serialnumber">Serial <em>*</em></label>
			<input type="text" name="serialnumber" value="<?php echo $serialnumber;?>" required/>


			<label for="description">Description <em>*</em></label>
			<input type="text" name="description" value="<?php echo $description;?>" required/>


			<input type="submit" name="submit" value="Edit Records">
		</form>
	</div>
</body>
</html>
