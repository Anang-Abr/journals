<?php 
session_start();
setcookie('key', '', time()- 60);
session_destroy();
header('Location:login.php')
?>