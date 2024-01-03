<?php
require('../library/fpdf/fpdf.php'); // Ruta relativa a la carpeta fpdf

// Crear una instancia de FPDF con el tamaño adecuado
$pdf = new FPDF("L", "mm", array(320, 192));

// Agregar una página
$pdf->AddPage();

// Agregar imagen del certificado
$pdf->Image('../assets/img/certificate/interactiveCertificateHistory.png', 0, 0, 320, 192);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
    $name = $_POST["name"];
    addTextCentered($pdf, ucwords(utf8_decode($name)), 110, 'Helvetica', 30, 169, 50, 38);
}

// Agregar la función addTextCentered 
function addTextCentered($pdf, $text, $y, $font, $size=10, $r=0, $g=0, $b=0) {
    $pdf->SetFont($font, "", $size);
    $pdf->SetTextColor($r, $g, $b);

    // Obtener el ancho del texto
    $textWidth = $pdf->GetStringWidth($text);

    // Calcular la posición X para centrar el texto
    $x = ($pdf->GetPageWidth() - $textWidth) / 2;

    // Agregar el texto centrado
    $pdf->Text($x, $y, $text);
}

    $pdfContent = $pdf->Output("", "S");

    header("Content-Type: application/pdf");
    header("Content-Disposition: inline; filename=certificado.pdf");

    echo $pdfContent;

?>