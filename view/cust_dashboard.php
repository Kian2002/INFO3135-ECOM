<?php
require_once('../model/product_model.php');

function searchProduct($query, $products){
    $searchResults = array();

    foreach ($products as $product) {
        if (stripos($product['product_name'], $query) !== false) {
            $searchResults[] = $product;
        }
    }
    return $searchResults;
}

$allProducts = getProduct();

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchQuery = $_GET['search'];
    $products = searchProduct($searchQuery, $allProducts);
} else {
    $products = $allProducts;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
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

    div {
        margin-top: 20px;
        text-align: center;
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

    input[type="text"] {
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    #searchButton {
        padding: 8px;
        cursor: pointer;
    }
</style>
    </style>
</head>

<body>
    <h1> 3135 Electronics </h1>

    <div>
        <form action="" method="get">
            <input type="text" name="search" placeholder="Search for a product">
            <button id="searchButton" type="submit">Search</button>
        </form>

        <?php
        if ($products) {
            echo "<table border='1'>
                <tr>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Image</th>
                    <th>Product Price</th>
                    <th>Action</th>
                </tr>";

            foreach ($products as $row) {
                echo "<tr>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['product_description'] . "</td>";
                if (!empty($row['image_path'])) {
                    echo "<td><img src='{$row['image_path']}' alt='Product Image'></td>";
                } else {
                    echo "<td>No Image</td>";
                }
                echo "<td>" . $row['product_price'] . "</td>";
                echo "<td><a href='../controller/cart_controller.php?action=add&id=" . $row['product_id'] . "&name=" . $row['product_name'] . "&price=" . $row['product_price'] . "&image_path=" . $row['image_path'] . "'>Add to Cart</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No products found";
        }
        ?>
    </div>

    <div>
        <button onclick="window.location.href = '../view/cust_dashboard.php';">Home</button>
        <button onclick="window.location.href = '../view/cart.php';">View Cart</button>
        <button onclick="window.location.href = '../controller/cust_controller.php?cust_logout=true';">Logout</button>
    </div>

</body>

</html>
