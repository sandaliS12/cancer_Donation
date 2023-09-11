<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once('../vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);


try {
    $mail->CharSet      = 'UTF-8';
    $mail->Encoding     = 'base64';
    $mail->ReturnPath   = 'sandalisandyaleelananda@gmail.com';
    $mail->isSMTP();
    $mail->SMTPDebug    = 0;
    $mail->Priority     = 1;
    $mail->Debugoutput  = 'html';
    $mail->Host         = 'smtp.elasticemail.com';
    $mail->Port         = 2525;
    $mail->SMTPSecure   = 'tls';
    $mail->SMTPAuth     = true;
    $mail->Username     = "sandalisandyaleelananda@gmail.com";
    $mail->Password     = "F7F87391D4B83150FA2AC8E558E8C7133F32";



    $mail->From       = 'sandalisandyaleelananda@gmail.com';
    $mail->FromName   = 'HAPTICA//Online';

    $mail->isHTML(); 
    
    $mail->addAddress('testac111@mailinator.com');
    
    //Content                             
    $mail->Subject = 'bbbbb';
    $mail->Body    = '<h1>aaaa</h1> <p> ssssssssssss</p>';
    $mail->AltBody = 'iiiiiiiiiiiiiiis';

    if (!$mail->send()) {
      header('HTTP/1.1 500 Internal Server Error', true, 500);
    } else {
      header('HTTP/1.1 200 OK', true, 200);
    }
    
    $response = array("success" => "Success");

  } catch (Exception $e) {

    header("HTTP/1.1 400 Bad Request");
    $response = array('error' => 'Mailer Error: ' . $mail->ErrorInfo);

  }

  echo json_encode($response);

?>