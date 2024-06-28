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
    <!--Boostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!--Iconosboostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--cdn-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <title>Precios Unitarios</title>
</head>

<body>
    <?php include("../Global/Header.php") ?>
    <div>
        <nav>
            <div class="text-white p-3" style="background-color: #3C4857;">
                <div class="container">
                    <form action="puback.php" method="post">
                        <div class="container p-1 mb-1">
                            <?php if (isset($_GET['materialSuccess'])) { ?>
                                <div class="alert alert-success text-center" role="alert" style="background-color: green; color:aliceblue;">
                                    <?php echo $_GET['materialSuccess'] ?>
                                </div>
                            <?php
                            }
                            ?>
                            <?php if (isset($_GET['materialError'])) { ?>
                                <div class="alert alert-danger text-center" role="alert" style="background-color: red; color:aliceblue;">
                                    <?php echo $_GET['materialError'] ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="input-group">
                                <select class="form-control" name="id_concepto" id="id_concepto">
                                        <option value="#" selected="true" disabled>--Seleccione el Concepto--</option>
                                        <?php
                                        $resultado = mysqli_query($conexion, "SELECT * FROM conceptos WHERE id_obra = $idObra");
                                        while ($consulta = mysqli_fetch_array($resultado)) {
                                        ?>
                                            <option value="<?php echo $consulta['id_concepto'] ?>">
                                                <?php echo ucfirst($consulta['concepto']); ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <button class="input-text btn btn-primary" type="submit" name="btninsertarMat">Insertar Material</button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <button class="input-text btn btn-primary" type="submit" name="btninsertarMO">Insertar Mano de Obra</button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <button class="input-text btn btn-primary" type="submit" name="btninsertarMaq">Insertar Maquinaria</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </div>
    <br>
    <div class="contenedor__tabla container">
        <table class="table table-striped text-center" id="idContratista">
            <thead class="table table-dark">
                <tr>
                    <th class="">Alias Contratista</th>
                    <th class="">Nombres</th>
                    <th class="">Apellidos</th>
                    <th class="">Telefono</th>
                    <th class="">Correo electronico</th>
                    <th class="">Editar</th>
                    <th class="">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlContratista = "SELECT * FROM contratista WHERE id_obra = '$idObra'";
                $resultadoContratista = $conexion->query($sqlContratista);

                while ($Fila = $resultadoContratista->fetch_assoc()) {
                ?>
                    <tr>
                        <td class=""><?php echo $Fila['aliascontratista'] ?></td>
                        <td class=""><?php echo $Fila['nombres'] ?></td>
                        <td class=""><?php echo $Fila['apellidos'] ?></td>
                        <td class=""><?php echo $Fila['telefono'] ?></td>
                        <td class=""><?php echo $Fila['mail'] ?></td>
                        <td class="">
                            <a href="EditarContratistaFront.php?id_contratista=<?php echo $Fila['id_contratista'] ?>" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                        </td>
                        <td class="table__data">
                            <a href="EliminarContratista.php?id_contratista=<?php echo $Fila['id_contratista'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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
            $('#idTabla').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/2.0.8/i18n/es-MX.json',
                },
                pageLength: 5,
                lengthMenu: [
                    [5, 10, 20, -1],
                    [5, 10, 20, 'Todos']
                ]
            });
        })
    </script>
    <!--boostrap5-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>