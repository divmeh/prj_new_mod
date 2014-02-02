<?php if(!isset($_POST['memail'])) exit('No direct script access allowed');

session_start();
require_once('connection.php');

$memail = $_POST['memail'];
$mpassword = $_POST['mpassword'];
$rememberme = isset($_POST['remember']);


if(empty($memail) || empty($mpassword)){
    header('Location:index.php?authresult=One of the required field is empty');
    die;
}
if(!filter_var($memail,FILTER_VALIDATE_EMAIL)){
    header('Location:index.php?authresult=Email address is not valid');
    die;
}

//Generate its SHA1 hash

$mpassword = sha1($mpassword);

$query = $connect->prepare("SELECT * FROM members WHERE email = :memail AND password = :mpassword");
$query->bindValue(':memail',$memail);
$query->bindValue(':mpassword',$mpassword);
$query->execute();

if($query->rowCount() == 0){
    header('Location:index.php?authresult=Invalid Email address or Password');
}else{
    $array = $query->fetch(PDO::FETCH_ASSOC);
    if($array['isadmin'] == 0){
        header('Location:index.php?authresult=You do not have admin privilege');
		exit;
    }else{

    //check if account is enabled
  
if($array['isenabled']==0){
       header('Location:index.php?authresult=Account Disabled..Please contact administrator');
}else{
      if($rememberme==1){
        setcookie('rememberme',1,time()+3600*24);
        setcookie('email',$memail,time()+3600*24);
        }
        $_SESSION['mname'] = $array['name'];
        $_SESSION['staffid'] = $array['id'];
        header('Location:home.php');
    }
  }
}
?>
