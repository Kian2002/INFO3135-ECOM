<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
</head>

<body>

    <h1>Customer Login</h1>
    <?php
    if (isset($_GET['cust_login_error'])) {
        echo "<p style='color:red'>Invalid email or password</p>";
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

</body>

</html>