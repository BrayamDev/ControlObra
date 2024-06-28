<?php
session_start();


include "../Conexion.php";

$alias = $_SESSION['alias'];
$idObra = $_SESSION['id_obra'];
$nombreObra = $_SESSION['nombreObra'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["btnInsertarCuadrilla"])) {
        
        $nuevaCuadrilla= strtoupper($_POST["nuevaCuadrilla"]);
        

        $resultadoCuadrilla = mysqli_query($conexion, "SELECT * FROM cuadrilla WHERE cuadrilla = '$nuevaCuadrilla' AND id_obra = '$idObra'");
        $consulta = mysqli_fetch_array($resultadoCuadrilla);
        $nuevaCuadrillaRepetida = $consulta['cuadrilla'];
       

        if($nuevaCuadrilla != $nuevaCuadrillaRepetida){

        $insertar = "INSERT INTO  cuadrilla (cuadrilla, id_obra) VALUES ('$nuevaCuadrilla','$idObra')";
        $ejecutar = mysqli_query($conexion, $insertar);
        header("Location: Cuadrillas.php?cuadrillasSuccess=Cuadrilla insertado correctamente");
        exit();                                       }else{

            header("Location: Cuadrillas.php?cuadrillasError=Cuadrilla no insertado correctamente"); 
            exit();
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["btnInsertarOficio"])) {

        $nombreOficio = strtoupper($_POST["nuevoOficio"]);

        $resultadoOficio = mysqli_query($conexion, "SELECT * FROM oficio WHERE oficio = '$nombreOficio' AND id_obra = '$idObra'");
        $consulta = mysqli_fetch_array($resultadoOficio);
        $nuevoOficioRepetida = $consulta['oficio'];

        if($nombreOficio != $nuevoOficioRepetida){ 
            

        $insertar = "INSERT INTO oficio (oficio,id_obra) VALUES ('$nombreOficio',$idObra)";
        $ejecutar = mysqli_query($conexion, $insertar);
        header("Location: Cuadrillas.php?cuadrillasSuccess=Oficio insertado correctamente");
        exit();                                       }else{

            header("Location: Cuadrillas.php?cuadrillassError=Oficio no insertado"); 
            exit();
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["btnInsertar"])) {

        $idOficio = $_POST["id_oficio"];
        $idcuadrilla = $_POST["id_cuadrilla"];
        $importePesos = $_POST["importePesos"];
        $unidad = $_POST["unidad"];
        $Cantidad = $_POST["cantidad"];

        $resultadofasar = mysqli_query($conexion, "SELECT * FROM fasar");
        $consulta = mysqli_fetch_array($resultadofasar);
        $diasano = $consulta['diasano'];
        $diasaguinaldo = $consulta['diasaguinaldo'];
        $diasprimavacacional = $consulta['diasprimavacacional'];
        $domingos = $consulta['diasdomingo'];
        $vacaciones = $consulta['diasvacaciones'];
        $festivos = $consulta['diasfestivos'];
        $clima = $consulta['diasclima'];
        $costumbre = $consulta['diascostumbre'];
        $enfermedad = $consulta['diasenfermedad'];
        $sindicato = $consulta['diassindicales'];
        $uma = $consulta['uma'];
        $juma = 3 * $uma;
        $salmin = $consulta['salmin'];
        $pisn = $consulta['pisn'];
        
        $diaspagados = $diasano + $diasaguinaldo + $diasprimavacacional;
        $diastrabajados = $diasano - $vacaciones - $domingos - $festivos - $clima - $costumbre -$enfermedad - $sindicato ;
        $fcsb = $diaspagados/$diasano;
        $fsi = $diaspagados/$diastrabajados;
        $sbc = $fcsb * $importePesos;
        $sbcmjuma = $sbc - $juma;
        $imssexcedente = $sbcmjuma * .015;
        $cuotafija = .204 * $uma;
        $prestpensionado = .0143 * $sbc;
        $prestdinero = .0095 * $sbc;
        $invyvida = .0238 * $sbc;
       
        if($sbc == $salmin){$tasacesantia = .0315;}
        if($sbc > $salmin and $sbc < $uma * 1.5){$tasacesantia = .03413;}
        if($sbc > 1.5 * $uma and $sbc < $uma * 2){$tasacesantia = .04;}
        if($sbc > 2 * $uma and $sbc < $uma * 2.5){$tasacesantia = .04353;}
        if($sbc > 2.5 * $uma and $sbc < $uma * 3){$tasacesantia = .04588;}
        if($sbc > 3 * $uma and $sbc < $uma * 3.5){$tasacesantia = .04756;}
        if($sbc > 3.5 * $uma and $sbc < $uma * 4){$tasacesantia = .04882;}
        if($sbc > 4 * $uma ){$tasacesantia = .05331;}

        $cesantiaedadavanzada = $tasacesantia * $sbc;
        $riesgostrabajo = .0758875 * $sbc;
        $guarderia = .01 * $sbc;
        $sar = .02 *$sbc;

        $sumaprestacioneseimss = $imssexcedente + $cuotafija + $prestpensionado + $prestdinero + $invyvida + $riesgostrabajo + $guarderia + $cesantiaedadavanzada + $sar;
        $factorcuotapatronalimss = $sumaprestacioneseimss / $sbc;
        $infonavit = .05 *$sbc;
        $isn = $pisn * $sbc;
        $sumaprestaciones = $isn + $infonavit + $sumaprestacioneseimss;
        $factorprestacionessociales = $sumaprestaciones / $sbc;
        $fsr = $fsi + $factorprestacionessociales * $fsi;
        $salarioreal = $importePesos * $fsr;
        //echo $riesgostrabajo.$guarderia. $sar.$imssexcedente;
       // echo $sumaprestacioneseimss."hola".$sumaprestaciones;die();

        $sql = "UPDATE oficio
        SET importe_pesos = $importePesos, unidad = '$unidad' WHERE id_oficio = $idOficio";
        $query = mysqli_query($conexion, $sql);

        $resultadoOficio = mysqli_query($conexion, "SELECT * FROM cuadrilla WHERE id_cuadrilla = $idcuadrilla AND id_obra = '$idObra'");
        $consulta = mysqli_fetch_array($resultadoOficio);
        $idCuadrillaRepetida = $consulta['id_cuadrilla'];
        $Cuadrilla = $consulta['cuadrilla'];
      
        if($idcuadrilla != $idCuadrillaRepetida){ 

        $sql = "UPDATE cuadrilla
        SET id_oficio=$idOficio,importe_pesos = $importePesos,importe_pesosfsr = $salarioreal WHERE id_cuadrilla = $idcuadrilla AND id_oficio = $idOficio";
        $query = mysqli_query($conexion, $sql);

        if($idCuadrillaRepetida != $idcuadrilla){
        $insertar = "INSERT INTO cuadrillas (id_cuadrilla,id_obra,id_oficio,salariobase,salarioreal,unidad) VALUES ($idcuadrilla,$idObra,$idOficio,$importePesos,$salarioreal,'$unidad')";
        $ejecutar = mysqli_query($conexion, $insertar);
                                                }

        header("Location: Cuadrillas.php?cuadrillasSuccess=Oficio insertado correctamente");
        exit();                                       }else{

            $salarioreal = $salarioreal * $Cantidad;
        $sql = "UPDATE cuadrillas
        SET id_oficio = $idOficio,salariobase = $importePesos,salarioreal = $salarioreal, cantidad = $Cantidad WHERE id_oficio = $idOficio";
        $query = mysqli_query($conexion, $sql);   
            

            header("Location: Cuadrillas.php?cuadrillassError=Oficio no insertado"); 
            exit();
        }
    }
}
?>