<?php
include "../Conexion.php";
session_start();

$alias = $_SESSION['alias'];
$obra = $_SESSION['nombreObra'];
$idObra = $_SESSION['id_obra'];

$id_estimacion = $_REQUEST['id_estimacion'];

// echo $id_estimacion;
// die();

$numestimacion = $_POST["numestimacion"];
$importe_pesos = $_POST["importe_pesos"];
$amort_pesos = $_POST["amort_pesos"];
$fg_pesos = $_POST["fg_pesos"];
$factura_pesos = $_POST["factura_pesos"];

$resultadoEstimacionPesos = mysqli_query($conexion, "SELECT * FROM estimacion WHERE id_obra = '$idObra' AND id_estimacion = '$id_estimacion'");

$sql = "UPDATE estimacion 
    SET numestimacion='$numestimacion', 
    importe_pesos='$importe_pesos', 
    amort_pesos='$amort_pesos', 
    fg_pesos='$fg_pesos', 
    factura_pesos='$factura_pesos' WHERE id_obra = '$idObra' AND id_estimacion = '$id_estimacion'";
$query = mysqli_query($conexion, $sql);


header("Location: AplicarEstimaciones.php?actividadSuccessEditar=La estimacion editada correctamente");
exit();


?>