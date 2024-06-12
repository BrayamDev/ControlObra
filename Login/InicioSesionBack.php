<?php
// error_reporting(0);
session_start();
ob_start();

include "../Conexion.php";

//validar si contiene espacios,slashes,caracteres especiales
function validacion($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$usuario = validacion($_POST['usuario']);
$clave = validacion($_POST['clave']);

if (empty($usuario)) {
    header("Location: ../index.php?error=El usuario no puede estar vacio");
    exit();
} elseif (empty($clave)) {
    header("Location: ../index.php?error=La clave no puede estar vacia");
    exit();
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_REQUEST['usuario'];
    $clave = $_REQUEST['clave'];
    
    $_SESSION['alias'] = $usuario;
    $_SESSION['passw']= $clave;
    $_SESSION['en_uso'] = $en_usoBD;

    $resultados1 = mysqli_query($conexion, "SELECT * FROM usuario WHERE alias = '$usuario' AND passw = '$clave'");
    $consulta = mysqli_fetch_array($resultados1);

    $claveBD = $consulta['passw'];
    $usuarioBD = $consulta['alias'];
    $en_usoBD = $consulta['en_uso'];
    $numclientep = $consulta['id_clientep'];
    $tipo = $consulta['id_rol'];
    $_SESSION['tipo_usuario'] = $tipo;
    

    $resultado = mysqli_query($conexion, "UPDATE usuario SET en_uso = 1 WHERE alias = '$usuario' AND passw ='$clave'");
    mysqli_close($conexion);

    if ($en_usoBD == 1) {    
        header("Location: ../index.php");
        exit();
    } else {
        if ($claveBD == $clave and $usuarioBD == $usuario) {
            if ($usuarioBD == 'FEDEX') {
                header('Location:../UsuarioCliente/AltaNuevoClienteP.php');
            } else {
                header("Location: ../Obra/AccesoObra.php");
                exit();
            }
        } else {
            header("Location: ../index.php?error=El usuario o la clave son incorrectas");
            exit();
        }
    }
}
