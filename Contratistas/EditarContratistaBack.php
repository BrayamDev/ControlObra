<?php
session_start();
ob_start();

include "../Conexion.php";

$alias = $_SESSION['alias'];
$idObra = $_SESSION['id_obra'];
$nombreObra = $_SESSION['nombreObra'];

$id_contratista = $_POST['id_contratista'];
$aliasContratista = $_POST["aliascontratista"];
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$telefono = $_POST["telefono"];
$correoElectronico = $_POST["correoElectronico"];


$resultadoContratista = mysqli_query($conexion, "SELECT * FROM contratista WHERE id_obra = '$idObra' 
AND aliascontratista = '$aliasContratista' AND nombres = '$nombres' AND apellidos = '$apellidos' AND telefono = '$telefono'
AND mail = '$correoElectronico'");

$consulta = mysqli_fetch_array($resultadoContratista);
$aliasContratistaRepetido = $consulta['aliascontratista'];

if ($aliasContratistaRepetido == $aliasContratista) {
    header("Location: EditarContratistaFront.php?contratistasErrorEditar=No has cambiado ningun dato");
    exit(); 
}else {
    $sql = "UPDATE contratista 
    SET aliasContratista='$aliasContratista', nombres='$nombres', apellidos='$apellidos', telefono='$telefono', mail='$correoElectronico' WHERE id_contratista = '$id_contratista'";

    $query = mysqli_query($conexion, $sql);

    if($query){
        header("Location: Contratistas.php?contratistasSuccess=El contratista editado correctamente");
        exit();
    }
}