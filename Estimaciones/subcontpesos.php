<?php
session_start();
ob_start();

$id_obra = $_SESSION['id_obra'];

include "../Conexion.php";

$id_contratista = $_POST['id_contratista'];
$consulta = mysqli_query($conexion, "SELECT * from  contrato WHERE id_obra= $id_obra  AND id_contratista = '$id_contratista' ORDER BY importe_pesos asc");

$html = "<option value='0'></option>";
while ($resultado = mysqli_fetch_array($consulta)) {
	$html .= "<option value='" . $resultado['importe_pesos'] . "'>" . $resultado['importe_pesos'] . "</option>";
}

echo strtoupper($html);
