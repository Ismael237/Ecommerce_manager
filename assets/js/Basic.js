const nav = document.getElementById("nav");
const nav_items = document.querySelectorAll(".nav-item-list a.btn");
const button = document.getElementById('add');

const current_url = window.location.href;
const pathname = window.location.pathname;

nav_items.forEach((nav_item) => {
    if (nav_item.href === current_url) {
        nav_item.classList.add("active");
    } else {
        nav_item.classList.remove("active");
    }
});

function cloneTemp(template_id) {
    const template = document.getElementById(template_id);
    return template.content.cloneNode(true);
}

function showSelect(label, name, parent_node) {
    const input_group = cloneTemp("select-group-temp");
    input_group.querySelector(".input-group label").innerText = label;
    input_group.querySelector(".input-group .field select").name = name;
    parent_node.appendChild(input_group);
}

function showInput(label, name, parent_node, type = "text") {
    const input_group = cloneTemp("input-group-temp");
    input_group.querySelector(".input-group label").innerText = label;
    input_group.querySelector(".input-group .field input").name = name;
    input_group.querySelector(".input-group .field input").type = type;
    parent_node.appendChild(input_group);
}

function showModal(titre, content) {
    const modal_clone = cloneTemp("modal-temp");
    modal_clone.querySelector(".modal-header .title").innerText = titre;
    modal_clone.querySelector(".modal-body").appendChild(content);
    document.body.appendChild(modal_clone);
}

function closeModal() {
    document.querySelector(".modal").remove();
}

let modal_title = "";
let modal_body = "";
const form = document.createElement("form");
form.method = "post"

switch (pathname) {
    case "/products.php":
        form.action = "add_product.php"
        showInput("Nom du produit", "name", form);
        showInput("Description du produit", "description", form);
        showInput("Quantité", "quantity", form, "number");
        showSelect("Catégorie", "category_id", form);
        modal_title = "Ajouter un produit";
        modal_body = form;
        break;
    case "/customers.php":
        form.action = "customer/add_customer.php"
        showInput("Nom du client", "name", form);
        showInput("Adresse", "address", form);
        showInput("Numéro de telephone", "phone_number", form, "tel");
        modal_title = "Ajouter un Client";
        modal_body = form;
        break;
    case "/orders.php":
        form.action = "add_order.php"
        showSelect("Nom du produit", "product_id", form);
        showSelect("Nom du client", "customers_id", form);
        showInput("Quantité acheté", "phone_number", form, "number");
        modal_title = "Ajouter un Achat";
        modal_body = form;
        break;
    case "/deliveries.php":
        form.action = "add_deliveries.php"
        showInput("Nom du fournisseurs", "name", form);
        showInput("Adresse", "text", form);
        showInput("Numéro de telephone", "phone_number", form, "tel");
        modal_title = "Ajouter une commande";
        modal_body = form;
        break;
    case "/suppliers.php":
        form.action = "add_suppliers.php"
        showInput("Nom du fournisseurs", "name", form);
        showInput("Adresse", "text", form);
        showInput("Numéro de telephone", "phone_number", form, "tel");
        modal_title = "Ajouter un fournisseur";
        modal_body = form;
        break;
    case "/categories.php":
        form.action = "add_categories.php"
        showInput("Nom de la categories", "name", form);
        modal_title = "Ajouter une categories";
        modal_body = form;
        break;
    default:
        break;
}

button.addEventListener("click", () => {
    showModal(modal_title, modal_body);
    const cancel_modal = document.getElementById("cancel");
    const save_modal = document.getElementById("save");
    cancel_modal.addEventListener("click", closeModal);
    save_modal.addEventListener("click", () => modal_body.submit());
});

document.addEventListener('click', function(event) {
    if (event.target.classList.contains('close-button')) {
      event.target.closest('.modal').remove();
    }
});

