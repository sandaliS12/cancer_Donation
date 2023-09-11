<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);





require_once(realpath(dirname(__FILE__).'/../../vendor/autoload.php'));

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

 
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
    // $mail->From       = $_POST['email'];
    $mail->FromName   = 'HAPTICA//Online';

    $mail->isHTML(); 
    
    $mail->addAddress('testac111@mailinator.com');
    
    //Content                             
    $mail->Subject = $_POST['subject'];
    $mail->Body    = $_POST['message'];
    $mail->AltBody = $_POST['email'];

    if (!$mail->send()) {
      header('HTTP/1.1 500 Internal Server Error', true, 500);
    } 
    // else {
    //   // header('HTTP/1.1 200 OK', true, 200);
    // }
    
    $response = array("success" => "Success");

  } catch (Exception $e) {

    header("HTTP/1.1 400 Bad Request");
    $response = array('error' => 'Mailer Error: ' . $mail->ErrorInfo);

  }

 
}
 ?>




<section id="about_us" class="about_us">
    <div class="container col-lg-10 pb-5 boarder p-5">

        <div class="section-title" data-aos="zoom-out">
            <h2>CONTACT US</h2>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4" data-aos="fade-right">
            <div class="info">
            
              <!-- <div class="address " style=" border: none;padding: 10px;box-shadow: 5px 8px 12px #888888;margin-bottom:20px">
                
             


                <h5><i class="bi bi-geo-alt"></i> Location:</h5>
              
              <p>Apeksha Hospital,<br> Maharagama, Sri Lanka</p>
             
            </div> -->
             

             

              <div class="map" style=" border: none;padding: 10px;box-shadow: 5px 8px 12px #888888;margin-bottom:20px">
                
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126766.2111076924!2d79.85027900627887!3d6.837239239719392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2507546e99623%3A0x884f7e1e67a4d49b!2sApeksha%20Hospital%20Maharagama!5e0!3m2!1sen!2slk!4v1686495024686!5m2!1sen!2slk" width="380" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
   
              </div>


              <div class="phone" style=" border: none;padding: 10px;box-shadow: 5px 8px 12px #888888;margin-bottom:20px">
                
                <h5><i class="bi bi-phone"></i> Call Us:</h5>
                <p>+ 94 112 850 252.| + 94 112 850253.</p>
              </div>

              <div class="email" style=" border: none;padding: 10px;box-shadow: 5px 8px 12px #888888;margin-bottom:20px">
                
                <h5><i class="bi bi-envelope"></i> Email Us:</h5>
                <p>nccpsl@yahoo.com| contact@apeksha.com</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">

            <form method="post" role="form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                
              </div>
              <div class="text-center"><input type="submit" class="btn btn-primary" value="Send Message"></input></div>
            </form>

          </div>
          <!-- <script src="https://smtpjs.com/v3/smtp.js"></script>
          <script> 
            function sendEmail(){
              Email.send({
                  Host : "smtp.gmail.com",
                  Username : "sandalisandyaleelananda@gmail.com",
                  Password : "@Sandali1",
                  To : 'sandalisandyaleelananda@gmail.com',
                  From : document.getElementById("email").value,
                  Subject : "This is the subject",
                  Body : "And this is the body"
              }).then.(
                
                message => alert(message)
              );
            }
          </script> -->

        </div>
    </div>
</section>


        
