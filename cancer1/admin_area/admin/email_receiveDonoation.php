<?php 

include "db_conn.php";
require_once(realpath(dirname(__FILE__).'/../../vendor/autoload.php'));
// require '../../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;


//   //Load Composer's autoloader
//   require '../../vendor/autoload.php';


// 		use PHPMailer\PHPMailer\SMTP;
// 		use PHPMailer\PHPMailer\Exception;


if($_POST["action"] == "receiveDonorEmail_send")
{
    echo 'came';
    $Vo_Name = $_POST['Fdonor_name'];

    $Vo_Email = $_POST['Fdonor_email'];
    
    $Vo_Message = $_POST['Fdonor_Message'];

	$EventVo_ID = $_POST['FEvent_ID1'];

    echo $EventVo_ID;
    echo $Vo_Email;
	
	echo $Vo_Name;
        
        $mail = new PHPMailer(true);
         //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug outputyy
        $mail->isSMTP();                                            //Send using SMTP
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

        $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
        $mail->Username   = "apekshacancerfoundation@gmail.com";                     //SMTP username
        $mail->Password   = "rovrgrgkrvxvlxms";                               //SMTP password

        $mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom("apekshacancerfoundation@gmail.com", "Cancer");

        $mail->addAddress($Vo_Email);     //Add a recipient

        $mail->isHTML(true);
        
        $mail->Subject = "Thank you for your contribution to Apeksha Hospital";

        $email_template = "
        <h2>Dear $Vo_Name ,</h2>
		<h3>Under this critical time, we appreciate your valuble contribution. Thank you for join with us. We received your donations. Hope your donations further</h3>
        <h3>$Vo_Message</h3>
        <p>Apeksha Cancer Hospital</p>
        <p>Maharagama </p>
        <p>10280</p>
        <p>Tel : + 94 112 850253</p>
        <p>contact@apeksha.com</p>
        
        ";

        $mail->Body = $email_template;
        
        $mail->send();

		$sql2 = "UPDATE events1 SET Status='5' where ID='$EventVo_ID'";
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) {
			
        // $query = "UPDATE events1 SET done='1' where ID='$ID'";
        //   if(mysqli_query($conn, $query))
        //   {
              echo 'insert';
        //   }
        
        }else {
        echo 'Error';
        exit();

        }
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
		