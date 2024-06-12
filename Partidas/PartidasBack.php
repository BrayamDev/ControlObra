<?php
session_start();
ob_start();

include "../Conexion.php";

$alias = $_SESSION['alias'];
$idObra = $_SESSION['id_obra'];
$nombreObra = $_SESSION['nombreObra'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["btnInsertarPartida"])) {
        $nuevaPartida = strtoupper($_POST["nuevaPartida"]);
        $nuevaSubPartida = strtoupper($_POST["nuevaSubPartida"]);

        // var_dump($nuevaPartida . $idObra);

        $resultadoPartida = mysqli_query($conexion, "SELECT * FROM concepto WHERE concepto = '$nuevaPartida' AND id_obra = '$idObra'");
        $consulta = mysqli_fetch_array($resultadoPartida);
        $nuevaPartidaRepetida = $consulta['concepto'];
        if($nuevaPartida !== $nuevaPartidaRepetida){

        if ($consulta == "") {
            $idPartida = '';
        } else {
            $idPartida = $consulta['id_concepto'];
        }

        $insertar = "INSERT INTO concepto (concepto, id_obra) VALUES('$nuevaPartida','$idObra')";
        $ejecutar = mysqli_query($conexion, $insertar);
                                                    }
        $resultadoConcepto = mysqli_query($conexion, "SELECT * FROM concepto WHERE concepto = '$nuevaPartida' AND id_obra = '$idObra'");
        $consulta = mysqli_fetch_array($resultadoConcepto);

        $idPartida = $consulta['id_concepto'];

        $resultadoSubConcepto = mysqli_query($conexion, "SELECT * FROM subconcepto WHERE subconcepto = '$nuevaSubPartida' AND id_obra = '$idObra' AND id_concepto = '$idPartida'");
        $consulta = mysqli_fetch_array($resultadoSubConcepto);

        if ($consulta == "") {
            $SubConceptoRepetido = '';
        } else {
            $SubConceptoRepetido = $consulta['subconcepto'];
        }

        if ($SubConceptoRepetido == $nuevaPartida) {
            header("Location: Partidas.php?partidasError=La subpartida ya existe");
            exit();
        } else {
            $insertar = "INSERT INTO subconcepto (subconcepto, id_concepto, id_obra) VALUES('$nuevaSubPartida','$idPartida','$idObra')";
            $ejecutar = mysqli_query($conexion, $insertar);
            header("Location: Partidas.php?partidasSuccess=Sub Partida insertado correctamente");
            exit();
        }
    }

    if (isset($_POST["btnInsertarImporte"])) {
        $Partida =strtoupper( $_POST["cbx_concepto"]);
        $SubPartida = $_POST["cbx_subconcepto"];
        $ImportePesos = $_POST["importePesos"];
        $ImporteDolares = $_POST["importeDolares"];

        $insertar = "INSERT INTO presupuesto (importe_pesos, importe_dolares, id_concepto, id_subconcepto, id_obra) VALUES('$ImportePesos','$ImporteDolares','$Partida','$SubPartida','$idObra')";
        $ejecutar = mysqli_query($conexion, $insertar);
        header("Location: Partidas.php?partidasSuccess=Importe insertado correctamente");
        exit();
       




    }
}
