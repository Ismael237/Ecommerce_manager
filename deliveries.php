<?php 

include "functions.php";
include "db_connection.php";

$css_path = "";
$title = "Commande";
$name = "delivery";
$table_header = [
    "Id", 
    "Nom du produit", 
    "nom du fournisseur", 
    "Quantité", 
    "Status",
    "Date et heure",
    "Id Produit",
    "Id Fournisseur"
];
$data = getDeliveries($db);
$products = getProducts($db);
$suppliers = getSuppliers($db);

include "templates/right_page.php";
