<?php

include '../model/admin_model.php';
include '../model/product_model.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // check if user is updating a product
    if (isset($_POST['id'])) {
        // Get the input values
        $id = $_POST['id'];
        $name = $_POST['product_name'];
        $quantity = $_POST['product_quantity'];
        $description = $_POST['product_description'];
        $imagePath = $_POST['image_path'];
        $price = $_POST['product_price'];

        // Update the product
        updateProduct($id, $name, $quantity, $description, $imagePath, $price);
        // Redirect to the edit product page
        header("Location: ../view/edit_product.php");
        exit();
    }

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
} else if (isset($_GET['delete_product'])) {
    // Delete the product
    $id = $_GET['id'];
    deleteProduct($id);
    // Redirect to the edit product page
    header("Location: ../view/edit_product.php");
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