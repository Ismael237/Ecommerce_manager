<?php    
    $serverName = "localhost";
    $username = "ismael";
    $password = "ismael";
    $dbname = "stock_easy";
    
    try {
        $db = new PDO("mysql:host=$serverName;dbname=$dbname", $username, $password);
    } catch (PDOException $error) {
        echo "échec de la connection : "+$error->getMessage();
    }
    $db->query("SET NAMES UTF8");
    $db->query('SET lc_time_names = \'fr_FR\'');