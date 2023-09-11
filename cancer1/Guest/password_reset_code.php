<?php 
session_start(); 
   
    require_once "template/db_conn.php";
    require_once(realpath(dirname(__FILE__).'/../../vendor/autoload.php'));
// require '../../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
  

 
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;



    function send_password_reset($get_name,$get_email,$code)
    {
        $mail = new PHPMailer(true);
        //Server settings
       // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
       $mail->isSMTP();                                            //Send using SMTP
       $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

       $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
       $mail->Username   = "apekshacancerfoundation@gmail.com";                     //SMTP username
       $mail->Password   = "tdpzbhgsrjexvqbz";                               //SMTP password

       $mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
       $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

       //Recipients
       $mail->setFrom("apekshacancerfoundation@gmail.com", "Cancer");
    $mail->addAddress($get_email);     //Add a recipient

    $mail->isHTML(true);
    $mail->Subject = "Apeksha cancer Account Password Reset Confirmation Code";

    $email_template = "
    <h2>Hello $get_name</h2>
    <h3>You are reciving this mail because we received a password reset request for your account</h3>
    <p>Your Email - $get_email</p>
    <p>Your password reset code - $code</p>
    
    ";

    $mail->Body = $email_template;
    $mail->send();

    // if (!$mail->send()){
    //     echo 'mailer error';
    // }else{
    //     echo 'sent';
    // }

    }
    if(isset($_POST['password_reset_code_button']))
    {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $code = rand(1000,9999);

        $check_email = "SELECT * FROM donor WHERE donor_email= '$email'LIMIT 1";
        $check_email_run = mysqli_query($conn, $check_email);

        if(mysqli_num_rows($check_email_run) > 0)
        {
            $row = mysqli_fetch_array($check_email_run);
            $get_name = $row['donor_name'];
            $get_email = $row['donor_email'];

            $update_code = "UPDATE donor SET Code='$code' WHERE donor_email='$get_email' LIMIT 1";
            $update_code_run = mysqli_query($conn, $update_code);

            if($update_code_run)
            {
                send_password_reset($get_name,$get_email,$code);

                $_SESSION['U_Email'] = $row['donor_email'];
                $_SESSION['code1'] = $code;

                $_SESSION['status'] = "Password Reset Code Sent Successfuly";
                $_SESSION['status_code'] ="success";
                header("Location: ./password_reset_now.php");
                
                exit();
            }
            else
            {

                $_SESSION['status'] = "Somthing went wrong";
                $_SESSION['status_code'] ="error";
                header("Location: password_reset.php");
                
                exit();
            }

        }
        else
        {

            $_SESSION['status'] = "Email Not Found!";
            $_SESSION['status_code'] ="error";
            header("Location: password_reset.php");
            
            exit();

        }
    }
?>