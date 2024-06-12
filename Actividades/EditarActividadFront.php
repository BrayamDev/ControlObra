<?php
include "../Conexion.php";
session_start();

$alias = $_SESSION['alias'];
$obra = $_SESSION['nombreObra'];
$idObra = $_SESSION['id_obra'];

$idActividad = $_REQUEST['id_actividad'];

$SqlActividad = "SELECT * FROM actividad WHERE id_actividad = '$idActividad'";
$queryActividad = mysqli_query($conexion, $SqlActividad);

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
                    <h2>Editar Contratista</h2>
                </div>
            </div>
            <div class="card-body">
                <form action="EditarActividadBack.php" method="post">
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
                        <input class="form-control" type="hidden"  value="<?php echo $fila['id_actividad'] ?>" placeholder="Alias Contratista" name="id_contratista">
                        <div class="col">
                            <div class="input-group">
                                <input class="form-control" type="text"  value="<?php echo $fila['actividad'] ?>" name="actividad">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <input class="form-control" type="text" value="<?php echo $fila['fechaInicial'] ?>"  name="fechaInicial">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <input class="form-control" type="text" value="<?php echo $fila['fechaFinal'] ?>"  name="fechaFinal">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <input class="form-control" type="tel" value="<?php echo $fila['responsableActividad'] ?>"  name="responsableActividad">
                            </div>
                        </div>
                        <div class="p-3">
                            <button class="input-text btn btn-primary" type="submit" name="editarActividad">Editar Actividad</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>


</body>

</html>