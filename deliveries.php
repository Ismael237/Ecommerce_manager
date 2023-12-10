<?php 

include "functions.php";
include "db_connection.php";

$css_path = "";
$title = "Commande";
$table_header = ["Nom du produit", "nom du fournisseur", "Quantité", "Status","Date et heure"];
$data = getDeliveries($db);

include "templates/right_page.php";
