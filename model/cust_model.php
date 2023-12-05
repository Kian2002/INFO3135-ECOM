<?php
require_once "../model/database_connect.php";
function authenticateCust($email, $password)
{
    global $conn;

    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    $query = "SELECT * FROM customers WHERE customer_email = '$email' AND customer_password = '$password'";
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