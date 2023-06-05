<?php
include('config.php');

$errors = array();

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($db, $_POST['product_name']);
    $Model = mysqli_real_escape_string($db, $_POST['Model']);
    $quant = mysqli_real_escape_string($db, $_POST['quantity']);
    $serialnumber = mysqli_real_escape_string($db, $_POST['serialnumber']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $datecreated = mysqli_real_escape_string($db, $_POST['datecreated']);

    // Validation
    if (empty($name)) {
        $errors[] = "Item name is required.";
    }
    if (empty($Model)) {
        $errors[] = "Model is required.";
    }
    if (empty($serialnumber)) {
        $errors[] = "Serial number is required.";
    }
    if (empty($description)) {
        $errors[] = "Description is required.";
    }
    if (empty($datecreated)) {
        $errors[] = "Date created is required.";
    }

    if (empty($errors)) {
        mysqli_query($db, "UPDATE product SET product_name='$name', Model='$Model', quantity='$quant', serialnumber='$serialnumber', datecreated='$datecreated', description='$description' WHERE product_id='$id'");
        header("Location:table.php");
        exit();
    }
}

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
    $id = $_GET['id'];
    $result = mysqli_query($db, "SELECT * FROM product WHERE product_id=" . $_GET['id']);
    $row = mysqli_fetch_array($result);

    if ($row) {
        $id = $row['product_id'];
        $name = $row['product_name'];
        $Model = $row['Model'];
        $quant = $row['quantity'];
        $serialnumber = $row['serialnumber'];
        $description = $row['description'];
        $datecreated = $row['datecreated'];
    } else {
        echo "No results!";
        exit();
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

        form input[type="text"],
        form input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .error {
            color: red;
            margin-bottom: 10px;
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
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <label for="product_name">Item Name <em>*</em></label>
            <input type="text" name="product_name" value="<?php echo $name; ?>" required />

            <label for="Model">Model <em>*</em></label>
            <input type="text" name="Model" value="<?php echo $Model ?>" required />

            <label for="serialnumber">Serial <em>*</em></label>
            <input type="text" name="serialnumber" value="<?php echo $serialnumber; ?>" required />

            <label for="description">Description <em>*</em></label>
            <input type="text" name="description" value="<?php echo $description; ?>" required />

            <label for="datecreated">Date Created <em>*</em></label>
            <input type="date" name="datecreated" value="<?php echo $datecreated; ?>" required />

            <?php if (!empty($errors)) : ?>
                <div class="error">
                    <?php foreach ($errors as $error) : ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <input type="submit" name="submit" value="Edit Records">
        </form>
    </div>
</body>
</html>
