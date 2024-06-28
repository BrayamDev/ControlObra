<?php

session_start();
include "../Conexion.php";

$alias = $_SESSION['alias'];
$obra = $_SESSION['nombreObra'];
$idObra = $_SESSION['id_obra'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["btnInsertarEstimacionDolares1"])) {

    header("location: desplegarpresupuestoDolares.php");


  }}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["btnInsertarEstimacionDolares"])) {
    $idContratista = $_POST["cbx_concepto"];
    $importeDolaresContrato = $_POST["cbx_subconcepto"];

    
    $resultadoEstimacion = mysqli_query($conexion, "SELECT * FROM contrato WHERE id_obra = '$idObra' AND id_contratista = $idContratista AND importe_dolares = $importeDolaresContrato");
    $consulta = mysqli_fetch_array($resultadoEstimacion);
    $idContrato = $consulta['id_contrato'];
    $_SESSION['idcontrato'] = $idContrato;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
  <!--Iconosboostrap5-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!--Boostrap5-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <!--Iconosboostrap5-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!--cdn-->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
  <!--script dropdownlist desplegable-->
  <script language="javascript" src="../js/jquery-3.1.1.min.js"></script>
  <title>Importar Dolares Excel</title>
</head>

<?php

global $conn;

if (isset($_POST["enviar"])) {

  require_once("functionPresupuestoDolares.php");
  $archivo = $_FILES["archivo"]["name"];
  $archivo_copiado = $_FILES["archivo"]["tmp_name"];
  $archivo_guardado = "copia_" . $archivo;

  if (copy($archivo_copiado, $archivo_guardado)) {
    echo "se copió adecuadamente el archivo a la carpeta de trabajo";
  } else {
    echo "hubo un error";
  }

  if (file_exists($archivo_guardado)) {
    $fp = fopen($archivo_guardado, "r");


    $contador = 0;
    while ($datos = fgetcsv($fp, 0, ";")) {
      $contador++;
      $_SESSION['contador'] = $contador;

      $resultado = Insertar_datos($datos[0], $datos[1], $datos[2], $datos[3], $datos[4]);
      if ($resultado) {

        echo "se insertaron los datos correctamente";
      } else {
        echo "no se insertó";
      }
    }
  } else {
    echo "no existe archivo guardado";
  }

  $resultado = mysqli_query($conexion, "delete from estimaciondet where id_obra = $idObra and importe = 0");
}
?>

<body>
  <?php include("../Global/Header.php") ?>
  <div class="p-5">
    <div class="text-center bg-dark p-2 rounded text-white container">
      <h2>Importa Dolares presupuesto de excel</h2>
    </div>
  </div>
  <div class="card-body container">
    <form action="ImportarPresupuestoDolares.php" class="formulariocompleto" method="POST" enctype="multipart/form-data">
      <input type="file" name="archivo" class="form-control" type="file" />
      <div class="container text-center p-2">
        <input type = "submit" value = "Subir Archivo" class= "btn btn-dark p-2" name="enviar"/><br />
      </div>  
    </form>
  </div>

  <body>

</html>