<?php 
session_start();
// membersihkan session 
session_unset();
session_destroy();

header("Location: login.php");
exit;

?>