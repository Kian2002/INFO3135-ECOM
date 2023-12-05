<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products (update inventory/delete)</title>
</head>

<body>
    <h1>Edit Products</h1>

    <div>
        <?php
        require_once('../model/product_model.php');
        $products = getProduct();

        if ($products->num_rows > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Quantity</th>
                        <th>Product Description</th>
                        <th>Image Path</th>
                        <th>Product Price</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>";

            while ($row = $products->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['product_id'] . "</td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['product_quantity'] . "</td>";
                echo "<td>" . $row['product_description'] . "</td>";
                echo "<td>" . $row['image_path'] . "</td>";
                echo "<td>" . $row['product_price'] . "</td>";
                echo "<td><a href='/ecom/view/update_product.php?id=" . $row['product_id'] . "'>Update</a></td>";
                echo "<td><a href='/ecom/controller/admin_controller.php?delete_product=true&id=" . $row['product_id'] . "'>Delete</a></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No products found";
        }
        ?>

        <button onclick="window.location.href = '/ecom/view/admin_dashboard.php';">Back to Admin Dashboard</button>

    </div>
</body>

</html>