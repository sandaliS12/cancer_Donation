<?php

include ('template/db_conn.php');
include('template/check_login.php');
include('includes/model.php');


if($_POST["action"] == "food_edit_value1")
{
    $ID = $_POST['UserID'];
    $query = "SELECT * FROM food_donation WHERE food_ID ='$ID'";
    $result = mysqli_query($conn,$query);
    
    if ($row = mysqli_fetch_array($result)) {
      //  echo  $row["U_DOB"];
       
        $date=date_create_from_format("Y-m-d",$row["U_DOB"]);
        //echo $date;
        $u_dob= date_format($date,"Y-m-d");
       
        // $timestamp = strtotime($row["U_DOB"]);
        // $u_dob = date('d/m/Y', $timestamp);
       // echo $u_dob;
        // $u_dob=
    }}

 ?>