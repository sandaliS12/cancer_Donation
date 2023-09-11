<?php 

include "db_conn.php";
require_once(realpath(dirname(__FILE__).'/../../vendor/autoload.php'));
// require '../../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;


//   //Load Composer's autoloader
//   require '../../vendor/autoload.php';


// 		use PHPMailer\PHPMailer\SMTP;
// 		use PHPMailer\PHPMailer\Exception;


if($_POST["action"] == "vEmail_send")
{
    echo 'came';
    $Vo_Name = $_POST['Vo_Name'];

    $Vo_Email = $_POST['Vo_Email'];
    
    $Vo_Message = $_POST['Vo_Message'];
        
        $mail = new PHPMailer(true);
         //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

        $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
        $mail->Username   = "apekshacancerfoundation@gmail.com";                     //SMTP username
        $mail->Password   = "djmwtmlfoehoyucy";                               //SMTP password

        $mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom("apekshacancerfoundation@gmail.com", "Cancer");

        $mail->addAddress($Vo_Email);     //Add a recipient

        $mail->isHTML(true);
        
        $mail->Subject = "About your registration for volunteering";

        $email_template = "
        <h2>Dear $Vo_Name ,</h2>
        <h3>$Vo_Message</h3>
        <p>Apeksha Cancer Hospital</p>
        <p>Maharagama </p>
        <p>10280</p>
        <p>Tel : + 94 112 850253</p>
        <p>contact@apeksha.com</p>
        
        ";

        $mail->Body = $email_template;
        
        $mail->send();

}





























		if($_POST["action"] == "volant_email_send")
		{
				echo 'came';
		$Vo_Name = $_POST['Vo_Name'];
	
		$Vo_Email = $_POST['Vo_Email'];
		
		$Vo_Message = $_POST['Vo_Message'];
			
			$mail = new PHPMailer(true);
			 //Server settings
			// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	
			$mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
			$mail->Username   = "apekshacancerfoundation@gmail.com";                     //SMTP username
			$mail->Password   = "iwsstymsrfxjocuq";                               //SMTP password
	
			$mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
			$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
	
			//Recipients
			$mail->setFrom("apekshacancerfoundation@gmail.com", "Cancer");

			$mail->addAddress($Vo_Email);     //Add a recipient
	
			$mail->isHTML(true);
			
			$mail->Subject = "About your registration for volunteering";
	
			$email_template = "
			<h2>Dear $Vo_Name ,</h2>
			<h3>$Vo_Message</h3>
			<p>Apeksha Cancer Hospital</p>
			<p>Maharagama </p>
			<p>10280</p>
			<p>Tel : + 94 112 850253</p>
			<p>contact@apeksha.com</p>
			
			";
	
			$mail->Body = $email_template;
			$mail->send();
	
			}


?>
		