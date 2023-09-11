<?php 
// session_start(); 
require_once "includes/db_conn.php";
include ('includes/check_login.php');

    //Load Composer's autoloader
    require '../../vendor/autoload.php';
  

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

if (isset($_POST['email']) && isset($_POST['new_pass'])
    && isset($_POST['con_pass'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	
    
	$pass = validate($_POST['new_pass']);

	$re_pass = validate($_POST['con_pass']);

	$Email_Address = validate($_SESSION['A_Email']);

    
	if($pass !== $re_pass){
		$_SESSION['status'] = "The confirmation password does not match";
		$_SESSION['status_code'] ="info";
		header("Location: ../Guest/password_reset_now.php");
	    exit();
	}
    

	else{
		$pass = password_hash($pass, PASSWORD_DEFAULT); // Creates a password hash
		// hashing the password
        // $pass = md5($pass);

        $sql = "SELECT * FROM admin WHERE AdminEmail='$Email_Address' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_array($result);
            
            // $name = $row['donor_name'];

          
                $sql2 = "UPDATE admin SET Password='$pass' WHERE AdminEmail='$Email_Address' LIMIT 1";
                $result2 = mysqli_query($conn, $sql2);
     
                if ($result2) {
                 $_SESSION['status'] = "Your account password updated successfully";
                 $_SESSION['status_code'] ="success";
                 header("Location: ../admin/index.php");
                 send_login_qr_code($Email_Address,$pass,$name);
                  exit();
                }else {
                 $_SESSION['status'] = "unknown error occurred";
                 $_SESSION['status_code'] ="error";
                 header("Location: ../admin/index.php");
                     exit();
                
             }

		}
	}
	
}else{
	header("Location: index.php");
	exit();
}


function send_login_qr_code($Email_Address,$pass,$name)
    {
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
			$mail->Password   = "khjmxtcsbbtatgwe";                               //SMTP password
	
			$mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
			$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
	
			//Recipients
			$mail->setFrom("apekshacancer@gmail.com", "Cancer");
		$mail->addAddress($Email_Address);     //Add a recipient

		$mail->isHTML(true);
		
		$mail->addStringAttachment($file2, 'Cancer-login-user.png');
		$mail->Subject = "Successfully reset account password";

		$email_template = "
		<h2>Dear $name ,</h2>
		<h3>You have successfully reset your account password on Apeksha.com. You can access our system using your new QR code. Your new QR code is attached to this mail.</h3>
		<p>Apeksha Cancer Hospital</p>
			<p>Maharagama </p>
			<p>10280</p>
			<p>Tel : + 94 112 850253</p>
			<p>contact@apeksha.com</p>
		";

		$mail->Body = $email_template;
		$mail->send();

		}