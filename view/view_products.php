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
        echo "<td><a href='../view/add_to_cart.php?id=" . $row['product_id'] . "&name=" . $row['product_name'] . "&price=" . $row['product_price'] . "&image_path=" . $row['image_path'] . "'>Add to Cart</a></td>";
        echo "</tr>";
    }

    echo "</table>";

    // Debug: Print session data
    echo "<pre>";
    print_r($_SESSION['cart']);
    echo "</pre>";
} else {
    echo "No products found";
}
?>
<button onclick="window.location.href = '../view/cust_dashboard.php';">Home</button>
