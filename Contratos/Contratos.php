<?php
session_start();

include "../Conexion.php";

$alias = $_SESSION['alias'];
$obra = $_SESSION['nombreObra'];
$idObra = $_SESSION['id_obra'];

$consulta = mysqli_query($conexion, "select * from  concepto");

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
    <title>Contratos</title>
</head>

<body>
    <?php include("../Global/Header.php") ?>
    <div>
        <nav>
            <form action="../Contratos/ContratosBack.php" method="POST">
                <div class="text-white" style="background-color: #3C4857;">
                    <div class="container">
                        <div class="row p-3">
                            <div class="col">
                                <div class="contratos--dropdown">
                                    <script language="javascript">
                                        $(document).ready(function() {
                                            $("#cbx_concepto").change(function() {
                                                $("#cbx_concepto option:selected").each(function() {
                                                    id_concepto = $(this).val();
                                                    $.post("sub.php", {
                                                        id_concepto: id_concepto
                                                    }, function(data) {
                                                        $("#cbx_subconcepto").html(data);
                                                    });
                                                });
                                            })
                                        });
                                    </script>
                                    <select class="form-control" name="cbx_concepto" id="cbx_concepto">
                                        <option value="#" selected="true" disabled>--Seleccione la Partida--</option>
                                        <?php
                                        $resultado = mysqli_query($conexion, "SELECT * FROM concepto WHERE id_obra = $idObra");
                                        while ($consulta = mysqli_fetch_array($resultado)) {
                                        ?>
                                            <option value="<?php echo $consulta['id_concepto'] ?>">
                                                <?php echo ucfirst($consulta['concepto']); ?>
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
                                                <option value="#" selected="true" disabled>--Seleccione la SubPartida--</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Importe pesos" name="importepesos">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Importe Dolares" name="importedolares">
                                </div>
                            </div>

                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Anticipo Pesos" name="anticipopesos">
                                </div>
                            </div>
                        </div>

                        <div class="row p-3">
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Anticipo Dolares" name="anticipodolares">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="F.G. Pesos" name="fgpesos">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="F.G Dolares" name="fgdolares">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Factura pesos" name="facturapesos">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Factura dolares" name="facturadolares">
                                </div>
                            </div>

                            <div class="col">
                                <div class="input-group">
                                    <select class="form-control" name="id_contratista" id="id_contratista">
                                        <option value="#" selected="true" disabled>--Contratista--</option>
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
                            <div class="text-center col">
                                <button class="form-control btn btn-primary" name="btnInsertarContrato" type="submit">Insertar Contrato</button>
                            </div>
                        </div>
                    </div>
                </div>
        </nav>

    </div>
    <?php if (isset($_GET['contratoSuccess'])) { ?>
        <div class="alert alert-success text-center" role="alert" style="background-color: green; color:aliceblue;">
            <?php echo $_GET['contratoSuccess'] ?>
        </div>
    <?php
    }
    ?>
    <?php if (isset($_GET['contratoError'])) { ?>
        <div class="alert alert-error text-center" role="alert" style="background-color: green; color:aliceblue;">
            <?php echo $_GET['contratoError'] ?>
        </div>
    <?php
    }
    ?>
    <br>
    <div class="container">
        <table class="table text-center" id="idTabla">
            <div class="text-center bg-dark p-2 rounded text-white">
                <h2>Consulta contratos</h2>
            </div>
            <thead class="table table-dark">
                <tr>
                    <th class="table__head">Contratista</th>
                    <th class="table__head">Concepto</th>
                    <th class="table__head">SubConcepto</th>
                    <th class="table__head">Importe Pesos</th>
                    <th class="table__head">Importe Dolares</th>
                    <th class="table__head">Anticipo Pesos</th>
                    <th class="table__head">Anticipo Dolares</th>
                    <th class="table__head">F.G. Pesos</th>
                    <th class="table__head">F.G. Dolares</th>
                    <th class="table__head">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $resultadoContrato = mysqli_query($conexion, "SELECT * FROM contrato WHERE id_obra = '$idObra'");
                while ($consulta = mysqli_fetch_array($resultadoContrato)) {
                    $idConcepto = $consulta['id_concepto'];
                    $idSubconcepto = $consulta['id_subconcepto'];
                    $importePesos = $consulta['importe_pesos'];
                    $importeDolares = $consulta['importe_dolares'];
                    $anticipoPesos = $consulta['anticipo_pesos'];
                    $anticipoDolares = $consulta['anticipo_dolares'];
                    $fgPesos = $consulta['fgpesos'];
                    $fgDolares = $consulta['fgdolares'];
                    $resultadoConcepto = mysqli_query($conexion, "SELECT * FROM concepto WHERE id_concepto = '$idConcepto' AND id_obra = '$idObra'");
                    $consulta1 = mysqli_fetch_array($resultadoConcepto);
                    $Concepto = $consulta1['concepto'];
                    $resultadoSubconcepto = mysqli_query($conexion, "SELECT * FROM subconcepto WHERE id_subconcepto = '$idSubconcepto' AND id_obra = '$idObra'");
                    $consulta2 = mysqli_fetch_array($resultadoSubconcepto);
                    $Subconcepto = $consulta2['subconcepto'];
                    $resultadoidContratista = mysqli_query($conexion, "SELECT * FROM contrato WHERE id_obra = '$idObra' AND id_concepto = '$idConcepto' AND id_subconcepto = '$idSubconcepto'");
                    $consulta3 = mysqli_fetch_array($resultadoidContratista);
                    $idcontratista = $consulta3['id_contratista'];
                    $resultadoContratista = mysqli_query($conexion, "SELECT * FROM contratista WHERE id_obra = '$idObra' AND id_contratista = '$idcontratista'");
                    $consulta4 = mysqli_fetch_array($resultadoContratista);
                    $contratista = $consulta4['aliascontratista'];


                ?>
                    <tr>
                        <td><?php echo $contratista; ?></td>
                        <td><?php echo $Concepto; ?></td>
                        <td><?php echo $Subconcepto; ?></td>
                        <td><?php echo $importePesos; ?></td>
                        <td><?php echo $importeDolares; ?></td>
                        <td><?php echo $anticipoPesos; ?></td>
                        <td><?php echo $anticipoDolares; ?></td>
                        <td><?php echo $fgPesos; ?></td>
                        <td><?php echo $fgDolares; ?></td>
                        <td>
                            <a href="" class="btn-sm btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="" class="btn-sm btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!--Jquery-->
    <script src="../Js/jquery.js"></script>
    <script src="../Js/Script.js"></script>
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