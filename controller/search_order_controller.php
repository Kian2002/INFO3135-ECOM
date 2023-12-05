<?php

require_once '../model/database_connect.php';
require_once '../model/order_model.php';

if (isset($_POST['order_id']) || isset($_POST['customer_name']) || isset($_POST['product_name'])) {
    $order_id = $_POST['order_id'];
    $customer_name = $_POST['customer_name'];
    $product_name = $_POST['product_name'];

    $search = "";

    if ($order_id != "") {
        $search = $order_id;
    } else if ($customer_name != "") {
        $search = $customer_name;
    } else if ($product_name != "") {
        $search = $product_name;
    }

    $result = searchOrder($search);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Order Date</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['order_id'] . "</td>
                    <td>" . $row['customer_name'] . "</td>
                    <td>" . $row['product_name'] . "</td>
                    <td>" . $row['quantity'] . "</td>
                    <td>" . $row['price'] . "</td>
                    <td>" . $row['order_date'] . "</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No results found";
    }
} else {
    echo "No search parameters provided";
}
?>