<?php 
session_start(); 
include "../db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	if (empty($email))  {
			$_SESSION['status'] = "Please Enter Admin Email";
			$_SESSION['status_code'] ="error";
			header('location: ../index.php');
	    exit();
	}else if(empty($pass)){
			$_SESSION['status'] = "Please Enter Admin Password";
			$_SESSION['status_code'] ="error";
			header('location: ../index.php');
	    exit();
	}else{
		// String Password Convert to md5 Password
        $pass2 = md5($pass);
		
		$sql = "SELECT * FROM admin WHERE AdminEmail='$email' AND Password='$pass2'";

		// $sql = "SELECT * FROM admin WHERE A_Email='$email' AND A_Password='$pass2'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
            
            	$_SESSION['A_Name'] = $row['AdminName'];
            	$_SESSION['A_Email'] = $row['AdminEmail'];
            	$_SESSION['A_ID'] = $row['ID'];
            	$_SESSION['A_Status'] = $row['Status'];
            	
				$_SESSION['status'] = "Welcom Admin Dashboard";
				$_SESSION['status_code'] ="success";
				if($password_change==1){
					// Redirect user to welcome page
					header('location: ../home.php');
					}else{
						header("location: ../password_reset_now.php");
					}
				
		        exit();
            
		}else{
				$_SESSION['status'] = "Incorect Email or password";
				$_SESSION['status_code'] ="info";
				header('location: ../index.php');
				exit();
		}
	
	}
		
}

?>

