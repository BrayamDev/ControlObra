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
$importe_dolares = $_POST["importe_dolares"];
$amort_dolares = $_POST["amort_dolares"];
$fg_dolares = $_POST["fg_dolares"];
$factura_dolares = $_POST["factura_dolares"];

$resultadoEstimacionPesos = mysqli_query($conexion, "SELECT * FROM estimacion WHERE id_obra = '$idObra' AND id_estimacion = '$id_estimacion'");

$sql = "UPDATE estimacion 
    SET numestimacion='$numestimacion', 
    importe_dolares='$importe_dolares', 
    amort_dolares='$amort_dolares', 
    fg_dolares='$fg_dolares', 
    factura_dolares='$factura_dolares' WHERE id_obra = '$idObra' AND id_estimacion = '$id_estimacion'";
$query = mysqli_query($conexion, $sql);


header("Location: AplicarEstimaciones.php?actividadSuccessEditar=La estimacion de dolares editada correctamente");
exit();


?>