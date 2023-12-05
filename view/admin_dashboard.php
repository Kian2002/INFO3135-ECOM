<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>

<body>
    <h1>Admin Dashboard</h1>
    <div>
        <button onclick="window.location.href = '/ecom/view/add_product.php';">Add new Product</button>
        <button onclick="window.location.href = '/ecom/view/search_order.php';">Search order info</button>
        <button onclick="window.location.href = '/ecom/view/edit_product.php';">Update products</button>
    </div>
    <div>
        <button
            onclick="window.location.href = '/ecom/controller/admin_controller.php?admin_logout=true';">Logout</button>
    </div>
</body>

</html>