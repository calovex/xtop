<?php
require('lib/fpdf.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employment_agency";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch certificate details by unique ID
$uniqueId = $_GET['id'] ?? '';
$sql = "SELECT * FROM certificates WHERE unique_id = '$uniqueId' AND status = 'Approved'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Certificate not found or not approved yet.");
}

$certificate = $result->fetch_assoc();

// Generate PDF
class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, 'Certificate of Clearance', 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(0, 10, "Name: " . $certificate['name'], 0, 1);
$pdf->Cell(0, 10, "Education: " . $certificate['education'], 0, 1);
$pdf->Cell(0, 10, "Unique ID: " . $certificate['unique_id'], 0, 1);
$pdf->Ln(10);
$pdf->Cell(0, 10, "This is to certify that the individual has cleared all necessary checks.", 0, 1);

$pdf->Output('D', 'Certificate_' . $certificate['unique_id'] . '.pdf');
$conn->close();
?>
