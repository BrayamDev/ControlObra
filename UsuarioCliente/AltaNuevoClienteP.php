<?php
session_start();
$alias = $_SESSION['alias'];
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
    <title>Alta nuevo usuario</title>
</head>

<body>
    <div class="d-flex botones p-1">
        <div class="me-auto p-2">
            <a href="" class="btn btn-light btn-sm">Usuario: <strong>
                    <?php
                    echo " " . $alias; ?>
                </strong></a>
        </div>
        <div class="p-2">
            <a href="../Login/CerrarSesion.php" class="btn btn-outline-dark btn-sm">Cerrar sesion</a>
        </div>
    </div>
    <div class="text-white text-center p-2" style="background-color: #3C4857;">
        <header>
            <h2 class="text-uppercase">Control de obras</h2>
        </header>
    </div>

    <div class="container p-2">
        <div class="card">
            <div class="card-header text-center">
                <strong>
                    <h4>Alta nuevo cliente</h4>
                </strong>
            </div>
            <div class="container p-1 mb-1">
                <?php if (isset($_GET['successClienteP'])) { ?>
                    <div class="alert alert-success text-center" role="alert" style="background-color: green; color:aliceblue;">
                        <?php echo $_GET['successClienteP'] ?>
                    </div>
                <?php
                }
                ?>
                <?php if (isset($_GET['errorClienteP'])) { ?>
                    <div class="alert alert-danger text-center" role="alert" style="background-color: red; color:aliceblue;">
                        <?php echo $_GET['errorClienteP'] ?>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="card-body container text-center">
                <form action="AltaNuevoClientePBack.php" method="POST">
                    <div class="row container p-2">
                        <div class="col">
                            <span></span>
                            <input type="text" class="form-control" placeholder="Alias Cliente" name="aliasCliente">
                        </div>
                        <div class="col">
                            <span></span>
                            <input type="text" class="form-control" placeholder="Alias Usuario" name="aliasUsuario">
                        </div>
                        <div class="col">
                            <span></span>
                            <input type="text" class="form-control" placeholder="Nombres" name="nombresUsuario">
                        </div>
                        <div class="col">
                            <span></span>
                            <input type="text" class="form-control" placeholder="Apellidos" name="apellidosUsuario">
                        </div>
                    </div>
                    <div class="row container p-2">
                        <div class="col">
                            <span></span>
                            <input type="email" class="form-control" placeholder="Correo" name="correoElectronicoUsuario">
                        </div>
                        <div class="col">
                            <span></span>
                            <input type="tel" class="form-control" placeholder="Telefono" name="telefonoUsuario">
                        </div>
                        <div class="col">
                            <span></span>
                            <input type="text" class="form-control" placeholder="Clave" name="claveUsuario">
                        </div>
                        <div class="col">
                            <span></span>
                            <input type="text" class="form-control" placeholder="Confirmar Clave" name="confirmarClaveUsuario">
                        </div>
                    </div>
                    <div class="row container p-2">
                        <div class="col">
                            <span>Numero de usuarios</span>
                            <input type="number" class="form-control" name="numeroUsuarios">
                        </div>
                        <div class="col">
                            <span>Fecha Inicio</span>
                            <input type="date" class="form-control" name="fechaInicio">
                        </div>
                        <div class="col">
                            <span>Fecha Final</span>
                            <input type="date" class="form-control" name="fechaFinal">
                        </div>
                    </div>
                    <div class="p-2 text-left">
                        <button type="submit" class="btn btn-dark" name="btnCliente">Registrar Cliente</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
    </div>
    <br>

    <!--boostrap5-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>