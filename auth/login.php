<?php
session_start();
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] === 'Admin' && $user['status'] !== 'Blocked') {
            header('Location: ../dashboard/admin_dashboard.php');
        } elseif ($user['role'] === 'SuperAdmin' && $user['status'] !== 'Blocked') {
            header('Location: ../dashboard/superadmin_dashboard.php');
        } else {
            if ($user['status'] !== 'Blocked') {
                header('Location: ../dashboard/user_dashboard.php');
            } else {
                echo 'you have been blocked by superadmin.';
            }
        }
        exit;
    } else {
        $error = "Invalid email or password";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <h2>Login</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        Email: <input type="email" name="email" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>

</html>