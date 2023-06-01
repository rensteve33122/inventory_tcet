<?php

include('config.php');

if (isset($_POST['submit']))
{

$student_ID=mysqli_real_escape_string($db, $_POST['student_ID']);
$firstname=mysqli_real_escape_string($db, $_POST['firstname']);
$lastname=mysqli_real_escape_string($db, $_POST['lastname']);
$studentnumber=mysqli_real_escape_string($db, $_POST['studentnumber']);
$itemserialborrow=mysqli_real_escape_string($db, $_POST['itemserialborrow']);
$itemborrow=mysqli_real_escape_string($db, $_POST['itemborrow']);

mysqli_query($db,"UPDATE student SET studentnumber='$studentnumber', firstname='$firstname', lastname='$lastname', itemserialborrow='$itemserialborrow', itemborrow='$itemborrow' WHERE student_ID='$student_ID'");

header("Location:student.php");
}


if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
{

$id = $_GET['id'];
$result = mysqli_query($db,"SELECT * FROM student WHERE student_ID=".$_GET['id']);

$row = mysqli_fetch_array($result);

if($row)
{

$student_ID = $row['student_ID'];
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$studentnumber=$row['studentnumber'];
$itemserialborrow=$row['itemserialborrow'];
$itemborrow=$row['itemborrow'];
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
	<title>Edit Student</title>
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
		<h1>Edit student</h1>
		<form action="" method="post" action="editstudent.php">
			<input type="hidden" name="student_ID" value="<?php echo $id; ?>"/>
			<label for="student_ID"><em></em></label>
			<input type="hidden" name="student_ID" value="<?php echo $student_ID; ?>" required/>


			<label for="firstname">firstname <em>*</em></label>
			<input type="text" name="firstname" value="<?php echo $firstname ?>" required/>


			<label for="lastname">lastname <em>*</em></label>
			<input type="text" name="lastname" value="<?php echo $lastname;?>" required/>


			<label for="studentnumber">studentnumber <em>*</em></label>
			<input type="text" name="studentnumber" value="<?php echo $studentnumber;?>" required/>


			<label for="itemserialborrow">itemserialborrow <em>*</em></label>
			<input type="text" name="itemserialborrow" value="<?php echo $itemserialborrow;?>" required/>

			<label for="itemborrow">itemborrow <em>*</em></label>
			<input type="text" name="itemborrow" value="<?php echo $itemborrow;?>" required/>


			<input type="submit" name="submit" value="Edit Records">
		</form>
	</div>
</body>
</html>
