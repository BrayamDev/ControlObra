<?php
session_start();

include "../Conexion.php";

$alias = $_SESSION['alias'];
$obra = $_SESSION['nombreObra'];
$idObra = $_SESSION['id_obra'];
$_SESSION['pagina'] = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["ImportarEstimacion"])) {
       header("Location:../Presupuesto/importarPresupuestoPesos.php");

    }}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["btnInsertarEstimacionPesos"])) {
        $idContratista = $_POST["cbx_concepto"];
        $importePesosContrato = $_POST["cbx_subconcepto"];
        $importePesos = $_POST["importedolares"];if($importePesos==""){$importePesos=0;}
        $amortizacionPesos = $_POST["amortizacionpesos"];
        $fgPesos = $_POST["fgpesos"];
        $facturaPesos = $_POST["facturapesos"];

        $resultadoContrato = mysqli_query($conexion, "SELECT * FROM contrato WHERE id_contratista = '$idContratista' AND importe_pesos = '$importePesosContrato'  AND id_obra = '$idObra'");
        $consulta = mysqli_fetch_array($resultadoContrato);
        $Contrato = $consulta['id_contrato'];

        $_SESSION['contrato'] = $Contrato;


        $resultaNumEstimacion = mysqli_query($conexion, "SELECT MAX(numestimacion) AS numestimacion FROM estimacion  WHERE id_obra = $idObra and id_contrato = $Contrato ");
        $consulta1 = mysqli_fetch_array($resultaNumEstimacion);
        $numeroEstimacion = $consulta1['numestimacion'] + 1;

        $resultaNumEstimacion = mysqli_query($conexion, "SELECT SUM(importe_pesos) AS importepesos FROM estimacion  WHERE id_obra = $idObra and id_contrato = $Contrato ");
        $consulta1 = mysqli_fetch_array($resultaNumEstimacion);
        $SumaEstimaciones = $consulta1['importepesos'] + $importePesos;

        if ($SumaEstimaciones > $importePesosContrato) {
            header("Location: AplicarEstimacionesdolares.php?estimacionError=Con esta estimacion se sobrepasa el importe del contrato");
            exit();
        }

      


        $insertar = "INSERT INTO estimacion (importe_pesos,amort_pesos,fg_pesos,id_obra,id_contrato,numestimacion,fact_pesos) VALUES('$importePesos',$amortizacionPesos,'$fgPesos','$idObra','$Contrato','$numeroEstimacion','$facturaPesos')";
        $ejecutar = mysqli_query($conexion, $insertar);
        if ($importeDolares == ""){ header("Location: AplicarEstimaciones.php");}else{
            header("Location: AplicarEstimaciones.php?estimacionSuccess=Estimacion insertada correctamente");
            exit();
    }
}}
