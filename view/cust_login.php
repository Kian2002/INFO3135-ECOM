<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 32px;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            color: red;
            margin-top: 10px;
        }

        button {
            padding: 10px;
            font-size: 16px;
            margin-top: 10px; /* Adjusted margin */
            cursor: pointer;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>

    <?php
    if (isset($_GET['cust_login_error'])) {
        echo "<p>Invalid email or password</p>";
    }
    ?>
    <form action="../controller/cust_controller.php" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" value="Login">
    </form>

    <button onclick="window.location.href = '../index.php';">Go to Index</button>

</body>

</html>

