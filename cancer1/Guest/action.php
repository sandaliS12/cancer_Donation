<?php


    require_once "db_conn.php";

    // ================================= Send Enquiry =====================================
    // if($_POST["action"] == "enquiry_send")
    // {
    //     $name = $_POST['enquiry_name'];
    //     $email = $_POST['enquiry_email'];
    //     $subject = $_POST['enquiry_subject'];
    //     $msg = $_POST['enquiry_msg'];

    //     $date = date('Y-m-d');
    //     $status = 2;

    //     $query = "INSERT INTO enquiry (Name, Date, E_mail, Subject, Body, Status) VALUES ('$name', '$date', '$email', '$subject','$msg','$status')";
   
    //    if(mysqli_query($conn, $query))
    //    {
    //         echo 'Sent';       
    //    }else
    //    {
    //        echo 'Not_Sent';
    //    }
    // }


// ================================= Send Msg For Chat-Bot =====================================
    if($_POST["action"] == "Chat_Bot")
    {
        $getMesg = $_POST['text'];

        
        $check_data = "SELECT Answers FROM chat_bot WHERE Questions LIKE '%$getMesg%'";
        $run_query = mysqli_query($conn, $check_data) or die("Error");


        if(mysqli_num_rows($run_query) > 0){

            $fetch_data = mysqli_fetch_assoc($run_query);

            $replay = $fetch_data['Answers'];
            echo $replay;
        }else{
            echo "Sorry can't be able to understand you!";
        }
    }

    