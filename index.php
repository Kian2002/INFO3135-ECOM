<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3135 Store</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
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
    <h1>Electric Deals!</h1>
    <div>
        <button onclick="window.location.href = 'view/admin_login.php';">Admin Login</button>
        <button onclick="window.location.href = 'view/cust_login.php';">Customer Login</button>
    </div>
</body>

</html>
