<?php
session_start();

include "../Conexion.php";

$alias = $_SESSION['alias'];
$idObra = $_SESSION['id_obra'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["insertarActividad"])) {

        $actividad = $_POST["actividad"];
        $fechaInicial = $_POST["fechaInicial"];
        $fechaFinal = $_POST["fechaFinal"];
        $responsableActividad = $_POST["responsableActividad"];  

        $insertar = "INSERT INTO actividad (actividad,fechaInicial,fechaFinal,responsableActividad, id_obra, fechaRegistro) VALUES('$actividad','$fechaInicial','$fechaFinal','$responsableActividad', '$idObra', NOW())";
        $ejecutar = mysqli_query($conexion, $insertar);
        header("Location: Actividades.php?actividadesSuccess=Actividad insertada correctamente");
        exit();
    }
}
