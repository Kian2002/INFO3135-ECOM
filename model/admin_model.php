<?php

include '../model/database_connect.php';

function authenticateAdmin($email, $password)
{
    global $conn;

    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    $query = "SELECT * FROM admin WHERE admin_email = '$email' AND admin_password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Admin is authenticated
        return true;
    } else {
        // Admin authentication failed
        return false;
    }
}

?>