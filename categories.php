<?php 

include "functions.php";
include "db_connection.php";

$css_path = "";
$title = "Catégorie";
$table_header = ["id", "Nom"];
$data = getCategories($db);

include "templates/right_page.php";
