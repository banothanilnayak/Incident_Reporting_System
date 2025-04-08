<?php
session_start();
include '../config/db.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM incidents WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>

<head>
    <title>My Incidents</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px 12px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <a href='../dashboard/user_dashboard.php'>Go back</a>
    <br>
    <br>
    <h2>My Submitted Incidents</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><?= htmlspecialchars($row['category']) ?></td>
                <td><?= htmlspecialchars($row['priority']) ?></td>
                <td><?= htmlspecialchars($row['status']) ?></td>
                <td><?= $row['submitted_at'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>