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
    
  
    <div class="control__partida--links">
        <nav>
            <form action="CuadrillasBack.php" method="POST">
                <div class="text-white " style="background-color: #3C4857;">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Nueva Cuadrilla" name="nuevaCuadrilla">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <button class="form-control btn btn-primary" name="btnInsertarCuadrilla" type="submit">Insertar Cuadrilla</button>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Nuevo Oficio" name="nuevoOficio">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <button class="form-control btn btn-primary" name="btnInsertarOficio" type="submit">Insertar Oficio</button>
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
                                            <select class="form-control" name="id_cuadrilla" id="id_cuadrilla">
                                                <option value="#" selected="true" disabled>--Seleccione Cuadrilla--</option>
                                                <?php
                                                $resultado = mysqli_query($conexion, "SELECT * FROM cuadrilla WHERE id_obra = $idObra");
                                                while ($consulta = mysqli_fetch_array($resultado)) {
                                                ?>
                                                    <option value="<?php echo $consulta['id_cuadrilla'] ?>">
                                                        <?php echo ucfirst($consulta['cuadrilla']); ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                <select class="form-control" name="id_oficio" id="id_oficio">
                                                <option value="#" selected="true" disabled>--Seleccione Oficio--</option>
                                                <?php
                                                $resultado = mysqli_query($conexion, "SELECT * FROM oficio WHERE id_obra = $idObra");
                                                while ($consulta = mysqli_fetch_array($resultado)) {
                                                ?>
                                                    <option value="<?php echo $consulta['id_oficio'] ?>">
                                                        <?php echo ucfirst($consulta['oficio']); ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                </div>
                                <div class="col">
                                    <div class="campo-partidas">
                                        <input class="form-control" type="text" placeholder="cantidad" name="cantidad">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="campo-partidas">
                                        <input class="form-control" type="text" placeholder="unidad" name="unidad">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="campo-partidas">
                                        <input class="form-control" type="text" placeholder="sueldo por jornada" name="importePesos">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="campo-partidas">
                                        <button class="form-control btn btn-primary" type="submit" name="btnInsertar">Insertar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="container p-1 mb-1">
                <?php if (isset($_GET['cuadrillasSuccess'])) { ?>
                    <div class="alert alert-success text-center" role="alert" style="background-color: green; color:aliceblue;">
                        <?php echo $_GET['cuadrillasSuccess'] ?>

                    </div>
                <?php
                }
                ?>
                <?php if (isset($_GET['cuadrillasError'])) { ?>
                    <div class="alert alert-danger text-center" role="alert" style="background-color: red; color:aliceblue;">
                        <?php echo $_GET['cuadrillasError'] ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </nav>
    </div>
    <div class="text-center">
        <h2> Lista de Mano de Obra</h2>
    </div>
    <div class="container">
        <table class="table table-striped" id="idTabla">
            <thead class="table-dark">
                <tr>
                    <th>Cuadrilla</th>
                    <th>Oficio</th>
                    <th>Cantidad</th>
                    <th>Unidad</th>
                    <th>Precio/Jornada </th>
                    <th>Precio/Jornadat total</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $idcuadrillarepetida = "";
                    $consulta = mysqli_query($conexion, "SELECT * FROM  cuadrillas WHERE id_obra = $idObra ORDER BY id_cuadrilla ASC, id_oficio ASC");
                    while($resultado = mysqli_fetch_array($consulta)) {
                    $idcuadrilla = $resultado['id_cuadrilla'];        
                    $idOficio = $resultado['id_oficio'];
                    $salarioreal = $resultado['salarioreal'];

                    $consulta2 = mysqli_query($conexion, "SELECT * FROM  cuadrilla WHERE id_obra = $idObra AND id_cuadrilla = $idcuadrilla");
                    $resultado2 = mysqli_fetch_array($consulta2);
                    $Cuadrilla = $resultado2['cuadrilla'];

                    $resultado3 = mysqli_query($conexion, "SELECT SUM(salarioreal) AS sumasalarioreal FROM cuadrillas WHERE id_obra = $idObra AND id_cuadrilla = $idcuadrilla");
                    $consulta3 = mysqli_fetch_array($resultado3);
                    $sumaSalarioReal = $consulta3['sumasalarioreal'];




                    
                    if($idcuadrilla != $idcuadrillarepetida){

                ?>
                    <tr>
                        <td><b><?php echo $resultado2['cuadrilla']; ?></b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th><?php echo number_format($sumaSalarioReal); ?></th>
                        <th></th>
                    </tr>
                    <?php
                    $idcuadrillarepetida = $resultado2['id_cuadrilla'];

                                      }

                    $consulta1 = mysqli_query($conexion, "SELECT * from oficio WHERE id_obra = $idObra AND id_oficio = $idOficio");
                    $resultado1 = mysqli_fetch_array($consulta1);  
                     
                   ?>
                    <tr>
                        <td></td>
                        <td><?php echo $resultado1['oficio']; ?></td>
                        <td><?php echo $resultado['cantidad']; ?></td>
                        <td><?php echo $resultado1['unidad']; ?></td>
                        <td><?php echo number_format($resultado1['importe_pesos']); ?></td>
                        <td><?php echo number_format($resultado['salarioreal']); ?></td>
                        <td>
                            <a href="" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                        </td>
                        <td class="table__data">
                            <a href="" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                    </tr>
                        <?php   $idcuadrillarepetida = $resultado2['id_cuadrilla'];} ?>
                    
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