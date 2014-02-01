<?php
session_start();
if(!isset($_SESSION['mname'])) exit('No direct script access allowed');
session_destroy();
setcookie("rememberme", "", time()-3600);
setcookie("email", "", time()-3600);
header('Location:index.php?authresult=Logged out successfully');
?>