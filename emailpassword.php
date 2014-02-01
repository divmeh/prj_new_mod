<?php if(!isset($_SESSION['mname'])) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: Mehar
 * Date: 17/1/14
 * Time: 2:43 PM
 * To change this template use File | Settings | File Templates.
 */
require_once 'connection.php';
require_once 'functions.php';
require 'MailClass/PHPMailerAutoload.php';

class emailPassword {
    public $host = 'smtp.gmail.com';
    public $SMTPAuth = 'true';
    public $username = 'mehar.kayako';                            // SMTP username
    public $password = 'wakhar123';
    public $SMTPSecure = 'tls';
    public $from = 'mehar.kayako@gmail.com';
    public $fromName = '';
    public $addAddressName = 'Application Admin';
    public $WordWrap = 50;
    public $isHTML = true;

    public function emailPass(){

    }
}