<?php
session_start();
include '../config/db.php';

if ($_SESSION['role'] !== 'SuperAdmin') {
    echo "Access denied.";
    exit;
}

$res = mysqli_query($conn, "SELECT logs.*, users.name FROM audit_logs logs JOIN users ON logs.user_id = users.id ORDER BY logs.timestamp DESC");

while ($row = mysqli_fetch_assoc($res)) {
    echo $row['timestamp'] . " - " . $row['name'] . " - " . $row['action'] . " - IP: " . $row['ip_address'] . "<br>";
}
