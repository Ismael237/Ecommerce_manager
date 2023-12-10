<?php 

include "functions.php";
include "db_connection.php";

$css_path = "";
$title = "Produit";
$table_header = ["Nom", "Description", "Prix unitaire", "Quantité", "category_id"];
$categories = getCategories($db);
$data = getProducts($db);

include "templates/right_page.php";
