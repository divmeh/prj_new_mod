<?php
//$connection = mysql_connect('localhost','root','test');
//if($connection){
//mysql_select_db('prj1');
//}else{
// die(mysql_error());
//}
//?>
<?php

$config['db'] = array(
'host' => 'localhost',
'user' => 'root',
'pass' => 'test',
'dbname' => 'prj1'
);
//echo '<pre>';
//print_r($config);
//echo ("Mehar".$config['db']['host']);
try{
$connect = new PDO("mysql:host=".$config['db']['host'].";dbname=".$config['db']['dbname'],$config['db']['user'],$config['db']['pass']);
}
catch(PDOException $e){
    echo 'Error:'.$e->getMessage();
}
//?>
<?php
//class config{
//
//    private $host = 'localhost';
//    private $user = 'root';
//    private $pass = 'test';
//    private $dbName = 'prj1';
//    public  $connect = '';
//
////$connect = new PDO("mysql:host=".$host.";dbname=".$dbName,$user,$pass);
//    function __construct(){
//        try{
//           return $connect = new PDO("mysql:host=".$this->host.";dbname=".$this->dbName,$this->user,$this->pass); }
//        catch(PDOException $e){
//           echo $e->getMessage();
//        }
//    }
//}
//$connection = new config();
//
//
//?>