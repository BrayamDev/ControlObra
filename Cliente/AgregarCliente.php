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
    <!--CSS ESTILOS-->
    <!--<link rel="stylesheet" href="../Css/style.css">-->
    <!--Boostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!--Iconosboostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Agregar cliente</title>
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
            <a href="../Obra/AccesoObra.php" class="btn btn-outline-dark btn-sm">Regresar</a>
        </div>
    </div>
    <div class="text-white text-center p-2" style="background-color: #3C4857;">
        <header>
            <h2 class="text-uppercase">Control de obras</h2>
        </header>
    </div>

    <div class="container p-5">
        <div class="card text-center">
            <div class="card-header">
                <h2>Registrar nuevo cliente</h2>
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
                        <?php echo $_GET['partidasSuccess'] ?>
                    </div>
                <?php
                }
                ?>
            </div>

            <div class="card-body">
                <div class="container">
                    <form action="AgregarClienteBack.php" method="POST">
                        <div class="row p-2">
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Alias" name="aliasCliente">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Nombres" name="nombreCliente">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Apellidos" name="apellidosCliente">
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Telefono" name="telefonoCliente">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="email" placeholder="Correo Electronico" name="emailCliente">
                                </div>
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

    <!--boostrap5-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>