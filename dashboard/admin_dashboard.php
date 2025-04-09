<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h2 class="text-center text-primary mb-4">Welcome, Admin!</h2>
            <p class="text-center fs-5">You have full access to monitor and manage all reported incidents.</p>

            <div class="d-flex justify-content-center gap-3 mt-4">
                <a href="../incidents/manage_incidents.php" class="btn btn-outline-primary">Manage Incidents</a>
                <a href="../auth/logout.php" class="btn btn-outline-danger">Logout</a>
                <a href="../assets/js/charts.php" class="btn btn-outline-primary">Dashboard widgets</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>