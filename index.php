<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3135 Store</title>
</head>

<body>
    <h1>Test</h1>
    <div>
        test cases
        <button onclick="window.location.href = '/ecom/view/admin_login.php';">admin login</button>
    </div>
</body>

</html>

<?php
session_start();
if (isset($_SESSION['admin_id'])) {
    header('location:admin_home.php');
} else {
    header('
    location:admin_login.php');
}
?>