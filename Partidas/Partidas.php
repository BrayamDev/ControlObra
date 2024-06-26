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
    <!--Boostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!--Iconosboostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--cdn-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Partidas</title>
    <script language="javascript" src="../js/jquery-3.1.1.min.js"></script>
</head>

<body>
    <?php include("../Global/Header.php") ?>
    <div class="control__partida--links">
        <nav>
            <form action="../Partidas/PartidasBack.php" method="POST">
                <div class="text-white " style="background-color: #3C4857;">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Nueva partida" name="nuevaPartida">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Nueva subpartida" name="nuevaSubPartida">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <button class="form-control btn btn-primary" name="btnInsertarPartida" type="submit">Insertar partida</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-white p-3" style="background-color: #3C4857;">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div>
                                        <div class="partidas--dropdown">
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
                                </div>
                                <div class="col">
                                    <div class="partidas--dropdown">
                                        <div>

                                            <select class="form-control" name="cbx_subconcepto" id="cbx_subconcepto">
                                                <option value="#" selected="true" disabled>--Seleccione la SubPartida--</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="campo-partidas">
                                        <input class="form-control" type="text" placeholder="Escribe tu importe en pesos" name="importePesos">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="campo-partidas">
                                        <input class="form-control" type="text" placeholder="Escribe tu importe en dolares" name="importeDolares">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="campo-partidas">
                                        <button class="form-control btn btn-primary" type="submit" name="btnInsertarImporte">Insertar importe</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="container p-1 mb-1">
                <?php if (isset($_GET['partidasSuccess'])) { ?>
                    <div class="alert alert-success text-center" role="alert" style="background-color: green; color:aliceblue;">
                        <?php echo $_GET['partidasSuccess'] ?>
                    </div>
                <?php
                }
                ?>
                <?php if (isset($_GET['partidasError'])) { ?>
                    <div class="alert alert-danger text-center" role="alert" style="background-color: red; color:aliceblue;">
                        <?php echo $_GET['partidasError'] ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </nav>
    </div>
    <div class="text-center">
        <h2>Consulta partidas</h2>
    </div>
    <div class="container">
        <table class="table table-striped" id="idTabla">
            <thead class="table-dark">
                <tr>
                    <th>Numero</th>
                    <th>Concepto</th>
                    <th>SubConcepto</th>
                    <th>Importe Pesos</th>
                    <th>Importe Dolares</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $consulta = mysqli_query($conexion, "select * from  concepto WHERE id_obra = $idObra ORDER BY concepto asc");
                while ($resultado = mysqli_fetch_array($consulta)) {
                    $idConcepto = $resultado['id_concepto'];
                    $consulta1 = mysqli_query($conexion, "select * from  subconcepto WHERE id_concepto = $idConcepto and id_obra = $idObra ORDER BY subconcepto asc");
                    while ($resultado1 = mysqli_fetch_array($consulta1)) {
                        $idSubconcepto = $resultado1['id_subconcepto'];
                        $consulta2 = mysqli_query($conexion, "select * from  presupuesto WHERE id_concepto = $idConcepto and id_subconcepto = $idSubconcepto and id_obra = $idObra");
                        while ($resultado2 = mysqli_fetch_array($consulta2)) {
                            $consulta3 = mysqli_query($conexion, "select * FROM  presupuesto WHERE id_obra = $idObra AND id_concepto = '$idConcepto' AND id_subconcepto = '$idSubconcepto' ");
                            $resultado3 = mysqli_fetch_array($consulta3);
                            $id_presupuesto = $resultado3['id_presupuesto'];

                ?>
                            <tr>
                                <td><?php echo $resultado['id_concepto']; ?></td>
                                <td><?php echo $resultado['concepto']; ?></td>
                                <td><?php echo $resultado1['subconcepto']; ?></td>
                                <td><?php echo number_format($resultado2['importe_pesos']); ?></td>
                                <td><?php echo number_format($resultado2['importe_dolares']); ?></td>
                                <td>
                                    <a href="" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                </td>
                                <td class="table__data">
                                <a href="EliminarPartida.php?id_presupuesto=<?php echo $resultado3['id_presupuesto'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                </td><?php    }
                                }
                            } ?>
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