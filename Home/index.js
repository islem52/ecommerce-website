import {
  fetchProducts,
  generateProductCard,
  renderProducts,
} from "../utils.js";

const container = document.querySelector(".products-container");

document.addEventListener("DOMContentLoaded", renderProducts(container));
