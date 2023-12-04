<?php

include '../model/admin_model.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input values
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Authenticate the admin
    if (authenticateAdmin($email, $password)) {
        // Authentication successful, redirect to the admin dashboard or perform further actions
        header("Location: /ecom/view/admin_dashboard.php");
        exit();
    } else {
        // Authentication failed, redirect back to the login page with an error message
        header("Location: ../view/admin_login.php?admin_login_error=true");
        exit();
    }

} else if (isset($_GET['admin_logout'])) {
    // Logout the admin
    logoutAdmin();
    // Redirect to the login page
    header("Location: ../view/admin_login.php");
    exit();
} else {
    // Redirect to the login page
    header("Location: ../view/admin_login.php");
    exit();
}

function logoutAdmin()
{
    // Destroy the session
    session_start();
    session_destroy();
}

?>