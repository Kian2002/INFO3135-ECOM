


<?php
// Start the session
session_start();

// Include the order_model.php file
require_once('../model/order_model.php');

function addToCart($id, $name, $price, $image_path) {
    // Initialize quantity to 1 when adding a new product
    $product = [
        'id' => $id,
        'name' => $name,
        'price' => $price,
        'quantity' => 1,
        'image_path' => $image_path,
        // Add more details as needed
    ];

    // Check if the cart array exists in the session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if the product is already in the cart
    $existingProductKey = array_search($id, array_column($_SESSION['cart'], 'id'));

    // If the product is already in the cart, update the quantity
    if ($existingProductKey !== false) {
        $_SESSION['cart'][$existingProductKey]['quantity']++;
    } else {
        // If the product is not in the cart, add it
        $_SESSION['cart'][] = $product;
    }
}


// Function to remove a product from the cart
function removeFromCart($productId) {
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

function cartCheckout() {
    // Get the customer ID from the session or database, assuming you have it stored in the session
    $customerID = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : '11';

    // Get the current date
    $currentDate = date('Y-m-d');

    // Generate a random 7-digit numeric order ID
    $orderID = mt_rand(1000000, 9999999);

    // Insert order details into the "orders" table with the order ID
    insertOrder($orderID, $customerID, $currentDate);
    foreach ($_SESSION['cart'] as $item) {
        $productID = $item['id'];
        $quantity = $item['quantity'];
        $price = $item['price'];

        // Insert into order_products table
        insertOrderProduct($orderID, $productID, $quantity, $price);
            
        }
    
    unset($_SESSION['cart']);


    // Redirect back to the cart page
    header("Location: ../view/cart.php");
    exit();
}

// Check the action parameter to determine whether to add, remove a product, or checkout
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'add':
            if (isset($_GET['id']) && isset($_GET['name']) && isset($_GET['price']) && isset($_GET['image_path'])) {
                addToCart($_GET['id'], $_GET['name'], $_GET['price'], $_GET['image_path']);
            }
            break;
        case 'remove':
            if (isset($_GET['id'])) {
                removeFromCart($_GET['id']);
            }
            break;
        case 'checkout':
            cartCheckout();
            break;
        // Add more cases as needed

        default:
            // Handle invalid action
            break;
    }
}

// Redirect back to the cart page
header("Location: ../view/cart.php");
exit();
?>

