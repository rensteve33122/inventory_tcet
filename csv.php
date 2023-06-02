<?php
// Get the search query from the URL
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Query the database
$conn = new mysqli("localhost", "root", "", "inventorymanagement");
$sql = "SELECT * FROM logs WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%' OR studentnumber LIKE '%$search%'";
$result = $conn->query($sql);

// Set the CSV file name
$fileName = 'student_list.csv';

// Set the appropriate headers for CSV file download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $fileName . '"');

// Open output stream
$output = fopen('php://output', 'w');

// Set table header
$header = array('First Name', 'Last Name', 'Student Number', 'Product Name', 'Model', 'Serial Number', 'Date Borrowed','Date Return');
fputcsv($output, $header);

// Add data to the CSV file
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data = array(
            $row['firstname'],
            $row['lastname'],
            $row['studentnumber'],
            $row['product_name'],
            $row['Model'],
            $row['serialnumber'],
            date('m/d/Y', strtotime($row['returndate']))
            date('m/d/Y', strtotime($row['date']))
        );
        fputcsv($output, $data);
    }
} else {
    $data = array('No results found');
    fputcsv($output, $data);
}

// Close the output stream
fclose($output);
?>
