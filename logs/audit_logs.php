<?php
session_start();
include '../config/db.php';

if ($_SESSION['role'] !== 'SuperAdmin') {
    echo "Access denied.";
    exit;
}

$res = mysqli_query($conn, "SELECT logs.*, users.name FROM audit_logs logs JOIN users ON logs.user_id = users.id ORDER BY logs.timestamp DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Audit Logs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Audit Logs</h4>
            </div>
            <div class="card-body">
                <a href="../dashboard/superadmin_dashboard.php" class="btn btn-secondary mb-3">← Back to Dashboard</a>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Timestamp</th>
                                <th>User</th>
                                <th>Action</th>
                                <th>IP Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($res)) : ?>
                                <tr>
                                    <td><?= $row['timestamp'] ?></td>
                                    <td><?= htmlspecialchars($row['name']) ?></td>
                                    <td><?= htmlspecialchars($row['action']) ?></td>
                                    <td><?= $row['ip_address'] ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>