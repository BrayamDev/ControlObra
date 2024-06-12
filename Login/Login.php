<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!--Boostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!--CSS-->
    <link rel="stylesheet" href="../Css/style.css">
    <title>Iniciar sesion</title>
</head>

<body>
    <div class="contenedor__titulo--login">
        <h1>Control de obras</h1>
    </div>
    <section class="seccion__inicio__sesion">
        <div class="imagen__fondo">
            <img src="Imagenes/fondo.jpg" alt="">
        </div>
        <div class="contenido__inicio__sesion">
            <div class="formulario__inicio__sesion">
                <h2>Iniciar sesion</h2>
                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger text-center" role="alert" style="background-color: red; color:aliceblue;">
                        <?php echo $_GET['error'] ?>
                    </div>
                <?php
                }
                ?>
                <form action="Login/InicioSesionBack.php" method="POST" id="form">
                    <div class="mb-3">
                        <label class="form-label text-dark">
                            Usuario
                        </label>
                        <input type="text" class="form-control" name="usuario" id="nombreUsuario">
                        <div class="error" id="error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark">
                            Contraseña
                        </label>
                        <input type="password" class="form-control" name="clave" id="claveUsuario">
                        <div class="error" id="error"></div>
                    </div>
                    <button type="submit" class="btn btn-dark" name="btn">Ingresar</button>
                </form>
            </div>
        </div>
    </section>
    <!--JS-->
    <!-- <script defer src="../Js/Script.js"></script> -->
    <!--boostrap5-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>