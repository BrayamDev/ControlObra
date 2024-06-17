<?php

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
    <!--CSS-->
    <link rel="stylesheet" href="../Css/estilos.css">
    <!--Boostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Control de obra</title>
</head>

<body>
    <div class="d-flex botones p-1">
        <div class="me-auto p-2">
            <button href="" class="btn btn-light btn-sm" disabled="disabled">
                <strong>Usuario :</strong>
                <span class="user_back"> <?php echo " " . strtoupper($alias); ?> </span>
            </button>
            <button href="" class="btn btn-light btn-sm" disabled="disabled">
                <strong>Obra :</strong>
                <span class="user_back"> <?php echo " " . strtoupper($obra); ?> </span>
            </button>
        </div>

        <div class="p-2">
            <a href="../Login/CerrarSesion.php" class="btn btn-dark btn-sm"><i class="fa-solid fa-right-to-bracket"></i></a>
        </div>
        <div class="p-2">
            <a href="" class="btn btn-dark btn-sm">Regresar presupuesto</a>
        </div>
        <div class="p-2">
            <a href="" class="btn btn-dark btn-sm">Regresar contrato</a>
        </div>
    </div>
    <div class="text-white text-center p-2" style="background-color: #3C4857;">
        <header>
            <h2 class="text-uppercase">Control de obras</h2>
        </header>
    </div>
    <!--boostrap5-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>