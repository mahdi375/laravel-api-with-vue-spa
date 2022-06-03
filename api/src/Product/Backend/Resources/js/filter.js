
const form = document.querySelector("#filter_form");
const colorsInputs = document.querySelectorAll("#colors input")

function getColors() {
    let colors = '';
    colorsInputs.forEach(input => {
        colors += input.checked ? (input.name.replace('color_', '')+',') : '';
    });

    return colors;
}

function getInputValueById(id) {
    let value = document.getElementById(id).value;
    return value.length ? value.trim() :  '';
}

form.addEventListener('submit', event => {
    event.preventDefault();
    const name = getInputValueById("filter_name");
    const min_price = getInputValueById("filter_min_price");
    const max_price = getInputValueById("filter_max_price");
    const colors = getColors();

    let query = `?name=${name}&min_price=${min_price}&max_price=${max_price}&colors=${colors}`;

    window.location.href = window.location.pathname+query;
})

