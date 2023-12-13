<?php

require "../db_connection.php";

if (isset($_POST["supplier_id"])) {
    $supplier_id = $_POST["supplier_id"];

    $sql = "DELETE FROM Product WHERE id = :supplier_id";
    $response = $db->prepare($sql);
    $response->bindParam("supplier_id", $supplier_id);

    if ($response->execute()) {
        header("Location: /suppliers.php");
        exit();
    }
}