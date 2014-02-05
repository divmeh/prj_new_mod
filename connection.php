<?php

$config['db'] = array(
'host' => 'localhost',
'user' => 'root',
'pass' => 'test',
'dbname' => 'prj1'
);

try{
$connect = new PDO("mysql:host=".$config['db']['host'].";dbname=".$config['db']['dbname'],$config['db']['user'],$config['db']['pass']);
}
catch(PDOException $e){
    echo 'Error:'.$e->getMessage();
}
?>
