<?php
session_start();
include '../config/db.php';

if ($_SESSION['role'] !== 'Admin') {
    echo "Access Denied";
    exit;
}

$res = mysqli_query($conn, "SELECT incidents.*, users.name FROM incidents JOIN users ON incidents.user_id = users.id");
?>
<a href='../dashboard/admin_dashboard.php'>Go back</a>
<br>
<br>

<?php
while ($row = mysqli_fetch_assoc($res)) {
    echo $row['title'] . " - " . $row['name'] . " - " . $row['status'];
    echo " <a href='update_status.php?id={$row['id']}'>Update Status</a><br>";
}
