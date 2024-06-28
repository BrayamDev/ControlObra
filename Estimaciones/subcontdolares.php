<?php
session_start();
ob_start();

$id_obra = $_SESSION['id_obra'];

include "../Conexion.php";

$id_contratista = $_POST['id_contratista'];
$consulta = mysqli_query($conexion, "SELECT * from  contrato WHERE id_obra= $id_obra  AND id_contratista = '$id_contratista' ORDER BY importe_dolares asc");

$html = "<option value='0'></option>";
while ($resultado = mysqli_fetch_array($consulta)) {
	$html .= "<option value='" . $resultado['importe_dolares'] . "'>" . number_format($resultado['importe_dolares']) . "</option>";
}

echo strtoupper($html);
