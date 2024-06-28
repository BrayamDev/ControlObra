<?php
session_start();

include "../Conexion.php";

$alias = $_SESSION['alias'];
$obra = $_SESSION['nombreObra'];
$idObra = $_SESSION['id_obra'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["btninsertarMat"])) {
        $idConcepto = $_POST["id_concepto"];
        $_SESSION['idconcepto'] = $idConcepto;
     
        $resultadoConcepto = mysqli_query($conexion, "SELECT * FROM conceptos WHERE id_obra = '$idObra' AND id_concepto = '$idConcepto'");
        $consulta = mysqli_fetch_array($resultadoConcepto);
        $Concepto = $consulta['concepto'];
        $_SESSION['subtitulo'] = $Concepto;
    }
}

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
    <?php include("../Global/Header.php") ?>
    <div>
        <nav>
        <form action="puback.php" method="POST">
            <div class="text-white p-3" style="background-color: #3C4857;">
                <div class="container">
                    <form action="puback.php" method="post">
                        <div class="container p-1 mb-1">
                            <?php if (isset($_GET['contratistasSuccess'])) { ?>
                                <div class="alert alert-success text-center" role="alert" style="background-color: green; color:aliceblue;">
                                    <?php echo $_GET['contratistasSuccess'] ?>
                                </div>
                            <?php
                            }
                            ?>
                            <?php if (isset($_GET['contratistasError'])) { ?>
                                <div class="alert alert-danger text-center" role="alert" style="background-color: red; color:aliceblue;">
                                    <?php echo $_GET['contratistasError'] ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group">
                                <select class="form-control" name="id_material" id="id_material">
                                        <option value="#" selected="true" disabled>--Seleccione El Material--</option>
                                        <?php
                                        $resultado = mysqli_query($conexion, "SELECT * FROM materiales WHERE id_obra = $idObra");
                                        while ($consulta = mysqli_fetch_array($resultado)) {
                                        ?>
                                            <option value="<?php echo $consulta['id_material'] ?>">
                                                <?php echo ucfirst($consulta['material']); ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <div class="col">
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="Cantidad Pesos" name="cantidadp">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="Cantidad Dolares" name="cantidadd">
                                    </div>
                                </div>
                                    </div>  
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <button class="input-text btn btn-primary" type="submit" name="btninsertarMat1">Insertar Material</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </div>
    <?php  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["btninsertarMat1"])) {
            $idMaterial = $_POST["id_material"];
            $CantidadMatp = $_POST["cantidadp"];if($CantidadMatp == ""){$CantidadMatp = 0;}
            $CantidadMatd = $_POST["cantidadd"];if($CantidadMatd == ""){$CantidadMatd = 0;}
            $idConcepto = $_SESSION['idconcepto'];

            $resultadoPrecio = mysqli_query($conexion, "SELECT * FROM materiales WHERE id_obra = '$idObra' AND id_material = $idMaterial");
            $consulta = mysqli_fetch_array($resultadoPrecio);
            $precio = $consulta['importe_pesos'];

            $insertar = "INSERT INTO preciospu (id_concepto,id_material,cantidadmatp,id_obra,pumatp) VALUES ($idConcepto,$idMaterial,$CantidadMatp,$idObra,$precio)";
            $ejecutar = mysqli_query($conexion, $insertar);
        }}
    ?>
    <div class="container">
        <table class="table text-center" id="idTabla">
            <thead class="table table-dark">
                <?php
            $resultadoUnidad = mysqli_query($conexion, "SELECT * FROM preciospu WHERE id_obra = '$idObra' AND id_concepto = '$idConcepto'");
            $consulta = mysqli_fetch_array($resultadoUnidad);
            $Unidad = $consulta['unidad'];

                echo $_SESSION['subtitulo'];
                echo "<br>";
                echo $Unidad;
                ?>
                <tr>
                    <th>Concepto</th>
                    <th>Unidad</th>
                    <th>Cantidad Pesos</th>
                    <th>Importe Pesos</th>
                    <th>Importe Pesos</th>
                    <th>Cantidad Dolares</th>
                    <th>Importe Dólares</th>
                    <th>Importe Dolares</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $resultadoConcepto = mysqli_query($conexion, "SELECT * FROM preciospu WHERE id_obra = '$idObra' AND id_concepto = $idConcepto");
                while ($consulta = mysqli_fetch_array($resultadoConcepto)) {
                   $idMaterial = $consulta['id_material'];

                   $resultadoMaterial = mysqli_query($conexion, "SELECT * FROM materiales WHERE id_obra = '$idObra' AND id_material = $idMaterial");
                   $consulta1 = mysqli_fetch_array($resultadoMaterial);
                      $Material = $consulta1['material'];
                 
                ?>
                        <tr>
                            <th>
                                <div align="left"><?php echo strtoupper($consulta1['material']); ?></div>
                            </th>
                            <th><?php echo strtoupper($consulta1['unidad']); ?></th>
                            <th><?php echo strtoupper($consulta['cantidadmatp']); ?></th>
                            <th><?php echo $consulta1['importe_pesos']; ?></th>
                            <th><?php echo ($consulta1['importe_pesos'] * $consulta['cantidadmatp']); ?></th>
                            <th><?php echo strtoupper($consulta['cantidadmatd']); ?></th>
                            <th><?php echo strtoupper($consulta['pumatd']); ?></th>
                            <th><?php echo ($consulta['cantidadmatd'] * $consulta['pumatd']); ?></th>
                            <th><td>
                         
                         <a href="EliminarPresupuestoPu.php?id_presupuestopu=<?php echo $idPrespuestoPU ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                     </td></th>
                            <th><td>
                         
                            <a href="EliminarPresupuestoPu.php?id_presupuestopu=<?php echo $idPrespuestoPU ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </td></th>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <th class="table__head">
                            </div>
                        </th>
                        <th>SUMA</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <td>
                           
                        </td>
                    </tr>
              
                <tr>
                    <th>SUMA</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
               
                ?>
                <tr>
                    <th>SUMA PESOS DOLARES EN PESOS</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            <tbody>
        </table>
    </div>