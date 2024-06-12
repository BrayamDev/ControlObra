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
    <title>Importe pesos</title>
</head>

<body>
    <?php include "../Global/HeaderGlobal.php" ?>
    <div class="p-2 text-white text-center" style="background-color: #3C4857;">
        <div class="container">
            <div class="row align-items-end">
                <div class="container col">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Selecciona el contratista</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>

                <div class="container col">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Importe del contrato pesos</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col">
                    <div class="input-group">
                        <input class="form-control" type="tel" placeholder="Numero de estimacion">
                    </div>
                </div>

            </div>
            <div class="row p-2">
                <div class="col">
                    <div class="input-group">
                        <a class="form-control btn btn-primary">Cargar estimacion pesos</a>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group">
                        <a class="form-control btn btn-primary">Eliminar estimacion pesos</a>
                    </div>
                </div>
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