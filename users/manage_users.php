<?php
session_start();
include '../config/db.php';

if ($_SESSION['role'] !== 'SuperAdmin') {
    echo "Access denied.";
    exit;
}

$res = mysqli_query($conn, "SELECT * FROM users");
?>

<a href='../dashboard/superadmin_dashboard.php'>Go back</a>
<br>
<br>

<?php
while ($row = mysqli_fetch_assoc($res)) {
    echo '';
    echo $row['id'] . " - " . $row['name'] . " - " . $row['email'] . " - " . $row['role'];
    echo " <a href='edit_user.php?id={$row['id']}'>Edit</a>";
    echo "<br>";
}
