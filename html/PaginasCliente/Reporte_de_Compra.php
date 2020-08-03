<?php
require('../../fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../../Images/logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'REPORTE DE COMPRA',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Derechos reservados Madame.com. Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require ('../conexion.php');

 $query2="SELECT MAX(IdCompra) as ultimoid_compra FROM compra";
  $resultado2=$mysqli->query($query2);
   $fila2=$resultado2-> fetch_assoc();
$ultimoid_compra=$fila2['ultimoid_compra'];
   


$query="SELECT compra.IdUsuario, compra.IdCompra,articulo.Nombre, compra_articulo.IdArticulo,  compra_articulo.CantidadProducto,compra.PrecioTotal,compra.Estado
FROM compra_articulo 
INNER JOIN compra ON compra_articulo.IdCompra=compra.IdCompra
INNER JOIN articulo ON compra_articulo.IdArticulo=articulo.IdArticulo
WHERE  compra.IdCompra='$ultimoid_compra'";

$resultado=$mysqli->query($query);

// Creación del objeto de la clase heredada
$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$pdf->Cell(70, 10, 'CLAVE DE COMPRA', 1 , 0, 'C' , 0);
$pdf->Cell(100, 10, $ultimoid_compra, 1 , 1, 'C' , 0);

 while($fila=$resultado -> fetch_assoc()) {
    //ANCHO Y ALTO DE PDF, BORDE, SALTO DE LINEA,CENTRADO, SIN RELLENO

$pdf->Cell(70, 10, 'Producto (s)', 1 , 0, 'C' , 0);
$pdf->Cell(100, 10, $fila['Nombre'], 1 , 1, 'C' , 0);
//salto de linea

$pdf->Cell(70, 10, 'Cantidad de productos', 1 , 0, 'C' , 0);
$pdf->Cell(100,10,$fila['CantidadProducto'],1,1,'C',0);
$Total=$fila['PrecioTotal'];
 }

$pdf->Cell(70, 10, 'TOTAL A PAGAR $', 1 , 0, 'C' , 0);
$pdf->Cell(100,10,$Total,1,0,'C',0);       


$pdf->Output();
?>