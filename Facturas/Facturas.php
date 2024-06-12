<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!--CSS ESTILOS-->
    <!-- <link rel="stylesheet" href="../Css/style.css"> -->
    <!--Boostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!--Iconosboostrap5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--JQUERY TABLE-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <title>Facturas</title>

</head>

<body>
    <?php include "../Global/HeaderGlobal.php" ?>
    <div class="control__partida--links">
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

    <br>
    <div class="text-center p-2">
        <h2>Lista de facturas</h2>
    </div>

    <table class="table text-center" id="myTable">
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
    <!--Datatable-->
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <!--boostrap5-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <!--jquery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-qFOQ9YFAeGj1gDOuUD61g3D+tLDv3u1ECYWqT82WQoaWrOhAY+5mRMTTVsQdWutbA5FORCnkEPEgU0OF8IzGvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $("#myTable").DataTable();
        });
    </script>

</body>

</html>