<?php
    require "../db_connection.php";

    if(isset($_POST["name"]) && isset($_POST["address"]) && isset($_POST["phone_number"])){
        $name = htmlspecialchars($_POST["name"]);
        $address = htmlspecialchars($_POST["address"]);
        $phone_number = htmlspecialchars($_POST["phone_number"]);
        
        $add_customer = "INSERT INTO Customer (name, address, phone_number) VALUES(?, ?, ?)";
        $response = $db->prepare($add_customer);
        $response->execute(array($name, $address, $phone_number));
    }

    header("Location: /customers.php");
