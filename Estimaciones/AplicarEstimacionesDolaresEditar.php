<?php
include "../Conexion.php";
session_start();

$alias = $_SESSION['alias'];
$obra = $_SESSION['nombreObra'];
$idObra = $_SESSION['id_obra'];

$idEstimacionDolar = $_REQUEST['id'];

$SqlAplicarEstimacionDolar = "SELECT * FROM estimacion WHERE id_obra = '$idObra' and id_estimacion = $idEstimacionDolar";
$queryActividad = mysqli_query($conexion, $SqlAplicarEstimacionDolar);

$fila = mysqli_fetch_array($queryActividad);
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!--Boostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!--Iconosboostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Editar contratista </title>
</head>

<body>
    <div class="d-flex botones p-1">
        <div class="me-auto p-2">
            <a href="" class="btn btn-light btn-sm">Usuario:
                <strong>
                    <?php
                    echo " " . strtoupper($alias);
                    ?>
                </strong>
            </a>
            <a href="" class="btn btn-light btn-sm">Obra:

                <strong>
                    <?php
                    echo " " . strtoupper($obra);
                    ?>
                </strong>
            </a>
        </div>

        <div class="p-2">
            <a href="../Login/CerrarSesion.php" class="btn btn-outline-dark btn-sm">Cerrar sesion</a>
        </div>
    </div>
    <?php include "../Global/HeaderGlobal.php" ?>

    <div class="container p-3">

        <div class="card text-center">
            <div class="card-header">
                <div class="container text-center ">
                    <h2>Editar Estimacion Dolares</h2>
                </div>
            </div>
            <div class="card-body">
                <form action="EditarEstimacionDolaresBack.php" method="post">
                        <div class="container p-1 mb-1">
                            <?php if (isset($_GET['actividadSuccessEditar'])) { ?>
                                <div class="alert alert-success text-center" role="alert" style="background-color: green; color:aliceblue;">
                                    <?php echo $_GET['actividadSuccessEditar'] ?>
                                </div>
                            <?php
                            }
                            ?>
                            <?php if (isset($_GET['actividadErrorEditar'])) { ?>
                                <div class="alert alert-danger text-center" role="alert" style="background-color: red; color:aliceblue;">
                                    <?php echo $_GET['actividadErrorEditar'] ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="row">
                        <input class="form-control" type="hidden"  value="<?php echo $fila['id_estimacion'] ?>"  name="id_estimacion">
                        <div class="col">
                        <label for="">Num estimacion dolares</label>
                            <div class="input-group">
                                <input class="form-control text-center" type="text"  value="<?php echo $fila['numestimacion'] ?>" name="numestimacion">
                            </div>
                        </div>
                        <div class="col">
                            <label for="">Importe dolares</label>
                            <div class="input-group">
                                <input class="form-control text-center" type="text" value="<?php echo $fila['importe_dolares'] ?>"  name="importe_dolares">
                            </div>
                        </div>
                        <div class="col">
                        <label for="">Amortizacion dolares</label>
                            <div class="input-group">
                                <input class="form-control text-center" type="text" value="<?php echo $fila['amort_dolares'] ?>"  name="amort_dolares">
                            </div>
                        </div>
                        <div class="col">
                        <label for="">Fondo de garantia dolares</label>
                            <div class="input-group">
                                <input class="form-control text-center" type="tel" value="<?php echo $fila['fg_dolares'] ?>"  name="fg_dolares">
                            </div>
                        </div>
                        <div class="col">
                        <label for="">Factura dolares</label>
                            <div class="input-group">
                                <input class="form-control text-center" type="tel" value="<?php echo $fila['factura_dolares'] ?>"  name="factura_dolares">
                            </div>
                        </div>
                        <div class="p-3">
                            <button class="input-text btn btn-primary" type="submit" name="editarActividad">Editar estimacion</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>


</body>

</html>