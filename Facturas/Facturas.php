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
    <title>Contratistas</title>
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
    
    <br>
    <div class="contenedor__tabla container">
        <table class="table table-striped text-center" id="idContratista">
            <thead class="table table-dark">
                <tr>
                    <th class="">Contratista</th>
                    <th class="">Partida</th>
                    <th class="">Subpartida</th>
                    <th class="">Factura Pesos</th>
                    <th class="">Importe Pesos</th>
                    <th class="">Factura Dólares</th>
                    <th class="">Importe Dólares</th>
                    

                </tr>
            </thead>
            <tbody>
                <?php
                $sqlContrato = "SELECT * FROM contrato WHERE id_obra = '$idObra'";
                $resultadoContrato = $conexion->query($sqlContrato);

                while ($Fila = $resultadoContrato->fetch_assoc()) {
                    $idContratista = $Fila['id_contratista'];
                    $idPartida = $Fila['id_concepto'];
                    $idSubpartida = $Fila['id_subconcepto'];

                    $resultadoPartida = mysqli_query($conexion, "SELECT * FROM concepto WHERE id_obra = '$idObra' and id_concepto = $idPartida");
                    $consulta = mysqli_fetch_array($resultadoPartida);
                    $Partida = $consulta['concepto'];

                    $resultadoPartida = mysqli_query($conexion, "SELECT * FROM subconcepto WHERE id_obra = '$idObra' and id_subconcepto = $idSubpartida");
                    $consulta = mysqli_fetch_array($resultadoPartida);
                    $Subpartida = $consulta['subconcepto'];

                    $resultadoContratista = mysqli_query($conexion, "SELECT * FROM contratista WHERE id_obra = '$idObra' and id_contratista = $idContratista");
                    $consulta = mysqli_fetch_array($resultadoContratista);
                ?>
                    <tr>
                        <td class=""><?php echo $consulta['aliascontratista'] ?></td>
                        <td class=""><?php echo $Partida ?></td>
                        <td class=""><?php echo $Subpartida ?></td>
                        <td class=""><?php echo $Fila['fact_pesos'] ?></td>
                        <td class=""><?php echo $Fila['anticipo_pesos'] ?></td>
                        <td class=""><?php echo $Fila['factt_dolares'] ?></td>
                        <td class=""><?php echo $Fila['anticipo_dolares'] ?></td>
                    </tr>
                <?php
                }
                $sqlestimacion = "SELECT * FROM estimacion WHERE id_obra = '$idObra'";
                $resultadoestimacion = $conexion->query($sqlestimacion);

                while ($Fila = $resultadoestimacion->fetch_assoc()) {
                    $idContrato = $Fila['id_contrato'];

                    $resultadoContrato = mysqli_query($conexion, "SELECT * FROM contrato WHERE id_obra = '$idObra' and id_contrato = $idContrato");
                    $consulta = mysqli_fetch_array($resultadoContrato);
                    $idContratista = $consulta['id_contratista'];

                    $resultadoContratista = mysqli_query($conexion, "SELECT * FROM contratista WHERE id_obra = '$idObra' and id_contratista = '$idContratista'");
                    $consulta1 = mysqli_fetch_array($resultadoContratista);

                    $resultadoPartida = mysqli_query($conexion, "SELECT * FROM concepto WHERE id_obra = '$idObra' and id_concepto = $idPartida");
                    $consulta = mysqli_fetch_array($resultadoPartida);
                    $Partida = $consulta['concepto'];

                    $resultadoPartida = mysqli_query($conexion, "SELECT * FROM subconcepto WHERE id_obra = '$idObra' and id_subconcepto = $idSubpartida");
                    $consulta = mysqli_fetch_array($resultadoPartida);
                    $Subpartida = $consulta['subconcepto'];

                    $importePesos = $Fila['importe_pesos'] - $Fila['amort_pesos'] - $Fila['fg_pesos'];
                    $importeDolares = $Fila['importe_dolares'] - $Fila['amort_dolares'] - $Fila['fg_dolares'];
                   
                ?>
                    <tr>
                        <td class=""><?php echo $consulta1['aliascontratista'] ?></td>
                        <td class=""><?php echo $Partida ?></td>
                        <td class=""><?php echo $Subpartida ?></td>
                        <td class=""><?php echo $Fila['factura_pesos'] ?></td>
                        <td class=""><?php echo $importePesos ?></td>
                        <td class=""><?php echo $Fila['factura_dolares'] ?></td>
                        <td class=""><?php echo $importeDolares ?></td>
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
            $('#idContratista').DataTable({

            });
        })
    </script>
    <!--boostrap5-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>