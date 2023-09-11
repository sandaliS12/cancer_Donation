<?php
include ('includes/db_conn.php');



if($_POST["action"] == "drug_edit_form11")
  {

  $ID= $_POST["drugID"];
  $edit_drug_name = $_POST["edit_drug_name"];
  $edit_drug_weight = $_POST["edit_drug_weight"];
 
    // echo $ID;
  // echo "EEEEEEEEE",$edit_drug_name;
  // echo $edit_drug_weight;
  


  $query = "UPDATE `drugs_list` SET `drug_name`='$edit_drug_name', `drug_weight`='$edit_drug_weight' WHERE `drug_ID` = '".$_POST["drugID"]."'"; 
    // echo $query;
  if(mysqli_query($conn, $query))
  {
    $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('2023-06-29','aaa','2')";
    if(mysqli_query($conn, $query))
    {
        echo 'insert';
    }
  
  }else{
      echo 'not_insert';
  }



} 















?>