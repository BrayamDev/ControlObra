<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "controlobra";

$conexion = mysqli_connect($host, $user, $pass, $db);

$tabla_db = "clientep";
$tabla_db1 = "cliente";
$tabla_db2 = "usuario";
$tabla_db3 = "obra";
$tabla_db4 = "presupuesto";
$tabla_db5 = "contrato";
$tabla_db6 = "estimaciones";
$tabla_db7 = "contratista";
$tabla_db8 = "mensaje";
$tabla_db9 = "acceso";
$tabla_db10 = "actividad";
$tabla_db11 = "presupuestoc";
$tabla_db12 = "concepto";
$tabla_db13 = "subconcepto";
$tabla_db14 = "estimacionpesos";
$tabla_db15 = "estimaciondolares";
$tabla_db16 = "chequera";
$tabla_db17 = "materialp";
$tabla_db18 = "material";
$tabla_db19 = "pu";
$tabla_db20 = "conceptos";
$tabla_db21 = "subconceptos";
$tabla_db22 = "ssubconceptos";
$tabla_db23 = "pres";
$tabla_db24 = "cuadrilla";
$tabla_db25 = "mo";
$tabla_db26 = "conceptop";
$tabla_db27 = "cuadrillap";
$tabla_db28 = "pub";
$tabla_db29 = "basicos";
$tabla_db30 = "maquinaria";
$tabla_db31 = "explosion";
$tabla_db32 = "verpres";
$tabla_db33 = "fsr";
$tabla_db34 = "factoressr";
$tabla_db35 = "maquinariaconc";
$tabla_db36 = "maq";
$tabla_db37 = "conceptospres";
$tabla_db38 = "concept";
$tabla_db39 = "jugada";
$tabla_db40 = "nombasicos";
$tabla_db41 = "subcontrato";
$tabla_db42 = "flujo";
$tabla_db43 = "indirectos";
$tabla_db44 = "estpdf";
$tabla_db45 = "prespdfmat";
$tabla_db46 = "controlmaterial";

if (!$conexion) {
     echo "Conexion Fallida";
}

$conexion->set_charset("utf8");
