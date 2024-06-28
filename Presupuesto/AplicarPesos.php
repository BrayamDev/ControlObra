<?php
session_start();
include "../Conexion.php";

$alias = $_SESSION['alias'];
$obra = $_SESSION['nombreObra'];
$idObra = $_SESSION['id_obra'];

$consulta = mysqli_query($conexion, "SELECT * FROM  contrato");

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
    <!--Boostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!--Iconosboostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--cdn-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <!--script dropdownlist desplegable-->
    <script language="javascript" src="../js/jquery-3.1.1.min.js"></script>
    <title>Aplicar pesos</title>
</head>

<body>
    <form action="importarPresupuestoPesos.php" method="POST">
        <?php include("../Global/Header.php") ?>
        <div class="p-2 text-white text-center" style="background-color: #3C4857;">
            <div class="container">
                <div class="row align-items-end">
                    <div class="container col">
                        <script language="javascript">
                            $(document).ready(function() {
                                $("#cbx_concepto").change(function() {
                                    $("#cbx_concepto option:selected").each(function() {
                                        id_contratista = $(this).val();
                                        $.post("subcontpesos.php", {
                                            id_contratista: id_contratista
                                        }, function(data) {
                                            $("#cbx_subconcepto").html(data);
                                        });
                                    });
                                })
                            });
                        </script>
                        <select class="form-control" name="cbx_concepto" id="cbx_concepto">
                            <option value="#" selected="true" disabled>--Seleccione el contratista--</option>
                            <?php
                            $resultado = mysqli_query($conexion, "SELECT * FROM contratista WHERE id_obra = $idObra");
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
                        <select class="form-control" name="cbx_subconcepto" id="cbx_subconcepto">
                            <option value="#" selected="true" disabled>--Seleccione el importe en pesos--</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center p-2" style="background-color: #3C4857;">
            <button class="btn btn-outline-light btn-sm" name="btnInsertarEstimacionPesos1" type="submit">Desplegar Presupuesto</button>
            <button class="btn btn-outline-light btn-sm" name="btnInsertarEstimacionPesos" type="submit">Insertar Presupuesto</button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Como desea importar el presupuesto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
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