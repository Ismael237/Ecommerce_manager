<?php
function getProducts($db) {
    $sql = "SELECT p.id, p.name, p.description, p.unit_price, p.quantity, c.name AS category_name, c.id AS category_id 
            FROM Product p
            JOIN Category c ON p.category_id = c.id";
    $response = $db->query($sql);
    return $response->fetchAll(PDO::FETCH_ASSOC);;
}

function getOrder($db) {
    
    $sql = "SELECT 
            o.id AS id, 
            p.name AS product_name, 
            o.order_date, 
            c.name AS customer_name,
            o.quantity,
            p.id AS product_id, 
            c.id AS customer_id
            FROM Order_Table o
            JOIN Product p ON p.id = o.product_id
            JOIN Customer c ON c.id = o.customer_id";

    $response = $db->query($sql);
    return $response->fetchAll(PDO::FETCH_ASSOC);;
}
function getCategories($db) {
    $sql = "SELECT * FROM Category";
    $response = $db->query($sql);
    return $response->fetchAll(PDO::FETCH_ASSOC);;
}

function getSuppliers($db) {
    $sql = "SELECT * FROM Supplier";
    $response = $db->query($sql);
    return $response->fetchAll(PDO::FETCH_ASSOC);
}

function getCustomers($db) {
    $sql = "SELECT id, name, address, phone_number FROM Customer";
    $response = $db->query($sql);
    return $response->fetchAll(PDO::FETCH_ASSOC);;
}
function getDeliveries($db) {
    $sql = "SELECT d.id AS id, 
            p.name AS product_name, 
            s.name AS supplier_name, 
            p.quantity AS quantity, 
            d.delivery_status,
            d.delivery_date,
            p.id AS product_id,
            s.id AS supplier_id
            FROM Delivery d
            JOIN Product p ON p.id = d.product_id
            JOIN Supplier s ON s.id = d.supplier_id";
    $response = $db->query($sql);
    return $response->fetchAll(PDO::FETCH_ASSOC);;
}

function generateTable($data, $tableStructure, $name)
{
    $is_numeric = "";
    array_push($tableStructure, "Action");
    echo '<div class="dynamic_table">';
    echo '<table>';
    echo '<thead>';
    echo '<tr>';

    foreach ($tableStructure as $column) {
        echo '<th>' . $column . '</th>';
    }

    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($data as $row) {
        echo '<tr>';
        foreach ($row as $value) {
            if(is_numeric($value)){
                $is_numeric = "is_numeric";
            }
            echo '<td class="'.$is_numeric.'">' . $value . '</td>';
        }
        echo '<td class="action">
            <button data-name="'. $name .'" data-'. $name .'="'. http_build_query($row) .'" class="btn btn-outline btn-update">Modifier</button>
            <button data-name="'. $name .'" data-'. $name .'="'. http_build_query($row) .'" class="btn btn-outline btn-delete">Supprimer</button>
        </td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    if (count($data) <= 0) {
        echo '<div class="no_data">Aucune donnée disponible</div>';
    }
    echo '</div>';
    
}