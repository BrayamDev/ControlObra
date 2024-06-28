<?php
	 session_start();
           

			$idObra = $_SESSION['id_obra'];

 			include "../Conexion.php";


	
	$id_concepto = $_POST['id_concepto'];
	
	 

	$consulta = mysqli_query($conexion,"SELECT * FROM subconcepto WHERE id_obra= $idObra AND id_concepto = '$id_concepto' ");
	
	
	
	$html= "<option value='0'>Seleccionar 2do. Nivel</option>";
	while($resultado = mysqli_fetch_array($consulta))

	{
		$html.= "<option value='".$resultado['id_subconcepto']."'>".strtoupper($resultado['subconcepto'])."</option>";
	}

	echo $html;
?>
