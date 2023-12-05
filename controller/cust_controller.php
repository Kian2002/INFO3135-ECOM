<?php
include '../model/cust_model.php';
include '../model/product_model.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $customer = authenticateCust($email, $password);

    if ($customer) {

        $_SESSION['customer_id'] = $customer['customer_id'];

        header("Location: ../view/cust_dashboard.php");
        exit();
    } else {
        header("Location: ../view/cust_login.php?cust_login_error=true");
        exit();
    }

} else if (isset($_GET['cust_logout'])) {
    logoutCust();
    header("Location: ../view/cust_login.php");
    exit();
} else {
    header("Location: ../view/cust_login.php");
    exit();
}

function logoutCust()
{
    session_destroy();
}
?>
