<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
</head>

<body>
    <h1>Customer Dashboard</h1>
    <h1>View Products</h1>

    <div>
        <?php
        require_once('../model/product_model.php');
        $products = getProduct();

        if ($products->num_rows > 0) {
            echo "<table border='1'>
                <tr>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Image</th>
                    <th>Product Price</th>
                    <th>Action</th>
                </tr>";

            while ($row = $products->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['product_description'] . "</td>";

                // Display the image if the image path is available
                if (!empty($row['image_path'])) {
                    echo "<td><img src='{$row['image_path']}' alt='Product Image' style='width: 50px; height: 50px;'></td>";
                } else {
                    echo "<td>No Image</td>";
                }

                echo "<td>" . $row['product_price'] . "</td>";
                // Link to the cart_controller.php file for adding the product to the cart
                echo "<td><a href='../controller/cart_controller.php?action=add&id=" . $row['product_id'] . "&name=" . $row['product_name'] . "&price=" . $row['product_price'] . "&image_path=" . $row['image_path'] . "'>Add to Cart</a></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No products found";
        }
        ?>

        <button onclick="window.location.href = '../view/cust_dashboard.php';">Home</button>
    </div>

    <div>
        <button onclick="window.location.href = '../view/view_products.php';">View Product</button>
        <button onclick="window.location.href = '../view/cart.php';">View Cart</button>
        <button onclick="window.location.href = '../view/edit_product.php';">Update products</button>
    </div>

    <div>
        <button onclick="window.location.href = '../controller/cust_controller.php?cust_logout=true';">Logout</button>
    </div>
</body>

</html>
