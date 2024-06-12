<?php
session_start();

include "../Conexion.php";

$alias = $_SESSION['alias'];
$obra = $_SESSION['nombreObra'];
$idObra = $_SESSION['id_obra'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!--Iconosboostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--CSS ESTILOS-->
    <!--<link rel="stylesheet" href="../Css/style.css">-->
    <!--Boostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!--cdn-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <title>Actividades</title>
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
            <a href="../ControlObra/ControlObra.php" class="btn btn-outline-dark btn-sm">Presupuesto</a>
        </div>
    </div>
    <?php include "../Global/HeaderGlobal.php" ?>
    <div class="control__partida--links">
        <nav>
            <div class="text-white p-2" style="background-color: #3C4857;">
                <form action="ActividadesBack.php" method="POST">
                    <div class="container p-1 mb-1">
                        <?php if (isset($_GET['actividadesSuccess'])) { ?>
                            <div class="alert alert-success text-center" role="alert" style="background-color: green; color:aliceblue;">
                                <?php echo $_GET['actividadesSuccess'] ?>
                            </div>
                        <?php
                        }
                        ?>
                        <?php if (isset($_GET['actividadesError'])) { ?>
                            <div class="alert alert-danger text-center" role="alert" style="background-color: red; color:aliceblue;">
                                <?php echo $_GET['actividadesError'] ?>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for=""></label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="Actividad" name="actividad">
                                    </div>
                                </div>
                                <div class="col">
                                    <label>Fecha inicial</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="fechaInicial">
                                    </div>
                                </div>
                                <div class="col">
                                    <label>Fecha terminacion</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="fechaFinal">
                                    </div>
                                </div>
                                <div class="col">
                                    <label for=""></label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="Responsable de la actividad" name="responsableActividad">
                                    </div>
                                </div>
                                <div class="col">
                                    <label for=""></label>
                                    <div class="input-group">
                                        <button class="form-control btn btn-primary" type="submit" name="insertarActividad">Insertar datos</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </nav>
    </div>
    <div class="control__obra--botones p-3 text-center" style="cursor: pointer;">
       <a href="../FPDF/PruebaH.php" target="_blank"><i class="bi bi-file-earmark-pdf-fill btn btn-danger btn-sm">Imprimir no terminadas</i></a>
       <a href="../FPDF/PruebaV.php" target="_blank"><i class="bi bi-file-earmark-pdf-fill btn btn-danger btn-sm">Imprimir Todas las actividades </i></a>
    </div>
    <div class="contenedor__tabla container">
        <table class="table table-striped text-cente" id="idActividad">
            <thead class="table table-dark">
                <tr>
                    <th>Actividad</th>
                    <th>Fecha inicio</th>
                    <th>Fecha final</th>
                    <th>Responsable</th>
                    <th>Terminado</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlContratista = "SELECT * FROM actividad WHERE id_obra = '$idObra' AND Terminado = 0";
                $resultadoContratista = $conexion->query($sqlContratista);

                while ($Fila = $resultadoContratista->fetch_assoc()) {
                ?>
                    <tr>
                        <td class=""><?php echo $Fila['actividad'] ?></td>
                        <td class=""><?php echo $Fila['fechaInicial'] ?></td>
                        <td class=""><?php echo $Fila['fechaFinal'] ?></td>
                        <td class=""><?php echo $Fila['responsableActividad'] ?></td>
                        <td class="">
                            <a class="btn btn-dark" href="Terminado.php?id_actividad=<?php echo $Fila['id_actividad']?>">Terminado</a>
                        </td>
                        <td class="">
                            <a href="EditarActividadFront.php?id_actividad=<?php echo $Fila['id_actividad'] ?>" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!--Jquery-->
    <script src="../Js/jquery.js"></script>
    <script src="../Js/Script.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#idActividad').DataTable({

            });
        })
    </script>

    <!--boostrap5-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>