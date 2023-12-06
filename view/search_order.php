<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Search</title>

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

    <h1>Order Search</h1>


    <div class="form-div">
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
    </div>

</body>

</html>