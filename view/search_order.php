<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Search</title>
</head>

<body>
    <h1>Order Search</h1>
    <form action="../controller/search_order_controller.php" method="post">
        <label for="order_id">Order ID</label>
        <input type="number" name="order_id" id="order_id">
        <br>
        <label for="customer_name">Customer Name</label>
        <input type="text" name="customer_name" id="customer_name">
        <br>
        <label for="product_name">Product Name</label>
        <input type="text" name="product_name" id="product_name">
        <br>
        <input type="submit" value="Search">
    </form>

    <div>
        <button onclick="window.location.href = '../view/admin_dashboard.php';">Back to dashboard</button>
    </div>

</body>

</html>