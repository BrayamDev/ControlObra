<?php
session_start();

include "../Conexion.php";

$alias = $_SESSION['alias'];
$obra = $_SESSION['nombreObra'];
$idObra = $_SESSION['id_obra'];

$consulta = mysqli_query($conexion, "select * from  concepto");

while ($resultado = mysqli_fetch_array($consulta))


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Boostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!--Iconosboostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--cdn-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <script language="javascript" src="js/jquery-3.1.1.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Familias</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="imagenes/favicon.png">
    <script language="javascript" src="../js/jquery-3.1.1.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
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
        <div class="p-2">
            <a href="../ControlObra/ControlObra.php" class="btn btn-outline-dark btn-sm">Regresar presupuesto</a>
        </div>
        <div class="p-2">
            <a href="" class="btn btn-outline-dark btn-sm">Regresar contrato</a>
        </div>
    </div>
    <?php include "../Global/HeaderGlobal.php" ?>
    <div class="control__partida--links">
        <nav>
            <form action="../Materiales/MaterialesBack.php" method="POST">
                <div class="text-white " style="background-color: #3C4857;">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Nueva familia" name="nuevaFamilia">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <button class="form-control btn btn-primary" name="btnInsertarFamilia" type="submit">Insertar familia</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-white p-3" style="background-color: #3C4857;">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div>
                                        <div class="partidas--dropdown">
                                            <select class="form-control" name="id_familia" id="id_familia">
                                                <option value="#" selected="true" disabled>--Seleccione la Partida--</option>
                                                <?php
                                                $resultado = mysqli_query($conexion, "SELECT * FROM familia WHERE id_obra = $idObra");
                                                while ($consulta = mysqli_fetch_array($resultado)) {
                                                ?>
                                                    <option value="<?php echo $consulta['id_familia'] ?>">
                                                        <?php echo ucfirst($consulta['familia']); ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="campo-partidas">
                                        <input class="form-control" type="text" placeholder="material" name="NombreMaterial">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="campo-partidas">
                                        <input class="form-control" type="text" placeholder="unidad" name="unidad">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="campo-partidas">
                                        <input class="form-control" type="text" placeholder="Escribe tu importe en pesos" name="importePesos">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="campo-partidas">
                                        <input class="form-control" type="text" placeholder="Escribe tu importe en dolares" name="importeDolares">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="campo-partidas">
                                        <button class="form-control btn btn-primary" type="submit" name="btnInsertarMaterial">Insertar importe</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="container p-1 mb-1">
                <?php if (isset($_GET['familiasSuccess'])) { ?>
                    <div class="alert alert-success text-center" role="alert" style="background-color: green; color:aliceblue;">
                        <?php echo $_GET['familiasSuccess'] ?>

                    </div>
                <?php
                }
                ?>
                <?php if (isset($_GET['familiasError'])) { ?>
                    <div class="alert alert-danger text-center" role="alert" style="background-color: red; color:aliceblue;">
                        <?php echo $_GET['familiasError'] ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </nav>
    </div>
    <div class="text-center">
        <h2> Lista de Materiales</h2>
    </div>
    <div class="container">
        <table class="table table-striped" id="idTabla">
            <thead class="table-dark">
                <tr>
                    <th>Familial</th>
                    <th>Material</th>
                    <th>Unidad</th>
                    <th>Importe Pesos</th>
                    <th>Importe Dolares</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $consulta = mysqli_query($conexion, "SELECT * FROM  materiales WHERE id_obra = $idObra ORDER BY material and id_familia asc");
                while ($resultado = mysqli_fetch_array($consulta)) {
                    $material = $resultado['material'];

                    $consulta1 = mysqli_query($conexion, "SELECT * from  materiales WHERE id_obra = $idObra AND material = '$material'");
                    $resultado1 = mysqli_fetch_array($consulta1);
                    $idFamilia = $resultado1['id_familia'];

                    $consulta2 = mysqli_query($conexion, "SELECT * from  familia WHERE id_obra = $idObra AND id_familia = '$idFamilia'");
                    $resultado2 = mysqli_fetch_array($consulta2);
                    $Familia = $resultado2['familia'];
                ?>
                    <tr>
                        <td><?php echo $resultado2['familia']; ?></td>
                        <td><?php echo $resultado['material']; ?></td>
                        <td><?php echo $resultado['unidad']; ?></td>
                        <td><?php echo $resultado1['importe_pesos']; ?></td>
                        <td><?php echo $resultado1['importe_dolares']; ?></td>
                        <td>
                            <a href="" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                        </td>
                        <td class="table__data">
                            <a href="" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </td><?php    }  ?>
                    </tr>
            </tbody>
        </table>
    </div>


    <script src="../Js/jquery.js"></script>
    <!--Jquery-->
    <script src="../Js/jquery.js"></script>
    <script src="../Js/Script.js"></script>
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