<?php
include ('template/db_conn.php');


   
    $UID = $_POST["userId"];
  $donor_name = $_POST["donor_name"];
  $donor_email = $_POST["donor_email"];
  $donor_nic = $_POST["donor_nic"];
  $donor_phone = $_POST["donor_phone"];
  $donor_height = $_POST["donor_height"];
  $donor_weight = $_POST["donor_weight"];
  $donor_bgroup = $_POST["donor_bgroup"];
  $U_Gender = $_POST["U_Gender"];
  $U_DOB = $_POST["U_DOB"];


  $query = "UPDATE donor SET donor_name='$donor_name', donor_email='$donor_email', donor_nic='$donor_nic', donor_phone='$donor_phone', donor_height='$donor_height', donor_weight='$donor_weight'
  , donor_bgroup='$donor_bgroup', U_Gender='$U_Gender', U_DOB='$U_DOB',profile_updated='1'
  WHERE donor_id= '$UID'"; 

  if(mysqli_query($conn, $query))
  {
    $response = array("message" => "Form data updated successfully");
   

  }else{
    $response = array("message" => "coudn't update");
  }

  
  echo json_encode($response);

  

 
  



//   $jsonData = json_decode(file_get_contents("php://input"), true);
//     echo "Okay";
//     // return;
//     // Process form data
   

//     // Extract form fields from JSON
//     $donor_id = $jsonData["UID"];
//     $donor_name = $jsonData["donor_name"];
//     $donor_email = $jsonData["donor_email"];
//     $donor_nic = $jsonData["donor_nic"];
//     $donor_phone = $jsonData["donor_phone"];
//       $donor_height = $jsonData["donor_height"];
//       $donor_weight = $jsonData["donor_weight"];
//     $donor_bgroup = $jsonData["donor_bgroup"];
//       $U_Gender = $jsonData["U_Gender"];
//       $U_DOB = $jsonData["U_DOB"];

    
//     // Save data to your database
//     // ... Your database insert/update queries here

//     $query = "UPDATE donor SET (donor_name,donor_email,donor_nic,donor_phone,donor_height,donor_weight,donor_bgroup,U_Gender,U_DOB)VALUES
//     (:donor_name,:donor_email,:donor_nic,:donor_phone,:donor_height,:donor_weight,:donor_bgroup,:U_Gender,:U_DOB)
//     WHERE donor_id=:UID"; 

//    $pdo = new PDO("mysql:host=$sname;dbname=$db_name", $uname , $password);
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $stmt = $pdo->prepare($query);
   
//    $stmt->bindParam(':donor_name', $donor_name);
//    $stmt->bindParam(':donor_name', $donor_name);
//    $stmt->bindParam(':donor_email', $donor_email);
//    $stmt->bindParam(':donor_nic', $donor_nic);
//    $stmt->bindParam(':donor_phone', $donor_phone);
//    $stmt->bindParam(':donor_height', $donor_height);
//    $stmt->bindParam(':donor_weight', $donor_weight);
//    $stmt->bindParam(':donor_bgroup', $donor_bgroup);
//    $stmt->bindParam(':U_Gender', $U_Gender);
//    $stmt->bindParam(':U_DOB', $U_DOB);
//    $stmt->bindParam(':UID', $UID);
//    $response =[];
//    if ($stmt->execute()) {
//        $lastInsertedId = $pdo->lastInsertId();
        
       
       
//        $response = array("message" => "Data and files successfully processed.");

//    } else {
//     $response = array("message" => "Error inserting data", "error" =>  $stmt->errorInfo()[2]);

//    }

//     // Send a response back to the client
    
//     echo json_encode($response);

?>