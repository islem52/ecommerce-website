<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="navbar.css" />
    <title>e-commerce</title>
  </head>
  <body>
    <script src="index.js" type="module" defer></script>
    <script src="navbar.js" type="module" defer></script>
    
    <?php include 'navbar.php'; ?>
    
    <!-- grid layout only for the products -->
    <div class="products-container">
      <template class="product-template">
        <div class="product-card" data-id="1" onclick="handleProductClick(1)">
          <img src="../assets/maquette.png" alt="Product Image" />
          <div class="details">
            <h3 class="product-name">Product 1</h3>
            <div class="bottom-card">
              <p class="product-price">99.99</p>
              <button class="add-cart">🛒</button>
            </div>
          </div>
        </div>
        <div class="product-card" data-id="2" onclick="handleProductClick(2)">
          <img src="../assets/maquette.png" alt="Product Image" />
          <div class="details">
            <h3 class="product-name">Product 2</h3>
            <div class="bottom-card">
              <p class="product-price">199.99</p>
              <button class="add-cart">🛒</button>
            </div>
          </div>
        </div>
        <!-- Add more products as needed -->
      </template>
    </div>

    <script>
      function handleProductClick(productId) {
        window.location.href = 'set_cookie.php?product_id=' + productId; // Redirect to set_cookie.php
      }
    </script>
  </body>
</html>
