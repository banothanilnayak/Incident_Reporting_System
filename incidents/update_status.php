<?php
session_start();
include '../config/db.php';

if ($_SESSION['role'] !== 'Admin') {
    echo "Access denied.";
    exit;
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $_POST['status'];
    mysqli_query($conn, "UPDATE incidents SET status='$status' WHERE id='$id'");
    header('Location: manage_incidents.php');
    exit;
}

$res = mysqli_query($conn, "SELECT * FROM incidents WHERE id='$id'");
$row = mysqli_fetch_assoc($res);
?>

<form method="POST">
    Update Status:
    <select name="status">
        <option <?= $row['status'] == 'Open' ? 'selected' : '' ?>>Open</option>
        <option <?= $row['status'] == 'In Progress' ? 'selected' : '' ?>>In Progress</option>
        <option <?= $row['status'] == 'Resolved' ? 'selected' : '' ?>>Resolved</option>
    </select>
    <button type="submit">Update</button>
</form>