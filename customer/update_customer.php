<?php
require "../db_connection.php";

if (isset($_POST["customer_id"]) && isset($_POST["name"]) && isset($_POST["address"]) && isset($_POST["phone_number"])) {
    $name = htmlspecialchars($_POST["name"]);
    $address = htmlspecialchars($_POST["address"]);
    $phone_number = htmlspecialchars($_POST["phone_number"]);
    $customer_id = htmlspecialchars($_POST["customer_id"]);

    $sql = "UPDATE Customer SET name = ?, address = ?, phone_number = ? WHERE id = ?";
    $response = $db->prepare($sql);
    $response->execute(array($name, $address, $phone_number, $customer_id));
    
}

header("Location: /customers.php");