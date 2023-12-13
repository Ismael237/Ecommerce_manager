<?php
    require "../db_connection.php";

    if(isset($_POST["product_id"]) && isset($_POST["supplier_id"]) && isset($_POST["quantity"])){
        $product_id = htmlspecialchars($_POST["product_id"]);
        $supplier_id = htmlspecialchars($_POST["supplier_id"]);
        $quantity = htmlspecialchars($_POST["quantity"]);
        $delivery_status = "Termine";
        
        $add_delivery = "INSERT INTO Delivery (product_id, supplier_id, quantity, delivery_status, delivery_date) VALUES (?, ?, ?, ?, NOW())";
        $response = $db->prepare($add_delivery);
        $response->execute(array($product_id, $supplier_id, $quantity, $delivery_status));
    }

    header("Location: /deliveries.php");
