<?php if(!isset($_SESSION['mname'])) exit('No direct script access allowed');

require_once 'connection.php';
require_once 'functions.php';
require_once 'mailerClass.php';

$emailto = $_POST['email'];

$mailerObj = new mailerClass();

$senderEmail = 'mehar.kayako@gmail.com';
$senderName = 'Application Admin';
$name = '';

//Get the name of the user
$searchquery = mysql_query("SELECT * FROM members WHERE email= '$emailto'");
$queryresult = mysql_fetch_array($searchquery);
$name = $queryresult['name'];

$subject = 'Password Reset';
$password = '';
$funcobj = new myfunctions;
$password = $funcobj->generatepass();
$sha1password = sha1($password);

$body = sprintf("Hi %s,\nYour password has been reset successfully. Your new password is %s \n\nRegards,\n\nApplication Admin",$name,$password);
$altBody = 'This is the body in plain text for non-HTML mail clients';

if(mysql_num_rows($searchquery) > 0 )
    $updatequery = mysql_query("UPDATE members SET password = '$sha1password' WHERE email = '$emailto'");
        $result = $mailerObj->sendMail($emailto,$name,$subject,$body,$senderEmail,$senderName);
        header("Location:resetpasswordform.php?msg=$result");
    if(mysql_affected_rows() < 0)
        header('Location:resetpasswordform.php?msg=Email address does not exist in database');
?>