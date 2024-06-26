<?php
session_start();

include "../Conexion.php";

$alias = $_SESSION['alias'];
$obra = $_SESSION['nombreObra'];
$idObra = $_SESSION['id_obra'];
$pagina = $_SESSION['pagina'];



$consulta = mysqli_query($conexion, "SELECT * FROM  contrato");
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
    <script language="javascript" src="js/jquery-3.1.1.min.js"></script>
    <title>Contratos</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="imagenes/favicon.png">
    <script language="javascript" src="../js/jquery-3.1.1.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
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
        </div>
        <div class="p-2">
            <a href="../ControlObra/ControlObra.php" class="btn btn-outline-dark btn-sm">Regresar presupuesto</a>
        </div>
        <div class="p-2">
            <a href="" class="btn btn-outline-dark btn-sm">Regresar contrato</a>
        </div>
    </div>
    <?php include "../Global/HeaderGlobal.php" ?>
    <div class="control__partida--links">
        <nav>
            <form action="../Estimaciones/EstimacionDolaresBack.php" method="POST">
                <div class="text-white" style="background-color: #3C4857;">
                    <div class="container">
                        <div class="row p-3">
                            <div class="col">
                                <div class="estimaciones--dropdown">
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
                                        <option value="#" selected="true" disabled>--Seleccione contratista--</option>
                                        <?php
                                        $resultado = mysqli_query($conexion, "SELECT * FROM contratista WHERE id_obra = $idObra order by aliascontratista");
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
                                <div class="input-group">
                                    <div>
                                        <select class="form-control" name="cbx_subconcepto" id="cbx_subconcepto">
                                            <option value="#" selected="true" disabled>--Seleccione importe de contrato--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <button class="form-control btn btn-primary" name="btnInsertarEstimacionDolares" type="submit">Consulta Estimacion</button>
                                </div>
                            </div>
                        </div>
                        <div class="row p-3">
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Importe Dolares" name="importedolares">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Amortizacion Dolares" name="amortizaciondolares">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="F.G. Dolares" name="fgdolares">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Factura Dolares" name="facturadolares">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <button class="form-control btn btn-primary" name="btnInsertarEstimacionDolares" type="submit">Insertar Estimacion</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </nav>
    </div>
    <div class="container p-2">
        <?php if (isset($_GET['estimacionSuccess'])) { ?>
            <div class="alert alert-success text-center" role="alert" style="background-color: green; color:aliceblue;">
                <?php $Contrato = $_SESSION['contrato'];
                echo $_GET['estimacionSuccess'];
                ?>
            </div>
        <?php
        }
        ?>
        <?php if (isset($_GET['estimacionError'])) { ?>
            <div class="alert alert-error text-center" role="alert" style="background-color: green; color:aliceblue;">
                <?php $Contrato = $_SESSION['contrato'];
                echo $_GET['estimacionError'];
                ?>
            </div>
        <?php
        }
        $Contrato = $_SESSION['contrato'];
        if ($pagina != 0) {
        ?>
    </div>
    <br>
    <div class="container">
        <table class="table text-center" id="idTabla">
            <thead class="table table-dark">
                <tr>
                    <th class="table__head">Estimación</th>
                    <th class="table__head">Concepto</th>
                    <th class="table__head">SubConcepto</th>
                    <th class="table__head">Número de Factura</th>
                    <th class="table__head">Importe Dolares</th>
                    <th class="table__head">Anticipo Dolares</th>
                    <th class="table__head">F.G. Dolares</th>
                    <th class="table__head">Importe Pagado Dolares</th>
                    <th class="table__head">Editar</th>
                    <th class="table__head">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $importeDolarestotal = 0;
                $amortDolarestotal = 0;
                $fgDolaresEstimaciontotal = 0;
                $importepagadototal = 0;
                $resultadoContrato = mysqli_query($conexion, "SELECT * FROM contrato WHERE id_obra = '$idObra' and id_contrato = $Contrato");
                $consulta = mysqli_fetch_array($resultadoContrato);
                $idConcepto = $consulta['id_concepto'];
                $idSubconcepto = $consulta['id_subconcepto'];
                $importePesos = $consulta['importe_pesos'];
                $importeDolares = $consulta['importe_dolares'];
                $anticipoPesos = $consulta['anticipo_pesos'];
                $anticipoDolares = $consulta['anticipo_dolares'];
                $fgPesos = $consulta['fgpesos'];
                $fgDolares = $consulta['fgdolares'];
                $numerofactura = $consulta['factt_dolares'];
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
                $importeDolarestotal = $importeDolarestotal + $importeDolares;
                $importepagadototal =  $anticipoDolares;
                


                ?>
                <tr>
                    <td class="table__data"><?php echo "ANTICIPO"; ?></td>
                    <td class="table__data"><?php echo $Concepto; ?></td>
                    <td class="table__data"><?php echo $Subconcepto; ?></td>
                    <td class="table__data"><?php echo $numerofactura; ?></td>
                    <td class="table__data"><?php echo number_format($importeDolares); ?></td>
                    <td class="table__data"><?php echo number_format($anticipoDolares); ?></td>
                    <td class="table__data"><?php echo number_format($fgDolares); ?></td>
                    <td class="table__data"><?php echo number_format($anticipoDolares); ?></td>

                    <td class="table__data">
                        <a href="" class="btn-sm btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                    </td>
                    <td class="table__data">
                        <a href="" class="btn-sm btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <?php
                $resultadoEstimacion = mysqli_query($conexion, "SELECT * FROM estimacion WHERE id_obra = '$idObra' and id_contrato = $Contrato  ORDER BY numestimacion");
                while ($consulta5 = mysqli_fetch_array($resultadoEstimacion)) {
                    $importeDolaresEstimacion = $consulta5['importe_dolares'];
                    $amortDolaresEstimacion = $consulta5['amort_dolares'];
                    $fgDolaresEstimacion = $consulta5['fg_dolares'];
                    $numDolaresEstimacion = $consulta5['numestimacion'];
                    $numerofactura = $consulta5['factura_dolares'];
                    $importePagado = $importeDolaresEstimacion - $amortDolaresEstimacion - $fgDolaresEstimacion;
                    $amortDolarestotal = $amortDolarestotal + $amortDolaresEstimacion;
                    $fgDolaresEstimaciontotal = $fgDolaresEstimaciontotal + $fgDolaresEstimacion;
                    $importepagadototal = $importepagadototal + $importePagado;

                    if ($importeDolaresEstimacion != 0) {
                ?> 
                        <tr>
                            <td class="table__data"><?php echo $numDolaresEstimacion; ?></td>
                            <td class="table__data"><?php echo $Concepto; ?></td>
                            <td class="table__data"><?php echo $Subconcepto; ?></td>
                            <td class="table__data"><?php echo $numerofactura; ?></td>
                            <td class="table__data"><?php echo number_format($importeDolaresEstimacion); ?></td>
                            <td class="table__data"><?php echo number_format($amortDolaresEstimacion); ?></td>
                            <td class="table__data"><?php echo number_format($fgDolaresEstimacion); ?></td>
                            <td class="table__data"><?php echo number_format($importePagado); ?></td>
                            <td class="table__data">

                                <a href="AplicarEstimacionesDolaresEditar.php?id=<?php echo $consulta5['id_estimacion']?>" class="btn-sm btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                            </td>
                            <td class="table__data">
                                <a href="EliminarEstimacionDolares.php?id=<?php echo $consulta5['id_estimacion'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                <?php }
                } ?>
                <tr>
                    <th class="table__head">SUMA</th>
                    <th class="table__head"></th>
                    <th class="table__head"></th>
                    <th class="table__head"></th>
                    <th class="table__head"><?php echo number_format($importeDolarestotal); ?></th>
                    <th class="table__head"><?php echo number_format($amortDolarestotal); ?></th>
                    <th class="table__head"><?php echo number_format($fgDolaresEstimaciontotal); ?></th>
                    <th class="table__head"><?php echo number_format($importepagadototal); ?></th>
                    <th class="table__head"></th>
                    <th class="table__head"></th>
                </tr>
            </tbody>
        </table>
        <?php } ?>
    </div>
<!--Jquery-->
<script src="../Js/jquery.js"></script>
<script src="../Js/Script.js"></script>

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