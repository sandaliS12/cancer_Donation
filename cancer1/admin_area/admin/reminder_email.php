<?php
include "db_conn.php";
require_once(realpath(dirname(__FILE__) . '/../../vendor/autoload.php'));
// require '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

$api_key = 'hFvJZuKQn0AsFEcMZadgoNO7ULF7D8aWNc3sX3JAjSorGBiiU4';
if(!isset($_GET['api_key']) || $_GET['api_key']!=$api_key){
    header('HTTP/1.0 403 Forbidden');
    die('Forbidden');
}



$currentDate = new DateTime(); // Current date and time
$interval = new DateInterval('P10D'); // 10 days interval
$futureDate = $currentDate->add($interval); // Add the interval to the current date

$formattedFutureDate = $futureDate->format('n/j/Y'); // Format the future date


$query = "SELECT events1.*,donor.donor_email,donor.donor_name,event_reminder.day_10_reminder_status FROM `events1` LEFT JOIN donor on events1.U_ID=donor.donor_id LEFT JOIN event_reminder ON events1.ID=event_reminder.E_ID WHERE E_Date = '$formattedFutureDate' and Status=2 and event_reminder.day_10_reminder_status is null GROUP BY events1.ID;";


$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result)) {

    $donor_name = $row['donor_name'];
    $donor_email = $row['donor_email'];
    $donation_date = $row['E_Date'];
    $event_ID = $row['E_ID'];

    $mail = new PHPMailer(true);
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP(); //Send using SMTP
    $mail->SMTPAuth = true; //Enable SMTP authentication

    $mail->Host = "smtp.gmail.com"; //Set the SMTP server to send through
    $mail->Username = "apekshacancerfoundation@gmail.com"; //SMTP username
    $mail->Password = "kawreasljaqvdysw"; //SMTP password

    $mail->SMTPSecure = "ssl"; //Enable implicit TLS encryption
    $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom("apekshacancerfoundation@gmail.com", "Cancer");

    $mail->addAddress($donor_email); //Add a recipient

    $mail->isHTML(true);

    $mail->Subject = "Reminder: Your Donation on $formattedFutureDate";

    $email_template = "
     <h2>Dear $donor_name ,</h2>
     <h3>This is a friendly reminder that you have a schedule donation after 10 days from today.your donation is scheduled on $donation_date.</h3>
     <h3>if you unable to donate please be kind enough to inform us early. </h3>
     <p>Apeksha Cancer Hospital</p>
     <p>Maharagama </p>
     <p>10280</p>
     <p>Tel : + 94 112 850253</p>
     <p>contact@apeksha.com</p>
     
          
          ";

    $mail->Body = $email_template;

    $mail->send();

    $sql2 = "INSERT INTO event_reminder( E_ID,day_10_reminder_status) VALUES('$event_ID',2)";
    $result2 = mysqli_query($conn, $sql2);



}


$currentDate2 = new DateTime(); // Current date and time
$interval2 = new DateInterval('P5D'); // 10 days interval
$futureDate2 = $currentDate2->add($interval2); // Add the interval to the current date

$formattedFutureDate2 = $futureDate2->format('n/j/Y'); // Format the future date


$query2 = "SELECT events1.*,donor.donor_email,donor.donor_name,event_reminder.day_5_reminder_status FROM `events1` LEFT JOIN donor on events1.U_ID=donor.donor_id LEFT JOIN event_reminder ON events1.ID=event_reminder.E_ID WHERE E_Date = '$formattedFutureDate2' and Status=2 and event_reminder.day_5_reminder_status is null GROUP BY events1.ID;";


$result23 = mysqli_query($conn, $query2);

while ($row2 = mysqli_fetch_array($result23)) {

    $donor_name = $row2['donor_name'];
    $donor_email = $row2['donor_email'];
    $donation_date = $row2['E_Date'];
    $event_ID = $row2['E_ID'];

    $mail = new PHPMailer(true);
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP(); //Send using SMTP
    $mail->SMTPAuth = true; //Enable SMTP authentication

    $mail->Host = "smtp.gmail.com"; //Set the SMTP server to send through
    $mail->Username = "apekshacancerfoundation@gmail.com"; //SMTP username
    $mail->Password = "kawreasljaqvdysw"; //SMTP password

    $mail->SMTPSecure = "ssl"; //Enable implicit TLS encryption
    $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom("apekshacancerfoundation@gmail.com", "Cancer");

    $mail->addAddress($donor_email); //Add a recipient

    $mail->isHTML(true);

    $mail->Subject = "Reminder: Your Donation on $formattedFutureDate2";

    $email_template = "
     <h2>Dear $donor_name ,</h2>
     <h3>This is a friendly reminder that you have a schedule donation after 05 days from today.your donation is scheduled on $donation_date.</h3>
     <h3>if you unable to donate please be kind enough to inform us early. </h3>
     <p>Apeksha Cancer Hospital</p>
     <p>Maharagama </p>
     <p>10280</p>
     <p>Tel : + 94 112 850253</p>
     <p>contact@apeksha.com</p>
     
          
          ";

    $mail->Body = $email_template;

    $mail->send();

    $sql3 = "INSERT INTO event_reminder( E_ID,day_5_reminder_status) VALUES('$event_ID',2)";
    $result4 = mysqli_query($conn, $sql3);



}
echo "done";