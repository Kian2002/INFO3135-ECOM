<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            flex-direction: column;
            height: 100%;
        }

        .form-div {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        h1 {
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

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
    </style>

</head>

<body>
    <div class="back-button-div">
        <button onclick="window.location.href = '/ecom/view/edit_product.php';">Back to Edit Products</button>
    </div>

    <h1>Update product</h1>

    <div class="form-div">
        <?php
        require_once('../model/product_model.php');
        $id = $_GET['id'];
        $product = getProductById($id);
        $row = $product->fetch_assoc();
        ?>
        <form action="../controller/admin_controller.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['product_id']; ?>">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" id="product_name" value="<?php echo $row['product_name']; ?>">
            <br>
            <label for="product_quantity">Product Quantity</label>
            <input type="number" name="product_quantity" id="product_quantity"
                value="<?php echo $row['product_quantity']; ?>">
            <br>
            <label for="product_description">Product Description</label>
            <input type="text" name="product_description" id="product_description"
                value="<?php echo $row['product_description']; ?>">
            <br>
            <label for="image_path">Image Path</label>
            <input type="text" name="image_path" id="image_path" value="<?php echo $row['image_path']; ?>">
            <br>
            <label for="product_price">Product Price</label>
            <input type="number" name="product_price" id="product_price" value="<?php echo $row['product_price']; ?>">
            <br>
            <input type="submit" value="Update">
        </form>
    </div>

</body>

</html>