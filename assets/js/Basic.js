const nav = document.getElementById("nav");
const nav_items = document.querySelectorAll(".nav-item-list a.btn");
const add_button = document.getElementById("add");
const update_buttons = document.querySelectorAll(".btn-update");
const delete_buttons = document.querySelectorAll(".btn-delete");
const current_url = window.location.href;
const pathname = window.location.pathname;

nav_items.forEach((nav_item) => {
    if (nav_item.href === current_url) {
        nav_item.classList.add("active");
    } else {
        nav_item.classList.remove("active");
    }
});

function convertHTMLStringToNode(htmlString) {
    const range = document.createRange();
    const fragment = range.createContextualFragment(htmlString);
    const node = fragment.firstChild;
    return node;

}
function convertQueryStringToObject(queryString) {
    const params = new URLSearchParams(queryString);
    const obj = {};

    for (const [key, value] of params.entries()) {
        obj[key] = value;
    }

    return obj;
}

function cloneTemp(template_id) {
    const template = document.getElementById(template_id);
    return template.content.cloneNode(true);
}

function showTextArea(label, name, parent_node, value = "") {
    const input_group = cloneTemp("select-group-temp");
    const textarea = document.createElement("textarea");
    input_group.querySelector(".input-group label").innerText = label;
    textarea.name = name;
    textarea.value = value;
    input_group.querySelector(".input-group .field").appendChild(textarea);
    parent_node.appendChild(input_group);
}

function showSelect(label, name, parent_node, select_type_id) {
    const input_group = cloneTemp("select-group-temp");
    const select = cloneTemp(select_type_id);
    input_group.querySelector(".input-group label").innerText = label;
    select.name = name;
    input_group.querySelector(".input-group .field").appendChild(select);
    parent_node.appendChild(input_group);
}

