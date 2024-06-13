<?php
    session_start();

    include_once ("../Conexion.php");
    $id = $_GET['id'];

    $consulta = mysqli_query($conexion, "SELECT * FROM  estimacion WHERE id_estimacion = '.$id.'");
    $resultado = mysqli_fetch_array($consulta);

    $contrato = $resultado['id_contrato'];
    $_SESSION['contrato'] = $contrato;

    $SQL = "DELETE FROM estimacion WHERE id_estimacion = '$id'";
    $query = mysqli_query($conexion,$SQL);

    header("Location: AplicarEstimacionesdolares.php?estimacionError=Estimacion de dolares eliminada correctamente");
    exit();


