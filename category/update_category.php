<?php
    require "../db_connection.php";

    if(isset($_POST["name"]) && isset($_POST["category_id"])){
        $name = htmlspecialchars($_POST["name"]);
        $category_id = htmlspecialchars($_POST["category_id"]);
        
        $sql = "UPDATE Category SET name = ? WHERE id = ? ";
        $response = $db->prepare($sql);
        $response->execute(array($name, $category_id));
    }

    header("Location: /categories.php");
