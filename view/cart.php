<?php
// Start the session
session_start();

echo "<h1>Shopping Cart</h1>";

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    echo "<table border='1'>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Image</th>
                <th>Action</th>
            </tr>";

    $totalSubtotal = 0; // Initialize total subtotal

    foreach ($_SESSION['cart'] as $product) {
        echo "<tr>";
        echo "<td>{$product['id']}</td>";
        echo "<td>{$product['name']}</td>";
        echo "<td>{$product['price']}</td>";
        echo "<td>{$product['quantity']}</td>";

        // Calculate and display the total for this product
        $productTotal = $product['price'] * $product['quantity'];
        echo "<td>{$productTotal}</td>";

        // Display the image if the image path is available
        if (!empty($product['image_path'])) {
            echo "<td><img src='{$product['image_path']}' alt='Product Image' style='width: 50px; height: 50px;'></td>";
        } else {
            echo "<td>No Image</td>";
        }

        // Link to the cart_controller.php file for removing the product
        echo "<td><a href='../controller/cart_controller.php?action=remove&id={$product['id']}'>Remove</a></td>";
        echo "</tr>";

        // Accumulate subtotal
        $totalSubtotal += $productTotal;
    }

    echo "</table>";

    // Display the total subtotal
    echo "<p>Total: $ {$totalSubtotal}</p>";

    echo "<button onclick=\"window.location.href = '../view/cust_dashboard.php';\">Home</button>";
    echo "<button onclick=\"window.location.href = '../controller/cart_controller.php?action=checkout';\">Checkout</button>";

} else {
    echo "Your cart is empty.";
    echo "<button onclick=\"window.location.href = '../view/cust_dashboard.php';\">Home</button>";
}
?>
