<?php

ob_start();
?>

<div class="input-group">
    <div class="field">
        <select name="Filter" id="category_name_selector">
            <option data-product="" selected disabled>Filtrer par...</option>
            <?php
            foreach ($categories as $category) {
            ?>
                <option value="<?php echo $category["name"] ?>"><?php echo $category["name"] ?></option>";
            <?php } ?>
        </select>
    </div>
</div>

<?php
$select = ob_get_clean();

