<?php
$db = mysqli_connect('localhost', 'root', '', 'inventorymanagement');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST["submit"])) {
    $file = $_FILES["csvFile"];
    $fileName = $file["name"];
    $fileTmpName = $file["tmp_name"];
    $fileSize = $file["size"];
    $fileError = $file["error"];
    $fileType = $file["type"];

    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowed = array("csv");

    if (in_array($fileExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) {
                if (is_uploaded_file($fileTmpName)) {
                    $fileNameNew = uniqid("", true) . "." . $fileExt;
                    $fileDestination = $_SERVER['DOCUMENT_ROOT'] . "/InventoryManagement" . $fileNameNew;
                    
                    $file = fopen($fileTmpName, "r");
                    $header = true;
                    while (($data = fgetcsv($file, 1000, ",")) !== false) {
                        if ($header) {
                            $header = false;
                            continue;
                        }
                        $product_name = mysqli_real_escape_string($db, $data[0]);
                        $Model = mysqli_real_escape_string($db, $data[1]);
                        $quantity = mysqli_real_escape_string($db, $data[2]);
                        $serialnumber = mysqli_real_escape_string($db, $data[3]);
                        $description = mysqli_real_escape_string($db, $data[4]);
                        $query = "INSERT INTO product (product_name, Model, quantity, serialnumber, description)
                                  VALUES ('$product_name', '$Model', '$quantity', '$serialnumber', '$description')";
                        mysqli_query($db, $query);
                    }
                    fclose($file);
                
                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        header("Location: table.php");
                        exit;
                    } else {
                        echo '<script>alert("Error moving file to destination directory.");window.location.href = "table.php";</script>';
                    }
                } else {
                    echo '<script>alert("Invalid file uploaded.");window.location.href = "table.php";</script>';
                }
            } else {
                echo '<script>alert("Your file is too large.");window.location.href = "table.php";</script>';
            }
        } else {
            echo '<script>alert("There was an error uploading your file.");window.location.href = "table.php";</script>';
        }
    }else {
        echo '<script>alert("You cannot upload files of this type."); window.location.href = "table.php";</script>';
    }
}
?>
