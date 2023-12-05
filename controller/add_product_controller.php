<?php
include "../model/database_connect.php";
include "../model/product_model.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $product_quantity = $_POST['product_quantity'];

    // File upload handling
    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
    $uploadOk = 1;

    // Check if image file is a valid image
    $check = getimagesize($_FILES["product_image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if the file already exists
    if (file_exists($target_file)) {
        echo "Sorry, the file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["product_image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only certain file formats
    $allowedFormats = ["jpg", "jpeg", "png", "gif"];
    $fileFormat = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (!in_array($fileFormat, $allowedFormats)) {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["product_image"]["name"])) . " has been uploaded.";

            // Add product to the database
            if (addProduct($product_name, $product_price, $product_description, $target_file, $product_quantity)) {
                echo "Product added successfully";
                // Redirect to admin dashboard after 3 seconds
                header("refresh:3; url=../view/admin_dashboard.php");
            } else {
                echo "Error adding product to the database.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>