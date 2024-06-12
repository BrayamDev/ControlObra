<?php
session_start();


include "../Conexion.php";
$idObra = $_SESSION['id_obra'];
require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {


      $alias = $_SESSION['alias'];
      $obra = $_SESSION['nombreObra'];

      //include '../../recursos/Recurso_conexion_bd.php';//llamamos a la conexion BD

      //$consulta_info = $conexion->query(" select *from hotel ");//traemos datos de la empresa desde BD
      //$dato_info = $consulta_info->fetch_object();
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(95); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode("Nombre de la obra : " . $obra), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(1); // Salto de línea
      $this->SetTextColor(103); //color

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(228, 100, 0);
      $this->Cell(100); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE ACTIVIDAD "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(228, 100, 0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(140, 7, utf8_decode('Actividad'), 1, 0, 'C', 1);
      $this->Cell(40, 7, utf8_decode('Fecha Inicial'), 1, 0, 'C', 1);
      $this->Cell(40, 7, utf8_decode('Fecha Final'), 1, 0, 'C', 1);
      $this->Cell(40, 7, utf8_decode('Responsable'), 1, 0, 'C', 1);
      $this->Cell(40, 7, utf8_decode('Fecha Registro'), 1, 0, 'C', 1);
      $this->Ln(7);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(255); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(255); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage("landscape"); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

$sqlContratista = "SELECT * FROM actividad WHERE id_obra = '$idObra'";
$resultadoContratista = $conexion->query($sqlContratista);


$i = $i + 1;
while ($datos_reporte = mysqli_fetch_array($resultadoContratista)) {      
   $pdf->MultiCell(140, 7, utf8_decode($datos_reporte['actividad']), 1,);
   $pdf->Cell(40, 7, utf8_decode($datos_reporte['fechaInicial']), 1, 0, 'C', 0);
   $pdf->Cell(40, 7, utf8_decode($datos_reporte['fechaFinal']), 1, 0, 'C', 0);
   $pdf->Cell(40, 7, utf8_decode($datos_reporte['responsableActividad']), 1, 0, 'C', 0);
   $pdf->Cell(40, 7, utf8_decode($datos_reporte['fechaRegistro']), 1, 1, 'C', 0);

}



$pdf->Output('Prueba2.pdf', 'I'); //nombreDescarga, Visor(I->visualizar - D->descargar)
