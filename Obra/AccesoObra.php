<?php
include '../Conexion.php';

session_start();
$alias = $_SESSION['alias'];

$resultadoUsuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE alias = '$alias'");
$consulta = mysqli_fetch_array($resultadoUsuario);

$idClienteP = $consulta['id_clientep'];

$_SESSION['id_clientep'] = $idClienteP;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!--CSS ESTILOS-->
    <!-- <link rel="stylesheet" href="../Css/style.css"> -->
    <!--Boostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!--Iconosboostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Acceso a obra</title>
</head>

<body>
    <div class="d-flex botones p-1">
        <div class="me-auto p-2">
            <a href="" class="btn btn-light btn-sm">Usuario:
                <strong>
                    <?php
                    include "../Conexion.php";
                    echo " " . $alias;
                    ?>
                </strong>
            </a>
        </div>
        <div class="p-2">
            <a href="../Login/CerrarSesion.php" class="btn btn-outline-dark btn-sm">Cerrar sesion</a>
        </div>
    </div>

    <div class="p-2 text-center text-white display-1 text-uppercase" style="background-color: #3C4857;">
        <h1>Control de obras</h1>
    </div>

    <div class="container p-5">
        <div class="card text-center">
            <div class="card-header">
                <h2>Acceso a obra</h2>
            </div>
            <div class="container p-1 mb-1">
                <?php if (isset($_GET['errorCliente'])) { ?>
                    <div class="alert alert-danger text-center" role="alert" style="background-color: red; color:aliceblue;">
                        <?php echo $_GET['errorCliente'] ?>
                    </div>
                <?php
                }
                ?>
                <?php if (isset($_GET['successCliente'])) { ?>
                    <div class="alert alert-success text-center" role="alert" style="background-color: green; color:aliceblue;">
                        <?php echo $_GET['successCliente'] ?>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="card-body">
                <form method="POST" action="../ControlObra/ControlObraBack.php">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="partidas--dropdown">
                                    <select class="form-control" name='id_obra'>
                                        <option value="#" selected="true" disabled>--Seleccione la Obra--</option>
                                        <?php
                                        $idClienteP = $_SESSION['id_clientep'];
                                        $resultado = mysqli_query($conexion, "SELECT * FROM obra WHERE id_clientep = $idClienteP");
                                        while ($consulta = mysqli_fetch_array($resultado)) {
                                        ?>
                                            <option value="<?php echo $consulta['id_obra']?>">
                                                <?php echo ucfirst($consulta['nombre']); ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="campo-partidas">
                                    <button href="../ControlObra/ControlObra.php" class="form-control btn btn-primary" name="accederObra" type="submit">Acceder a la obra</button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="campo-partidas">
                                    <a href="../Cliente/AgregarCliente.php" class="form-control btn btn-primary" type="submit">Agregar cliente</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="campo-partidas">
                                    <a href="../Obra/AgregarObra.php" class="form-control btn btn-primary" type="submit">Agregar obra</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="campo-partidas">
                                    <a href="../Obra/CreacionUsuarioObra.php" class="form-control btn btn-primary" type="submit">Agregar usuario</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
// }else {
//     header("Location: ../index.php?error=No tiene autorizacion de acceso");
//     exit();
// }
?>