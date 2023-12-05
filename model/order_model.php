<?php

require_once '../model/database_connect.php';

function searchOrder($search)
{
    global $conn;

    $search = $conn->real_escape_string($search);
    $query = "SELECT orders.order_id, customers.customer_name, products.product_name, order_products.quantity, order_products.price, orders.order_date
              FROM orders
              INNER JOIN customers ON orders.customer_id = customers.customer_id
              INNER JOIN order_products ON orders.order_id = order_products.order_id
              INNER JOIN products ON order_products.product_id = products.product_id
              WHERE orders.order_id = '$search' OR customers.customer_name = '$search' OR products.product_name = '$search'";

    return $conn->query($query);
}
function insertOrder($orderID, $customerID, $currentDate)
{
    // global $conn;

    // // SQL query to insert order details without total_amount
    // $query= "INSERT INTO orders (order_id, customer_id, order_date) VALUES ('55', '11', '$currentDate')";

    // return $conn->query($query);

    global $conn;

    $name = $conn->real_escape_string($orderID);
    $description = $conn->real_escape_string($customerID);
    $imagePath = $conn->real_escape_string($currentDate);

    
    $query = "INSERT INTO `orders`(`order_id`, `customer_id`, `order_date`) VALUES ('$orderID','$customerID','$currentDate')";

    return $conn->query($query);
}


function insertOrderProduct($orderID, $productID, $quantity, $price) {
    global $conn;

    $sql = "INSERT INTO order_products (order_id, product_id, quantity, price) VALUES ('$orderID', '$productID', '$quantity', '$price')";
    return $conn->query($sql);
}
?>