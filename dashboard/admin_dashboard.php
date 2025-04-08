<?php
session_start();
echo "Welcome Admin!<br>";
echo "<a href='../incidents/manage_incidents.php'>Manage Incidents</a> | <a href='../auth/logout.php'>Logout</a>";
