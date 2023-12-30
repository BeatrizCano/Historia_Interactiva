<?php
require('../library/fpdf/fpdf.php'); 

$pdf = new FPDF("L", "mm", array(320, 192));

$pdf->AddPage();

$pdf->Image('../assets/img/certificate/interactiveCertificateHistory.png', 0, 0, 320, 192);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
    $name = $_POST["name"];
    addTextCentered($pdf, ucwords(utf8_decode($name)), 110, 'Helvetica', 30, 169, 50, 38);
}

function addTextCentered($pdf, $text, $y, $font, $size=10, $r=0, $g=0, $b=0) {
    $pdf->SetFont($font, "", $size);
    $pdf->SetTextColor($r, $g, $b);

    $textWidth = $pdf->GetStringWidth($text);

    $x = ($pdf->GetPageWidth() - $textWidth) / 2;

    $pdf->Text($x, $y, $text);
}

    $pdfContent = $pdf->Output("", "S");

    header("Content-Type: application/pdf");
    header("Content-Disposition: inline; filename=certificado.pdf");

    echo $pdfContent;

?>