<?php
session_start();
include '../config/db.php';

if ($_SESSION['role'] !== 'SuperAdmin') {
    echo "Access denied.";
    exit;
}

$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = $_POST['role'];
    $status = $_POST['status'];
    mysqli_query($conn, "UPDATE users SET role='$role', status='$status' WHERE id='$id'");
    header('Location: manage_users.php');
    exit;
}

$res = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
$row = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Edit User (ID: <?= $row['id'] ?>)</h4>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-select">
                            <option <?= $row['role'] == 'User' ? 'selected' : '' ?>>User</option>
                            <option <?= $row['role'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
                            <option <?= $row['role'] == 'SuperAdmin' ? 'selected' : '' ?>>SuperAdmin</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option <?= $row['status'] == 'Active' ? 'selected' : '' ?>>Active</option>
                            <option <?= $row['status'] == 'Blocked' ? 'selected' : '' ?>>Blocked</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="manage_users.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>