<?php 

include "functions.php";
include "db_connection.php";

$css_path = "";
$title = "Achat";
$table_header = ["Nom du produit", "date d'achat", "Nom du clint"];
$data = getOrder($db);

include "templates/right_page.php";
