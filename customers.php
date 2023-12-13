<?php 

include "functions.php";
include "db_connection.php";

$css_path = "";
$title = "Client";
$name = "customer";
$table_header = ["Id", "Nom", "Adresse", "Numero de telephone"];
$data = getCustomers($db);

include "templates/right_page.php";
