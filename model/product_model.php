<?php
require_once "../model/database_connect.php";
function addProduct($name, $price, $description, $imagePath, $quantity)
{
    global $conn;

    $name = $conn->real_escape_string($name);
    $description = $conn->real_escape_string($description);
    $imagePath = $conn->real_escape_string($imagePath);

    // Insert product into the database
    $query = "INSERT INTO products (product_name, product_quantity, product_description, image_path, product_price) 
              VALUES ('$name', '$quantity', '$description', '$imagePath', '$price')";

    return $conn->query($query);
}

function getProduct()
{
    global $conn;

    $query = "SELECT * FROM products";

    return $conn->query($query);
}

function getProductById($id)
{
    global $conn;

    $query = "SELECT * FROM products WHERE product_id = '$id'";

    return $conn->query($query);
}

function deleteProduct($id)
{
    global $conn;

    $query = "DELETE FROM products WHERE product_id = '$id'";

    return $conn->query($query);
}

function updateProduct($id, $name, $quantity, $description, $imagePath, $price)
{
    global $conn;

    $name = $conn->real_escape_string($name);
    $description = $conn->real_escape_string($description);
    $imagePath = $conn->real_escape_string($imagePath);

    $query = "UPDATE products SET product_name = '$name', product_quantity = '$quantity', product_description = '$description', image_path = '$imagePath', product_price = '$price' WHERE product_id = '$id'";

    return $conn->query($query);
}

?>