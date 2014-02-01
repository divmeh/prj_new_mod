<?php
session_start();

if(!isset($_SESSION['mname'])) exit('No direct script access allowed');

require_once('connection.php');

class myfunctions{

    public function delete($userid){

        if ($userid== ''){
            header('Location:home.php?msg=No User id to delete');
            exit;
        }
        //check if user is deleting to self account
        if($_SESSION['staffid'] == $userid){
            header('Location:home.php?msg=You can not delete yourself');
            exit;
        }
        //Shoot the query

        $dQuery = $GLOBALS['connect']->prepare("DELETE FROM members WHERE id = :userId");

        $dQuery->bindValue( ':userId', $userid );
        $dQuery->execute();

        if($dQuery->rowCount());
        header('Location:home.php?msg=User deleted successfully');
        return true;
    }

    public function changestatus($userid){

        if ($userid== ''){
        header('Location:home.php?msg=No User id to update');
        exit;
        }
        //check if user is trying to disable self account
        if($_SESSION['staffid'] == $userid){
            header('Location:home.php?msg=You can not disable yourself');
            exit;
        }

        $cQuery = $GLOBALS['connect']->prepare("UPDATE members set isenabled = :status WHERE id=:userId");
        $cQuery->execute(array(
            ':status'=> $_GET['cstatus'],
            ':userId' => $userid,
        ));
        echo $cQuery->rowCount();
        if($cQuery->rowCount())
        header('Location:home.php?msg=User updated successfully');
        return true;
    }

   public function generatepass(){

       $alphabets = range('a','z');
       $nums = range(1,9);
       $specialChracters = array('!','@','#','$','%','&','*','^');

       $index1 = array_rand($alphabets,5);
       $index2 = array_rand($nums,5);
       $index3 = array_rand($specialChracters,4);
       $index4 = array_rand($specialChracters,4);

       foreach($index1 as $key1=>$val1){
           $array1[] = $alphabets[$val1];
       }
       foreach($index2 as $key2=>$val2){
           $array2[] = $nums[$val2];
       }
       foreach($index3 as $key3=>$val3){
           $array3[] = $specialChracters[$val3];
       }
       foreach($index4 as $key4=>$val4){
           $array4[] = $specialChracters[$val4];
       }
       $finalarray = array_merge($array3,$array1,$array2,$array4);
       return implode($finalarray);
   }

    public function changepworduser($userid){

        if ($userid == ''){
            header('Location:home.php?msg=No User id to update');
            exit;
        }

        $mailerObj = new mailerClass();

        $senderEmail = 'mehar.kayako@gmail.com';
        $senderName = 'Application Admin';
        $name = '';

        //Get the name of the user

        $searchquery = $GLOBALS['connect']->prepare("SELECT * FROM members WHERE id = :userid");
        $searchquery->execute(array(':userid' => $userid));

        $queryresult = $searchquery->fetchAll(PDO::FETCH_ASSOC);

        $name = $queryresult['0']['name'];
        $emailto = $queryresult['0']['email'];
        $subject = 'Password Reset';
        $password = '';
        $funcobj = new myfunctions;
        $password = $funcobj->generatepass();
        $sha1password = sha1($password);

        $body = sprintf("Hi %s,\n\n Your password has been reset successfully. Your new password is %s \n\nRegards,\n\nApplication Admin",$name,$password);
        $altBody = 'This is the body in plain text for non-HTML mail clients';

        if($searchquery->rowCount() > 0 )

         $updatequery = $GLOBALS['connect']->prepare("UPDATE members SET password = :sha1password WHERE email = :email ");

        $updatequery->execute(array(

            'sha1password' => $sha1password,
            'email' => $emailto

        ));
        $result = $mailerObj->sendMail($emailto,$name,$subject,$body,$senderEmail,$senderName);
        header("Location:home.php?msg=$result");
        if($updatequery->rowCount() < 0)
            header('Location:home.php?msg=Email address does not exist in database');

    }

    public function changePassOfLoggedIn($name,$pass,$cpass){

        if($pass != $cpass){
            header('Location:home.php?msg=Password and confirm password does not match.');
        }

        $searchQuery = $GLOBALS['connect']->prepare("SELECT * FROM members WHERE name = :name");
        $searchQuery->execute(array(':name'=> $name));

        if($searchQuery->rowCount() > 0 )

        $updateQuery = $GLOBALS['connect']->prepare("UPDATE members SET password = :pass WHERE name = :name");
        $updateQuery->execute(array(
            ':pass' => sha1("$pass"),
            'name' => $name));

         if($updateQuery->rowCount() < 0){

            header('Location:home.php?msg=Password could not reset, please try again..');
            }
            header("Location:home.php?msg=Password reset successfully");
        }
}
?>