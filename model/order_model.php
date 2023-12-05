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

?>