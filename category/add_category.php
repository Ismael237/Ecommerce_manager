<?php
    require "../db_connection.php";

    if(isset($_POST["name"])){
        $name = htmlspecialchars($_POST["name"]);
        
        $add_category = "INSERT INTO Category (name) VALUES(?)";
        $response = $db->prepare($add_category);
        $response->execute(array($name));
    }

    header("Location: /categories.php");
