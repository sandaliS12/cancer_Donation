<?php 
// session_start(); 
include ('includes/check_login.php');
include "db_conn.php";
require_once(realpath(dirname(__FILE__).'/../../vendor/autoload.php'));
// require '../../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
if($_POST["action"] == "admin_insert")
{

$pass = $_POST['add_Password'];

$re_pass = $_POST['add_reassword'];
$name = $_POST['add_Name'];
echo $pass;
$Email_Address = $_POST['add_Email'];
$Phone_Number = $_POST['add_Number'];
$adminRole = $_POST['adminRole'];

	// String Password => md5 Password
	$pass = md5($pass);
	echo $pass;
	$sql = "SELECT * FROM admin WHERE AdminEmail='$Email_Address' ";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		echo 'email';
	}else {
		echo $pass;
	   $sql2 = "INSERT INTO admin(AdminName, Password, AdminEmail,Status, A_Number) VALUES('$name','$pass','$Email_Address','$adminRole', '$Phone_Number')";
	   $result2 = mysqli_query($conn, $sql2);
	   if ($result2) {
		


			// hashing the password
			// $pass1 = md5($pass);
			$pass1 = $pass;
			
			require ('../../vendor-QR/autoload.php');
			$barcode = new \Com\Tecnick\Barcode\Barcode();
			$targetPath = "qr-code/";
	
	
			
			$qr_detail = $Email_Address.$pass1; 
			
			
			if (! is_dir($targetPath)) {
				mkdir($targetPath, 0777, true);
			}
			$bobj = $barcode->getBarcodeObj('QRCODE,H', $qr_detail, - 16, - 16, 'black', array(
				- 2,
				- 2,
				- 2,
				- 2
			))->setBackgroundColor('#f0f0f0');
			
			$imageData = $bobj->getPngData();
			
			$file2 =  $imageData;
			
			$mail = new PHPMailer(true);
			 //Server settings
			// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	
			$mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
			$mail->Username   = "apekshacancer@gmail.com";                     //SMTP username
			$mail->Password   = "rgudsllvouqdcyaq";                               //SMTP password
	
			$mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
			$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
	
			//Recipients
			$mail->setFrom("apekshacancer@gmail.com", "Cancer");

			$mail->addAddress($Email_Address);     //Add a recipient
			
			$mail->isHTML(true);
			
			$mail->addStringAttachment($file2, 'Cancer-login.png');
			$mail->Subject = "Successfully Create Admin Account";
	
			$email_template = "
			<h2>Dear $name ,</h2>
			<h3>Your admin account successfully created for cancer foundation. You can access our system using your QR code. Your QR code is attached to this mail.</h3>
			<p>Apeksha Cancer Hospital</p>
			<p>Maharagama </p>
			<p>10280</p>
			<p>Tel : + 94 112 850253</p>
			<p>contact@apeksha.com</p>
			
			";
	
			$mail->Body = $email_template;
			$mail->send();









			echo 'Created';



		 
	   }else {
		echo 'Error';
	   }
	}
}

  //Load Composer's autoloader
  require '../../vendor/autoload.php';


		use PHPMailer\PHPMailer\SMTP;
		use PHPMailer\PHPMailer\Exception;

		if($_POST["action"] == "email_send")
		{
				echo 'came';
		$pass = $_POST['add_Password'];
	
		$name = $_POST['add_Name'];
		
		$Email_Address = $_POST['add_email'];
	
	
			// hashing the password
			$pass1 = md5($pass);
	
			require ('../vendor-QR/autoload.php');
			$barcode = new \Com\Tecnick\Barcode\Barcode();
			$targetPath = "qr-code/";
	
	
			
			$qr_detail = $Email_Address.$pass1; 
			
			
			if (! is_dir($targetPath)) {
				mkdir($targetPath, 0777, true);
			}
			$bobj = $barcode->getBarcodeObj('QRCODE,H', $qr_detail, - 16, - 16, 'black', array(
				- 2,
				- 2,
				- 2,
				- 2
			))->setBackgroundColor('#f0f0f0');
			
			$imageData = $bobj->getPngData();
			
			$file2 =  $imageData;
			
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

			$mail->addAddress($Email_Address);     //Add a recipient
	
			$mail->isHTML(true);
			
			$mail->addStringAttachment($file2, 'Cancer-login.png');
			$mail->Subject = "Successfully Create Admin Account";
	
			$email_template = "
			<h2>Dear $name ,</h2>
			<h3>Your admin account successfully created for cancer foundation. You can access our system using your QR code. Your QR code is attached to this mail.</h3>
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
		