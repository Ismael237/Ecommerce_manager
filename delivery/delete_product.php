<?php

require "../db_connection.php";

if (isset($_POST["delivery_id"])) {
    $delivery_id = $_POST["delivery_id"];

    $sql = "DELETE FROM Product WHERE id = :delivery_id";
    $response = $db->prepare($sql);
    $response->bindParam("delivery_id", $delivery_id);

    if ($response->execute()) {
        header("Location: /deliveries.php");
        exit();
    }
}