<!-- <?php
// Start the session
session_start();

// Check if the product ID is provided in the URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Check if the cart is not empty
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        // Find the index of the product with the specified ID in the cart array
        $index = array_search($productId, array_column($_SESSION['cart'], 'id'));

        // If the product is found, remove it from the cart
        if ($index !== false) {
            unset($_SESSION['cart'][$index]);

            // Optional: Re-index the array to remove gaps
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }
}

// Redirect back to the cart page
header("Location: ../view/cart.php");
exit();
?> -->
