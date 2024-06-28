<?php
	 session_start();
       

			$id_obra = $_SESSION['id_obra'];
 			
			include "../Conexion.php";

			$id_subconcepto1 = $_POST['id_subconcepto'];
	
	 

			$consulta = mysqli_query($conexion,"SELECT * FROM  ssubconcepto WHERE id_obra= '$id_obra' AND id_subconcepto = '$id_subconcepto1' ");
	
	
	
	$html= "<option value='0'>Seleccionar 3er.Nivel</option>";
	while ($resultado = mysqli_fetch_array($consulta))

	{
		$html.= "<option value='".$resultado['id_ssubconcepto']."'>".strtoupper($resultado['ssubconcepto'])."</option>";
	}
	
	echo $html;
?>
