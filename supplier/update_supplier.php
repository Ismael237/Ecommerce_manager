<?php
    require "../db_connection.php";

    if(isset($_POST["supplier_id"]) && isset($_POST["name"]) && isset($_POST["address"]) && isset($_POST["phone_number"])){
        $name = htmlspecialchars($_POST["name"]);
        $address = htmlspecialchars($_POST["address"]);
        $phone_number = htmlspecialchars($_POST["phone_number"]);
        $supplier_id = htmlspecialchars($_POST["supplier_id"]);
        
        $add_supplier = "UPDATE Supplier SET name = ?, address = ?, phone_number = ? WHERE id = ?";
        $response = $db->prepare($add_supplier);
        $response->execute(array($name, $address, $phone_number, $supplier_id));
    }

    header("Location: /suppliers.php");
