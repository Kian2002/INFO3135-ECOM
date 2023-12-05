<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        div {
            margin-top: 20px;
        }

        button {
            padding: 10px;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h1>Admin Dashboard</h1>
    <div>
        <button onclick="window.location.href = '../view/add_product.php';">Add new Product</button>
        <button onclick="window.location.href = '../view/search_order.php';">Search order info</button>
        <button onclick="window.location.href = '../view/edit_product.php';">Update products</button>
    </div>
    <div>
        <button
            onclick="window.location.href = '../controller/admin_controller.php?admin_logout=true';">Logout</button>
    </div>
</body>

</html>
