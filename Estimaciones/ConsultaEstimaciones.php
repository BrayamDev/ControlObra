<?php
session_start();

include "../Conexion.php";

$alias = $_SESSION['alias'];
$obra = $_SESSION['nombreObra'];
$idObra = $_SESSION['id_obra'];

$consulta = mysqli_query($conexion, "select * from  contrato");

while ($resultado = mysqli_fetch_array($consulta))


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
    <title>Consulta estimaciones</title>
</head>

<body>
    <?php include "../Global/HeaderGlobal.php" ?>
    <div class="p-2 text-white text-center" style="background-color: #3C4857;">
        <div class="container">
            <div class="row align-items-end">
                <div class="container col">
                    <select class="form-control" name="id_contratista" id="id_contratista">
                        <option value="#" selected="true" disabled>--Seleccione al Contratista--</option>
                        <?php
                        $resultado = mysqli_query($conexion, "SELECT * FROM contratista WHERE id_obra = $idObra ORDER BY aliascontratista asc");
                        while ($consulta = mysqli_fetch_array($resultado)) {
                        ?>
                            <option value="<?php echo $consulta['id_contratista'] ?>">
                                <?php echo ucfirst($consulta['aliascontratista']); ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="container col">
                    <select class="form-control" name="id_contratista" id="id_contratista">
                        <option value="#" selected="true" disabled>--Seleccione al Contratista--</option>
                        <?php
                        $resultado = mysqli_query($conexion, "SELECT * FROM contratista WHERE id_obra = $idObra ORDER BY aliascontratista asc");
                        while ($consulta = mysqli_fetch_array($resultado)) {
                        ?>
                            <option value="<?php echo $consulta['id_contratista'] ?>">
                                <?php echo ucfirst($consulta['aliascontratista']); ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="container col">
                    <select class="form-control" name="id_contratista" id="id_contratista">
                        <option value="#" selected="true" disabled>--Seleccione al Contratista--</option>
                        <?php
                        $resultado = mysqli_query($conexion, "SELECT * FROM contratista WHERE id_obra = $idObra ORDER BY aliascontratista asc");
                        while ($consulta = mysqli_fetch_array($resultado)) {
                        ?>
                            <option value="<?php echo $consulta['id_contratista'] ?>">
                                <?php echo ucfirst($consulta['aliascontratista']); ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <div class="input-group">
                        <button class="form-control btn btn-primary" type="submit">Buscar</button>
                    </div>
                </div>
            </div>

        </div>

        <div class="container text-center p-2">
            <a href="" class="btn btn-outline-light btn-sm">
                Imprimir dolares
                <i class="fa-solid fa-dollar-sign"></i>
            </a>
            <a href="" class="btn btn-outline-light btn-sm">
                Imprimir pesos
                <i class="fa-solid fa-coins"></i>
            </a>
        </div>
    </div>
    </div>
    <br>
    <div class="containerp-2">
        <table class="table p-2" id="myTable">
            <thead class="table table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>


    <!--boostrap5-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>