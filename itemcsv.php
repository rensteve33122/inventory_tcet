<?php
// Query the database
$conn = new mysqli("localhost", "root", "", "inventorymanagement");
$sql = "SELECT * FROM product";
$result = $conn->query($sql);

// Set the CSV file name
$fileName = 'Inventory.csv';

// Set the appropriate headers for CSV file download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $fileName . '"');

// Open output stream
$output = fopen('php://output', 'w');

// Set table header
$header = array('Product ID', 'Product Name', 'Model', 'Quantity', 'Serial Number', 'Description', 'Date Created');
fputcsv($output, $header);

// Add data to the CSV file
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data = array(
            $row['product_id'],
            $row['product_name'],
            $row['Model'],
            $row['quantity'],
            $row['serialnumber'],
            $row['description'],
            $row['datecreated']
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
