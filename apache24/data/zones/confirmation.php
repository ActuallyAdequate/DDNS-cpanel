<?php
session_start();

echo "<html><head><title>Confirmation</title></head>";
echo "<body>";


$operation = $_POST['op'];
$input = "";

if($operation == 'add'){
    $input = "a\n"; }
if($operation == 'edit'){
    $input = "e\n"; }
if($operation == 'delete') {
    $input = "d\n"; }

if($operation == 'delete' or $operation == 'edit'){
    $input .= "{$_POST['oldname']}\n{$_POST['oldtype']}\n{$_POST['oldaddress']}\n";
}
if($operation == 'add' or  $operation == 'edit') {
    $input .= "{$_POST['name']}\n3600\n{$_POST['type']}\n{$_POST['address']}\n";    
}


$zone = $_POST['zone'];

$usr = $_SESSION['user'];
$passhash = $_SESSION['passhash'];

$desc = array(
	0 => array("pipe", "r"),
	1 => array("pipe", "w"),
	2 => array("pipe", "w"));
$process = proc_open("zedit {$zone} {$usr} {$passhash}", $desc,$pipes);
if(is_resource($process)) {
    fwrite($pipes[0], $input);
    fclose($pipes[0]);
}
proc_close($process);



$successful = True;

if($operation == 'delete'){
    $output = shell_exec("nslookup {$_POST['oldname']}");
    $successful = str_contains($output,"NXDOMAIN");
}
if($operation == 'add' or $operation == 'edit') {
    $output = shell_exec("nslookup {$_POST['name']}");
    $sucessful = !(str_contains($output,"NXDOMAIN"));
}
if($successful){
    echo "<h1>SUCCESS</h1>";
}
else {
    echo "<h1>FAILED</h1>";
}
echo "<p><a href='zoneview.php'>Return Home</a></p>";
echo "</body></html>";
?>
