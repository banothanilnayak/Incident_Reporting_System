<?php
session_start();
include '../config/db.php';

if ($_SESSION['role'] !== 'Admin') {
    echo "<div class='alert alert-danger text-center mt-5'>Access Denied</div>";
    exit;
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $_POST['status'];
    mysqli_query($conn, "UPDATE incidents SET status='$status' WHERE id='$id'");
    header('Location: manage_incidents.php');
    exit;
}

$res = mysqli_query($conn, "SELECT * FROM incidents WHERE id='$id'");
$row = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Update Incident Status</h4>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="Open" <?= $row['status'] == 'Open' ? 'selected' : '' ?>>Open</option>
                            <option value="In Progress" <?= $row['status'] == 'In Progress' ? 'selected' : '' ?>>In Progress</option>
                            <option value="Resolved" <?= $row['status'] == 'Resolved' ? 'selected' : '' ?>>Resolved</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="manage_incidents.php" class="btn btn-secondary ms-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>