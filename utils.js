export async function fetchProducts() {
  try {
    // Fetch JSON data
    const response = await fetch("https://dummyjson.com/products");
    const { products } = await response.json(); // Destructure to get the `products` array
    if (products.length === 0) {
      console.log("No products found");
    }
    return products;
  } catch (error) {
    console.error("Error fetching products", error);
    return [];
  }
}

export function generateProductCard(product) {
  const template = document.querySelector(".product-template");
  const cardFragment = template.content.cloneNode(true);
  const card = cardFragment.querySelector(".product-card");

  card.setAttribute("data-id", product.id);

  // Set the image
  const img = card.querySelector("img");
  img.src = product.thumbnail;
  img.alt = product.title;

  // Set the name
  card.querySelector("h3").textContent = product.title;

  // Set the price
  card.querySelector("p").textContent = product.price.toFixed(2) + "$";

  // Add click event listener to the card
  card.addEventListener("click", (event) => {
    const productID = event.currentTarget.getAttribute("data-id");
    console.log("Clicked product ID: ", productID);
  });

  // Add toggle functionality for the cart button
  const cartButton = card.querySelector(".add-cart");
  cartButton.addEventListener("click", (event) => {
    event.stopPropagation(); // Prevent triggering the card click event
    cartButton.classList.toggle("active");

    // Log product details
    if (cartButton.classList.contains("active")) {
      console.log(
        `Added to cart: ID=${product.id}, Title=${
          product.title
        }, Price=${product.price.toFixed(2)}$`
      );
    } else {
      console.log(
        `Removed from cart: ID=${product.id}, Title=${product.title}`
      );
    }
  });

   // to redirect to product page
   card.addEventListener("click", (event) => {
    const productID = event.currentTarget.getAttribute("data-id");
    document.cookie = `selectedProductID=${productID}; path=/detail/product.php`;
    window.location.href = "product.php";
  });

  return cardFragment;
}

// Function that appends to the grid
export async function renderProducts(container) {
  try {
    const products = await fetchProducts();
    if (products.length > 0) {
      products.forEach((product) => {
        const productCard = generateProductCard(product);
        container.appendChild(productCard);
      });
    }
  } catch (error) {
    console.error(error);
  }
  // to redirect to product page
  card.addEventListener("click", (event) => {
    const productID = event.currentTarget.getAttribute("data-id");
    document.cookie = `selectedProductID=${productID}; path=/`;
    window.location.href = "product.php";
  });
}
