<?php
// Start the session
session_start();

// Check if the product ID is set in the cookie or URL
$productId = isset($_COOKIE['selectedProduct']) ? $_COOKIE['selectedProduct'] : (isset($_GET['id']) ? htmlspecialchars($_GET['id']) : null);

if (!$productId) {
    echo "No product selected.";
    exit();
}

// Fetch product details from the local products data
$products = json_decode(file_get_contents('../data/products.js'), true);
$product = array_filter($products, fn($p) => $p['id'] == $productId);

if (empty($product)) {
    echo "Product not found.";
    exit();
}

$product = reset($product); // Get the first (and only) product
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="product.css">
    <title><?php echo $product['title']; ?></title>
</head>
<body>
    <div class="product-details">
        <h1><?php echo $product['title']; ?></h1>
        <div class="product-content">
            <div class="img-section">
                <img id="main-image" src="<?php echo $product['images'][0]; ?>" alt="<?php echo $product['title']; ?>">  
                <div class="thumbnail-container">
                    <?php foreach ($product['images'] as $image): ?>
                        <img class="thumbnail" src="<?php echo $image; ?>" alt="Thumbnail" onclick="changeImage(this)">
                    <?php endforeach; ?>
                </div>
            </div>
                
            <div class="product-definition">
                <p class="product-description">
                    <?php echo $product['description']; ?>
                </p>

                <div class="quantity-control">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" min="1" value="1">
                </div>

                <p class="price">Prix: <?php echo $product['price']; ?> DA</p>
                <button class="buy-button" aria-label="Buy this product">J'achète</button>
            </div>
        </div>
    </div>
       
    <script>
        function changeImage(thumbnail) {
            const mainImage = document.getElementById('main-image');
            mainImage.src = thumbnail.src; // Change main image to thumbnail
        }
    </script>
</body>
</html>
