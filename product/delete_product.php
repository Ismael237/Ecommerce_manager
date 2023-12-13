<?php

require "../db_connection.php";

if (isset($_POST["product_id"])) {
    $product_id = $_POST["product_id"];

    $sql = "DELETE FROM Product WHERE id = :product_id";
    $response = $db->prepare($sql);
    $response->bindParam("product_id", $product_id);

    if ($response->execute()) {
        header("Location: /products.php");
        exit();
    }
}