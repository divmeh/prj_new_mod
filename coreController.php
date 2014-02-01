<?php
session_start();

if(!isset($_SESSION['mname'])) exit('No direct script access allowed');

require_once 'connection.php';
require_once 'mailerClass.php';
require_once 'functions.php';

$functionObj = new myfunctions();

if(!empty($_GET['id']) && ($_GET['del'] ==1) && (preg_match('/(.*?)(\/home.php)/',$_SERVER['HTTP_REFERER'])))
{
    $functionObj->delete($_GET['id']);
}
if(!empty($_GET['id']) && ($_GET['changeStatus'] ==1) && (preg_match('/(.*?)(\/home.php)/',$_SERVER['HTTP_REFERER'])))
{
    $functionObj->changestatus($_GET['id']);
}
if(!empty($_GET['id']) && ($_GET['changePass'] ==1) && (preg_match('/(.*?)(\/home.php)/',$_SERVER['HTTP_REFERER'])))
{
    $functionObj->changepworduser($_GET['id']);
}
if(!empty($_GET['name']) && ($_GET['changePassForLoggedIN'] ==1) && (preg_match('/(.*?)(\/home.php)/',$_SERVER['HTTP_REFERER'])))
{
    $functionObj->changePassOfLoggedIn($_GET['name'],$_GET['cpassword'],$_GET['ccpassword']);
}