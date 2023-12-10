const product_selector_input = document.getElementById('product_name_selector');
const unit_price_input = document.getElementById('pu');
const product_name = document.getElementById('product_name');
const product_id = document.getElementById('product_id');
const quantity_input = document.getElementById('quantite');
const quantite_vente = document.getElementById('quantite_vente');
const order_form = document.getElementById('order_form');
const order_button = document.getElementById('order_button');
const modal = document.querySelector('.modal');
const cancel_order = document.getElementById('cancel_order');
const save_order = document.getElementById('save_order');

function fillField() {
    const selected_product = product_selector_input.options[product_selector_input.selectedIndex];
    const chaine = selected_product.dataset.product;
    const valeurs = chaine.split('#');

    product_id.value = valeurs[0];
    product_name.value = valeurs[1]
    unit_price_input.value = valeurs[2];
    quantity_input.value = valeurs[3];
}

function fillModal() {
    const product_name = document.querySelector('.modal #product_name');
    const number_units = document.querySelector('.modal #number_units');
    const unit_price = document.querySelector('.modal #unit_price');
    const cumulative_amount = document.querySelector('.modal #cumulative_amount');
    product_name.innerText = product_name.value;
    number_units.innerText = quantite_vente.value;
    unit_price.innerText = unit_price_input.value + " F";
    cumulative_amount.innerText = Number(quantite_vente.value) * Number(unit_price_input.value) + " F";
}

function closeModal() {
    modal.style.display = 'none';
}

function openModal() {
    modal.style.display = 'block';
}

product_selector_input.addEventListener('change', fillField);

order_button.addEventListener('click', function () {
    if (product_selector_input.selectedIndex === 0) {
        product_selector_input.setCustomValidity("Vous devez d'abord choisir un produit");
        product_selector_input.reportValidity();
    } else if (Number(quantite_vente.value) > Number(quantity_input.value)) {
        quantite_vente.setCustomValidity("Stock insuffisant");
        quantite_vente.reportValidity();
    }else if (Number(quantite_vente.value) <= 0) {
        quantite_vente.setCustomValidity("Vous devez acheter au moins un(1) produit");
        quantite_vente.reportValidity();
    } else {
        openModal();
        fillModal();
    }
});

cancel_order.addEventListener('click', function () {
    closeModal();
})

save_order.addEventListener('click', function () {
    order_form.submit();
})