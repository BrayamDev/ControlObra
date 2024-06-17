<?php
session_start();
ob_start();

$id_obra = $_SESSION['id_obra'];

include "../Conexion.php";

$id_concepto = $_POST['id_concepto'];
$consulta = mysqli_query($conexion, "select * from  subconcepto where id_obra= $id_obra  and id_concepto = '$id_concepto' order by subconcepto asc");

$html = "<option value='0'></option>";
while ($resultado = mysqli_fetch_array($consulta)) {
	$html .= "<option value='" . $resultado['id_subconcepto'] . "'>" . $resultado['subconcepto'] . "</option>";
}

echo strtoupper($html);
