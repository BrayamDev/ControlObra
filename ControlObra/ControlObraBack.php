<?php
session_start();
ob_start();

include "../Conexion.php";

$idObra = $_POST['id_obra'];
$_SESSION['id_obra'] = $idObra;

$resultadoObra = mysqli_query($conexion, "SELECT * FROM obra WHERE id_obra = '$idObra'");
$consulta = mysqli_fetch_array($resultadoObra);
$nombreObra = $consulta['nombre'];

$_SESSION['nombreObra'] = $nombreObra;

header("Location: ControlObra.php");

?>