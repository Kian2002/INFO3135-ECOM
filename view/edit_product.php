<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products (update inventory/delete)</title>

    <style>
        .back-button-div {
            margin: 10px;
        }

        button {
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            background-color: #f4f4f4;
            cursor: pointer;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            flex-direction: column;
            height: 100%;
        }

        h1 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #4caf50;
        }

        tr:nth-child(even) {
            background-color: #a7a9aa;
        }

        a {
            text-decoration: none;
            color: black;
        }

        a:hover {
            color: white;
        }
    </style>
</head>

<body>
    <div class="back-button-div">
        <button onclick="window.location.href = '../view/admin_dashboard.php';">Back to dashboard</button>
    </div>

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
                echo "<td><a href='../view/update_product.php?id=" . $row['product_id'] . "'>Update</a></td>";
                echo "<td><a href='../controller/admin_controller.php?delete_product=true&id=" . $row['product_id'] . "'>Delete</a></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No products found";
        }
        ?>
    </div>
</body>

</html>