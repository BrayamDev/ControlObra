<?php
session_start();

include "../Conexion.php";

$alias = $_SESSION['alias'];
$obra = $_SESSION['nombreObra'];
$idObra = $_SESSION['id_obra'];



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["btnInsertarContrato"])) {
        $idConcepto = $_POST["cbx_concepto"];
        $idSubconcepto = $_POST["cbx_subconcepto"];
        $importePesos = $_POST["importepesos"];
        $importeDolares = $_POST["importedolares"];
        $anticipoPesos = $_POST["anticipopesos"];
        $anticipoDolares = $_POST["anticipodolares"];
        $fgPesos = $_POST["fgpesos"];
        $fgDolares = $_POST["fgdolares"];
        $facturaPesos = $_POST["facturapesos"];
        $facturaDolares = $_POST["facturadolares"];
        $idContratista = $_POST["id_contratista"];

        $resultadoContrato = mysqli_query($conexion, "SELECT * FROM contrato WHERE id_concepto = '$idConcepto' AND id_subconcepto = 'idSubconcepto' AND  id_contratista = '$idContratista' AND id_obra = '$idObra'");
        $consulta = mysqli_fetch_array($resultadoContrato);
        $ContratoRepetido = $consulta['id_contrato'];

        $resultadosumappartida = mysqli_query($conexion, "SELECT SUM(importe_pesos) AS sumapesos FROM presupuesto  WHERE id_obra = $idObra AND id_concepto = $idConcepto AND contratado = 0");
        $consulta1 = mysqli_fetch_array($resultadosumappartida);
        $sumaPesosPartida = $consulta1['sumapesos'];

        $resultadosumadpartida = mysqli_query($conexion, "SELECT SUM(importe_dolares) AS sumapesos FROM presupuesto  WHERE id_obra = $idObra AND id_concepto = $idConcepto AND contratado = 0");
        $consulta1 = mysqli_fetch_array($resultadosumadpartida);
        $sumaDolaresPartida = $consulta1['sumapesos'];

        $resultadosumapContrato = mysqli_query($conexion, "SELECT SUM(importe_pesos) AS sumapesos FROM contrato  WHERE id_obra = $idObra AND id_concepto = $idConcepto");
        $consulta1 = mysqli_fetch_array($resultadosumapContrato);
        $sumaPesosPContrato = $consulta1['sumapesos'] + $importePesos;

        $resultadosumadContrato = mysqli_query($conexion, "SELECT SUM(importe_dolares) AS sumadolares FROM contrato  WHERE id_obra = $idObra AND id_concepto = $idConcepto");
        $consulta1 = mysqli_fetch_array($resultadosumadContrato);
        $sumaDolaresContrato = $consulta1['sumadolares'] + $importeDolares;

        $resultadotipocambio = mysqli_query($conexion, "SELECT * FROM obra WHERE id_obra = '$idObra'");
        $consulta1 = mysqli_fetch_array($resultadotipocambio);
        $tc = $consulta1['tc'];

       

        $SumaPartidatotal = $sumaPesosPartida +$sumaDolaresPartida*$tc;
        $SumaContratoTotal =  $sumaPesosPContrato + $sumaDolaresContrato*$tc;



        if($SumaPartidatotal <  $SumaContratoTotal){
            
        header("Location: Contratos.php?contratoError=contrato no se inserto correctamente");exit();
                                                }else{

            

       
        $insertar = "INSERT INTO contrato (importe_pesos,importe_dolares,anticipo_pesos,anticipo_dolares,fgpesos,fgdolares,id_concepto,id_subconcepto,id_obra,id_contratista) VALUES('$importePesos',$importeDolares,'$anticipoPesos','$anticipoDolares','$fgPesos',' $fgDolares','$idConcepto',' $idSubconcepto','$idObra',' $idContratista ')";
        $ejecutar = mysqli_query($conexion, $insertar);
        header("Location: Contratos.php?contratoSuccess=contrato insertado correctamente");
        exit();          

        
                                                 }

       
    }}
     
?>