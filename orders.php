<?php 

include "functions.php";
include "db_connection.php";

$css_path = "";
$title = "Achat";
$name = "order";
$table_header = ["Id", "Nom du produit", "Date d'achat", "Nom du client"];
$data = getOrder($db);
$products = getProducts($db);
$customers = getCustomers($db);

include "templates/right_page.php";