function showInput(label, name, parent_node, type = "text", value = "") {
    const input_group = cloneTemp("input-group-temp");
    input_group.querySelector(".input-group label").innerText = label;
    input_group.querySelector(".input-group .field input").name = name;
    input_group.querySelector(".input-group .field input").type = type;
    input_group.querySelector(".input-group .field input").value = value;
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

function show(input_form_name, form_node, input_label, input_name, input_type = "text", select_input_id_temp, value) {
    switch (input_form_name) {
        case "input":
            showInput(input_label, input_name, form_node, input_type, value);
            break;
        case "select":
            showSelect(input_label, input_name, form_node, select_input_id_temp, value);
            break;
        case "textarea":
            showTextArea(input_label, input_name, form_node, value);
            break;
        default:
            break;
    }
}

function createHiddenInput(page_name, id, parent_node) {
    const input = document.createElement("input");
    input.name = page_name + "_id";
    input.value = id;
    input.type = "hidden";
    parent_node.appendChild(input);
}

function createModalBody(type, input_list, page_name, data_to_modify = [], to_delete_info) {
    const action_page = "/" + page_name + "/" + type + "_" + page_name + ".php";
    const form = document.createElement("form");
    let modal_body;

    input_list.forEach((input) => {
        show(input.name_type, form, input.label, input.name, input.type, input.select_input_id_temp);
    });
    
    form.method = "post";
    form.action = action_page;
    
    if (type === "update") {
        const input = document.createElement("input");
        input.name = page_name + "_id";
        input.value = data_to_modify[0];
        input.type = "hidden";
        for (let i = 0; i < form.length; i++) {
            if (form[i].tagName === "SELECT") {
                for (var j = 0; j < form[i].options.length; j++) {
                    var option = form[i].options[j];
                    if (option.value == data_to_modify[i + 1]) {
                        option.selected = true;
                        break;
                    }
                }
            }else{
                form[i].value = data_to_modify[i + 1];
            }
        }
        form.appendChild(input);
    } else if (type === "delete") {
        const input = document.createElement("input");
        input.name = page_name + "_id";
        input.value = data_to_modify[0];
        input.type = "hidden";
        form.appendChild(input);
        form.appendChild(to_delete_info);
    }

    modal_body = form;
    return modal_body;

}

function modalAction() {
    const cancel_modal = document.getElementById("cancel");
    const save_modal = document.getElementById("save");
    const current_form = document.querySelector(".modal .modal-content .modal-body form");
    cancel_modal.addEventListener("click", closeModal);
    save_modal.addEventListener("click", () => current_form.submit());
}

let modal_title = "";
let modal_body = "";
const input_list = {
    product: [
        {
            name_type: "input",
            label: "Nom du produit",
            name: "name",
        },
        {
            name_type: "textarea",
            label: "Description du produit",
            name: "description",
        },
        {
            name_type: "input",
            label: "Prix unitaire",
            name: "unit_price",
            type: "number",
        },
        {
            name_type: "input",
            label: "Quantité en stock",
            name: "quantity",
            type: "number",
        },
        {
            name_type: "select",
            label: "Nom de la catégorie",
            name: "category_id",
            select_input_id_temp: "select-category-temp",
        },
    ],
    customer: [
        {
            name_type: "input",
            label: "Nom du client",
            name: "name",
        },
        {
            name_type: "input",
            label: "Adresse",
            name: "address",
        },
        {
            name_type: "input",
            label: "Numéro de telephone",
            name: "phone_number",
            type: "tel",
        },
    ],
    order: [
        {
            name_type: "select",
            label: "Nom du produit",
            name: "product_id",
            select_input_id_temp: "select-product-temp",
        },
        {
            name_type: "select",
            label: "Nom du client",
            name: "customer_id",
            select_input_id_temp: "select-customer-temp",
        },
        {
            name_type: "input",
            label: "Quantité acheté",
            name: "quantity",
            type: "number",
        },
    ],
    delivery: [
        {
            name_type: "select",
            label: "Nom du produit",
            name: "product_id",
            select_input_id_temp: "select-product-temp",
        },
        {
            name_type: "select",
            label: "Nom du fournisseur",
            name: "supplier_id",
            select_input_id_temp: "select-supplier-temp",
        },
        {
            name_type: "input",
            label: "Quantité",
            name: "quantity",
            type: "number",
        },
    ],
    supplier: [
        {
            name_type: "input",
            label: "Nom du fournisseur",
            name: "name",
        },
        {
            name_type: "input",
            label: "Adresse",
            name: "address",
        },
        {
            name_type: "input",
            label: "Numéro de telephone",
            name: "phone_number",
            type: "tel",
        },
    ],
    category: [
        {
            name_type: "input",
            label: "Nom de la catégorie",
            name: "name",
        },
    ],
}


add_button.addEventListener("click", (e) => {
    const page_name = e.target.dataset.name;
    switch (page_name) {
        case "product":
            modal_title = "Ajouter un produit";
            break;
        case "customer":
            modal_title = "Ajouter un Client";
            break;
        case "order":
            modal_title = "Ajouter un Achat";
            break;
        case "delivery":
            modal_title = "Ajouter une commande";
            break;
        case "supplier":
            modal_title = "Ajouter un fournisseur";
            break;
        case "category":
            modal_title = "Ajouter une categories";
            break;
        default:
            break;
    }
    modal_body = createModalBody("add", input_list[page_name], page_name);
    showModal(modal_title, modal_body);
    modalAction(modal_body);
});


update_buttons.forEach((update_button) => {
    update_button.addEventListener("click", (e) => {
        const page_name = e.target.dataset.name;
        const data = e.target.dataset[page_name];
        const object_data = convertQueryStringToObject(data);
        let data_to_modify = [object_data.id];

        switch (page_name) {
            case "product":
                modal_title = "Modifier un produit";
                data_to_modify = [
                    ...data_to_modify,
                    object_data.name,
                    object_data.description,
                    object_data.unit_price,
                    object_data.quantity,
                    object_data.category_id,
                ];
                break;
            case "customer":
                modal_title = "Modifier un Client";
                data_to_modify = [
                    ...data_to_modify, 
                    object_data.name, 
                    object_data.address, 
                    object_data.phone_number
                ];
                break;
            case "order":
                modal_title = "Modifier un Achat";
                break;
            case "delivery":
                modal_title = "Modifier une commande";
                break;
            case "supplier":
                modal_title = "Modifier un fournisseur";
                data_to_modify = [
                    ...data_to_modify, 
                    object_data.name, 
                    object_data.address, 
                    object_data.phone_number
                ];
                break;
            case "category":
                modal_title = "Modifier une categories";
                data_to_modify = [
                    ...data_to_modify, 
                    object_data.name,
                ];
                break;
            default:
                break;
        }
        modal_body = createModalBody("update", input_list[page_name], page_name, data_to_modify);
        showModal(modal_title, modal_body);
        modalAction(modal_body);
    });
})

delete_buttons.forEach((delete_button) => {
    delete_button.addEventListener("click", (e) => {
        const page_name = e.target.dataset.name;
        const data = e.target.dataset[page_name];
        const object_data = convertQueryStringToObject(data);
        let html_info;

        switch (page_name) {
            case "product":
                modal_title = "Supprimer un produit";
                html_info = `<div class="${page_name}-info">
                <p>Êtes-vous sûr de vouloir supprimer le produit suivant :</p>
                <p>Nom du produit : <span class="strong">${object_data.name}</span></p>
                <p>Description : <span class="strong">${object_data.description}</span></p>
              </div>`;
                break;
            case "customer":
                modal_title = "Supprimer un Client";
                html_info = `<div class="${page_name}-info">
                  <p>Êtes-vous sûr de vouloir supprimer le client suivant :</p>
                  <p>Nom du client : <span class="strong">${object_data.name}</span></p>
                </div>`;
                break;
            case "order":
                modal_title = "Supprimer un Achat";
                html_info = `<div class="${page_name}-info">
                    <p>Êtes-vous sûr de vouloir supprimer l'achat suivant :</p>
                    <p>Nom du produit : <span class="strong">${object_data.product_name}</span></p>
                  </div>`;
                break;
            case "delivery":
                modal_title = "Supprimer une commande";
                html_info = `<div class="${page_name}-info">
                      <p>Êtes-vous sûr de vouloir supprimer la commande suivante :</p>
                      <p>Nom du produit : <span class="strong">${object_data.name}</span></p>
                    </div>`;
                break;
            case "supplier":
                modal_title = "Supprimer un fournisseur";
                html_info = `<div class="${page_name}-info">
                        <p>Êtes-vous sûr de vouloir supprimer le fournisseur suivant :</p>
                        <p>Nom du fournisseur : <span class="strong">${object_data.name}</span></p>
                      </div>`;
                break;
            case "category":
                modal_title = "Supprimer une categories";
                html_info = `<div class="${page_name}-info">
                          <p>Êtes-vous sûr de vouloir supprimer la catégorie <span class="strong">${object_data.name}</span></p>
                        </div>`;
                break;
            default:
                break;
        }

        modal_body = createModalBody("delete", [], page_name, [object_data.id], convertHTMLStringToNode(html_info));
        showModal(modal_title, modal_body);
        modalAction();
    });
})


document.addEventListener('click', function (event) {
    if (event.target.classList.contains('close-button')) {
        event.target.closest('.modal').remove();
    }
});
