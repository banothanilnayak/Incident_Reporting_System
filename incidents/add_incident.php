<?php
session_start();
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uid = $_SESSION['user_id'];
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $category = $_POST['category'];
    $priority = $_POST['priority'];

    $filename = $_FILES['evidence']['name'];
    $tmp = $_FILES['evidence']['tmp_name'];
    move_uploaded_file($tmp, "../uploads/" . $filename);

    // Insert into incidents
    mysqli_query($conn, "INSERT INTO incidents (user_id, title, description, category, priority, evidence_file)
        VALUES ('$uid', '$title', '$desc', '$category', '$priority', '$filename')");

    $incident_id = mysqli_insert_id($conn); // Get inserted incident ID
    
    // Capture IP address
    $ip = $_SERVER['REMOTE_ADDR'];
    $action = "Created incident #$incident_id";

    // Insert into audit_log
    mysqli_query($conn, "INSERT INTO audit_log (user_id, action, ip_address) 
        VALUES ('$uid', '$action', '$ip')");

    echo "Incident submitted successfully!";
}
