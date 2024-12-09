<?php
// Start the session
session_start();

// Check if product_id in url
if (isset($_GET['product_id'])) {
    $productId = htmlspecialchars($_GET['product_id']); // Sanitize input
    setcookie('selectedProduct', $productId, time() + (86400 * 7), "/"); // 7 jours

    // Store product ID *
    $_SESSION['selectedProduct'] = $productId;

    // Redirect to product page
    header("Location: detail/product.php?id=" . $productId);
    exit();
} else {
    //  product_id is not provided
    echo "No product selected.";
    exit();
}
?>
