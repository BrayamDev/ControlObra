<?php
session_start();
ob_start();

include "../Conexion.php";

$alias = $_SESSION['alias'];
$idObra = $_SESSION['id_obra'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["insertarContratista"])) {

        $aliasContratista = strtoupper($_POST["aliascontratista"]);
        $nombres = $_POST["nombres"];
        $apellidos = $_POST["apellidos"];
        $telefono = $_POST["telefono"];
        $correoElectronico = $_POST["correoElectronico"];

        $resultadoContratista = mysqli_query($conexion, "SELECT * FROM contratista WHERE id_obra = '$idObra' AND aliascontratista = '$aliasContratista'");
        $consulta = mysqli_fetch_array($resultadoContratista);
        $aliasContratistaRepetido = $consulta['aliascontratista'];

        if ($aliasContratistaRepetido == $aliasContratista) {
            header("Location: Contratistas.php?contratistasError=El contratista ya existe");
            exit();
        } else {
            $insertar = "INSERT INTO contratista (aliascontratista,nombres,apellidos,telefono,mail,id_obra) VALUES('$aliasContratista','$nombres','$apellidos','$telefono','$correoElectronico','$idObra')";
            $ejecutar = mysqli_query($conexion, $insertar);
            header("Location: Contratistas.php?contratistasSuccess=Contratista insertado correctamente");
            exit();
        }
    }
}
