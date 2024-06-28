<?php

session_start();
include "../Conexion.php";
$alias = $_SESSION['alias'];
$obra = $_SESSION['nombreObra'];
$idObra = $_SESSION['id_obra'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["btnInsertarEstimacionPesos"])) {
        $idContratista = $_POST["cbx_concepto"];
        $importePesosContrato = $_POST["cbx_subconcepto"];

  


$resultadoEstimacion = mysqli_query($conexion, "SELECT * FROM contrato WHERE id_obra = '$idObra' AND id_contratista = $idContratista AND importe_pesos = $importePesosContrato");
$consulta = mysqli_fetch_array($resultadoEstimacion);
$idContrato = $consulta['id_contrato'];
$_SESSION['idcontrato'] = $idContrato;


    }}
?>



<!DOCCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>importa</title>

            
    </head>



 <?php

  
global $conn;




       if(isset($_POST["enviar"])){
       
				  require_once("functionPresupuestoPesos.php");
					$archivo = $_FILES["archivo"]["name"];
					$archivo_copiado = $_FILES["archivo"]["tmp_name"];
					$archivo_guardado ="copia_".$archivo;
						
							if(copy($archivo_copiado,$archivo_guardado)){
							echo "se copió adecuadamente el archivo a la carpeta de trabajo";
							} else{
							echo "hubo un error";
							}

							if(file_exists($archivo_guardado)){
							$fp = fopen($archivo_guardado, "r");
              

              $contador=0;
							while ($datos=fgetcsv($fp,0,";")) {
              $contador++;
              $_SESSION['contador']=$contador;

						 $resultado = Insertar_datos($datos[0],$datos[1],$datos[2],$datos[3],$datos[4]);
								if($resultado){

									echo "se insertaron los datos correctamente";
								}
								else{
									echo "no se insertó";
								}
							}
						}
									else{
										echo "no existe archivo guardado";
		
							}

       $resultado = mysqli_query($conexion,"delete from estimaciondet where id_obra = $idObra and importe = 0"); 

             
}

					
?>


 <head>

    <meta charset="utf-8" />
    <title>Administrador</title>

           <!-- el meta viewport es diferente al original-->
          <meta name="viewport" content="width=device-width, maximum inicial-scale=1.0 minimum-scale=1.0">

          <!-- Latest compiled and minified CSS -->
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
          <link rel="stylesheet" type= "text/css" href="estilos.css">       
    </head>
 <body>
                <header>
                  <div class ="container">
                    <h3>CONTROL DE OBRA</h3> 
                    
                  <div>
                </header>
              <section class = "main row">
                  <p class="col-xs-4">
                  </p>
                  <aside class="col-xs-4">
                    <center>
                      <p><h3>
                       Importar Presupueso Pesos de Excel
                      </h3></p>
                    </center>
                  </aside>
              </section>
              <body>
          <!--formulario para solicitar carga excel -->
          <div class= "formulario">
            <form action="ImportarPresupuestoPesos.php" class ="formulariocompleto"  method="POST" enctype="multipart/form-data">
              <input type = "file" name ="archivo" class= "form-control"/>
              <input type = "submit" value = "Subir Archivo" class= "form-control" name="enviar"/><br />
              <center><input type="submit" name="insert" class="btn btn-warning" value="Continuar Proceso"><br/>
                  <br/><input type="submit" name="insert1" class="btn btn-warning" value="Regresar"><br />
               </center>
              
              
            </form>
          </div>
          <!--carga la misma pagina mandando la variable upload --> 

              </body>
</html>
<?php
    if(isset($_POST["insert"])){
      header("location:continuap.php");
}

    if(isset($_POST["insert1"])){
      header("location:menudesplegable.php");
}


?>
