<?php
    require "../db_connection.php";

    if(isset($_POST["product_id"]) && isset($_POST["customer_id"]) && isset($_POST["quantity"])){
        $product_id = htmlspecialchars($_POST["product_id"]);
        $customer_id = htmlspecialchars($_POST["customer_id"]);
        $quantity = htmlspecialchars($_POST["quantity"]);
        
        $add_order = "INSERT INTO Order_Table (product_id, customer_id, quantity, order_date) VALUES(?, ?, ?, NOW())";
        $response = $db->prepare($add_order);
        $response->execute(array($product_id, $customer_id, $quantity));
    }

    header("Location: /orders.php");
