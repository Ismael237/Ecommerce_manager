<?php
require "../db_connection.php";

if (isset($_POST["delivery_id"]) && isset($_POST["product_id"]) && isset($_POST["supplier_id"]) && isset($_POST["quantity"])) {
    $product_id = htmlspecialchars($_POST["product_id"]);
    $supplier_id = htmlspecialchars($_POST["supplier_id"]);
    $quantity = htmlspecialchars($_POST["quantity"]);
    $delivery_id = htmlspecialchars($_POST["delivery_id"]);
    $delivery_status = "En attente";

    $add_delivery = "UPDATE Delivery SET product_id = ?, supplier_id = ?, quantity = ?, delivery_status = ? WHERE id = ?";
    $response = $db->prepare($add_delivery);
    $response->execute(array($product_id, $supplier_id, $quantity, $delivery_status, $delivery_id));
}

header("Location: /deliveries.php");
