

<?php
    require_once "template/db_conn.php";
    include ('includes/scripts.php');

$jsonData = json_decode(file_get_contents("php://input"), true);
    // echo "Okay";
    // return;
    // Process form data
    

    // Extract form fields from JSON
    
    $volun_Name = $jsonData["volun_Name"];
    $volun_DOB = $jsonData["volun_DOB"];
    $volun_Email = $jsonData["volun_Email"];
    $volun_contact = $jsonData["volun_Contact"];
      $volun_NIC = $jsonData["volun_NIC"];
      $volun_occupation = $jsonData["volun_occupation"];
    $volun_Experience = $jsonData["volun_Experience"];
      $volun_Activity = $jsonData["volun_Activity"];
      $volun_Act_Desc = $jsonData["volun_Act_Desc"];

    
    // ... Extract other form fields
    
    // Process and save uploaded files
    $filesBase64 = $jsonData["filesBase64"];
    $fileNames = [];



   
    
    // Save data to your database
    // ... Your database insert/update queries here
     $query = "INSERT INTO volunteer_register (Vo_Name, Vo_DOB, Vo_Email, Vo_Contact, Vo_NIC, Vo_Occupation, Vo_Experience, Vo_Activity, Vo_Description) 
    VALUES (:volun_Name, :volun_DOB, :volun_Email, :volun_Contact, :volun_NIC, :volun_occupation, :volun_Experience, :volun_Activity, :volun_Act_Desc)";
   
   $pdo = new PDO("mysql:host=$sname;dbname=$db_name", $uname , $password);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $stmt = $pdo->prepare($query);
   
   $stmt->bindParam(':volun_Name', $volun_Name);
   $stmt->bindParam(':volun_DOB', $volun_DOB);
   $stmt->bindParam(':volun_Email', $volun_Email);
   $stmt->bindParam(':volun_Contact', $volun_contact);
   $stmt->bindParam(':volun_NIC', $volun_NIC);
   $stmt->bindParam(':volun_occupation', $volun_occupation);
   $stmt->bindParam(':volun_Experience', $volun_Experience);
   $stmt->bindParam(':volun_Activity', $volun_Activity);
   $stmt->bindParam(':volun_Act_Desc', $volun_Act_Desc);
   $response =[];
   if ($stmt->execute()) {
       $lastInsertedId = $pdo->lastInsertId();
        
        foreach ($filesBase64 as $index => $base64Data) {
            $decodedData = base64_decode(preg_replace('#^data:application/\w+;base64,#i', '', $base64Data));
            $fileName = "uploaded_file_volunteer".$lastInsertedId.'user' . $index . ".pdf"; // Customize the file naming as needed
            $fileNames[] = $fileName;
            file_put_contents("./uploads/" . $fileName, $decodedData);
            $query = "INSERT INTO `vo_docs` ( `volunteer_ID`, `file_path`) VALUES (:vid, :fpath)";
            $stmt = $pdo->prepare($query);
            $tempFilePath= "User/uploads/".$fileName;
            $stmt->bindParam(':vid', $lastInsertedId);
            $stmt->bindParam(':fpath', $tempFilePath );
            $stmt->execute();
            
        }
       
       $response = array("message" => "Data and files successfully processed.");
       
   } else {
    $response = array("message" => "Error inserting data", "error" =>  $stmt->errorInfo()[2]);

   }

    // Send a response back to the client
    
    echo json_encode($response);
    
?>


    