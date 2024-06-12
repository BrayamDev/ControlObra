<?php
session_start();

include "../Conexion.php";

$alias = $_SESSION['alias'];
$idObra = $_SESSION['id_obra'];

$id_actividad = $_REQUEST['id_actividad'];

$terminado = "UPDATE actividad 
    SET terminado = 1 WHERE id_actividad = '$id_actividad' AND id_obra = '$idObra'";
$query = mysqli_query($conexion, $terminado);

header("Location: Actividades.php?actividadesSuccess=Actividad terminada");
exit();