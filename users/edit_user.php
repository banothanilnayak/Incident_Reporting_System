<?php
session_start();
include '../config/db.php';

if ($_SESSION['role'] !== 'SuperAdmin') {
    echo "Access denied.";
    exit;
}

$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = $_POST['role'];
    $status = $_POST['status'];
    mysqli_query($conn, "UPDATE users SET role='$role', status='$status' WHERE id='$id'");
    header('Location: manage_users.php');
}

$res = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
$row = mysqli_fetch_assoc($res);
?>

<form method="POST">
    Role:
    <select name="role">
        <option <?= $row['role'] == 'User' ? 'selected' : '' ?>>User</option>
        <option <?= $row['role'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
        <option <?= $row['role'] == 'SuperAdmin' ? 'selected' : '' ?>>SuperAdmin</option>
    </select><br>
    Status:
    <select name="status">
        <option <?= $row['status'] == 'Active' ? 'selected' : '' ?>>Active</option>
        <option <?= $row['status'] == 'Blocked' ? 'selected' : '' ?>>Blocked</option>
    </select><br>
    <button type="submit">Update</button>
</form>