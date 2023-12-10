<?php 
include "templates/select.php";

ob_start();
?>

<div class="right_page">
    <div class="top">
        <div class="title"><?php echo $title ?>s</div>
        <div class="right-top">
            <?php 
                if(isset($categories)):
                    echo $select;
                endif;
            ?>
            <button id="add" class="btn btn-primary">Ajouter un <?php echo $title ?></button>
        </div>
    </div>
    <?php 
        generateTable($data, $table_header);
    ?>
</div>

<?php

$content = ob_get_clean(); 

include "templates/basic.php";
