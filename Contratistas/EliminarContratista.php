<?php
    session_start();
    ob_start();
    
    include "../Conexion.php";
    
    $id_contratista = $_REQUEST['id_contratista'];

    $SQL = "DELETE FROM contratista WHERE id_contratista = '$id_contratista'";
    $query = mysqli_query($conexion,$SQL);

    if ($query) {
        header("Location: Contratistas.php?contratistasSuccess=El contratista ha sido eliminado correctamente");
        exit();
    }
?>