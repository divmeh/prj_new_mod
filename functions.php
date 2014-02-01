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
//        $query = mysql_query("DELETE FROM members WHERE id=$userid");

        $dQuery = $connect->prepare("DELETE FROM members WHERE id = :userId");
        $dQuery->bindValues(
          'bindValue', $userid);
        die;
        if($dQuery)
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
        $query = mysql_query("UPDATE members set isenabled = ".$_GET['cstatus']." WHERE id=$userid");
        echo "UPDATE members set isenabled = ".$_GET['cstatus']."WHERE id=$userid";
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
        $searchquery = mysql_query("SELECT * FROM members WHERE id = $userid");
        $queryresult = mysql_fetch_array($searchquery);
        echo $name = $queryresult['name'];
        echo $emailto = $queryresult['email'];
        $subject = 'Password Reset';
        $password = '';
        $funcobj = new myfunctions;
        $password = $funcobj->generatepass();
        $sha1password = sha1($password);

        $body = sprintf("Hi %s,\n\n Your password has been reset successfully. Your new password is %s \n\nRegards,\n\nApplication Admin",$name,$password);
        $altBody = 'This is the body in plain text for non-HTML mail clients';

        if(mysql_num_rows($searchquery) > 0 )

            $updatequery = mysql_query("UPDATE members SET password = '$sha1password' WHERE email = '$emailto'");
            $result = $mailerObj->sendMail($emailto,$name,$subject,$body,$senderEmail,$senderName);
            header("Location:home.php?msg=$result");
            if(mysql_affected_rows() < 0)
            header('Location:home.php?msg=Email address does not exist in database');

    }

    public function changePassOfLoggedIn($name,$pass,$cpass){

        if($pass != $cpass){
            header('Location:home.php?msg=Password and confirm password does not match.');
        }
        $searchquery = mysql_query("SELECT * FROM members WHERE name = '$name'");
        if(mysql_num_rows($searchquery) > 0 )
            $updatequery = mysql_query("UPDATE members SET password = sha1($pass) WHERE name = '$name'");
        //    echo "UPDATE members SET password = sha1(\"$pass\") WHERE name = '$name'";
            if(mysql_affected_rows() < 0){
                header('Location:home.php?msg=Password could not reset, please try again..');
            }
            header("Location:home.php?msg=Password reset successfully");
        }
}
?>