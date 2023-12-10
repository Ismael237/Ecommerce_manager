<?php 

include "functions.php";
include "db_connection.php";

$css_path = "";
$title = "Fournisseur";
$table_header = ["Nom", "Adresse", "Numero de telephone"];
$data = getSuppliers($db);

include "templates/right_page.php";
