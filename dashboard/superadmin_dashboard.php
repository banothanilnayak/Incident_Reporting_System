<?php
session_start();
echo "Welcome Super Admin!<br>";
echo "<a href='../users/manage_users.php'>Manage Users</a> | <a href='../logs/audit_logs.php'>Audit Logs</a> | <a href='../auth/logout.php'>Logout</a>";
