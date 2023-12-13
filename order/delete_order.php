<?php

require "../db_connection.php";

if (isset($_POST["order_id"])) {
    $order_id = $_POST["order_id"];

    $sql = "DELETE FROM Product WHERE id = :order_id";
    $response = $db->prepare($sql);
    $response->bindParam("order_id", $order_id);

    if ($response->execute()) {
        header("Location: /orders.php");
        exit();
    }
}