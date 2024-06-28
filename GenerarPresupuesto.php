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

    <?php include ("../Global/Header.php");
     //$resultadotipocambio = mysqli_query($conexion, "SELECT * FROM obra WHERE id_obra = '$idObra'");
     //$consulta1 = mysqli_fetch_array($resultadotipocambio);
     $resultado = mysqli_query($conexion, "SELECT * FROM concepto WHERE id_obra = '$idObra'");
     while($consulta = mysqli_fetch_array($resultado))
     ?>
     <div>
        <nav>
            <form action="../PresupuestoPU/GenerarPresupuesto.php" method="POST">
                <div class="text-white" style="background-color: #3C4857;">
                    <div class="container">
                        <div class="row p-3">
                            <div class="col">
                                <div class="contratos--dropdown">
                                    <script language="javascript">
                                        $(document).ready(function(){
                                        $("#cbx_concepto").change(function () {
                                        $("#cbx_concepto option:selected").each(function () {
                                        id_concepto = $(this).val();
                                        $.post("subest.php", { id_concepto: id_concepto }, function(data){
                                        $("#cbx_subconcepto").html(data);
                                        });            
                                        });
                                        })
                                        });

                                        $(document).ready(function(){
                                        $("#cbx_subconcepto").change(function () {
                                        $("#cbx_subconcepto option:selected").each(function () {
                                        id_subconcepto = $(this).val();
                                        $.post("ssubest.php", { id_subconcepto: id_subconcepto }, function(data){
                                        $("#cbx_ssubconcepto").html(data);
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
                            <div class="col">
                                <div class="partidas--dropdown">
                                    <div>
                                        <select class="form-control" name="cbx_ssubconcepto" id="cbx_ssubconcepto">
                                            <option value="#" selected="true" disabled>--Seleccione el Concepto--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                                </div>
                                <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Concepto" name="concepto">
                                </div>
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Unidad" name="unidad">
                                </div>
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Cantidad Pesos" name="cantidadp">
                                </div>
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Cantidad Dolares" name="cantidadd">
                                </div>
                            </div>       
                        <div class="text-center col">
                                <button class="form-control btn btn-primary" name="btnInsertarConcepto" type="submit">Insertar Concepto</button>
                        </div>
                        
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["btnInsertarConcepto"])) {
                $idConcepto = $_POST["cbx_concepto"];
                $idSubConcepto = $_POST["cbx_subconcepto"];
                $Concepto = $_POST["concepto"];
                $Unidad = $_POST["unidad"];
                $cantidadp = $_POST["cantidadp"];
                $cantidadd = $_POST["cantidadd"];

                $resultadoConcepto = mysqli_query($conexion, "SELECT * FROM presupuestopu WHERE id_obra = '$idObra' AND ssubconcepto = '$Concepto' AND id_subconcepto = $idSubConcepto AND id_concepto = $idConcepto");
                $consulta = mysqli_fetch_array($resultadoConcepto);
                $Conceptorepetido = $consulta['ssubconcepto'];

                if($Concepto != $Conceptorepetido){

                $insertar = "INSERT INTO ssubconcepto (ssubconcepto,id_subconcepto,id_concepto,id_obra) VALUES('$Concepto',$idSubConcepto,$idConcepto,$idObra)";
                $ejecutar = mysqli_query($conexion, $insertar);

                $insertar = "INSERT INTO presupuestopu (ssubconcepto,id_subconcepto,id_concepto,id_obra,unidad,cantidadpesos,cantidaddolares) VALUES('$Concepto',$idSubConcepto,$idConcepto,$idObra,'$Unidad',$cantidadp,$cantidadd)";
                $ejecutar = mysqli_query($conexion, $insertar);

                    }



                }}
            ?>

            <div class="container">
                    <table class="table text-center" id="idTabla">
                        <thead class="table table-dark">
                            <tr>
                               
                                <th class="table__head">Concepto</th>
                                <th class="table__head">Unidad</th>
                                <th class="table__head">Cantidad Pesos</th>
                                <th class="table__head">PU. Pesos</th>
                                <th class="table__head">Importe Pesos</th>
                                <th class="table__head">Cantidad Dolares</th>
                                <th class="table__head">PU.Dólares</th>
                                <th class="table__head">Importe Dolares</th>
                                <th class="table__head">Editar</th>
                                <th class="table__head">Eliminar</th>
                            </tr>
                        </thead>
        <tbody>
                <?php
                $idConceptoRepetido = 0;
                $idSubConceptoRepetido = 0;
                $ContadorConcepto = 0;
                $ContadorSubConcepto = 0;
                $SumaPresupuestoPesos = 0;
                $SumaPresupuestoDolares = 0;
                    $resultadoConcepto = mysqli_query($conexion, "SELECT * FROM presupuestopu WHERE id_obra = '$idObra' ORDER BY id_concepto");
                    while ($consulta = mysqli_fetch_array($resultadoConcepto)) {
                    $idSubConcepto = $consulta['id_subconcepto'];
                    $idConcepto = $consulta['id_concepto'];
                    $Cantidadp = $consulta['cantidadpesos'];
                    $Cantidadd = $consulta['cantidaddolares'];
                    $idPrespuestoPU = $consulta['id_preupuestoPU'];
                    $pup = $consulta['pupesos'];
                    $pud = $consulta['pud'];
                    $importepesos = $Cantidadp * $pup;
                    $importedolares = $Cantidadd * $pud;
                    $SumaPresupuestoPesos = $SumaPresupuestoPesos + $importepesos;
                    $SumaPresupuestoDolares = $SumaPresupuestoDolares + $importedolares;

                    if($idConcepto != $idConceptoRepetido) {$ContadorConcepto = 0;}else{$ContadorConcepto = $ContadorConcepto = $ContadorConcepto + 1;}
                    if($idSubConcepto != $idSubConceptoRepetido) {$ContadorSubConcepto = 0;}else{$ContadorSubConcepto = $ContadorSubConcepto + 1;}

                    $resultadoConcepto1 = mysqli_query($conexion, "SELECT * FROM concepto WHERE id_obra = '$idObra' and id_concepto = $idConcepto");
                    $consulta1 = mysqli_fetch_array($resultadoConcepto1);
                    
                    $resultadossubConcepto = mysqli_query($conexion, "SELECT * FROM subconcepto WHERE id_obra = $idObra AND id_subconcepto = $idSubConcepto");
                    $consulta2 = mysqli_fetch_array($resultadossubConcepto);

                    $resultadossubConcepto1 = mysqli_query($conexion, "SELECT * FROM presupuestopu WHERE id_obra = '$idObra' AND id_concepto = $idConcepto AND id_subconcepto = $idSubConcepto ");
                    $consulta3 = mysqli_fetch_array($resultadossubConcepto1);
                    $idConceptoRepetido = $consulta3['id_concepto'];
                    $idSubConceptoRepetido = $consulta3['id_subconcepto'];

                        if($ContadorConcepto ==0) {
                ?>
                 <tr>
                <th class="table__head"><div align = "left"><?php echo strtoupper($consulta1['concepto']); ?></div></th>
                <th class="table__head"></th>
                <th class="table__head"></th>
                <th class="table__head"></th>
                <th class="table__head"></th>
                <th class="table__head"></th>
                <th class="table__head"></th>
                <th class="table__head"></th>
                <th class="table__head"></th>
                <th class="table__head"></th>
            </tr>
                    <?php
                        }
                        if($ContadorSubConcepto == 0 ) {
                    ?>
            <tr>
                <th class="table__head"><div align = "left"><?php echo "&nbsp&nbsp".strtoupper($consulta2['subconcepto']); ?></div></th>
                <th class="table__head"></th>
                <th class="table__head"></th>
                <th class="table__head"></th>
                <th class="table__head"></th>
                <th class="table__head"></th>
                <th class="table__head"></th>
                <th class="table__head"></th>
                <th class="table__head"></th>
                <th class="table__head"></th>
            </tr>
                    <?php
                        }  
                    ?> 
            <tr>
                <th class="table__head"><div align = "left"><?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$consulta['ssubconcepto']; ?></div></th>
                <th class="table__head"><?php echo $consulta['unidad'] ?></th>
                <th class="table__head"><?php echo $Cantidadp; ?></th>
                <th class="table__head"><?php echo $consulta['pupesos']; ?></th>
                <th class="table__head"><?php echo $importepesos; ?></th>
                <th class="table__head"><?php echo $Cantidadd; ?></th>
                <th class="table__head"><?php echo $pud; ?></th>
                <th class="table__head"><?php echo $importedolares; ?></th>
                <th class="table__head">Editar</th>
                <td class="table__data">
                    <a href="EliminarPresupuestoPu.php?id_presupuestopu=<?php echo $idPrespuestoPU ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
                            <?php
                        }
                            ?>
                <tr>
                    <th class="table__head">SUMA</th>
                    <th class="table__head"></th>
                    <th class="table__head"></th>
                    <th class="table__head"></th>
                    <th class="table__head"><?php echo $SumaPresupuestoPesos; ?></th>
                    <th class="table__head"></th>
                    <th class="table__head"></th>
                    <th class="table__head"><?php echo $SumaPresupuestoDolares; ?></th>
                    <th class="table__head"></th>
                    <th class="table__head"></th>
                </tr>  
                <?php     
                $resultadoCambio = mysqli_query($conexion, "SELECT * FROM obra WHERE id_obra = '$idObra'");
                    $consulta4 = mysqli_fetch_array($resultadoCambio);
                    $tc = $consulta4['tc'];
                    $SumaPresupuestoPesos = $SumaPresupuestoPesos + $tc*$SumaPresupuestoDolares;
                    ?>
                <tr>
                    <th class="table__head">SUMA PESOS DOLARES EN PESOS</th>
                    <th class="table__head"></th>
                    <th class="table__head"></th>
                    <th class="table__head"></th>
                    <th class="table__head"><?php echo $SumaPresupuestoPesos; ?></th>
                    <th class="table__head"></th>
                    <th class="table__head"></th>
                    <th class="table__head"></th>
                    <th class="table__head"></th>
                    <th class="table__head"></th>
                </tr>       
        <tbody>
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
</html>