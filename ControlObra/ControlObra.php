<?php
session_start();
include "../Conexion.php";

$alias = $_SESSION['alias'];
$obra = $_SESSION['nombreObra'];
$idObra = $_SESSION['id_obra'];
$_SESSION['contrato'] = "";
$_SESSION['pagina'] = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Boostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!--Iconosboostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--cdn-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <script language="javascript" src="../js/jquery-3.1.1.min.js"></script>
    <title>Control de obra</title>
</head>

<body>
    <?php include ("../Global/Header.php")?>
    <div class="p-3 text-center" style="background-color: #3C4857;">
        <a href="../Partidas/Partidas.php" class="btn btn-light">Partidas</a>
        <a href="../Contratos/Contratos.php" class="btn btn-light">Contratos</a>
        <a href="../Contratistas/Contratistas.php" class="btn btn-light">Contratista</a>
        <a href="../Materiales/Materiales.php" class="btn btn-light">Materiales</a>
        <a href="../MO/Cuadrillas.php" class="btn btn-light">Cuadrillas</a>
        <a href="../PU/pu.php" class="btn btn-light">Precios Unitarios</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal1">
            Presupuesto
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Seleccione presupuesto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <a href="../Presupuesto/AplicarPesos.php" class="btn btn-primary">Pesos</a>
                        <a href="../Presupuesto/AplicarDolares.php" class="btn btn-primary">Dolares</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Estimaciones
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Selecciona la estimacion</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <a href="../Estimaciones/AplicarEstimaciones.php" class="btn btn-primary" class="btn btn-primary">Aplicar Pesos</a>
                        <a href="../Estimaciones/AplicarEstimacionesdolares.php" class="btn btn-primary" class="btn btn-primary">Aplicar Dolares</a>
                    </div>

                </div>
            </div>
        </div>
        <a href="../Actividades/Actividades.php" class=" btn btn-light">Actividades</a>
        <a href="../Facturas/Facturas.php" class="btn btn-light">Facturas</a>
        <a href="../Cambio/CambioObra.php" class="btn btn-light">Cambio obra</a>
        <a href="../PresupuestoPU/GenerarPresupuesto.php" class="btn btn-light">Generar Presupuesto</a>
    </div>
    <div class="control__obra--botones p-3 text-center" style="cursor: pointer;">
        <i class="bi bi-file-earmark-pdf-fill btn btn-danger btn-sm"></i>
        <i class="bi bi-file-earmark-spreadsheet-fill btn btn-success btn-sm"></i>
    </div>
    <div class="container">
    <table class="table table-striped text-center" id="idTabla">
        <thead class="table table-dark">
            <tr>
                <th>Concepto</th>
                <th>Importe Original</th>
                <th>Importe Contratado</th>
                <th>Diferencia</th>
                <th>Importe Estimado</th>
                <th>Importe por Estimar</th>
                <th>Importe Pagado</th>
                <th>Importe F.G.</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sumaEstimacionPesos = 0;
            $sumaEstimacionDolares = 0;
            $importepagadopesos = 0;
            $sumaamortpesos = 0;
            $sumaamortdolares = 0;
            $sumafgdolares = 0;
            $sumafgpesos = 0;
            $importepagadodolares = 0;
            $sumafgpesosydolares = 0;
            $sumapresupuestototaltotal = 0;
            $sumacontratosconceptototaltotal = 0;
            $diferenciatotal = 0;
            $sumaEstimacionespdtotal = 0;
            $importepagadopesosydolarestotal = 0;
            $sumafgpesosydolarestotal = 0;
            $importeporEstimartotal = 0;
            $importepagadopesosydolares = 0;

            $resultadotipocambio = mysqli_query($conexion, "SELECT * FROM obra WHERE  id_obra = '$idObra'");
            $consulta7 = mysqli_fetch_array($resultadotipocambio);
            $tipocambio = $consulta7['tc'];

            $resultadoPartida = mysqli_query($conexion, "SELECT * FROM concepto WHERE  id_obra = '$idObra'");
            while ($consulta = mysqli_fetch_array($resultadoPartida)) {
                $id_concepto = $consulta['id_concepto'];

                $resultadosumacontratop = mysqli_query($conexion, "SELECT SUM(importe_pesos) AS importepesos FROM contrato  WHERE id_obra = $idObra and id_concepto = $id_concepto");
                $consulta1 = mysqli_fetch_array($resultadosumacontratop);
                $sumaconceptopesostotal = $consulta1['importepesos'];
                $resultadosumacontratod = mysqli_query($conexion, "SELECT SUM(importe_dolares) AS importedolares FROM contrato  WHERE id_obra = $idObra and id_concepto = $id_concepto");
                $consulta1 = mysqli_fetch_array($resultadosumacontratod);
                $sumaconceptodolarestotal = $consulta1['importedolares'];
                $sumacontratosconceptototal = $sumaconceptopesostotal + $sumaconceptodolarestotal * $tipocambio;

                $resultadosumapresupuestopesos = mysqli_query($conexion, "SELECT SUM(importe_pesos) AS sumapesos FROM presupuesto  WHERE id_obra = $idObra and id_concepto = $id_concepto and contratado = 0");
                $consulta1 = mysqli_fetch_array($resultadosumapresupuestopesos);
                $sumapresupuestoPesos = $consulta1['sumapesos'];
                $resultadosumapresupuestodolares = mysqli_query($conexion, "SELECT SUM(importe_dolares) AS sumadolares FROM presupuesto  WHERE id_obra = $idObra and id_concepto = $id_concepto and contratado = 0");
                $consulta2 = mysqli_fetch_array($resultadosumapresupuestodolares);
                $sumapresupuestoDolares = $consulta2['sumadolares'];
                $sumapresupuestototal = $sumapresupuestoPesos + $sumapresupuestoDolares * $tipocambio;

                $resultadoContrato = mysqli_query($conexion, "SELECT * FROM contrato WHERE  id_obra = '$idObra' AND id_concepto = $id_concepto");
                while ($consulta7 = mysqli_fetch_array($resultadoContrato)) {
                    $id_contrato = $consulta7['id_contrato'];

                    $resultadosumap = mysqli_query($conexion, "SELECT SUM(importe_pesos) AS importepesos FROM estimacion  WHERE id_obra = $idObra and id_contrato = $id_contrato");
                    $consulta1 = mysqli_fetch_array($resultadosumap);
                    $sumaEstimacionPesos = $sumaEstimacionPesos + $consulta1['importepesos'];
                    $resultadoamortp = mysqli_query($conexion, "SELECT SUM(amort_pesos) AS amortpesos FROM estimacion  WHERE id_obra = $idObra and id_contrato = $id_contrato");
                    $consulta1 = mysqli_fetch_array($resultadoamortp);
                    $Sumaamortpesos = $sumaamortpesos + $consulta1['amortpesos'];
                    $resultadofgp = mysqli_query($conexion, "SELECT SUM(fg_pesos) AS fgpesos FROM estimacion  WHERE id_obra = $idObra and id_contrato = $id_contrato");
                    $consulta1 = mysqli_fetch_array($resultadofgp);
                    $Sumafgpesos = $sumafgpesos + $consulta1['fgpesos'];
                    $resultadosumad = mysqli_query($conexion, "SELECT SUM(importe_dolares) AS importedolares FROM estimacion  WHERE id_obra = $idObra and id_contrato = $id_contrato");
                    $consulta1 = mysqli_fetch_array($resultadosumad);
                    $sumaEstimacionDolares = $consulta1['importedolares'];
                    $resultadoamortd = mysqli_query($conexion, "SELECT SUM(amort_dolares) AS amortdolares FROM estimacion  WHERE id_obra = $idObra and id_contrato = $id_contrato");
                    $consulta1 = mysqli_fetch_array($resultadoamortd);
                    $Sumaamortdolares = $sumaamortdolares + $consulta1['amortdolares'];
                    $resultadofgd = mysqli_query($conexion, "SELECT SUM(fg_dolares) AS fgdolares FROM estimacion  WHERE id_obra = $idObra and id_contrato = $id_contrato");
                    $consulta1 = mysqli_fetch_array($resultadofgd);
                    $Sumafgdolares = $sumafgdolares + $consulta1['fgdolares'];
                    $sumafgpesosydolares = $sumafgpesosydolares + $Sumafgpesos + $Sumafgdolares * $tipocambio;
                    $importepagadopesos = $importepagadopesos + $sumaEstimacionPesos - $Sumaamortpesos - $Sumafgpesos;
                    $importepagadodolares = $importepagadodolares + $sumaEstimacionDolares - $Sumaamortdolares - $Sumafgdolares;
                    $importepagadopesosydolares = $importepagadopesos + $importepagadodolares * $tipocambio;

                    $importeporEstimarPesos = $sumaconceptopesostotal - $sumaEstimacionPesos;
                    $resultadosumad = mysqli_query($conexion, "SELECT SUM(importe_dolares) AS importedolares FROM estimacion  WHERE id_obra = $idObra and id_contrato = $id_contrato");
                    $consulta2 = mysqli_fetch_array($resultadosumad);
                    $sumaEstimacionDolares = $sumaEstimacionDolares + $consulta2['importedolares'];
                    $importeporEstimarDolares = $sumacontratosconceptototal - $sumaEstimacionDolares;
                    $resultadopagadop = mysqli_query($conexion, "SELECT SUM(importe_pesos) AS importepesos FROM estimacion  WHERE id_obra = $idObra and id_contrato = $id_contrato");
                    $consulta3 = mysqli_fetch_array($resultadopagadop);
                    $importepagadopesos =  $importepagadopesos + $consulta3['importepesos'];
                }
                $resultadosumap = mysqli_query($conexion, "SELECT SUM(importe_pesos) AS sumapesos FROM presupuesto  WHERE id_obra = $idObra and id_concepto = $id_concepto and contratado = 0");
                $consulta1 = mysqli_fetch_array($resultadosumap);
                $sumaPesos = $consulta1['sumapesos'];
                $resultadosumad = mysqli_query($conexion, "SELECT SUM(importe_dolares) AS sumadolares FROM presupuesto  WHERE id_obra = $idObra and id_concepto = $id_concepto and contratado = 0");
                $consulta2 = mysqli_fetch_array($resultadosumad);
                $sumaDolares = $consulta2['sumadolares'];
                $resultadosumap = mysqli_query($conexion, "SELECT SUM(importe_pesos) AS sumapesos FROM presupuesto  WHERE id_obra = $idObra and id_concepto = $id_concepto and contratado = 1");
                $consulta3 = mysqli_fetch_array($resultadosumap);
                $sumaPesosC = $consulta3['sumapesos'];
                $resultadosumad = mysqli_query($conexion, "SELECT SUM(importe_dolares) AS sumadolares FROM presupuesto  WHERE id_obra = $idObra and id_concepto = $id_concepto and contratado = 1");
                $consulta4 = mysqli_fetch_array($resultadosumad);
                $sumaDolaresC = $consulta4['sumadolares'];


                $sumatotalC = $tipocambio * $sumaDolaresC + $sumaPesosC;
                $sumaEstimacionespd = $tipocambio * $sumaEstimacionDolares + $sumaEstimacionPesos;
                $importeporEstimar = $sumacontratosconceptototal - $sumaEstimacionespd;
                $diferencia = $sumapresupuestototal - $sumacontratosconceptototal;
                $sumapresupuestototaltotal = $sumapresupuestototaltotal + $sumapresupuestototal;
                $sumacontratosconceptototaltotal = $sumacontratosconceptototaltotal + $sumacontratosconceptototal;
                $diferenciatotal = $diferenciatotal + $diferencia;
                $sumaEstimacionespdtotal = $sumaEstimacionespdtotal + $sumaEstimacionespd;
                $importeporEstimartotal = $importeporEstimartotal + $importeporEstimar;
                $importepagadopesosydolarestotal = $importepagadopesosydolarestotal + $importepagadopesosydolares;
                $sumafgpesosydolarestotal = $sumafgpesosydolarestotal + $sumafgpesosydolares;
            ?>

                <tr>
                    <td class="table__data"><?php echo $consulta['concepto']; ?></td>
                    <td class="table__data"><?php echo number_format($sumapresupuestototal); ?></td>
                    <td class="table__data"><?php echo number_format($sumacontratosconceptototal); ?></td>
                    <td class="table__data"><?php echo number_format($diferencia); ?></td>
                    <td class="table__data"><?php echo number_format($sumaEstimacionespd); ?></td>
                    <td class="table__data"><?php echo number_format($importeporEstimar); ?></td>
                    <td class="table__data"><?php echo number_format($importepagadopesosydolares); ?></td>
                    <td class="table__data"><?php echo number_format($sumafgpesosydolares); ?></td>
                </tr> <?php $sumaEstimacionDolares = 0;
                        $sumaEstimacionPesos = 0;
                        $importeDolaresContrato = 0;
                        $importePesosContrato = 0;
                        $importepagadopesos = 0;
                        $sumapresupuestototal = 0;
                        $sumafgpesosydolares = 0;
                    } ?>
            <tr>
                <td class=" table__data">SUMA</td>
                <td class="table__data"><?php echo number_format($sumapresupuestototaltotal); ?></td>
                <td class="table__data"><?php echo number_format($sumacontratosconceptototaltotal); ?></td>
                <td class="table__data"><?php echo number_format($diferenciatotal); ?></td>
                <td class="table__data"><?php echo number_format($sumaEstimacionespdtotal); ?></td>
                <td class="table__data"><?php echo number_format($importeporEstimartotal); ?></td>
                <td class="table__data"><?php echo number_format($importepagadopesosydolarestotal); ?></td>
                <td class="table__data"><?php echo number_format($sumafgpesosydolarestotal); ?></td>
            </tr>
        </tbody>
    </table>
    </div>

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