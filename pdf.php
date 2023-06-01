<?php
require_once('TCPDF-main/tcpdf.php');

// Get the search query from the URL
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Set the PDF properties
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Student List');

// Add a page
$pdf->AddPage();

// Set the font
$pdf->SetFont('times', '', 12);

// Add a header
$pdf->SetHeaderData('', '', 'Student List', '');

// Add a footer
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// Set header and footer fonts
$pdf->setHeaderFont(Array('times', '', 10));
$pdf->setFooterFont(Array('times', '', 8));

// Set header and footer content
$pdf->setHeaderData('', 0, '', '');
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// Set margins
$pdf->SetMargins(15, 30, 15);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 30);

// Set table header
$pdf->SetFont('times', 'B', 12);
$pdf->Cell(40, 10, 'Student Number', 1, 0, 'C');
$pdf->Cell(40, 10, 'Product Name', 1, 0, 'C');
$pdf->Cell(40, 10, 'Model', 1, 0, 'C');
$pdf->Cell(40, 10, 'Serial Number', 1, 0, 'C');
$pdf->Cell(40, 10, 'Item Return Date', 1, 0, 'C');
$pdf->Ln();

// Query the database
$conn = new mysqli("localhost", "root", "", "inventorymanagement");
$sql = "SELECT * FROM logs WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%' OR studentnumber LIKE '%$search%'";
$result = $conn->query($sql);
$count = 0;

// Add data to the table
if ($result->num_rows > 0) {
    $pdf->SetFont('times', '', 10);
    while ($row = $result->fetch_assoc()) {
        $count = $count + 1;
        
        $pdf->Cell(40, 7, $row["studentnumber"], 1, 0, 'C');
        $pdf->Cell(40, 7, $row["product_name"], 1, 0, 'C');
        $pdf->Cell(40, 7, $row["Model"], 1, 0, 'C');
        $pdf->Cell(40, 7, $row["serialnumber"], 1, 0, 'C');
        $date_obj = new DateTime($row["date"]);
        $date_str = $date_obj->format('m/d/Y');
        $pdf->Cell(40, 7, $date_str, 1, 0, 'C');
        $pdf->Ln();
    }
} else {
    $pdf->Cell(0, 10, 'No results found', 1, 0, 'C');
}

// Output the PDF
$pdf->Output('student_list.pdf', 'D');
?>
