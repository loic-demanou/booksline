<?php
session_start();
setcookie('email','',time()+3600);
setcookie('password','',time()+3600);
session_unset();
session_destroy();

header("location:login2.php");
?>