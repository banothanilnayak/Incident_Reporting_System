<?php
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $role = 'User'; // Default role
    $status = 'Active';

    mysqli_query($conn, "INSERT INTO users (name, email, password, role, status) 
        VALUES ('$name', '$email', '$password', '$role', '$status')");

    Header('Location: ../login.php');
}
