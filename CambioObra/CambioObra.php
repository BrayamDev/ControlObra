<?php
session_start();

include "../Conexion.php";

$alias = $_SESSION['alias'];
$obra = $_SESSION['nombreObra'];
$idObra = $_SESSION['id_obra'];

$resultadoObra = mysqli_query($conexion, "SELECT * FROM obra WHERE  id_obra = '$idObra'");
$consulta = mysqli_fetch_array($resultadoObra);
$idClienteP = $consulta['id_clientep'];
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
    <!--Boostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script language="javascript" src="js/jquery-3.1.1.min.js"></script>
    <title>Cambiar obra</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="imagenes/favicon.png">
    <script language="javascript" src="../js/jquery-3.1.1.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
</head>

<body>
    <?php include("../Global/Header.php") ?>
    <div>
        <nav>
            <form method="POST">
                <div class="text-white " style="background-color: #3C4857">
                    <div class="container text-center">
                        <div class="p-3">
                            <div class="row">
                                <div class="col">
                                    <div>
                                        <select class="form-control" name="id_obra" id="id_obra">
                                            <option value="#" selected="true" disabled>--Seleccione la Obra--</option>
                                            <?php
                                            $resultado = mysqli_query($conexion, "SELECT * FROM obra WHERE id_clientep = $idClienteP");
                                            while ($consulta = mysqli_fetch_array($resultado)) {
                                            ?>
                                                <option value="<?php echo $consulta['id_obra'] ?>">
                                                    <?php echo ucfirst($consulta['nombre']); ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <button class="btn btn-primary" name="btnInsertarObra" type="submit">Escoger Obra</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </nav>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["btnInsertarObra"])) {
            $idObra = $_POST["id_obra"];

            $resultadoObra = mysqli_query($conexion, "SELECT * FROM obra WHERE  id_obra = '$idObra'");
            $consulta = mysqli_fetch_array($resultadoObra);
            $obra = $consulta['nombre'];

            $_SESSION['nombreObra'] = $obra;
            $_SESSION['id_obra'] = $idObra;
            
            echo '<script>
                window.location.href = "../ControlObra/ControlObra.php";
            </script>';
        }
    }
    ?>
    <!--Jquery-->
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#idTabla').DataTable({

            });
        })
    </script>
    <!--boostrap5-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>