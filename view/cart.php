<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 50px;
            max-height: 50px;
        }

        p {
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
        }

        button {
            padding: 10px;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
        }

        button:hover {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
<body>

<h1>Shopping Cart</h1>

<?php
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    echo "<table border='1'>
            <tr>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Image</th>
                <th>Action</th>
            </tr>";

    $totalSubtotal = 0; 

    foreach ($_SESSION['cart'] as $product) {
        echo "<tr>";

        echo "<td>{$product['name']}</td>";
        echo "<td>$ {$product['price']}</td>";
        echo "<td>{$product['quantity']}</td>";

    
        $productTotal = $product['price'] * $product['quantity'];
        echo "<td>$ {$productTotal}</td>";

        
        if (!empty($product['image_path'])) {
            echo "<td><img src='{$product['image_path']}' alt='Product Image'></td>";
        } else {
            echo "<td>No Image</td>";
        }
        echo "<td><a href='../controller/cart_controller.php?action=remove&id={$product['id']}'>Remove</a></td>";
        echo "</tr>";
        $totalSubtotal += $productTotal;
    }

    echo "</table>";


    echo "<p>Total: $ {$totalSubtotal}</p>";

    echo "<button onclick=\"window.location.href = '../view/cust_dashboard.php';\">Home</button>";
    echo "<button onclick=\"window.location.href = '../controller/cart_controller.php?action=checkout';\">Checkout</button>";

} else {
    echo "<p>Your cart is empty.</p>";
    echo "<button onclick=\"window.location.href = '../view/cust_dashboard.php';\">Home</button>";
}
?>
</body>
</html>
