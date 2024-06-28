<?php
    session_start();
    ob_start();
    
    include "../Conexion.php";
    
    $id_contrato = $_REQUEST['id_contrato'];

    $SQL = "DELETE FROM contrato WHERE id_contrato = '$id_contrato'";
    $query = mysqli_query($conexion,$SQL);

    if ($query) {
        header("Location: Contratos.php?contratosSuccess=El Contrato ha sido eliminado correctamente");
        exit();
    }
?>