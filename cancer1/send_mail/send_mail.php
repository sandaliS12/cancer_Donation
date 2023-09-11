<?php 
//Load Composer's autoloader
		require '../vendor/autoload.php';
  

		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;
		use PHPMailer\PHPMailer\Exception;
if (isset($_POST["action"])) {
    if($_POST["action"] == "email_send")
    {
	

	$Email_Address = $_POST['mail'];
	$name = $_POST['name'];
	$message = $_POST['message'];
	$subject = $_POST['subject'];
        
		$mail = new PHPMailer(true);
         //Server settings
		// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication

		$mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
		$mail->Username   = "apekshacancerfoundation@gmail.com";                     //SMTP username
		$mail->Password   = "tkrsrowcnunkbmsx";                               //SMTP password

		$mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
		$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom("apekshacancerfoundation@gmail.com", "Apeksha cancer donation");
		$mail->addAddress("apekshacancerfoundation@gmail.com");     //Add a recipient

		$mail->isHTML(true);
		
		// $mail->addStringAttachment($file2, 'Yo-travel-login.png');
		$mail->Subject = $subject;

		$email_template = "
		<h2>Name: $name ,</h2>
		<h3>$message</h3>
		<p>$Email_Address</p>
		
		";

		$mail->Body = $email_template;
		$mail->send();

		}
	}
?>