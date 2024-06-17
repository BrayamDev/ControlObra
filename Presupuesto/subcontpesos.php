<?php
session_start();
ob_start();

$id_obra = $_SESSION['id_obra'];

include "../Conexion.php";

$id_contratista = $_POST['id_contratista'];
$consulta = mysqli_query($conexion, "select * from  contrato where id_obra= $id_obra  and id_contratista = '$id_contratista' order by importe_pesos asc");

$html = "<option value='0'></option>";
while ($resultado = mysqli_fetch_array($consulta)) {
	$html .= "<option value='" . $resultado['id_contratista'] . "'>" . $resultado['importe_pesos'] . "</option>";
}

echo strtoupper($html);
