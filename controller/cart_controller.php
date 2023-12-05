<?php
session_start();

require_once('../model/order_model.php');

function addToCart($id, $name, $price, $image_path) {
    
    $product = [
        'id' => $id,
        'name' => $name,
        'price' => $price,
        'quantity' => 1,
        'image_path' => $image_path,
    ];


    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $existingProductKey = array_search($id, array_column($_SESSION['cart'], 'id'));
    if ($existingProductKey !== false) {
        $_SESSION['cart'][$existingProductKey]['quantity']++;
    } else {
        $_SESSION['cart'][] = $product;
    }
    header("Location: ../view/cust_dashboard.php");
    exit();
}

function removeFromCart($productId) {
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $index = array_search($productId, array_column($_SESSION['cart'], 'id'));
        if ($index !== false) {
            unset($_SESSION['cart'][$index]);

            // Reindexing the array 
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }
}

function cartCheckout() {
    $customerID = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : '11';
    $currentDate = date('Y-m-d');
    $orderID = mt_rand(1000000, 9999999);
    insertOrder($orderID, $customerID, $currentDate);
    foreach ($_SESSION['cart'] as $item) {
        $productID = $item['id'];
        $quantity = $item['quantity'];
        $price = $item['price'];
        insertOrderProduct($orderID, $productID, $quantity, $price);      
        }
    
    unset($_SESSION['cart']);
    header("Location: ../view/cart.php");
    exit();
}

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
        default:
            break;
    }
}

header("Location: ../view/cart.php");
exit();
?>

