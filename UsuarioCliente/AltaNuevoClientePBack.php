<?php
session_start();
ob_start();
include "../Conexion.php";

$alias = $_SESSION['alias'];

function validacion($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$aliasCliente = validacion($_POST['aliasCliente']);
$aliasUsuario = validacion($_POST['aliasUsuario']);
$nombresUsuario = validacion($_POST['nombresUsuario']);
$apellidosUsuario = validacion($_POST['apellidosUsuario']);
$correoElectronicoUsuario = validacion($_POST['correoElectronicoUsuario']);
$telefonoUsuario = validacion($_POST['telefonoUsuario']);
$claveUsuario = validacion($_POST['claveUsuario']);
$confirmarClaveUsuario = validacion($_POST['confirmarClaveUsuario']);
$numeroUsuarios = validacion($_POST['numeroUsuarios']);
$fechaInicio = validacion($_POST['fechaInicio']);
$fechaFinal = validacion($_POST['fechaFinal']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $resultadoUsuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE alias = '$aliasUsuario'");
    $consulta = mysqli_fetch_array($resultadoUsuario);
    
    if ($consulta == "") {
        $UsuarioRepetido = '';
    }else {
        $UsuarioRepetido = $consulta['alias'];
    }

    $resultadoClienteP = mysqli_query($conexion, "SELECT * FROM clientep WHERE alias = '$aliasCliente'");
    $consulta = mysqli_fetch_array($resultadoClienteP);

    if ($consulta == "") {
        $clienteRepetido = '';
    }else { 
        $clienteRepetido = $consulta['alias'];
    }
    // echo $clienteRepetido . $aliasCliente;
    // die();

    if ($UsuarioRepetido == $aliasUsuario) {
        header("Location: AltaNuevoClienteP.php?errorClienteP=El alias del usuario ya existe");
        exit();
    }

    if ($clienteRepetido == $aliasCliente) {
        header("Location: AltaNuevoClienteP.php?errorClienteP=El alias del cliente ya existe");
        exit();
    }

    if ($claveUsuario != $confirmarClaveUsuario) {
        header("Location: AltaNuevoClienteP.php?errorClienteP=Las claves no coinciden");
        exit();
    }
    $cadena_fecha_mysql = date('Y-m-d');
    $insertar = "INSERT INTO clientep (alias, nombres, apellidos, telefono, mail,numusuarios,pagaste, fecha_inicio, fecha_final, fecha_registro)
    VALUES('$aliasCliente','$nombresUsuario','$apellidosUsuario', $telefonoUsuario,'$correoElectronicoUsuario',$numeroUsuarios, 1 , '$fechaInicio', '$fechaFinal',  $cadena_fecha_mysql)";
    $ejecutar = mysqli_query($conexion, $insertar);


    $resultadoClienteP = mysqli_query($conexion, "SELECT * FROM clientep WHERE alias = '$aliasCliente'");
    $consulta = mysqli_fetch_array($resultadoClienteP);
    $idClienteP = $consulta['id_clientep'];


    $insertar1 = "INSERT INTO usuario (alias, nombres, apellidos, telefono, mail, passw, id_rol, id_clientep, en_uso, pagaste) 
    VALUES('$aliasUsuario','$nombresUsuario','$apellidosUsuario','$telefonoUsuario','$correoElectronicoUsuario','$claveUsuario',2,'$idClienteP',0, 1)";
    $ejecutar = mysqli_query($conexion, $insertar1);

    header('Location: AltaNuevoClienteP.php?successClienteP=Cliente Registrado Correctamente');
    exit();
}
