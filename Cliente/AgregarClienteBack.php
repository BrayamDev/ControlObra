<?php

include "../Conexion.php";
session_start();
ob_start();
$alias = $_SESSION['alias'];

$resultadoUsuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE alias = '$alias'");
$consulta = mysqli_fetch_array($resultadoUsuario);

$idClienteP = $consulta['id_clientep'];

//validar si contiene espacios,slashes,caracteres especiales
function validacion($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$aliasCliente = validacion($_POST['aliasCliente']);
$nombreCliente = validacion($_POST['nombreCliente']);
$apellidosCliente = validacion($_POST['apellidosCliente']);
$emailCliente = validacion($_POST['emailCliente']);
$telefonoCliente = validacion($_POST['telefonoCliente']);

if (empty($aliasCliente)) {
    header("Location: AgregarCliente.php?errorCliente=El campo alias no puede estar vacio");
    exit();
} elseif (empty($nombreCliente)) {
    header("Location: AgregarCliente.php?errorCliente=El campo nombre no puede estar vacio");
    exit();
} elseif (empty($apellidosCliente)) {
    header("Location: AgregarCliente.php?errorCliente=El campo apellidos no puede estar vacio");
    exit();
} elseif (empty($emailCliente)) {
    header("Location: AgregarCliente.php?errorCliente=El campo email no puede estar vacio");
    exit();
} elseif (empty($telefonoCliente)) {
    header("Location: AgregarCliente.php?errorCliente=El campo telefono no puede estar vacio");
    exit();
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // $resultados = mysqli_query($conexion, "SELECT * FROM cliente WHERE alias = '$aliasCliente'");
    // $consulta = mysqli_fetch_array($resultados);

    // if ($alias == $alias1) {
    //     header('Location: ../Obra/AccesoObra.php');
    // } else {

    //     $resultadoCliente = mysqli_query($conexion, "SELECT * FROM cliente WHERE alias = '$aliasCliente'");
    //     $consulta = mysqli_fetch_array($resultadoCliente);
    //     $aliasClienteRepetido = $consulta['alias'];

    //     if ($aliasClienteRepetido == $aliasCliente) {
    //         header("Location: AgregarCliente.php?errorCliente=El campo alias ya existe");
    //         exit();
    //     }
    //     $insertar = "INSERT INTO cliente (alias, nombres, apellidos,telefono, mail, id_clientep) 
    //         VALUES('$aliasCliente','$nombreCliente','$apellidosCliente','$telefonoCliente','$emailCliente','$idClienteP')";
    //     $ejecutar = mysqli_query($conexion, $insertar);
    //     header('Location: ../Obra/AccesoObra.php');
    // }

    $resultados = mysqli_query($conexion, "SELECT * FROM cliente WHERE alias = '$aliasCliente' and id_clientep = $idClienteP");
    $consulta = mysqli_fetch_array($resultados);
    $aliasClienteRepetido = $consulta['alias'];
    if ($aliasClienteRepetido !== $aliasCliente) {

        $insertar = "INSERT INTO cliente (alias, nombres, apellidos,telefono, mail, id_clientep) 
        VALUES('$aliasCliente','$nombreCliente','$apellidosCliente','$telefonoCliente','$emailCliente','$idClienteP')";
        $ejecutar = mysqli_query($conexion, $insertar);

        header('Location: ../Obra/AccesoObra.php?successCliente=Cliente Agregado Correctamente');
    } else {

        header('Location: ../Obra/AccesoObra.php?errorCliente=El campo alias ya existe');
    }
}
