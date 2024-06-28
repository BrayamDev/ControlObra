<?php
session_start();
ob_start();

include "../Conexion.php";

$alias = $_SESSION['alias'];
$idObra = $_SESSION['id_obra'];
$nombreObra = $_SESSION['nombreObra'];

$id_actividad = $_POST['id_contratista'];
$actividad = $_POST["actividad"];
$fechaInicial = $_POST["fechaInicial"];
$fechaFinal = $_POST["fechaFinal"];
$responsableActividad = $_POST["responsableActividad"];

$resultadoActividad = mysqli_query($conexion, "SELECT * FROM actividad WHERE id_obra = '$idObra' 
AND actividad = '$actividad' AND fechaInicial = '$fechaInicial' AND fechaFinal = '$fechaFinal' 
AND responsableActividad = '$responsableActividad'");

$sql = "UPDATE actividad 
    SET actividad='$actividad', fechaInicial='$fechaInicial', fechaFinal='$fechaFinal', responsableActividad='$responsableActividad' WHERE id_actividad = '$id_actividad'";
$query = mysqli_query($conexion, $sql);

if ($query) {
    header("Location: Actividades.php?actividadesSuccess=La actividad editada correctamente");
    exit();
}
