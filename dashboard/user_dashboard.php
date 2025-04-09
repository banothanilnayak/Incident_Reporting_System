<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Welcome User!</h4>
            <div>
                <a href="incident_form.php" class="btn btn-primary me-2">Add Incidents</a>
                <a href="../incidents/view_my_incidents.php" class="btn btn-secondary me-2">My Incidents</a>
                <a href="../auth/logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

<!-- Sample Text -->
<div class="card p-4 shadow-sm">
    <h5>Hello!</h5>
    <p>
        This is your incident management dashboard. Use the links above to add a new incident or review the incidents you've submitted.
        Stay updated with your reports and manage them easily.
    </p>
</div>
</div>

</html>