<?php
require('../library/fpdf/fpdf.php'); // Ruta relativa a la carpeta fpdf

// Crear una instancia de FPDF con el tamaño adecuado
$pdf = new FPDF("L", "mm", array(320, 192));

// Agregar una página
$pdf->AddPage();

// Agregar imagen del certificado
$pdf->Image('../assets/img/certificate/interactiveCertificateHistory.png', 0, 0, 320, 192);

// Traer datos del formulario (suponiendo que tienes el nombre en $_POST["name"])
$nombre = $_POST["name"];

// Agregar el nombre al certificado de manera centrada utilizando la función de StoryController
addTextCentered($pdf, ucwords(utf8_decode($nombre)), 110, 'Helvetica', 30, 169, 50, 38);

// Generar el certificado PDF
$pdf->Output();

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

?>