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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Boostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!--Iconosboostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--cdn-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <title>Aplicar estimacion pesos</title>
    <script language="javascript" src="../js/jquery-3.1.1.min.js"></script>

    <meta http-equiv="X-UA-Compatible" content="IE-edge">
</head>

<?php include("../Global/Header.php") ?>
    <div class="control__partida--links">
        <nav>
            <form action="../presupuesto/desplegarPresupuestoDolares.php" method="POST">
                <div class="text-white" style="background-color: #3C4857;">
                    <div class="container">
                        <div class="row p-3">
                            <div class="col">
                                <div class="contratos--dropdown">
                                <script language="javascript">
                                        $(document).ready(function() {
                                        $("#cbx_concepto").change(function() {
                                        $("#cbx_concepto option:selected").each(function() {
                                        id_contratista = $(this).val();
                                        $.post("subcontdolares.php", {
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
                            </div>
                            <div class="col">
                                <div class="col">
                                    <div class="partidas--dropdown">
                                        <div>
                                            <select class="form-control" name="cbx_subconcepto" id="cbx_subconcepto">
                                                <option value="#" selected="true" disabled>--Seleccione Importe Contrato Dolares--</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>

                        <div class="row p-3">
                            <div class="text-center col">
                                <button class="form-control btn btn-primary" name="btndesplegarpresupuesto" type="submit">Desplegar Presupuesto</button>
                            </div>
                        </div>
                    </div>
                </div>
        </nav>
    </div>
    <br>

    <?php $SumaImporteDolares = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["btndesplegarpresupuesto"])) {
        $idContratista = $_POST["cbx_concepto"];
        $importeDolaresContrato = $_POST["cbx_subconcepto"];

        $resultadoEstimacion = mysqli_query($conexion, "SELECT * FROM contrato WHERE id_obra = '$idObra' AND id_contratista = $idContratista AND importe_dolares = $importeDolaresContrato");
        $consulta = mysqli_fetch_array($resultadoEstimacion);
        $idContrato = $consulta['id_contrato'];

        ?>
    <div class="container">
        <table class="table text-center" id="idTabla">
            <thead class="table table-dark">
                <tr>
                    <th class="table__head">Concepto</th>
                    <th class="table__head">Unidad</th>
                    <th class="table__head">Cantidad</th>
                    <th class="table__head">P.U. </th>
                    <th class="table__head">Importe</th>
                    <th class="table__head">Editar</th>
                    <th class="table__head">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
             
                $resultadoEstimacionDolares = mysqli_query($conexion, "SELECT * FROM estimaciondet WHERE id_obra = '$idObra' AND id_contrato = '$idContrato'");
                while ($consulta1 = mysqli_fetch_array($resultadoEstimacionDolares)) {
                    $Concepto = $consulta1['concepto'];
                    $Unidad = $consulta1['unidad'];
                    $Cantidad = $consulta1['cantidaddolares'];
                    $PuDolares = $consulta1['pudolares'];
                    $ImporteDolares = $consulta1['importe_dolares'];
                    $SumaImporteDolares = $SumaImporteDolares +  $ImporteDolares;

                ?>
                    <tr>
                        <td class="table__data"><?php echo $Concepto; ?></td>
                        <td class="table__data"><?php echo $Unidad; ?></td>
                        <td class="table__data"><?php echo number_format($Cantidad); ?></td>
                        <td class="table__data"><?php echo "USD"." ".number_format($PuDolares); ?></td>
                        <td class="table__data"><?php echo "USD"." ".number_format($ImporteDolares); ?></td>
                        <td class="table__data">

                            <a href="" class="btn-sm btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                        </td>
                        <td class="table__data">
                            <a href="" class="btn-sm btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php }}} ?>
                    <tr>
                        <td class="table__data"><?php echo "SUMA"; ?></td>
                        <td class="table__data"></td>
                        <td class="table__data"></td>
                        <td class="table__data"></td>
                        <td class="table__data"><?php echo $SumaImporteDolares; ?></td>
                        <td class="table__data"></td>
                        <td class="table__data"></td>
                    </tr>

            </tbody>
        </table>
    </div>
    <!--Jquery-->
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#idTabla').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/2.0.8/i18n/es-MX.json',
            },
            pageLength: 5,
            lengthMenu: [
                [5, 10, 20, -1],
                [5, 10, 20, 'Todos']
            ]
        });
    })
</script>
<!--boostrap5-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>