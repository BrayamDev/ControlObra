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

$nombreObra = validacion($_POST['nombreObra']);
$tipoCambio = validacion($_POST['tipoCambio']);
$idclienteObra = validacion($_POST['idclienteObra']);

if (empty($nombreObra)) {
      header("Location: AgregarObra.php?errorObra=El campo nombre obra no puede estar vacio");
      exit();
} elseif (empty($tipoCambio)) {
      header("Location: AgregarObra.php?errorObra=El campo tipo cambio no puede estar vacio");
      exit();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {

      $resultadoObra = mysqli_query($conexion, "SELECT * FROM obra WHERE id_clientep = '$idClienteP' AND nombre = '$nombreObra'");
      $consulta = mysqli_fetch_array($resultadoObra);
      $obraRepetida = $consulta['nombre'];
      // echo $obraRepetida . $nombreObra;
      // die();
      if ($obraRepetida == $nombreObra) {
            header("Location: AgregarObra.php?errorObra=La obra ya existe");
            exit();
      }

      $insertar = "INSERT INTO obra (nombre, id_clientep, tc, id_cliente) 
      VALUES('$nombreObra','$idClienteP','$tipoCambio','$idclienteObra')";
      $ejecutar = mysqli_query($conexion, $insertar);

      header('Location: ../Obra/AgregarObra.php?successObra=Obra Registrada Correctamente');
      exit();
}