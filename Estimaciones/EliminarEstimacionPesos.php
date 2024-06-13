<?php
    session_start();

    $alias = $_SESSION['alias'];
    $obra = $_SESSION['nombreObra'];
    $idObra = $_SESSION['id_obra'];

    include "../Conexion.php";
    $id = $_GET['id'];

    $resultadocontrato = mysqli_query($conexion, "SELECT * FROM  estimacion WHERE id_obra = '$idObra' and id_estimacion = '$id'");
    $resultado = mysqli_fetch_array($resultadocontrato);
    $contrato = $resultado['id_contrato'];
    $_SESSION['contrato'] = $contrato;

    $SQL = "DELETE FROM estimacion WHERE id_estimacion = '$id'";
    $query = mysqli_query($conexion,$SQL);

    header("Location: AplicarEstimaciones.php?estimacionError=Estimacion de pesos eliminada correctamente");
    exit();

