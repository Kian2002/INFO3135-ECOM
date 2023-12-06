<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a product</title>

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
        <button onclick="window.location.href = '../view/admin_dashboard.php';">Back to dashboard</button>
    </div>

    <h1>Add a product</h1>

    <div class="form-div">
        <form action="../controller/add_product_controller.php" method="post" enctype="multipart/form-data">
            <label for="product_name">Product name</label>
            <input type="text" name="product_name" id="product_name" required>
            <br>
            <label for="product_price">Product price</label>
            <input type="number" name="product_price" id="product_price" required>
            <br>
            <label for="product_description">Product description</label>
            <input type="text" name="product_description" id="product_description" required>
            <br>
            <label for="product_image">Product image</label>
            <input type="file" name="product_image" id="product_image" accept="image/*" required>
            <br>
            <label for="product_quantity">Product quantity</label>
            <input type="number" name="product_quantity" id="product_quantity" required>
            <br>
            <input type="submit" value="Add product">
        </form>
    </div>


</body>

</html>