<?php
/**
 * Send mail class
 *
 * @author Mehar Singh
 * @package Common
 */
class mailerClass {
    /**
    * SMTP address
    * @var string
    */
    protected  $host = 'ssl://smtp.gmail.com';
    /**
    * Username to connect
    * @var string
    */
    protected $username = 'mehar.kayako';
    /**
    * Password to connect
    * @var string
    */
    protected $password = 'wakhar123';
    /**
     * SMTP secure type
     * @var string
     */
    protected $SMTPSecure = 'ssl';
    /**
     * Port number allocated to mail server
     * @var string
     */
    protected $port = '465';
        /**
     * Recipient Details
     * @var1 email address & @var2 Recipient Name
     */
    protected $addRecipient = '';
    /**
     * Word wrap character length
     * @var Number
     */
    protected $wordWrap = 50;
    /**
     * Returns configuration
     * @var string
     */
    public function __construct(){
        require 'MailClass/PHPMailerAutoload.php';
    }
    public function sendMail($recipientEmail,$recipientName,$subject,$body,$senderEmail,$senderName){

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $this->host;
        $mail->SMTPAuth = True;
        $mail->Port = $this->port;
        $mail->Subject = $subject;
        $mail->Username = $this->username;
        $mail->Password = $this->password;
        $mail->SMTPSecure = $this->SMTPSecure;
        $mail->From = $senderEmail;
        $mail->FromName = $senderName;
        $mail->isHTML = true;
        $mail->addAddress($recipientEmail,$recipientName);
        $mail->Body = $body;

        if(!$mail->send()){
            return "Error while sending email: $mail->ErrorInfo";
        }
            return "Email sent successfully";
    }
}