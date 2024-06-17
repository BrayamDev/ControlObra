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
    <title>Facturas</title>
</head>

<body>
    <?php include("../Global/Header.php") ?>
    <div>
        <nav>
            <div class="text-white" style="background-color: #3C4857">
                <div class="container p-3">
                    <div class="row">
                        <div class="col">
                            <div class="partidas--dropdown">
                                <select class="form-control">
                                    <option value="#" selected="true">Seleccione el contratista</option>
                                    <option value="#">contratista numero 1</option>
                                    <option value="#">contratista numero 2</option>
                                    <option value="#">contratista numero 3</option>
                                    <option value="#">contratista numero 4</option>
                                    <option value="#">contratista numero 5</option>
                                    <option value="#">contratista numero 6</option>
                                    <option value="#">contratista numero 7</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="partidas--dropdown">
                                <select class="form-control">
                                    <option value="#" selected="true">Seleccione el el contrato</option>
                                    <option value="#">contrato numero 1</option>
                                    <option value="#">contrato numero 2</option>
                                    <option value="#">contrato numero 3</option>
                                    <option value="#">contrato numero 4</option>
                                    <option value="#">contrato numero 5</option>
                                    <option value="#">contrato numero 6</option>
                                    <option value="#">contrato numero 7</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="container p-2">
        <table class="table text-center" id="idTabla">
            <div class="text-center bg-dark p-2 rounded text-white">
                <h2>Lista de facturas</h2>
            </div>
            <thead class="table table-dark">
                <tr>
                    <th class="table__head">Contrato</th>
                    <th class="table__head">Contratista</th>
                    <th class="table__head">Nº de Factura</th>
                    <th class="table__head">Importe pesos</th>
                    <th class="table__head">Nº Factura</th>
                    <th class="table__head">Importe Dolares</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="table__data">Proyecto</td>
                    <td class="table__data">Dato en bases de datos</td>
                    <td class="table__data">Dato en bases de datos</td>
                    <td class="table__data">Dato en bases de datos</td>
                    <td class="table__data">Dato en bases de datos</td>
                    <td class="table__data">Dato en bases de datos</td>
                </tr>
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