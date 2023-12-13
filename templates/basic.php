<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/Basic.css">
    <link rel="stylesheet" href=<?php $css_path ?>>
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico">
    <title><?php echo $title ?></title>
</head>

<body>
    <div class="main">
        <nav id="nav">
            <div class="nav-content">
                <div class="logo">
                    <div class="img">
                        <img src="../assets/img/Logo.png" alt="">
                    </div>
                    <span>StockEasy</span>
                </div>
                <ul class="nav-item-list">
                    <li>
                        <a class="btn active" href="products.php">
                            <img src="../assets/img/icons/Box.png" alt="">
                            Produits
                        </a>
                    </li>
                    <li>
                        <a class="btn" href="customers.php">
                            <img src="../assets/img/icons/User_02.png" alt="">
                            Clients
                        </a>
                    </li>
                    <li>
                        <a class="btn" href="suppliers.php">
                            <img src="../assets/img/icons/Shopping_Bag_01.png" alt="">
                            Fournisseurs
                        </a>
                    </li>
                    <li>
                        <a class="btn" href="categories.php">
                            <img src="../assets/img/icons/Tag.png" alt="">
                            Catégories
                        </a>
                    </li>
                    <li>
                        <a class="btn" href="orders.php">
                            <img src="../assets/img/icons/Shopping_Cart_02.png" alt="">
                            Achats
                        </a>
                    </li>
                    <li>
                        <a class="btn" href="deliveries.php">
                            <img src="../assets/img/icons/Delivery.png" alt="">
                            Commandes
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <?php echo $content ?>
        <template id="modal-temp">
            <div class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="title">Confirmation</span>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-bad" id="cancel">annuler</button>
                        <button class="btn btn-primary" id="save">Enregistrer</button>
                    </div>
                </div>
            </div>
        </template>
        <template id="input-group-temp">
            <div class="input-group">
                <label for="input"></label>
                <div class="field">
                    <input type="text" name="input">
                </div>
            </div>
        </template>
        <template id="select-group-temp">
            <div class="input-group">
                <label for="input"></label>
                <div class="field"></div>
            </div>
        </template>
        <template id="select-category-temp">
            <select name="category_id">
                <option selected disabled>Sélectionner...</option>
                <?php
                foreach ($categories as $category) {
                ?>
                    <option value="<?php echo $category["id"] ?>"><?php echo $category["name"] ?></option>";
                <?php } ?>
            </select>
        </template>
        <template id="select-customer-temp">
            <select name="customer_id">
                <option selected disabled>Sélectionner...</option>
                <?php
                foreach ($customers as $customer) {
                ?>
                    <option value="<?php echo $customer["id"] ?>"><?php echo $customer["name"] ?></option>";
                <?php } ?>
            </select>
        </template>
        <template id="select-product-temp">
            <select name="product_id">
                <option selected disabled>Sélectionner...</option>
                <?php
                foreach ($products as $product) {
                ?>
                    <option value="<?php echo $product["id"] ?>"><?php echo $product["name"] ?></option>";
                <?php } ?>
            </select>
        </template>
        <template id="select-supplier-temp">
            <select name="supplier_id">
                <option selected disabled>Sélectionner...</option>
                <?php
                foreach ($suppliers as $supplier) {
                ?>
                    <option value="<?php echo $supplier["id"] ?>"><?php echo $supplier["name"] ?></option>";
                <?php } ?>
            </select>
        </template>
    </div>
    <script src="../assets/js/Basic.js"></script>
</body>

</html>