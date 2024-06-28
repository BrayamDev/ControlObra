<?php
    session_start();
    ob_start();
    
    include "../Conexion.php";
    
    $id_presupuestopu = $_REQUEST['id_presupuestopu'];

    $SQL = "DELETE FROM presupuestopu WHERE id_preupuestoPU = ' $id_presupuestopu'";
    $query = mysqli_query($conexion,$SQL);

    if ($query) {
        header("Location: GenerarPresupuesto.php?presupuestopuSuccess=El Concepto ha sido eliminado correctamente");
        exit();
    }
?>