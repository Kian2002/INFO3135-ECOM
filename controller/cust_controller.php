<?php

include '../model/cust_model.php';
include '../model/product_model.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get the input values
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Authenticate the customer
    $customer = authenticateCust($email, $password);

    if ($customer) {
        // Authentication successful, store the customer_id in the session
        $_SESSION['customer_id'] = $customer['customer_id'];

        // Redirect to the customer dashboard or perform further actions
        header("Location: ../view/cust_dashboard.php");
        exit();
    } else {
        // Authentication failed, redirect back to the login page with an error message
        header("Location: ../view/cust_login.php?cust_login_error=true");
        exit();
    }

} else if (isset($_GET['cust_logout'])) {
    // Logout the customer
    logoutCust();
    // Redirect to the login page
    header("Location: ../view/cust_login.php");
    exit();
} else {
    // Redirect to the login page
    header("Location: ../view/cust_login.php");
    exit();
}

function logoutCust()
{
    // Destroy the session
    session_destroy();
}
?>
