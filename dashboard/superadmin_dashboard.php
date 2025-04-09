<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Super Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="mb-4 text-primary">Welcome, Super Admin!</h1>
            <p class="lead">Use the options below to manage users and view audit logs.</p>
            <div class="d-flex justify-content-center gap-3 mt-4">
                <a href="../users/manage_users.php" class="btn btn-outline-primary btn-lg">Manage Users</a>
                <a href="../logs/audit_logs.php" class="btn btn-outline-secondary btn-lg">Audit Logs</a>
                <a href="../auth/logout.php" class="btn btn-outline-danger btn-lg">Logout</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>