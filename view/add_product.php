<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a product</title>
</head>

<body>
    <h1>Add a product</h1>
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

</body>

</html>