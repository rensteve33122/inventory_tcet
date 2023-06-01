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
    $allowed = array("csv", "xls", "xlsx");

    if (in_array($fileExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) {
                if (is_uploaded_file($fileTmpName)) {
                    $fileNameNew = uniqid("", true) . "." . $fileExt;
                    $fileDestination = "inventorymanagement/" . $fileNameNew;
                    
                    $file = fopen($fileTmpName, "r");
                    $header = true;
                    while (($data = fgetcsv($file, 1000, ",")) !== false) {
                        if ($header) {
                            $header = false;
                            continue;
                        }
                        
                        $student_ID = mysqli_real_escape_string($db, $data[0]);
                        $firstname = mysqli_real_escape_string($db, $data[1]);
                        $lastname = mysqli_real_escape_string($db, $data[2]);
                        $studentnumber = mysqli_real_escape_string($db, $data[3]);
                        $itemserialborrow = mysqli_real_escape_string($db, $data[4]);
                        $itemborrow = mysqli_real_escape_string($db, $data[5]);
                        $date = mysqli_real_escape_string($db, $data[6]);
                        $query = "INSERT INTO student (student_ID, firstname, lastname, studentnumber, itemserialborrow, itemborrow, date)
                                  VALUES ('$student_ID', '$firstname', '$lastname', '$studentnumber', '$itemserialborrow', '$itemborrow', '$date')";
                        mysqli_query($db, $query);
                    }
                    fclose($file);

                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        header("Location: student.php");
                        exit;
                    } else {
                        echo "Error moving file to destination directory.";
                    }
                } else {
                    echo "Invalid file uploaded.";
                }
            } else {
                echo "Your file is too large.";
            }
        } else {
            echo "There was an error uploading your file.";
        }
    } else {
        echo "You cannot upload files of this type.";
    }
}
?>
