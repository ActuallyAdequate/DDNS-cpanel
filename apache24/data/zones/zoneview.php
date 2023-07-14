<?php

session_start();

echo "<html><head><title>DNS</title>";
echo "<script src='jsscripts/zoneview.js'></script>";
echo "</head><body>";
echo "<p><a href='../account.php'>To Account</a></p>";


$output = shell_exec("zlist");
$zones  = explode(PHP_EOL,$output);
$user = $_SESSION['user'];

$perms = shell_exec("gap {$user}");


foreach ($zones as $z) {
    if($z == "" or str_contains($perms, $z) == False) {
        continue;
    }
    echo "<h3>Zone {$z}";
    $nptr = !strpos($z, 'in-addr.arpa');
    if($nptr){
        echo "- <a id='{$z}' href='edit.html' class='add'>Add Record</a>";
    }
    echo "</h3>";
    echo "<table><thead><tr><th>Name</th><th>Type</th><th>Address</th>";
    if($nptr) {
        echo "<th>Operations</th>";
    }
    echo "</tr></thead><tbody>";

    $output = shell_exec("zrlist $z");
    $records = explode(PHP_EOL,$output);
    
    foreach($records as $r) {
        if($r == ""){
            continue;
        }
        echo "<tr>";
        $parts = explode(" ",$r);
        echo "<td>{$parts[1]}</td><td>{$parts[0]}</td><td>{$parts[2]}</td>";
        if($nptr) {
            echo "<td><a id='{$z},{$parts[1]},{$parts[0]},{$parts[2]}' class='edit' href='edit.html'>Edit</a>  <a id='{$z},{$parts[1]},{$parts[0]},{$parts[2]}' class='delete' href='edit.html'>Delete</a></td>";
        }
        echo "</tr>";
    }
    echo "</tbody></table>";

}



echo "</body>";
echo "</html>";
?>
