<?php
session_start();
include '../config/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $priority = $_POST['priority'];
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO incidents (title, description, category, priority, user_id) 
              VALUES ('$title', '$description', '$category', '$priority', '$user_id')";
    mysqli_query($conn, $query);

    $incident_id = mysqli_insert_id($conn); // Get inserted incident ID

    // Capture IP address
    $ip = $_SERVER['REMOTE_ADDR'];
    $action = "Created incident #$incident_id";

    // Insert into audit_log
    mysqli_query($conn, "INSERT INTO audit_logs (user_id, action, ip_address) 
        VALUES ('$user_id', '$action', '$ip')");

    header('Location: ../incidents/view_my_incidents.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Report Incident</title>
</head>

<body>
    <h2>Submit Incident</h2>
    <form method="POST">
        Title: <input type="text" name="title" required><br><br>
        Description:<br><textarea name="description" required></textarea><br><br>
        Category:
        <select name="category" required>
            <option value="Phishing">Phishing</option>
            <option value="Malware">Malware</option>
            <option value="Unauthorized Access">Unauthorized Access</option>
        </select><br><br>
        Priority:
        <select name="priority" required>
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
        </select><br><br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>