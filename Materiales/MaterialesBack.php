<?php
session_start();
ob_start();

include "../Conexion.php";

$alias = $_SESSION['alias'];
$idObra = $_SESSION['id_obra'];
$nombreObra = $_SESSION['nombreObra'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["btnInsertarFamilia"])) {

        
        $nuevaFamilia = $_POST["nuevaFamilia"];

        


        $resultadoFamilia = mysqli_query($conexion, "SELECT * FROM familia WHERE familia = '$nuevaFamilia' AND id_obra = '$idObra'");
        $consulta = mysqli_fetch_array($resultadoFamilia);
        $nuevaFamiliaRepetida = $consulta['familia'];

        if($nuevaFamilia !== $nuevaFamiliaRepetida){

        $insertar = "INSERT INTO familia (familia, id_obra) VALUES('$nuevaFamilia','$idObra')";
        $ejecutar = mysqli_query($conexion, $insertar);
        header("Location: Materiales.php?familiasSuccess=Familia insertado correctamente");
        exit();                                       }else{

            header("Location: Materiales.php?familiasError=Familia no insertado correctamente"); 
            exit();
        }

    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["btnInsertarMaterial"])) {

        
        $nombreMaterial = $_POST["NombreMaterial"];
        $idFamilia = $_POST["id_familia"];
        $importePesos = $_POST["importePesos"];if($importePesos == ""){$importePesos=0;}
        $importeDolares = $_POST["importeDolares"];if($importeDolares == ""){$importeDolares=0;}
        $unidad = $_POST["unidad"];

        $resultadoMaterial = mysqli_query($conexion, "SELECT * FROM materiales WHERE material = '$nombreMaterial' AND id_obra = '$idObra'");
        $consulta = mysqli_fetch_array($resultadoMaterial);
        $nuevomaterialRepetido = $consulta['material'];

        if($nombreMaterial != $nuevomaterialRepetido){


        $insertar = "INSERT INTO materiales (material,id_familia,id_obra,unidad,importe_pesos,importe_dolares) VALUES('$nombreMaterial',$idFamilia,'$idObra','$unidad',$importePesos,$importeDolares)";
        $ejecutar = mysqli_query($conexion, $insertar);}
        if($ejecutar){
        header("Location: Materiales.php?materialesSuccess=material insertado correctamente");
        exit();                                       
    }else{
            header("Location: Materiales.php?materialesError=Material no insertado"); 
            exit();
        }

    }
}
