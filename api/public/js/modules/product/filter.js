/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************************!*\
  !*** ./src/Product/Backend/Resources/js/filter.js ***!
  \****************************************************/
var form = document.querySelector("#filter_form");
var colorsInputs = document.querySelectorAll("#colors input");

function getColors() {
  var colors = '';
  colorsInputs.forEach(function (input) {
    colors += input.checked ? input.name.replace('color_', '') + ',' : '';
  });
  return colors;
}

function getInputValueById(id) {
  var value = document.getElementById(id).value;
  return value.length ? value.trim() : '';
}

form.addEventListener('submit', function (event) {
  event.preventDefault();
  var name = getInputValueById("filter_name");
  var min_price = getInputValueById("filter_min_price");
  var max_price = getInputValueById("filter_max_price");
  var colors = getColors();
  var query = "?name=".concat(name, "&min_price=").concat(min_price, "&max_price=").concat(max_price, "&colors=").concat(colors);
  window.location.href = window.location.pathname + query;
});
/******/ })()
;