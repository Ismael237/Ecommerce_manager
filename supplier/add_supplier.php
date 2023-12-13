<?php
    require "../db_connection.php";

    if(isset($_POST["name"]) && isset($_POST["address"]) && isset($_POST["phone_number"])){
        $name = htmlspecialchars($_POST["name"]);
        $address = htmlspecialchars($_POST["address"]);
        $phone_number = htmlspecialchars($_POST["phone_number"]);
        
        $add_supplier = "INSERT INTO Supplier (name, address, phone_number) VALUES (?, ?, ?)";
        $response = $db->prepare($add_supplier);
        $response->execute(array($name, $address, $phone_number));
    }

    header("Location: /suppliers.php");
