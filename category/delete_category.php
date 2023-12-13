<?php

require "../db_connection.php";

if (isset($_POST["category_id"])) {
    $category_id = $_POST["category_id"];

    $sql = "DELETE FROM Category WHERE id = :category_id";
    $response = $db->prepare($sql);
    $response->bindParam("category_id", $category_id);

    if ($response->execute()) {
        header("Location: /categories.php");
        exit();
    }
}