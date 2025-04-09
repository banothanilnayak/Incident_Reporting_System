<?php
session_start();
include '../config/db.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Basic sanitization
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $category = trim($_POST['category']);
    $priority = trim($_POST['priority']);
    $user_id = $_SESSION['user_id'];

    // Backend Validation
    if (empty($title)) $errors[] = "Title is required.";
    if (empty($description)) $errors[] = "Description is required.";
    if (!in_array($category, ['Phishing', 'Malware', 'Unauthorized Access'])) $errors[] = "Invalid category selected.";
    if (!in_array($priority, ['Low', 'Medium', 'High'])) $errors[] = "Invalid priority selected.";

    // If no errors, insert into DB
    if (empty($errors)) {
        $title = mysqli_real_escape_string($conn, $title);
        $description = mysqli_real_escape_string($conn, $description);

        $query = "INSERT INTO incidents (title, description, category, priority, user_id) 
                  VALUES ('$title', '$description', '$category', '$priority', '$user_id')";
        mysqli_query($conn, $query);

        $incident_id = mysqli_insert_id($conn);

        // Log the action
        $ip = $_SERVER['REMOTE_ADDR'];
        $action = "Created incident #$incident_id";

        mysqli_query($conn, "INSERT INTO audit_logs (user_id, action, ip_address) 
            VALUES ('$user_id', '$action', '$ip')");

        header('Location: ../incidents/view_my_incidents.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Report Incident</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Submit Incident</h4>
            </div>
            <div class="card-body">
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php foreach ($errors as $error): ?>
                                <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="<?= htmlspecialchars($_POST['title'] ?? '') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" rows="4" class="form-control" required><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-select" required>
                            <option value="">-- Select Category --</option>
                            <option value="Phishing" <?= (($_POST['category'] ?? '') === 'Phishing') ? 'selected' : '' ?>>Phishing</option>
                            <option value="Malware" <?= (($_POST['category'] ?? '') === 'Malware') ? 'selected' : '' ?>>Malware</option>
                            <option value="Unauthorized Access" <?= (($_POST['category'] ?? '') === 'Unauthorized Access') ? 'selected' : '' ?>>Unauthorized Access</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="priority" class="form-label">Priority</label>
                        <select name="priority" id="priority" class="form-select" required>
                            <option value="">-- Select Priority --</option>
                            <option value="Low" <?= (($_POST['priority'] ?? '') === 'Low') ? 'selected' : '' ?>>Low</option>
                            <option value="Medium" <?= (($_POST['priority'] ?? '') === 'Medium') ? 'selected' : '' ?>>Medium</option>
                            <option value="High" <?= (($_POST['priority'] ?? '') === 'High') ? 'selected' : '' ?>>High</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>