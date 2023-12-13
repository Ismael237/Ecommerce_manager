<?php
require "../db_connection.php";

if (isset($_POST["order_id"]) && isset($_POST["product_id"]) && isset($_POST["customer_id"]) && isset($_POST["quantity"])) {
    $product_id = htmlspecialchars($_POST["product_id"]);
    $customer_id = htmlspecialchars($_POST["customer_id"]);
    $quantity = htmlspecialchars($_POST["quantity"]);
    $order_id = htmlspecialchars($_POST["order_id"]);

    $add_order = "UPDATE Order_Table SET product_id = ?, customer_id = ?, quantity = ? WHERE id = ?";
    $response = $db->prepare($add_order);
    $response->execute(array($product_id, $customer_id, $quantity, $order_id));
}

header("Location: /orders.php");
