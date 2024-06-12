<?php
session_start();
ob_start();
include "../Conexion.php";

$alias = $_SESSION['alias'];
$idClienteP = $_SESSION['id_clientep'];


function validacion($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$aliasUsuarioObra = validacion($_POST['aliasUsuarioObra']);
$nombreUsuario = validacion($_POST['nombreUsuario']);
$apellidosUsuario = validacion($_POST['apellidosUsuario']);
$telefonoUsuario = validacion($_POST['telefonoUsuario']);
$correoElectronicoUsuario = validacion($_POST['correoElectronicoUsuario']);
$claveUsuario = validacion($_POST['claveUsuario']);
$confirmarClaveUsuario = validacion($_POST['confirmarClaveUsuario']);
$tipoUsuarioObra = validacion($_POST['tipoUsuarioObra']);

if (empty($aliasUsuarioObra)) {
    header("Location: CreacionUsuarioObra.php?errorUsuario=El campo alias obra no puede estar vacio");
    exit();
} elseif (empty($nombreUsuario)) {
    header("Location: CreacionUsuarioObra.php?errorUsuario=El campo nombre usuario no puede estar vacio");
    exit();
} elseif (empty($apellidosUsuario)) {
    header("Location: CreacionUsuarioObra.php?errorUsuario=El campo apellido usuario no puede estar vacio");
    exit();
} elseif (empty($telefonoUsuario)) {
    header("Location: CreacionUsuarioObra.php?errorUsuario=El campo telefono no puede estar vacio");
    exit();
} elseif (empty($correoElectronicoUsuario)) {
    header("Location: CreacionUsuarioObra.php?errorUsuario=El campo correo electronico no puede estar vacio");
    exit();
} elseif (empty($claveUsuario)) {
    header("Location: CreacionUsuarioObra.php?errorUsuario=El campo clave no puede estar vacio");
    exit();
} elseif (empty($confirmarClaveUsuario)) {
    header("Location: CreacionUsuarioObra.php?errorUsuario=El campo confirmar clave no puede estar vacio");
    exit();
} elseif (empty($tipoUsuarioObra)) {
    header("Location: CreacionUsuarioObra.php?errorUsuario=El campo tipo usuario no puede estar vacio");
    exit();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {

    $resultadoCliente = mysqli_query($conexion, "SELECT * FROM usuario WHERE alias = '$aliasUsuarioObra'");
    $consulta = mysqli_fetch_array($resultadoCliente);
    if ($consulta == "") {
        $aliasUsuarioRepetido = '';
    }else {
        $aliasUsuarioRepetido = $consulta['alias'];
    }

    // echo $aliasUsuarioRepetido . $aliasUsuarioObra;
    // die();

    if ($aliasUsuarioRepetido == $aliasUsuarioObra) {
        header("Location: CreacionUsuarioObra.php?errorUsuario=El alias ya existe");
        exit();
    }
    if ($claveUsuario != $confirmarClaveUsuario) {
        header("Location: CreacionUsuarioObra.php?errorUsuario=Las claves no coinciden");
        exit();
    }

    $resultadoFecha = mysqli_query($conexion, "SELECT * FROM clientep WHERE id_clientep = '$idClienteP'");
    $consulta = mysqli_fetch_array($resultadoFecha);
    $fechaFinal = $consulta['fecha_final'];
    $numeroUsuarios = $consulta['numusuarios'];
    // $count = count($numeroUsuarios);
    $hoy = getdate();

    if ($fechaFinal > $hoy) {
        header("Location: CreacionUsuarioObra.php?errorUsuario=¡UPS! Al parecer no has pagado");
        exit();
    }

    $resultado1 = mysqli_query($conexion, "SELECT COUNT(numusuarios) AS numCount FROM clientep WHERE id_clientep = $idClienteP");
    $consulta1 = mysqli_fetch_array($resultado1);
    $numCount = $consulta1['numCount'];

    if ($numeroUsuarios < $numCount) {
        header("Location: CreacionUsuarioObra.php?errorUsuario=¡UPS! son demasiados usuarios");
        exit();
    }

    $insertar = "INSERT INTO usuario (alias, nombres, apellidos, telefono, mail, passw, id_rol, id_clientep, en_uso, pagaste) 
    VALUES('$aliasUsuarioObra','$nombreUsuario','$apellidosUsuario','$telefonoUsuario','$correoElectronicoUsuario','$claveUsuario','$tipoUsuarioObra','$idclienteObra', 0, 1)";
    $ejecutar = mysqli_query($conexion, $insertar);

    header('Location: CreacionUsuarioObra.php?successUsuario=Usuario Registrado Correctamente');
    exit();
}
