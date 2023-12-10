<?php
function getProducts($db) {
    $sql = "SELECT name, description, unit_price, quantity, category_id FROM Product";
    $response = $db->query($sql);
    return $response->fetchAll(PDO::FETCH_ASSOC);;
}

function getOrder($db) {
    $sql = "SELECT * FROM Order_Table";
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
    $sql = "SELECT name, address, phone_number FROM Customer";
    $response = $db->query($sql);
    return $response->fetchAll(PDO::FETCH_ASSOC);;
}
function getDeliveries($db) {
    $sql = "SELECT * FROM Customer";
    $response = $db->query($sql);
    return $response->fetchAll(PDO::FETCH_ASSOC);;
}

function generateTable($data, $tableStructure)
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
            <button class="btn btn-outline">Modifier</button>
            <button class="btn btn-outline">Supprimer</button>
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