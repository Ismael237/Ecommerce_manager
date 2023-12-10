<?php
    require "./dbConnection.php";

    if(isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["unit_price"]) && isset($_POST["quantity"]) && isset($_POST["category_id"])){
        $name = htmlspecialchars($_POST["name"]);
        $description = htmlspecialchars($_POST["description"]);
        $unit_price = htmlspecialchars($_POST["unit_price"]);
        $quantity = htmlspecialchars($_POST["quantity"]);
        $category_id = htmlspecialchars($_POST["category_id"]);
        
        $add_product = "INSERT INTO Product (name, description, unit_price, quantity, category_id) VALUES(?, ?, ?, ?, ?)";
        $response = $db->prepare($add_product);
        $response->execute(array($name, $description, $unit_price, $quantity, $category_id));
    }

    header("Location: products.php");
