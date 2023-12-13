<?php

require "../db_connection.php";

if (isset($_POST["customer_id"])) {
    $customer_id = $_POST["customer_id"];

    $sql = "DELETE FROM Customer WHERE id = :customer_id";
    $response = $db->prepare($sql);
    $response->bindParam("customer_id", $customer_id);

    if ($response->execute()) {
        header("Location: /customers.php");
        exit();
    }
}