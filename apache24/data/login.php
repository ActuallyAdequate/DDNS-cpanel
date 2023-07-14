<?php
session_start();
$user = $_POST["user"];
$pass = $_POST["pass"];

$access = False;

$users = shell_exec('alist');
$userpasspairs = explode(PHP_EOL, $users);
foreach($userpasspairs as $upp){
    $up = explode(" ", $upp);
    if($user == $up[0]) {
        if(md5($pass) == $up[1]) {
            $access = True;
            break;
        }
    }
}

if($access) {
        $_SESSION['user'] = $user;
        $_SESSION['passhash'] = md5($pass);
	
    echo "<html><head><title>Account</title><script>window.location.href = 'account.php'</script></head>";
    echo "<body><p><a href='account.php'>To Account</a></p>";
    echo "</body></html>";
}

?>
