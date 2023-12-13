<?php 

include "functions.php";
include "db_connection.php";

$css_path = "";
$title = "Produit";
$name = "product";
$table_header = [ 
    "Id", 
    "Nom",  
    "Description",  
    "Prix unitaire",  
    "Quantité",  
    "Catégorie",  
    "Catégorie Id"
];
$categories = getCategories($db);
$data = getProducts($db);

include "templates/right_page.php";
