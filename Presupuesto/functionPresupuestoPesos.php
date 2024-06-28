<!DOCCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>importa</title>

            
    </head>

<?php
	
   


	function Insertar_datos($concepto,$unidad,$cantidad,$pu,$importe)
			{
	global $conn;
	include "../Conexion.php";

				$alias = $_SESSION['alias'];
				$obra = $_SESSION['nombreObra'];
				$idObra = $_SESSION['id_obra'];
			  	$idContrato = $_SESSION['idcontrato'];
			
			  $contador=$_SESSION['contador'];
			

			  	


            	$insertar = "INSERT INTO estimaciondet (concepto,unidad,cantidadpesos,pupesos,importe_pesos,id_obra,id_contrato,contador) 
				values('$concepto','$unidad','$cantidad','$pu','$importe','$idObra','$idContrato','$contador')";
 				 $ejecutar = mysqli_query($conexion,$insertar);
 				

				return $ejecutar;
			
}

?>