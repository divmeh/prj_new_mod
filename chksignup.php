<?php if(!isset($_SESSION['mname'])) exit('No direct script access allowed');

require_once 'connection.php';
 $name = mysql_real_escape_string($_POST['name']);
 $email = mysql_real_escape_string($_POST['email']);
 $pword = mysql_real_escape_string($_POST['pword']);
 $cpword = mysql_real_escape_string($_POST['cpword']);
//print_r($_POST);

if(empty($name) || empty($email) || empty($pword) || empty($cpword)){
 header('Location: signup.php?msg=One of the required field is empty');
 exit;
}

 if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    header('Location:signup.php?msg=Email address is not valid');
    exit;
}
 if($cpword != $pword){
     echo 'not same';
	 $_POST['kol'] = 'Password does not match';
 
	header('Location: signup.php?msg=Password does not match');
	exit;
 }
 
 $query = mysql_query("SELECT * FROM members where email = '$email'");

 if(mysql_num_rows($query) > 0){
	header('Location: signup.php?msg=This email address is already registered, please use different one.');
	exit;
 }else{
 $pword = sha1($pword);
	$finalquery = mysql_query("INSERT INTO members(name,email,password) VALUES('$name','$email','$pword')");
 }
 if($finalquery){
	header('Location: signup.php?msg=Registered sucesfully');
 exit;
 }else{
	header('Location: signup.php?msg=Sorry! Try again');
 exit;
 }
?>