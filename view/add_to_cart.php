<!-- <?php
// Start the session
session_start();

// Check if product details are provided in the URL
if (isset($_GET['id']) && isset($_GET['name']) && isset($_GET['price'])) {
    $product = [
        'id' => $_GET['id'],
        'name' => $_GET['name'],
        'price' => $_GET['price'],
        'image_path' => $_GET['image_path'],

        // Add more details as needed
    ];

    // Check if the cart array exists in the session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add the product to the cart
    $_SESSION['cart'][] = $product;

    // Redirect back to the product page or cart page
    header("Location: ../view/cart.php");
    exit();
} else {
    // Redirect to the products page if product details are missing
    header("Location: ../view/products.php");
    exit();
}
?>
 -->
