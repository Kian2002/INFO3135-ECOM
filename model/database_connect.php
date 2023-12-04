<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecom";

function connectToDatabase()
{
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

$conn = connectToDatabase();
?>