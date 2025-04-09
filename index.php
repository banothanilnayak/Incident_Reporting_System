<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: register.php");
    exit;
} else {
    header("Location: dashboard/" . strtolower($_SESSION['role']) . "_dashboard.php");
    exit;
}
