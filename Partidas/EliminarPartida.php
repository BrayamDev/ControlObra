<?php
    session_start();
    ob_start();
    
    include "../Conexion.php";
    
    $id_presupuesto = $_REQUEST['id_presupuesto'];

    $SQL = "DELETE FROM presupuesto WHERE id_presupuesto = '$id_presupuesto'";
    $query = mysqli_query($conexion,$SQL);

    if ($query) {
        header("Location: Partidas.php?partidasSuccess=La Partida ha sido eliminado correctamente");
        exit();
    }
?>