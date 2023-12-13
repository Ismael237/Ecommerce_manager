<?php 

include "functions.php";
include "db_connection.php";

$css_path = "";
$title = "Fournisseur";
$name = "supplier";
$table_header = ["id", "Nom", "Adresse", "Numero de telephone"];
$data = getSuppliers($db);

include "templates/right_page.php";
