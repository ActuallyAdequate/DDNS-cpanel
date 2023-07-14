<?php
 session_start();

echo "<html><head><title>Account</title></head>";
echo "<body><h1> My Account</h1>";
echo "<p>User: {$_SESSION['user']}</p>";
echo "<p> Zones: <a href='zones/zoneview.php'>Here</a></p>";
echo "<p><a id='logout' href='index.html'>Logout</a></p>";
echo "</body></html>";
?>
