<?php
session_start();

ob_start();
include "../Conexion.php";

$usuario = $_SESSION['alias'];
$clave = $_SESSION['passw'];

$resultado = mysqli_query($conexion, "UPDATE usuario SET en_uso = 0 WHERE alias = '$usuario' AND passw ='$clave'");
mysqli_close($conexion);    

// $_SESSION['id_obra'] = "";
// $_SESSION['obra'] = "";

header("Location: ../index.php");
