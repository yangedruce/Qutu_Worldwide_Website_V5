<?php

/* Namespace alias. */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Include the Composer generated autoload.php file. */
// require 'C:\xampp\composer\vendor\autoload.php';

/* If you installed PHPMailer without Composer do this instead: */
/*

*/
require 'phpmailer\Exception.php';
require 'phpmailer\PHPMailer.php';
require 'phpmailer\SMTP.php';

/* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
$mail = new PHPMailer(TRUE);

$contact_us_name=$_GET["contact_us_name"];
$contact_us_phone=$_GET["contact_us_phone"];
$contact_us_email=$_GET["contact_us_email"];
$contact_us_company_name=$_GET["contact_us_company_name"];
$contact_us_type=$_GET["contact_us_type"];
$contact_us_message=$_GET["contact_us_message"];
/* Open the try/catch block. */
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'qutuworldwide@gmail.com'; //Email
    $mail->Password = ' '; //2FA password

   /* Set the mail sender. */
    $mail->setFrom('qutuworldwide@gmail.com', 'Qutu Worldwide Form'); 

    /* Add a recipient. */
    $mail->addAddress('qutuworldwide@gmail.com', 'Qutu Worldwide Form');

    /* Set the subject. */
    $mail->Subject = 'Quotation';

    /* Set the mail message body. */
    // $mail->Body = 'There is a great disturbance in the Force.';
    $mail->Body = "Name: ".$contact_us_name."\nPhone: ".$contact_us_phone."\nEmail: ".$contact_us_email."\nCompany Name: ".$contact_us_company_name."\nType of development: ".$contact_us_type."\nMessage: ".$contact_us_message ;

    /* Finally send the mail. */
    $mail->send();
}
catch (Exception $e)
{
   /* PHPMailer exception. */
   echo $e->errorMessage();
}
catch (\Exception $e)
{
   /* PHP exception (note the backslash to select the global namespace Exception class). */
   echo $e->getMessage();
}