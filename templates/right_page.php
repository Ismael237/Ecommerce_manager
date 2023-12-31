<?php 
include "templates/select.php";

ob_start();
?>

<div class="right_page">
    <div class="top">
        <div class="title"><?php echo $title ?>s</div>
        <div class="right-top">
            <button id="add" data-name="<?php echo $name ?>" class="btn btn-primary">Ajouter un <?php echo $title ?></button>
        </div>
    </div>
    <?php 
        generateTable($data, $table_header, $name);
    ?>
</div>

<?php

$content = ob_get_clean(); 

include "templates/basic.php";
