<?php 

include "functions.php";
include "db_connection.php";

$css_path = "";
$title = "Client";
$table_header = ["Nom", "Adresse", "Numero de telephone"];
$data = getCustomers($db);

include "templates/right_page.php";
