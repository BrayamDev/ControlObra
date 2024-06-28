<?php
session_start();

include "../Conexion.php";

$alias = $_SESSION['alias'];
$obra = $_SESSION['nombreObra'];
$idObra = $_SESSION['id_obra'];
$_SESSION['pagina'] = 1;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["btnInsertarEstimacionDolares"])) {
        $idContratista = $_POST["cbx_concepto"];
        $importeDolaresContrato = $_POST["cbx_subconcepto"];
        $importeDolares = $_POST["importedolares"];if($importeDolares==""){$importeDolares=0;}
        $amortizacionDolares = $_POST["amortizaciondolares"];
        $fgDolares = $_POST["fgdolares"];
        $facturaDolares = $_POST["facturadolares"];

        $resultadoContrato = mysqli_query($conexion, "SELECT * FROM contrato WHERE id_contratista = '$idContratista' AND importe_dolares = '$importeDolaresContrato'  AND id_obra = '$idObra'");
        $consulta = mysqli_fetch_array($resultadoContrato);
        $Contrato = $consulta['id_contrato'];

        $_SESSION['contrato'] = $Contrato;


        $resultaNumEstimacion = mysqli_query($conexion, "SELECT MAX(numestimacion) AS numestimacion FROM estimacion  WHERE id_obra = $idObra and id_contrato = $Contrato ");
        $consulta1 = mysqli_fetch_array($resultaNumEstimacion);
        $numeroEstimacion = $consulta1['numestimacion'] + 1;

        $resultaNumEstimacion = mysqli_query($conexion, "SELECT SUM(importe_dolares) AS importedolares FROM estimacion  WHERE id_obra = $idObra and id_contrato = $Contrato ");
        $consulta1 = mysqli_fetch_array($resultaNumEstimacion);
        $SumaEstimaciones = $consulta1['importedolares'] + $importeDolares;

        if ($SumaEstimaciones > $importeDolaresContrato) {
            header("Location: AplicarEstimacionesdolares.php?estimacionError=Con esta estimacion se sobrepasa el importe del contrato");
            exit();
        }

      


        $insertar = "INSERT INTO estimacion (importe_dolares,amort_dolares,fg_dolares,id_obra,id_contrato,numestimacion,factura_dolares) VALUES('$importeDolares',$amortizacionDolares,'$fgDolares','$idObra','$Contrato','$numeroEstimacion','$facturaDolares')";
        $ejecutar = mysqli_query($conexion, $insertar);
        if ($importeDolares == ""){ header("Location: AplicarEstimacionesdolares.php");}else{
            header("Location: AplicarEstimacionesdolares.php?estimacionSuccess=Estimacion insertada correctamente");
            exit();
    }
}}
