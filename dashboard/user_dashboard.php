<?php
session_start();
echo "Welcome User!<br>";
echo "<a href='incident_form.php'>Add Incidents</a> | ";
echo "<a href='../incidents/view_my_incidents.php'>My Incidents</a> | <a href='../auth/logout.php'>Logout</a>";
