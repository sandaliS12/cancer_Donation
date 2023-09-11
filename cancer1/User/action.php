<?php
    require_once "template/db_conn.php";
    require_once "template/check_login.php";


if (isset($_POST["action"])) {
  

  if ($_POST["action"] == "Dashboard") {
    
    $output = '
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pending Blood Bookings</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
                    </div>
                    <div class="col-auto">
                    <i class="bi bi-droplet-fill fa-2x text-gray-300"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total CommingUp Food Donations</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pending Food Requests</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                    </div>
                    <div class="col-auto">
                    <i class="fa fa-coffee fa-2x text-gray-300"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total CommingUp Item Donations</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>


        <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pending Item Donations Requests</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                    </div>
                    <div class="col-auto">
                    <i class="bi bi-layers-fill fa-2x text-gray-300"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total CommingUp Visiting Appointments</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pending Visiting Appointments</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
                    </div>
                    <div class="col-auto">
                    <i class="bi bi-people-fill fa-2x text-gray-300"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Fund Donations</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                    </div>
                    <div class="col-auto">
                    <i class="bi bi-wallet2 fa-2x text-gray-300"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        ';
    echo $output;
  }

  if ($_POST["action"] == "Book_Time") {
   
    $output = '';
    $ID = $_SESSION['id'];
    $query = "SELECT * FROM donor WHERE donor_id = $ID";
    $result = mysqli_query($conn, $query);
    
    if ($row = mysqli_fetch_array($result)) {
    
      $F_checked;
      $M_checked;
      $F_disabled;
      $M_disabled;

      $Gender = $row["U_Gender"];
      if($Gender=="F"){
        $F_checked = "checked";
        $M_checked = "";
        $F_disabled = "";
        // $M_disabled = "disabled";
      }else{
        $F_checked = "";
        $M_checked = "checked";
        // $F_disabled = "disabled";
        $M_disabled = "";
      }
    $output .= '
    <div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary text-center">Blood Donation Form</h6>
        </div>
      <div class="card-body justify-content-center row" id="" >
        <div class="col-md-6">

          <div class="form-group">
              <label>Name</label>
              <input type="text" name="BDonor_Name" id="BDonor_Name" class="form-control" placeholder="Please Enter Blood Donor Name"  value="' . $row["donor_name"] . '">
          </div>

          <div class="form-group">
              <label>Email</label>
              <input type="text" name="BDonor_Email" id="BDonor_Email" class="form-control " placeholder="Please Enter Blood Donor Email"  value="' . $row["donor_email"] . '">
          </div>

          <div class="form-group">
              <label>Contact Number</label>
              <input type="text" name="BDonor_Contact" id="BDonor_Contact" class="form-control " placeholder="Please Enter Blood Donor Contact Number"  value="' . $row["donor_phone"] . '">
          </div>

          <div class="form-group">
              <label>Whight</label>
              <input type="text" name="BDonor_Whight" id="BDonor_Whight" class="form-control " placeholder="Please Enter Blood Donor Whight"  value="' . $row["donor_weight"] . '">
          </div>

          <div class="form-group">
              <label>Hight</label>
              <input type="text" name="BDonor_Hight" id="BDonor_Hight" class="form-control " placeholder="Please Enter Blood Donor Hight"  value="' . $row["donor_height"] . '">
          </div>

          <div class="form-group">
              <label>Blood Group</label>
              <input type="text" name="BBlood_group" id="BBlood_group" class="form-control " placeholder="Please Enter Blood Group"  value="' . $row["donor_bgroup"] . '">
          </div>
        
          <div class="form-group">
              <label>Date</label>
              <input type="text" id="datepicker" class="form-control">
          </div>

          <div class="form-group">
              <label>Time Slot</label>
                <select name="BBlood_time_slot" id="BBlood_time_slot" class="form-control ">
                  
                </select>
          </div>

          <div class="form-group">
              <label>NIC/Passport</label>
              <input type="text" name="" id="Donor_nic" class="form-control " placeholder="Please Enter Blood Group"  value="' . $row["donor_nic"] . '">
          </div>

          <div class="form-group">
              <label>DOB</label>
              <input type="text" name="" id="D_DOB" class="form-control " placeholder="Please Enter Blood Group"  value="' . $row["U_DOB"] . '">
          </div>

          <div class="form-group">
          <input type="radio" id="U_Female" name="U_Gender" ' . $F_checked . ' >
          <label for="">Female</label>
          <input type="radio" id="U_Male" name="U_Gender" ' . $M_checked . '>
          <label for="">Male</label>
        </div>

          <div class="form-group">
          <label for=""> Did you donate blood before</label>
          <input type="radio" id="D_before1" name="D_before3">
          <label for="">Yes</label>
          <input type="radio" id="D_before2" name="D_before3">
          <label for="">No</label>
          </div>

          <div class="form-group">
              <label>If yes, How many times?</label>
              <input type="text" name="" id="HM_Times" class="form-control " placeholder="Please Enter Nuhmber of Times">
          </div>

          <div class="form-group">
              <label>Last blood donate date?</label>
              <input type="date" id="LB_Date" class="form-control">
          </div>

        
          
          <div class="text-right">
            <button class="btn btn-primary" id="blood_donor_form_confirm">Confirm</button>
          </div>
          
        </div>
      </div>
    </div>
    </div>';
    }
    echo $output;
  }

  if ($_POST["action"] == "blood_donor_form") {

    $BDonor_Name = $_POST["name"];
    $BDonor_Email = $_POST["email"];
    $BDonor_Contact = $_POST["contact"];
    $BDonor_Whight = $_POST["whight"];
    $BDonor_Hight = $_POST["hight"];
    $BDonor_Date = $_POST["date"];
    $UID = $_SESSION['id']; 
    $BBlood_time_slot = $_POST["time"];
    $NIC = $_POST["Donor_nic"];
    $D_before = $_POST["D_before"];
    $HM_Times = $_POST["HM_Times"];
    $LB_Date = $_POST["LB_Date"];
    // $Inconvinionce = $_POST["Inconvinionce"];
    // $Inconvinionce_D = $_POST["Inconvinionce_D"];
    // $InstructionsD = $_POST["InstructionsD"];
    // $Comfortable = $_POST["Comfortable"];
    // $Medicine = $_POST["Medicine"];
    // $Surgery = $_POST["Surgery"];
    // $Pregnant = $_POST["Pregnant"];
    // $Hepatitis = $_POST["Hepatitis"];
    // $Typhoid = $_POST["Typhoid"];
    // $Dengue = $_POST["Dengue"];
    // $Fever = $_POST["Fever"];
    // $Antibiotic = $_POST["Antibiotic"];
    // $Advice = $_POST["Advice"];
    $BBlood_group = $_POST["BBlood_group"];

    $query = "INSERT INTO `blood_donation`(`U_ID`, `Name`, `Email`, `Contact`, `Whight`, `Hight`, `B_Group`, `Date`, `Time`, `D_before`, `HM_Times`, `LB_Date`, `bd_NIC`) 
    VALUES ('$UID','$BDonor_Name','$BDonor_Email','$BDonor_Contact','$BDonor_Whight','$BDonor_Hight','$BBlood_group','$BDonor_Date','$BBlood_time_slot','$D_before','$HM_Times','$LB_Date','$NIC')";
         if(mysqli_query($conn, $query))
         {
          $query2 = "SELECT * FROM blood_donation WHERE U_ID=$UID ORDER BY ID DESC LIMIT 1";
          $result2 = mysqli_query($conn, $query2);
          if ($row2 = mysqli_fetch_array($result2)) {

            $E_ID = $row2["ID"];
            $query1 = "INSERT INTO events1 (E_ID,U_ID,E_Type,E_Date,Status) 
            VALUES ('$E_ID','$UID','$BBlood_group','$BDonor_Date','2')";
            if(mysqli_query($conn, $query1))
            {
                echo 'Inserted';
                
            }
          }
            
         }else{
            echo 'Not_Insert';
         }

  }


  if ($_POST["action"] == "my_Bookings") {


    $output = '';
    $ID = $_SESSION['id'];
    $query = "SELECT * FROM `blood_donation` INNER JOIN events1 ON events1.E_ID = blood_donation.ID WHERE events1.U_id = '$ID'";
    
    $result = mysqli_query($conn, $query);
   
    
    $output = '
    <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary text-center">My Blood Bookings</h6>
        </div>

        <div class="table-responsive small">
<table class="table table-bordered" id="datatable12" width="100%" celllspacing="0" style="font-size: 12px;">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Contact</th>
      <th>Blood Group</th>
      <th>NIC</th>
      <th>Booked Date</th>
      <th>Booked Time</th>
      <th width="15%">Action</th>
    </tr>
  </thead>
  <tbody>
          ';
          while ($row = mysqli_fetch_array($result)) {

            $D_Name =  $row["Name"];
            $D_Email =  $row["Email"];
            $D_Contact =  $row["Contact"];
            $D_Bgroup =  $row["B_Group"];
            $NIC =  $row["bd_NIC"];
      
      $D_before =  $row["D_before"];
      
      $Date =  $row["Date"];
        $D_Time =  $row["Time"];
        $Status =  $row["Status"];
       
       

      $output .= '

              <tr>
              <td>' . $D_Name . '</td>
              <td>' . $D_Email . '</td>
              <td>' . $D_Contact . '</td>
              <td>' . $D_Bgroup . '</td>
              <td>' . $NIC . '</td>

              <td>' . $row["Date"] . '</td>
              
              <td>';
              if ($D_Time == 1){
                $output .= '9.00 am to 9.30 am';
            }else if ($D_Time == 2){
              $output .= '9.30 am to 10.00 am';
            }else if ($D_Time == 3){
              $output .= '10.00 am to 10.30 am';
            }else if ($D_Time == 4){
              $output .= '10.30 am to 11.00 am';
            }else if ($D_Time == 5){
              $output .= '11.00 am to 11.30 am';
            }else if ($D_Time == 6){
              $output .= '11.30 am to 12.00 am';
            }else{
              $output .= '' . $Status . '';
            } 
              $output .=  
               '</td>


              <td>';

              if ($Status == 2){
                $output .= '<button type="button" name="event_Deactive" class=" btn-success bt-xs event_Deactive" id="' . $row["E_ID"] . '" title="Deactive">Active</button>';
            }else if ($Status == 1){
              $output .= '<button type="button" name="event_Active" class=" btn-success bt-xs event_Active" id="' . $row["E_ID"] . '" title="Active">Active</button></td>';
            }else{
              $output .= '<button type="button" name="event_Close" class=" btn-warning bt-xs event_Close" id="' . $row["E_ID"] . '" title="Active">Done</button></td>';
            } 

              $output .=  
               
               '</td>

          <td>
          <button type="button" name="bloodD_edit" class=" btn-success bt-xs bloodD_edit" id="' . $row["E_ID"] . '" title="Edit"><i class="fa fa-edit"></i></button>
          <button type="button" name="bloodD_delete" class=" btn-danger bt-xs bloodD_delete" id="' . $row["E_ID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
          </tr>
        ';
        

    }
    $output .= '</tbody>
        </table>
        </div>';
    echo $output;
}

if ($_POST["action"] == "disabledDates") {

  $Type = $_POST["i"];
  $DB_Arry=[];

  $Date2;
      $count1=0;
      $count2=0;
      $count3=0;
      $count4=0;
      $count5=0;
      $count6=0;

      $Time1=1;
      $Time2=2;
      $Time3=3;
      $Time4=4;
      $Time5=5;
      $Time6=6;

  $query = "SELECT * FROM `blood_donation` INNER JOIN events1 ON events1.E_ID = blood_donation.ID WHERE events1.Status=2 AND events1.E_Type=$Type ORDER BY `events1`.`E_Date` ASC";
  
  $result = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_array($result)) {

      $Date = $row["E_Date"];
      $Time = $row["Time"];

      if($Date == $Date2){
        if($Time1 == $Time){
          $count1=$count1+1;
        }else
        if($Time2 == $Time){
          $count2=$count2+1;
        }else
        if($Time3 == $Time){
          $count3=$count3+1;
        }else
        if($Time4 == $Time){
          $count4=$count4+1;
        }else
        if($Time5 == $Time){
          $count5=$count5+1;
        }else
        if($Time6 == $Time){
          $count6=$count6+1;
        }
      }else{
        $Date2=$Date;
        $count1=0;
        $count2=0;
        $count3=0;
        $count4=0;
        $count5=0;
        $count6=0;
      }

      if ($count1 >= 5 && $count2 >= 5 && $count3 >= 5 && $count4 >= 5 && $count5 >= 5 && $count6 >= 5){
        $DB_Arry[] = $row['E_Date'];
      }
      
  }
  
  echo json_encode($DB_Arry, JSON_UNESCAPED_SLASHES);
}

  if($_POST["action"] == "SelectBloodDonDate")
  {
    echo $_POST["formattedDate1"];
    $SelectDate = $_POST["formattedDate1"];

  $Date2;
      $count1=0;
      $count2=0;
      $count3=0;
      $count4=0;
      $count5=0;
      $count6=0;

      $Time1=1;
      $Time2=2;
      $Time3=3;
      $Time4=4;
      $Time5=5;
      $Time6=6;

      $ED1 = '';
      $ED2 = '';
      $ED3 = '';
      $ED4 = '';
      $ED5 = '';
      $ED6 = '';

      $output = '<option value="0">Select Time</option>';

  $query = "SELECT * FROM `blood_donation` INNER JOIN events1 ON events1.E_ID = blood_donation.ID WHERE events1.Status=2 AND events1.E_Type=0 AND events1.E_Date='$SelectDate'";
  
  $result = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_array($result)) {

      $Date = $row["E_Date"];
      $Time = $row["Time"];

        if($Time1 == $Time){
          $count1=$count1+1;
        }else
        if($Time2 == $Time){
          $count2=$count2+1;
        }else
        if($Time3 == $Time){
          $count3=$count3+1;
        }else
        if($Time4 == $Time){
          $count4=$count4+1;
        }else
        if($Time5 == $Time){
          $count5=$count5+1;
        }else
        if($Time6 == $Time){
          $count6=$count6+1;
        }
      
  }

  if ($count1 >= 5){
    $ED1 = 'disabled';
  }else
  if ($count2 >= 5){
    $ED2 = 'disabled';
  }else
  if ($count3 >= 5){
    $ED3 = 'disabled';
  }else
  if ($count4 >= 5){
    $ED4 = 'disabled';
  }else
  if ($count5 >= 5){
    $ED5 = 'disabled';
  }else
  if ($count6 >= 5){
    $ED6 = 'disabled';
  }

  $output .= '<option value="1" ' . $ED1 . '>9.00 am to 9.30 am</option>
      <option value="2" ' . $ED2 . '>9.30 am to 10.00 am</option>
      <option value="3" ' . $ED3 . '>10.00 am to 10.30 am</option>
      <option value="4" ' . $ED4 . '>10.30 am to 11.00 am</option>
      <option value="5" ' . $ED5 . '>11.00 am to 11.30 am</option>
      <option value="6" ' . $ED6 . '>11.30 am to 12.00 am</option>';

  echo $output;
  }


  //-------------------------------------------------------visiting appointment----------------------------------
  //-----------------------------------------
  //-------------------------------------------------------------------------------------------------------------

  if ($_POST["action"] == "entertainmentAcc_Booking") {
   
    $output = '';
    $ID = $_SESSION['id'];
    $query = "SELECT * FROM donor WHERE donor_id = $ID";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_array($result)) {
    
    $output .= '
    <div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary text-center">Entertainment Activity Booking</h6>
        </div>
      <div class="card-body justify-content-center row" id="" >
        <div class="col-md-6">
          <div class="form-group">
              <label>Name</label>
              <input type="text" name="Enter_Name" id="Enter_Name" class="form-control" placeholder="Please Enter Blood Donor Name" value="' . $row["donor_name"] . '">
          </div>

          <div class="form-group">
              <label>Email</label>
              <input type="text" name="Enter_Email" id="Enter_Email" class="form-control " placeholder="Please Enter Blood Donor Email" value="' . $row["donor_email"] . '">
          </div>

          <div class="form-group">
              <label>Contact Number</label>
              <input type="text" name="Enter_Contact" id="Enter_Contact" class="form-control " placeholder="Please Enter Blood Donor Contact Number" value="' . $row["donor_phone"] . '">
          </div>

          <div class="form-group">
          <label>NIC/Passport</label>
          <input type="text" name="Enter_NIC" id="Enter_NIC" class="form-control " placeholder="Please Enter Blood Group" value="' . $row["donor_nic"] . '">
          </div>

          <div class="form-group">
              <label>Activity Description</label>
              <textarea class="form-control" name="Enter_Desc" rows="5" id="Enter_Desc" placeholder="Message" required></textarea>
              </div>

          <div class="form-group">
              <label>Prefered ward</label>
              <select name="enterwards" id="enterwards" class="form-control">
              ';
              $queryEWard = "SELECT * FROM wards";
              $queryEW = mysqli_query($conn, $queryEWard);
              $output .= '
                    <option value="0">Select Ward You prefer</option>';
              while($rowE = mysqli_fetch_array($queryEW))
                  {
                    
                    $output .= '
                      <option value='. $rowE["ID"] .'>'. $rowE["W_ID"] .'</option>';
                    
                  }
            
                
                  $output .= '
                  
                </select>
              
              </div>

          <div class="form-group">
              <label>No of Visitors</label>
              <input type="text" name="NoOfenterVisitor" id="NoOfenterVisitor" class="form-control " placeholder="Please Enter No of Visitors">
          </div>
        
          <div class="form-group">
              <label>Date</label>
              <input type="text" id="datepickerEntertain" class="form-control">
          </div>

          <div class="form-group">
              <label>How many Hours you plan the event</label>
              <input type="text" name="entertain_hours" id="entertain_hours" class="form-control " placeholder="Please Enter No of Hours">
          </div>

         

         

          
          
          <div class="text-right">
            <button class="btn btn-primary" id="entertainment_form_confirm">Confirm</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>';
    }
    echo $output;
  }


  //-------------------------------------------------------volunteering Register----------------------------------
  //-----------------------------------------
  //-------------------------------------------------------------------------------------------------------------

  if ($_POST["action"] == "volunteeringReg") {
   
    $output = '';
    $ID = $_SESSION['id'];
    $query = "SELECT * FROM donor WHERE donor_id = $ID";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_array($result)) {
    
    // $output .= '
    ?>

    <form  method="POST" enctype="multipart/form-data" id="package_overview_new_form">  
    <input type="hidden" id="blood_ID" name="action" value="<?= $ID ?>">
    <div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary text-center">Volunteering Registration</h6>
        </div>
      <div class="card-body justify-content-center row" id="" >
        <div class="col-md-6">

          <div class="form-group">
              <label>Name</label>
              <input type="text" name="volun_Name" id="volun_Name" class="form-control" placeholder="Please Enter Volunteer Name" value="<?= $row["donor_name"] ?>">
          </div>

          <div class="form-group">
              <label>DOB</label>
              <input type="text" name="volun_DOB" id="volun_DOB" class="form-control " placeholder="Please Enter volunteer DOB" value="<?= $row["U_DOB"]  ?>">
          </div>

          <div class="form-group">
              <label>Email</label>
              <input type="text" name="volun_Email" id="volun_Email" class="form-control " placeholder="Please Enter Volunteer Email" value="<?= $row["donor_email"] ?>">
          </div>

          <div class="form-group">
              <label>Contact Number</label>
              <input type="text" name="volun_Contact" id="volun_Contact" class="form-control " placeholder="Please Enter Volunteer Contact Number" value="<?= $row["donor_phone"] ?>">
          </div>

          <div class="form-group">
          <label>NIC/Passport</label>
          <input type="text" name="volun_NIC" id="volun_NIC" class="form-control " placeholder="Please Enter NIC" value="<?= $row["donor_nic"] ?>">
          </div>

          <div class="form-group">
              <label>Occupation</label>
              <input type="text" name="volun_occupation" id="volun_occupation" class="form-control " placeholder="Please Enter Occupation">
          </div>

          <div class="form-group">
              <label>Experience(Years)</label>
              <input type="text" name="volun_Experience" id="volun_Experience" class="form-control " placeholder="Please Enter Your Work Experience">
          </div>

          <div class="form-group">
              <label>Prefered Volunteering Activity</label>
              <input type="text" name="volun_Activity" id="volun_Activity" class="form-control " placeholder="Please Enter Your Prefered Volunteering Activity">
          </div>

          <div class="form-group">
              <label>Activity Description</label>
              <textarea class="form-control" name="volun_Act_Desc" id="volun_Act_Desc" rows="5" placeholder="Please Give Some Additional Details" required></textarea>
              </div>

          <div class="form-group">
              <label>Documents to Prove Ability(You can upload multiple documents)</label>
              <input type="file" id="myFile1" name="myFile1" accept="application/pdf" multiple>
             
              
              </div>

          

         

         

          
          
          <div class="text-right">
            <button type="submit" class="btn btn-primary volunteer_ins" id="volunteer_ins1">Register</button>
          </div>
          
        </div>
      </div>
    </div>
    </div>
    </form>
      <?php
    }
   
  }

//   $pathSegments = explode('/', $_SERVER['REQUEST_URI']);
// print_r( $pathSegments);

  if (isset($pathSegments[5]) && $pathSegments=="volunteer") {

    $jsonData = json_decode(file_get_contents("php://input"), true);
    // echo "Okay";
    // return;
    // Process form data
    

    // Extract form fields from JSON
    $volun_Name = $jsonData["volun_Name"];
    $volun_DOB = $jsonData["volun_DOB"];
    $volun_Email = $jsonData["volun_Email"];
    // ... Extract other form fields
    
    // Process and save uploaded files
    $filesBase64 = $jsonData["filesBase64"];
    $fileNames = [];
    
    foreach ($filesBase64 as $index => $base64Data) {
        $decodedData = base64_decode(preg_replace('#^data:application/\w+;base64,#i', '', $base64Data));
        $fileName = "uploaded_file_" . $index . ".pdf"; // Customize the file naming as needed
        $fileNames[] = $fileName;
        file_put_contents("./uploads/" . $fileName, $decodedData);
    }
    
    // Save data to your database
    // ... Your database insert/update queries here
    
    // Send a response back to the client
    $response = array("message" => "Data and files successfully processed.", "fileNames" => $fileNames);
    echo json_encode($response);

  }
  //---------------------------------------------Voluntier View-------------------------------
  //--------------------------------
  //--------------------------------------------------------------------------------------------

  if ($_POST["action"] == "my_Volunteer_Bookings") 
    {
      $ID = $_SESSION['id'];
      // echo $ID;
      $query = "SELECT * FROM volunteer_register INNER JOIN vo_docs on vo_docs.volunteer_ID = volunteer_register.volunteer_ID";
      $result = mysqli_query($conn, $query);
      ?>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
       
        <h6 class="m-0 font-weight-bold text-primary text-center">My Volunteer Details
        <!-- <button  name="vol_Add" class="btn btn-primary"data-toggle="modal" id="vol_Add">Add New</button></h6> -->
        </div>
   
      
    
      
      <div class="table-responsive small">
          <table class="table table-bordered" id="datatableRvolunteer" width="100%" celllspacing="0" style="font-size: 12px;">
            <thead>
            
              <tr>
                <th><b>Name</b></th>
                <th><b>DOB</b></th>
                <th><b>Email</b></th>
                <th><b>Contact</b></th>
                <th><b>NIC</b></th>
                <th><b>Occupation</b></th>
                <th><b>Experience</b></th>
                <th><b>Activity</b></th>
                <th><b>Description</b></th>
                <th><b>Documents</b></th>
                
                <th width="15%">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
      $volunteers=[];
      while ($row = $result->fetch_assoc()) {
        $volunteer_id = $row['volunteer_ID'];
        
        // Create an array for the volunteer if it doesn't exist
        if (!isset($volunteers[$volunteer_id])) {
            $volunteers[$volunteer_id] = array(
                'volunteer_ID' => $row['volunteer_ID'],
                'Vo_Name' => $row['Vo_Name'],
                'Vo_DOB' => $row['Vo_DOB'],
                'Vo_Email' => $row['Vo_Email'],
                'Vo_Contact' => $row['Vo_Contact'],
                'Vo_NIC' => $row['Vo_NIC'],
                'Vo_Occupation' => $row['Vo_Occupation'],
                'Vo_Experience' => $row['Vo_Experience'],
                'Vo_Activity' => $row['Vo_Activity'],
                'Vo_Description' => $row['Vo_Description'],
                // Add more volunteer fields here
                'docs' => array()
            );
        }
        
        // Add document to the docs array
        $volunteers[$volunteer_id]['docs'][] = array(
            'doc_id' => $row['ID'],
            'doc_name' => $row['file_path'],
            // Add more document fields here
        );
      }
      
      
      foreach($volunteers as $row )
      {
      ?>
      
          <tr>
          
          <td><?=$row["Vo_Name"]?></td>
          <td><?=$row["Vo_DOB"]?></td>
          <td><?=$row["Vo_Email"]?></td>
          <td><?=$row["Vo_Contact"]?></td>
          <td><?=$row["Vo_NIC"]?></td>
          <td><?=$row["Vo_Occupation"]?></td>
          <td><?=$row["Vo_Experience"]?></td>
          <td><?=$row["Vo_Activity"]?></td>
          <td><?=$row["Vo_Description"]?></td>
          <td><?php
            foreach($row['docs'] as $item){
                ?>
                  <p><a href="http://<?= $_SERVER['SERVER_NAME']."/updated%207.17/cancer1/".$item["doc_name"] ?>"><?=$item["doc_name"]?></a></p>
                <?php
            }
          
          ?></td>
          
      
          <td  style="text-align: center;">
          <button type="button" name="volunteer_edit" class=" btn-success bt-xs volunteer_edit" id="<?=$row["volunteer_ID"]?>" title="Edit"><i class="fa fa-edit"></i></button>
         
          <!-- <button type="button" class=" btn-primary bt-xs volunt_email" id="<?=$row["volunteer_ID"]?>" title="mail"><i class="fas fa-envelope"></i></button> -->
          <button type="button" class=" btn-danger bt-xs volunteer_delete" id="<?=$row["volunteer_ID"]?>" title="Delete"><i class="fas fa-trash"></i></button>
          </td>
          </tr>
      <?php
      }
      ?>
      
      </tbody>
      </table>
      </div>
      
     
      </div>
      <?php
      
      
      }

  

//-------------------------------------------Food Bookings View-----------------
//----------------------------------
//-----------------------------------------------------------------------------------------------

if ($_POST["action"] == "my_food_Bookings") {


  $output = '';
  $ID = $_SESSION['id'];
  $query = "SELECT * FROM `food_donation` INNER JOIN events1 ON events1.E_ID = food_donation.food_ID WHERE events1.U_id = '$ID'";
  
  $result = mysqli_query($conn, $query);
 
  
  $output = '
  <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">My Food Bookings</h6>
      </div>

      <div class="table-responsive small">
<table class="table table-bordered" id="datatable12" width="100%" celllspacing="0" style="font-size: 12px;">
<thead>
  <tr>
   
    <th>Category</th>
    <th>No Of visitors</th>
    <th>Description</th>
   
    <th>Date</th>
    <th>Time</th>
    <th width="15%">Action</th>
  </tr>
</thead>
<tbody>
        ';
        while ($row = mysqli_fetch_array($result)) {

          // $D_Name =  $row["Name"];
          // $D_Email =  $row["Email"];
          // $D_Contact =  $row["Contact"];
          $food_category_b =  $row["food_category_b"];
          $selected_time =  $row["selected_time"];
    $additional_desc =  $row["additional_desc"];
    $no_of_visit =  $row["no_of_visit"];
    $Status =  $row["Status"];
    $Date =  $row["Date"];
    
     
     

    $output .= '

            <tr>
            <td>';

            if ($food_category_b == 3){
              $output .= 'Food';
          }else if ($food_category_b == 2){
            $output .= 'Soup</td>';
          }else{
            $output .= '' . $Status . '';
          } 

            $output .=  
             
             '</td>
          
            <td>' . $no_of_visit . '</td>
            <td>' . $additional_desc . '</td>
            <td>' . $row["Date"] . '</td>
            <td>';

            if ($food_category_b == 3 && $selected_time == 1){
              $output .= 'BreakFast';
          }else if ($food_category_b == 3 && $selected_time == 2){
            $output .= 'Lunch</td>';
          }else if ($food_category_b == 3 && $selected_time == 3){
            $output .= 'Dinner</td>';
          }else if ($food_category_b == 2 && $selected_time == 1){
            $output .= 'Morning Soup</td>';
          }else if ($food_category_b == 2 && $selected_time == 2){
            $output .= 'Evening Soup</td>';
          }else{
            $output .= '' . $Status . '';
          } 

            $output .=  
             
             '</td>
          
          
           
            <td>';

            if ($Status == 0){
              $output .= '<button type="button" name="event_Deactive" class=" btn-danger bt-xs event_Deactive" id="' . $row["E_ID"] . '" title="Deactive">Wating for Approval</button>';
          }else if ($Status == 2){
            $output .= '<button type="button" name="event_Active" class=" btn-success bt-xs event_Active" id="' . $row["E_ID"] . '" title="Active">Approved</button></td>';
          }else{
            $output .= '<button type="button" name="event_Deactive" class=" btn-warning bt-xs event_Deactive" id="' . $row["E_ID"] . '" title="Donated">Done</button>';
          } 

            $output .=  
             
             '</td>

        <td>
        <button type="button" name="event_update" class=" btn-success bt-xs food_update" id="' . $row["E_ID"] . '" title="Edit"><i class="fa fa-edit"></i></button>
        <button type="button" name="event_delete" class=" btn-danger bt-xs foodD_delete" id="' . $row["E_ID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
        </tr>
      ';
      

  }
  $output .= '</tbody>
      </table>
      </div>';
  echo $output;
}






//-------------------------------------------------------Food Booking----------------------------------
  //-----------------------------------------
  //-------------------------------------------------------------------------------------------------------------

  if ($_POST["action"] == "foodDonation_Booking") {
   
    $output = '';
    $ID = $_SESSION['id'];
    $query = "SELECT * FROM donor WHERE donor_id = $ID";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_array($result)) {

    $output .= '
    <div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary text-center">Food Donation Booking</h6>
        </div>
      <div class="card-body justify-content-center row" id="" >
        <div class="col-md-6">

          <div class="form-group">
              <label>Name</label>
              <input type="text" name="FDonor_Name" id="FDonor_Name" class="form-control" placeholder="Please Enter Blood Donor Name" disabled value="' . $row["donor_name"] . '">
          </div>

          <div class="form-group">
              <label>Email</label>
              <input type="text" name="FDonor_Email" id="FDonor_Email" class="form-control " placeholder="Please Enter Blood Donor Email" disabled value="' . $row["donor_email"] . '">
          </div>

          <div class="form-group">
              <label>Contact Number</label>
              <input type="text" name="FDonor_Contact" id="FDonor_Contact" class="form-control " placeholder="Please Enter Blood Donor Contact Number" disabled value="' . $row["donor_phone"] . '">
          </div>

          <div class="form-group">
          <label>NIC/Passport</label>
          <input type="text" name="FDonor_Passport" id="FDonor_Passport" class="form-control " placeholder="Please Enter Blood Group" disabled value="' . $row["donor_nic"] . '">
          </div>

          

          <div class="form-group">
          <label>Select Category</label>
          <select name="" id="Fcategory1" class="form-control">
          ';
          $queryC = "SELECT * FROM food_category";
          $query_run = mysqli_query($conn, $queryC);
          $output .= '
                <option value="0">Select Category</option>';
          while($row1 = mysqli_fetch_array($query_run))
              {
                
                $output .= '
                  <option value='. $row1["f_categoryId"] .'>'. $row1["f_categoryName"] .'</option>';
                
              }
        
            
              $output .= '
              
            </select>
          </div>

          <div class="form-group">
          <label>Select Time</label>
            <select name="" id="FTime1" class="form-control">
            </select>
          </div>
        
          <div class="form-group">
              <label>Date</label>
              <input type="text" id="FoodDatepicker" class="form-control">
          </div>

          <div class="form-group">
              <label>No of Visitors</label>
              <input type="text" name="FVisitors" id="FVisitors" class="form-control " placeholder="Please Enter No of Visitors">
          </div>

          <div class="form-group">
          <label>Additional Description</label>
          <textarea class="form-control" name="Please Describe More about Activity You plan" rows="5" placeholder="Message" required id="FDescription" ></textarea>
          </div>
        
          
          
          <div class="text-right">
            <button class="btn btn-primary" id="food_donor_form_confirm">Confirm</button>
          </div>
          
        </div>
      </div>
    </div>
    </div>';

    //     <div class="form-group">
    //     <label>Time Slot</label>
    //       <select name="TimeS" id="TimeS" class="form-control ">
    //       <option value="1">
    //       </select>
    // </div>
      //   }
      // }
    }
    echo $output;
  }

  if ($_POST["action"] == "Fcategory1_Selected") {
   
    $ID = $_POST['Fcategory'];
    $Status;

    $query = "SELECT * FROM food_category WHERE f_categoryId = $ID";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_array($result)) {
      $Status = $row["f_Status"];
    }else{
      $Status = "No Status";
    }

    echo $Status;
  }

  //-------------------------------------------My Entertainment Activity Requests View----------------
//----------------------------------
//-----------------------------------------------------------------------------------------------


if ($_POST["action"] == "my_Visiting_Requests") {


  $output = '';
  $ID = $_SESSION['id'];
  $query = "SELECT * FROM `entertainment_act_booking` INNER JOIN events1 ON events1.E_ID = entertainment_act_booking.eAct_ID WHERE events1.U_id = '$ID'";
  
  $result = mysqli_query($conn, $query);
 
  
  $output = '
  <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">My Entertainment Activity Requests</h6>
      

      <div class="table-responsive small">
<table class="table table-bordered" id="datatablemyVisit" width="100%" celllspacing="0" style="font-size: 12px;">
<thead>
  <tr>
   
   
    <th>Description</th>
    <th>Ward</th>
    <th>No of Visitors</th>
    <th>Date</th>
    <th>Status</th>
   
    <th width="15%">Action</th>
  </tr>
</thead>
<tbody>
        ';
        while ($row = mysqli_fetch_array($result)) {

    $Status =  $row["Status"];
    $eAct =  $row["eAct"];
    $eAct_Desc =  $row["eAct_Desc"];
    $eAct_ward =  $row["eAct_ward"];
    $feedback =  $row["feedback"];
    $eAct_noofvisiters =  $row["eAct_noofvisiters"];
    

    $output .= '

            <tr>
            
            <td>' . $eAct_Desc . '</td>
            <td>' . $eAct_ward . '</td>
            <td>' .$eAct_noofvisiters. '</td>
            <td>' . $row["eAct_Date"] . '</td>
         
           
            <td>';

            if ($Status==0 ){
              $output .= 'Processing';
          }else if ($Status==1 && $feedback == 1){
            $output .= 'Waiting for Director Approval';
          }else if ($Status==2 && $feedback == 1){
            $output .= 'Your Request Approved. You can proceed. Our Staff will contact you as soon as possible for more info';
          }else{
            $output .= 'Done';
          } 

            $output .=  
             
             '</td>';

             if ($Status == 0){
               $output .= '<td>
               <button type="button" name="evnterD_update" class=" btn-success bt-xs evnterD_update" id="' . $row["E_ID"] . '" title="Edit"><i class="fa fa-edit"></i></button>
               <button type="button" name="event_delete" class=" btn-danger bt-xs event_delete" id="' . $row["E_ID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button>
               </td>';
           }else if ($Status != 0){
             $output .= '<td>
             <button type="button" name="event_delete" class=" btn-danger bt-xs event_delete" id="' . $row["E_ID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button>
             </td>';
           }else{
             $output .= '' . $Status . '';
           } 
 
             $output .=  
              
              '

        
        </tr>
      ';
      

  }
  $output .= '</tbody>
      </table>
      </div>
      </div>';
  echo $output;
}

if ($_POST["action"] == "food_donor_form_confirm") {

  $FDonor_Name = $_POST["FDonor_Name"];
  $FDonor_Passport = $_POST["FDonor_Passport"];
  $FDonor_Email = $_POST["FDonor_Email"];
  $FDonor_Contact = $_POST["FDonor_Contact"];
  $Fcategory1 = $_POST["Fcategory1"];
  $FTime1 = $_POST["FTime1"];
  $FoodDatepicker = $_POST["formattedDate1"];
  $FVisitors = $_POST["FVisitors"];
  $FDescription = $_POST["FDescription"];
  $UID = $_SESSION['id'];   

  $query = "INSERT INTO food_donation (food_category_b,selected_time,Date,additional_desc,no_of_visit,U_ID) 
  VALUES ('$Fcategory1','$FTime1','$FoodDatepicker','$FDescription','$FVisitors','$UID')";
       if(mysqli_query($conn, $query))
       {
        $query2 = "SELECT * FROM food_donation WHERE U_ID=$UID ORDER BY food_ID DESC LIMIT 1";
        $result2 = mysqli_query($conn, $query2);
        if ($row2 = mysqli_fetch_array($result2)) {

          $E_ID = $row2["food_ID"];
          $query1 = "INSERT INTO events1 (E_ID,U_ID,E_Type,E_Date,Status) 
          VALUES ('$E_ID','$UID','2','$FoodDatepicker','0')";
          if(mysqli_query($conn, $query1))
          {
              echo 'Inserted';
          }
        }
          
       }else{
          echo 'Not_Insert';
       }
          
}



// if ($_POST["action"] == "volunteer_form") {

//   // $file = addslashes(file_get_contents($_FILES["myFile1"]["tmp_name"]));
//   $volun_Name = $_POST["volun_Name"];
//   $volun_DOB = $_POST["volun_DOB"];
//   $volun_contact = $_POST["volun_Contact"];
  
//   $volun_Email = $_POST["volun_Email"];
//   $volun_NIC = $_POST["volun_NIC"];
//   $volun_occupation = $_POST["volun_occupation"];
//   $UID = $_SESSION['id']; 
 
 
//   $volun_Experience = $_POST["volun_Experience"];
//   $volun_Activity = $_POST["volun_Activity"];
//   $volun_Act_Desc = $_POST["volun_Act_Desc"];

//   // $userfile = $_POST["userfile"];

//   $query = "INSERT INTO volunteer_register (Vo_Name,Vo_DOB,Vo_Email,Vo_Contact,Vo_NIC,Vo_Occupation,Vo_Experience,Vo_Activity,Vo_Description,U_ID) 
//   VALUES ('$volun_Name','$volun_DOB','$volun_contact','$volun_Email','$volun_NIC','$volun_occupation','$volun_Experience','$volun_Activity','$volun_Act_Desc','$UID')";
//        if(mysqli_query($conn, $query))
//        {
       
          
//               echo 'Inserted';
          
//         }
//         else{
//           echo 'Not_Inserted';
//        }
          
//        }


if ($_POST["action"] == "FTime1DisabledDates") {

        $category = $_POST["category"];
        $time = $_POST["time"];

      
        $query = "SELECT events1.E_Date FROM `food_donation` INNER JOIN events1 ON events1.E_ID = food_donation.`food_ID` WHERE events1.Status=2 AND events1.E_Type=2 AND food_donation.food_category_b='$category' AND food_donation.selected_time='$time' ORDER BY `events1`.`E_Date` ASC";
       
  
        $result = mysqli_query($conn, $query);
      
        $dateArray= [];
        while ($row = mysqli_fetch_array($result)) {
      
            $dateArray[]=$row ["E_Date"];
      
          
            
        }
        
    echo json_encode($dateArray, JSON_UNESCAPED_SLASHES);
}

      if ($_POST["action"] == "entertainment_form") {

        echo "wwe";
        echo $Enter_Name = $_POST["Enter_Name"];
        echo $Enter_Email = $_POST["Enter_Email"];
        echo $Enter_Contact = $_POST["Enter_Contact"];
        echo $Enter_NIC = $_POST["Enter_NIC"];
        echo $Enter_Desc = $_POST["Enter_Desc"];
        echo $enterwards = $_POST["enterwards"];
        echo $NoOfenterVisitor = $_POST['NoOfenterVisitor']; 
        echo $formattedDateE = $_POST["formattedDateE"];
        echo $entertain_hours = $_POST["entertain_hours"];
        echo  $ID = $_SESSION['id'];
    
        $query = "INSERT INTO `entertainment_act_booking`(`eAct_Name`, `eAct_contact`, `eAct_NIC`, `eAct_Desc`, `eAct_ward`, `eAct_noofvisiters`, `eAct_Date`, `U_ID`) 
        VALUES ('$Enter_Name','$Enter_Contact','$Enter_NIC','$Enter_Desc','$enterwards','$NoOfenterVisitor','$formattedDateE','$ID')";
             if(mysqli_query($conn, $query))
             {
              $query2 = "SELECT * FROM entertainment_act_booking WHERE U_ID=$UID ORDER BY eAct_ID DESC LIMIT 1";
              $result2 = mysqli_query($conn, $query2);
              if ($row2 = mysqli_fetch_array($result2)) {
    
                $E_ID = $row2["eAct_ID"];
                $query1 = "INSERT INTO events1 (E_ID,U_ID,E_Type,W_ID,E_Date,Status) 
                VALUES ('$E_ID','$UID','3','$enterwards','$formattedDateE','0')";
                if(mysqli_query($conn, $query1))
                {
                    echo 'Inserted';
                }
              }
                
             }else{
                echo 'Not_Insert';
             }
    
      }

      if ($_POST["action"] == "datepickerEntertain") {

        $enterwards = $_POST["enterwards"];

        $DB_Arry[] ="";
        $Date2='';
            $count1=0;
            $count2=0;
            $count3=0;
            $count4=0;
            $count5=0;
            $count6=0;
      
            $Time1=1;
            $Time2=2;
            $Time3=3;
            $Time4=4;
            $Time5=5;
            $Time6=6;
      
        $query = "SELECT * FROM `entertainment_act_booking` INNER JOIN events1 ON events1.E_ID = entertainment_act_booking.`eAct_ID` WHERE events1.Status=1 AND events1.E_Type=3 AND entertainment_act_booking.eAct_ward=$enterwards ORDER BY `events1`.`E_Date` ASC";
        
        $result = mysqli_query($conn, $query);
      
        while ($row = mysqli_fetch_array($result)) {
      
          $DB_Arry[] = $row['E_Date'];
            
        }
        
        echo json_encode($DB_Arry, JSON_UNESCAPED_SLASHES);
      }


 
      if ($_POST["action"] == "disableEntertaindate") {

        $ward = $_POST["enterwards"];
        echo "$ward";
      
        $query = "SELECT events1.E_Date FROM `entertainment_act_booking` INNER JOIN events1 ON events1.E_ID = entertainment_act_booking.`eAct_ID` WHERE events1.Status=2 AND events1.E_Type=3 AND entertainment_act_booking.eAct_ward='$ward' ORDER BY `events1`.`E_Date` ASC";
       
  
        $result = mysqli_query($conn, $query);
      
        $dateArray= [];
        while ($row = mysqli_fetch_array($result)) {
      
            $dateArray[]=$row ["E_Date"];
      
          
            
        }
        
    echo json_encode($dateArray, JSON_UNESCAPED_SLASHES);
}


//-------------------------------------------------------visiting appointment----------------------------------
  //-----------------------------------------
  //-------------------------------------------------------------------------------------------------------------

  if ($_POST["action"] == "gItem_Booking") {
   
    $output = '';
    $ID = $_SESSION['id'];
    $query = "SELECT * FROM donor WHERE donor_id = $ID";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_array($result)) {
    
    $output .= '
    <div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary text-center">General Item Booking</h6>
        </div>
      <div class="card-body justify-content-center row" id="" >
        <div class="col-md-6">

          <div class="form-group">
              <label>Name</label>
              <input type="text" name="gItem_Name" id="gItem_Name" class="form-control" placeholder="Please Enter Blood Donor Name" value="' . $row["donor_name"] . '">
          </div>

          <div class="form-group">
              <label>Email</label>
              <input type="text" name="gItem_Email" id="gItem_Email" class="form-control " placeholder="Please Enter Blood Donor Email" value="' . $row["donor_email"] . '">
          </div>

          <div class="form-group">
              <label>Contact Number</label>
              <input type="text" name="gItem_Contact" id="gItem_Contact" class="form-control " placeholder="Please Enter Blood Donor Contact Number" value="' . $row["donor_phone"] . '">
          </div>

          <div class="form-group">
          <label>NIC/Passport</label>
          <input type="text" name="gItem_NIC" id="gItem_NIC" class="form-control " placeholder="Please Enter Blood Group" value="' . $row["donor_nic"] . '">
          </div>

          <div class="form-group">
          <label>Drug list</label>
          <select name="drugList" id="gItem" class="form-control" multiple>
          ';
          $querydlist = "SELECT * FROM general_items";
          $querydrug = mysqli_query($conn, $querydlist);
          $output .= '
                <option value="0">Select Item You donate</option>';
          while($rowE = mysqli_fetch_array($querydrug))
              {
                
                $output .= '
                  <option value='. $rowE["Item"] .'>'. $rowE["Item"] .'</option>';
                
              }
        
            
              $output .= '
              
            </select>
          
          </div>

          <div class="form-group">
              <label>Prefered ward</label>
              <select name="otherwards" id="otherwards" class="form-control">
              ';
              $queryEWard = "SELECT * FROM wards";
              $queryEW = mysqli_query($conn, $queryEWard);
              $output .= '
                    <option value="0">Select Ward You prefer</option>';
              while($rowE = mysqli_fetch_array($queryEW))
                  {
                    
                    $output .= '
                      <option value='. $rowE["ID"] .'>'. $rowE["W_ID"] .'</option>';
                    
                  }
            
                
                  $output .= '
                  
                </select>
              
              </div>

          <div class="form-group">
              <label>Date</label>
              <input type="date" id="datepickerGItem" class="form-control">
          </div>
          
          <div class="form-group">
          <label>Quentity</label>
          <input type="number" name="gItem_quentity" id="gItem_quentity" class="form-control ">
          </div>

          <div class="text-right">
            <button class="btn btn-primary" id="generalItem_form_confirm1">Confirm</button>
          </div>
          
        </div>
      </div>
    </div>
    </div>';
    }
    echo $output;
  }


  // if ($_POST["action"] == "Fcategory1_Selected") {
   
  //   $ID = $_POST['gitem_category'];
  //   $Status;

  //   if($ID ==1){
  //     $query = "SELECT * FROM general_items WHERE C_Id = $ID";
  //     $result = mysqli_query($conn, $query);
  //     if ($row = mysqli_fetch_array($result)) {
  //       $GI_id= $row["f_categoryId"];
  //       $GI_Name= $row["f_categoryId"];
        
  //     }else{
  //       $query = "SELECT * FROM general_item_food WHERE C_ID = $ID";
  //     $result = mysqli_query($conn, $query);
  //     if ($row = mysqli_fetch_array($result)) {
  //       $GI_id= $row["f_categoryId"];
  //       $GI_Name= $row["f_categoryId"];
  //     }
  //     }

  //   }
  
  // }


  if ($_POST["action"] == "gitem_Selected") {
    $ID = $_POST['gitem_category'];

    $selectedItems = array(); // Initialize an array to hold the selected items

    if ($ID == 1) {
        $query = "SELECT * FROM general_items WHERE C_Id = $ID";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($result)) {
            $selectedItems[] = array(
                'GI_id' => $row["ID"],
                'GI_Name' => $row["Item"]
            );
        }}else{
        
        $query = "SELECT * FROM general_item_food WHERE C_ID = $ID";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($result)) {
            $selectedItems[] = array(
                'GI_id' => $row["ID"],
                'GI_Name' => $row["Gf_name"]
            );
        }
    }
  
    // Send the selected items as a JSON response
    // header('Content-Type: application/json');
    echo json_encode($selectedItems);
}


if ($_POST["action"] == "generalItem_form") {

  $gItem_Name = $_POST["gItem_Name"];
  $gItem_Email = $_POST["gItem_Email"];
  $gItem_Contact = $_POST["gItem_Contact"];
  $gItem_NIC = $_POST["gItem_NIC"];
  $gItem_ward = $_POST["otherwards"];
  $gItem = $_POST["gItem"];


  $formattedDateG1 = $_POST["formattedDateG"];
  $gItem_quentity = $_POST["gItem_quentity"];
  
  $ID = $_SESSION['id'];

  $query = "INSERT INTO general_items_donation_bookings(gItemD_Name,gItemD_Email,gItemD_contact,gItemD_item,Date,U_ID,gItemD_NIC,gItem_quentity) 
  VALUES ('$gItem_Name','$gItem_Email','$gItem_Contact','$gItem','$formattedDateG1','$ID','$gItem_NIC','$gItem_quentity')";
       if(mysqli_query($conn, $query))
       {
        $query2 = "SELECT * FROM general_items_donation_bookings WHERE U_ID=$ID ORDER BY gItemD_ID DESC LIMIT 1";
        $result2 = mysqli_query($conn, $query2);
        if ($row2 = mysqli_fetch_array($result2)) {

          $E_ID = $row2["gItemD_ID"];
        
          $query1 = "INSERT INTO events1 (E_ID,U_ID,E_Type,W_ID,E_Date,Status) 
          VALUES ('$E_ID','$ID','4','$gItem_ward','$formattedDateG1','2')";
          if(mysqli_query($conn, $query1))
          {
              echo 'Inserted';
          }
        }
          
       }else{
          echo 'Not_Insert';
       }

}



//-------------------------------------------------------Drug appointment----------------------------------
  //-----------------------------------------
  //-------------------------------------------------------------------------------------------------------------

  if ($_POST["action"] == "drug_Booking_Booking") {
   
    $output = '';
    $ID = $_SESSION['id'];
    $query = "SELECT * FROM donor WHERE donor_id = $ID";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_array($result)) {
    
    $output .= '
    <div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary text-center">Drug Donation Booking</h6>
        </div>
      <div class="card-body justify-content-center row" id="" >
        <div class="col-md-6">

          <div class="form-group">
              <label>Name</label>
              <input type="text" name="drugD_Name" id="drugD_Name" class="form-control" placeholder="Please Enter Blood Donor Name" value="' . $row["donor_name"] . '">
          </div>

          <div class="form-group">
              <label>Email</label>
              <input type="text" name="drugD_Email" id="drugD_Email" class="form-control " placeholder="Please Enter Blood Donor Email" value="' . $row["donor_email"] . '">
          </div>

          <div class="form-group">
              <label>Contact Number</label>
              <input type="text" name="drugD_Contact" id="drugD_Contact" class="form-control " placeholder="Please Enter Blood Donor Contact Number" value="' . $row["donor_phone"] . '">
          </div>

          <div class="form-group">
          <label>NIC/Passport</label>
          <input type="text" name="drugD_NIC" id="drugD_NIC" class="form-control " placeholder="Please Enter Blood Group" value="' . $row["donor_nic"] . '">
          </div>
        
          <div class="form-group">
          <label>Drug list</label>
          <select name="drugList" id="drugList" class="form-control" multiple>
          ';
          $querydlist = "SELECT * FROM drugs_list";
          $querydrug = mysqli_query($conn, $querydlist);
          $output .= '
                <option value="0">Select Drug You donate</option>';
          while($rowE = mysqli_fetch_array($querydrug))
              {
                
                $output .= '
                  <option value='. $rowE["drug_name"] .'>'. $rowE["drug_name"] .'    '. $rowE["drug_weight"] .'</option>';
                
              }
        
            
              $output .= '
              
            </select>
          
          </div>


          <div class="form-group">
              <label>Date</label>
              <input type="date" id="datepickerDrug" class="form-control">
          </div>

         

         

          
          
          <div class="text-right">
            <button class="btn btn-primary" id="drug_form_confirm">Confirm</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>';
    }
    echo $output;
  }

  if ($_POST["action"] == "drug_form") {

    $drugD_Name = $_POST["drugD_Name"];
    $drugD_Email = $_POST["drugD_Email"];
    $drugD_Contact = $_POST["drugD_Contact"];
    $drugD_NIC = $_POST["drugD_NIC"];
    $drugList = $_POST["drugList"];
    $datepickerDrug = $_POST["formattedDateD"];
    $ID = $_SESSION['id'];

    $query = "INSERT INTO `drug_donation`(`drug_DName`, `drug_DEmail`, `drug_DContact`, `drug_DDrug`, `drug_DNIC`, `drug_DDate`, `U_ID`) 
    VALUES ('$drugD_Name','$drugD_Email','$drugD_Contact','$drugList','$drugD_NIC','$datepickerDrug','$ID')";
         if(mysqli_query($conn, $query))
         {
          $query2 = "SELECT * FROM drug_donation WHERE U_ID=$UID ORDER BY drug_DID DESC LIMIT 1";
          $result2 = mysqli_query($conn, $query2);
          if ($row2 = mysqli_fetch_array($result2)) {

            $E_ID = $row2["drug_DID"];
            $query1 = "INSERT INTO events1 (E_ID,U_ID,E_Type,E_Date,Status) 
            VALUES ('$E_ID','$UID','5','$datepickerDrug','2')";
            if(mysqli_query($conn, $query1))
            {
                echo 'Inserted';
            }
          }
            
         }else{
            echo 'Not_Insert';
         }

  }
// ======================================================= Fetch blood Edit Data ==============================================================
if($_POST["action"] == "blood_edit_value")
{
    
    $ID = $_POST['UserID'];
    $query = "SELECT * FROM blood_donation WHERE ID ='$ID'";
    $result = mysqli_query($conn,$query);

    while($row=mysqli_fetch_array($result))
    {
        

        $User_data[0]=$row['ID'];
        $User_data[1]=$row['Name'];
        $User_data[2]=$row['Email'];
        $User_data[3]=$row['Contact'];
        $User_data[4]=$row['Whight'];
        $User_data[5]=$row['Hight'];
        $User_data[6]=$row['B_Group'];
        $User_data[7]=$row['Date'];
        $User_data[8]=$row['Time'];
        $User_data[9]=$row['D_before'];
        $User_data[10]=$row['HM_Times'];
        $User_data[11]=$row['LB_Date'];
        


    }
    echo json_encode($User_data);
}

// ============================================== CHAT-BOT DATA DELETE ==============================================
if($_POST["action"] == "blood_delete")
{
    $date = date('Y-m-d');
    $alert = "Chat-Bot Quection & Answer Deleted";
    $status = "2";

$query = "DELETE FROM blood_donation WHERE ID = '".$_POST["TravelID"]."'";
if(mysqli_query($conn, $query))
{
  $query2 = "DELETE FROM events1 WHERE E_ID = '".$_POST["TravelID"]."'";
  if(mysqli_query($conn, $query2))
  {
      echo 'delete';
  }

}else
{
    echo 'not_delete';
}
}


// ============================================== volunteer DATA DELETE ==============================================
if($_POST["action"] == "volunt_delete")
{
    $date = date('Y-m-d');
    $alert = "Chat-Bot Quection & Answer Deleted";
    $status = "2";

$query = "DELETE FROM volunteer_register WHERE volunteer_ID = '".$_POST["TravelID"]."'";
if(mysqli_query($conn, $query))
{
  
      echo 'delete';
  

}else
{
    echo 'not_delete';
}
}


 //---------------------------------------------Voluntier View-------------------------------
  //--------------------------------
  //--------------------------------------------------------------------------------------------

  if ($_POST["action"] == "gItem_bookings") {
    $output = '';
    $ID = $_SESSION['id'];
    $query = "SELECT * FROM general_items_donation_bookings where U_ID=$ID";
    $result = mysqli_query($conn, $query);
    $output = '
      <div class="container-fluid">
      <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary center">General Item Bookings
          </div>
        
      <div class="table-responsive small">  
      <table class="table table-bordered" id="datatableGItem" width="100%" celllspacing="0">
      <thead>
        <tr>
         
          <th>Name</th>
          <th>Email</th>
          <th>Contact</th>
          <th>NIC</th>
          <th>Item</th>
          <th>Date</th>
          <th>Quentity</th>
          <th width="15%">Action</th>
        </tr>
      </thead>
     
      <tbody>
      ';
      while($row = mysqli_fetch_array($result))
      {
      $output .= '
  
          <tr>
         
          <td>'.$row["gItemD_Name"].'</td>
          <td>'.$row["gItemD_Email"].'</td>
          <td>'.$row["gItemD_contact"].'</td>
          <td>'.$row["gItemD_NIC"].'</td>
     
          <td>';

          $items=json_decode($row["gItemD_item"]);
          foreach($items as $item){
            $output .= $item.'</br>';
          }
       
          $output .= '</td>
          <td>'.$row["Date"].'</td>
        
          <td>'.$row["gItem_quentity"].'</td>
  
          
  
          <td>
         
          <button type="button" name="GIDonor_update" class=" btn-success bt-xs GIDonor_update" id="'.$row["gItemD_ID"].'" title="Edit"><i class="fa fa-edit"></i></button>
          <button type="button" name="admin_delete" class=" btn-danger bt-xs GItem_Booking_delete1" id="'.$row["gItemD_ID"].'" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
          </tr>
      ';
      }
      $output .= '</tbody>
      </table>
      </div>
      </div>
      </div>';
  
  
  
  
  
  
  
  
      echo $output;
    }



// ============================================== General Item DATA DELETE ==============================================
if($_POST["action"] == "gItem_delete")
{
    $date = date('Y-m-d');
    $alert = "Chat-Bot Quection & Answer Deleted";
    $status = "2";

$query = "DELETE FROM general_items_donation_bookings WHERE gItemD_ID = '".$_POST["TravelID"]."'";
if(mysqli_query($conn, $query))
{
  
      echo 'delete';
  

}else
{
    echo 'not_delete';
}
}


 //---------------------------------------------Voluntier View-------------------------------
  //--------------------------------
  //--------------------------------------------------------------------------------------------

  if ($_POST["action"] == "drug_bookings") {
    $output = '';
    $ID = $_SESSION['id'];
    $query = "SELECT * FROM drug_donation where U_ID=$ID";
    $result = mysqli_query($conn, $query);
    $output = '
      <div class="container-fluid">
      <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary center">Drug Bookings
          </div>
        
      <div class="table-responsive small">  
      <table class="table table-bordered" id="datatableGItem" width="100%" celllspacing="0">
      <thead>
        <tr>
         
          <th>Name</th>
          <th>Email</th>
          <th>Contact</th>
          <th>NIC</th>
          <th>Drugs</th>
          <th>Date</th>
          
          <th width="15%">Action</th>
        </tr>
      </thead>
     
      <tbody>
      ';
      while($row = mysqli_fetch_array($result))
      {
      $output .= '
  
          <tr>
         
          <td>'.$row["drug_DName"].'</td>
          <td>'.$row["drug_DEmail"].'</td>
          <td>'.$row["drug_DContact"].'</td>
          <td>'.$row["drug_DNIC"].'</td>
          <td>';

          $items=json_decode($row["drug_DDrug"]);
          foreach($items as $item){
            $output .= $item.'</br>';
          }
       
          $output .= '</td>
          
         
          <td>'.$row["drug_DDate"].'</td>
          
  
          
  
          <td>
         
          <button type="button" name="drugD_update" class=" btn-success bt-xs drugD_update" id="'.$row["drug_DID"].'" title="Edit"><i class="fa fa-edit"></i></button>
          <button type="button" name="admin_delete" class=" btn-danger bt-xs drug_Booking_delete1" id="'.$row["drug_DID"].'" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
          </tr>
      ';
      }
      $output .= '</tbody>
      </table>
      </div>
      </div>
      </div>';
  
  
  
  
  
  
  
  
      echo $output;
    }
// ============================================== Drug DATA DELETE ==============================================
if($_POST["action"] == "drug_delete")
{
    $date = date('Y-m-d');
    $alert = "Chat-Bot Quection & Answer Deleted";
    $status = "2";

$query = "DELETE FROM drug_donation WHERE drug_DID = '".$_POST["TravelID"]."'";
if(mysqli_query($conn, $query))
{
  
      echo 'delete';
  

}else
{
    echo 'not_delete';
}
}


// ======================================================= Fetch food Edit Data ==============================================================
if($_POST["action"] == "food_edit_value")
{
    
    $ID = $_POST['UserID'];
    $query = "SELECT * FROM food_donation WHERE food_ID ='$ID'";
    $result = mysqli_query($conn,$query);

    while($row=mysqli_fetch_array($result))
    {
        

        $User_data[0]=$row['food_ID'];
        $User_data[1]=$row['food_category_b'];
        $User_data[2]=$row['selected_time'];
        $User_data[3]=$row['Date'];
        $User_data[4]=$row['additional_desc'];
        $User_data[5]=$row['no_of_visit'];
       
        


    }
    echo json_encode($User_data);
}

// ============================================== food  DATA DELETE ==============================================
if($_POST["action"] == "food_delete")
{
    $date = date('Y-m-d');
    $alert = "Chat-Bot Quection & Answer Deleted";
    $status = "2";

$query = "DELETE FROM food_donation WHERE food_ID = '".$_POST["TravelID"]."'";
if(mysqli_query($conn, $query))
{
  $query2 = "DELETE FROM events1 WHERE E_ID = '".$_POST["TravelID"]."'";
  if(mysqli_query($conn, $query2))
  {
      echo 'delete';
  }

}else
{
    echo 'not_delete';
}
}


if ($_POST["action"] == "blood_edit") {

 $BDonor_eVENTid = $_POST["blood_ID"];
  $BDonor_Name = $_POST["blood_name"];
  $BDonor_Email = $_POST["blood_email"];
  $BDonor_Contact = $_POST["blood_contact"];
  $BDonor_Whight = $_POST["blood_weight"];
  $BDonor_Hight = $_POST["blood_height"];
  $BDonor_Date = $_POST["datepicker"];

  $BBlood_time_slot = $_POST["BBlood_time_slot"];
  $D_before = $_POST["blood_DBefore"];
  $HM_Times = $_POST["blood_HM_times"];
  $LB_Date = $_POST["blood_LBDate"];
  
  $BBlood_group = $_POST["blood_Group"];
  // UPDATE `events1` SET U_ID='$U_ID',E_Type='$E_Type',W_ID='$W_Type',E_Date='$formattedDate' WHERE E_ID='$E_ID'
  // $query = "UPDATE blood_donation SET Name=$BDonor_Name, Email=$BDonor_Email,Contact=$BDonor_Contact, Whight=$BDonor_Whight, Hight=$BDonor_Hight,B_Group=$BBlood_group,Date=$BDonor_Date,Time=$BBlood_time_slot,D_before=$D_before,HM_Times=$HM_Times,LB_Date=$LB_Date
  //  WHERE ID=$BDonor_eVENTid ";
  $query = "UPDATE blood_donation SET Name='$BDonor_Name', Email='$BDonor_Email', Contact='$BDonor_Contact', Whight='$BDonor_Whight', Hight='$BDonor_Hight', B_Group='$BBlood_group', Date='$BDonor_Date', Time='$BBlood_time_slot', D_before='$D_before', HM_Times='$HM_Times', LB_Date='$LB_Date' WHERE ID='$BDonor_eVENTid'";

       if(mysqli_query($conn, $query))
       {
  
         
        $query1 = "UPDATE `events1` SET E_Date='$BDonor_Date', Status='2' WHERE E_ID='$BDonor_eVENTid'";

          if(mysqli_query($conn, $query1))
          {
              echo 'Inserted';
              
          }
        
          
       }else{
          echo 'Not_Insert';
       }

}


if ($_POST["action"] == "food_edit") {

  


  $Ffood_ID = $_POST["food_ID"];
   $FFcategory1 = $_POST["Fcategory1"];
   $FFTime1 = $_POST["FTime1"];
   $Fadd_desc = $_POST["add_desc"];
   $Fn_of_visit = $_POST["n_of_visit"];
   $FFoodDatepicker = $_POST["FoodDatepicker"];
   
   // UPDATE `events1` SET U_ID='$U_ID',E_Type='$E_Type',W_ID='$W_Type',E_Date='$formattedDate' WHERE E_ID='$E_ID'
   // $query = "UPDATE blood_donation SET Name=$BDonor_Name, Email=$BDonor_Email,Contact=$BDonor_Contact, Whight=$BDonor_Whight, Hight=$BDonor_Hight,B_Group=$BBlood_group,Date=$BDonor_Date,Time=$BBlood_time_slot,D_before=$D_before,HM_Times=$HM_Times,LB_Date=$LB_Date
   //  WHERE ID=$BDonor_eVENTid ";
   $query = "UPDATE food_donation SET food_category_b='$FFcategory1', selected_time='$FFTime1', Date='$FFoodDatepicker', additional_desc='$Fadd_desc', no_of_visit='$Fn_of_visit' WHERE food_ID='$Ffood_ID'";
 
        if(mysqli_query($conn, $query))
        {
   
          
         $query1 = "UPDATE `events1` SET E_Date='$FFoodDatepicker', Status='0' WHERE E_ID='$Ffood_ID'";
 
           if(mysqli_query($conn, $query1))
           {
               echo 'Inserted';
               
           }
         
           
        }else{
           echo 'Not_Insert';
        }
 
 }
 
 

// ======================================================= Fetch food Edit Data ==============================================================
if ($_POST["action"] == "volunteer_edit1") {
  $ID = $_POST['UserID'];
  $query = "SELECT * FROM volunteer_register 
            INNER JOIN vo_docs ON vo_docs.volunteer_ID = volunteer_register.volunteer_ID 
            WHERE volunteer_register.volunteer_ID = $ID";
  
  $result = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_array($result)) {
      $User_data[0] = $row['volunteer_ID'];
      $User_data[1] = $row['Vo_Name'];
      $User_data[2] = $row['Vo_DOB'];
      $User_data[3] = $row['Vo_Email'];
      $User_data[4] = $row['Vo_Contact'];
      $User_data[5] = $row['Vo_NIC'];
      $User_data[6] = $row['Vo_Occupation'];
      $User_data[7] = $row['Vo_Experience'];
      $User_data[8] = $row['Vo_Activity'];
      $User_data[9] = $row['Vo_Description'];
  }

  echo json_encode($User_data);
}




// ======================================================= Fetch blood Edit Data ==============================================================
if($_POST["action"] == "evnterD_update1")
{
    
    $ID = $_POST['UserID'];
    $query = "SELECT * FROM entertainment_act_booking WHERE eAct_ID ='$ID'";
    $result = mysqli_query($conn,$query);

    while($row=mysqli_fetch_array($result))
    {
        

        $User_data[0]=$row['eAct_ID'];
        $User_data[1]=$row['eAct_Name'];
        $User_data[2]=$row['eAct_contact'];
        $User_data[3]=$row['eAct_NIC'];
        $User_data[4]=$row['eAct'];
        $User_data[5]=$row['eAct_Desc'];
        $User_data[6]=$row['eAct_ward'];
        $User_data[7]=$row['eAct_noofvisiters'];
        $User_data[8]=$row['eAct_Date'];
       
        


    }
    echo json_encode($User_data);
}




if ($_POST["action"] == "EeAct_edit") {

  
  $BDonor_eVENTid = $_POST["EeAct_ID"];
   $BDonor_Name = $_POST["EeAct_Name"];
   $BDonor_Email = $_POST["EeAct_contact"];
   $BDonor_Contact = $_POST["EeAct_NIC"];
   $BDonor_Whight = $_POST["EeAct"];
   $BDonor_Hight = $_POST["EeAct_Desc"];
   $BDonor_Date = $_POST["enterwards"];
 
   $BBlood_time_slot = $_POST["EeAct_noofvisiters"];
   $D_before = $_POST["datepickerEntertain"];
   
   $query = "UPDATE entertainment_act_booking SET eAct_Name='$BDonor_Name', eAct_contact='$BDonor_Email', eAct_NIC='$BDonor_Contact', eAct='$BDonor_Whight', eAct_Desc='$BDonor_Hight', eAct_ward='$BDonor_Date', eAct_noofvisiters='$BBlood_time_slot', eAct_Date='$D_before' WHERE eAct_ID='$BDonor_eVENTid'";
 
        if(mysqli_query($conn, $query))
        {
   
          
         $query1 = "UPDATE `events1` SET E_Date='$D_before', Status='0' WHERE E_ID='$BDonor_eVENTid'";
 
           if(mysqli_query($conn, $query1))
           {
               echo 'Inserted';
               
           }
         
           
        }else{
           echo 'Not_Insert';
        }
 
 }





// ======================================================= Fetch blood Edit Data ==============================================================
if($_POST["action"] == "GIDonor_update")
{
    
    $ID = $_POST['UserID'];
    $query = "SELECT * FROM general_items_donation_bookings 
            INNER JOIN events1 ON events1.E_ID = general_items_donation_bookings.gItemD_ID 
            WHERE general_items_donation_bookings.gItemD_ID = $ID";
    $result = mysqli_query($conn,$query);

    while($row=mysqli_fetch_array($result))
    {
        

        $User_data[0]=$row['gItemD_ID'];
        $User_data[1]=$row['gItemD_Name'];
        $User_data[2]=$row['gItemD_Email'];
        $User_data[3]=$row['gItemD_contact'];
        $User_data[4]=$row['gItemD_item'];
      
        $User_data[5]=$row['Date'];
       
        $User_data[6]=$row['gItemD_NIC'];
        $User_data[7]=$row['gItem_quentity'];
        $User_data[8]=$row['W_ID'];
       
        


    }
    echo json_encode($User_data);
}




if ($_POST["action"] == "ggItemD_edit") {
// echo("pppppppp");
  $gItem_ID = $_POST["gItem_ID"];
  $gItem_Name = $_POST["gItem_Name"];
  $gItem_Email = $_POST["gItem_Email"];
  $gItem_Contact = $_POST["gItem_Contact"];
  $gItem_NIC = $_POST["gItem_NIC"];
  $gItem_ward = $_POST["otherwards"];
  $gItem = $_POST["gItem"];


  $formattedDateG1 = $_POST["formattedDateG"];
  $gItem_quentity = $_POST["gItem_quentity"];
  
  $ID = $_SESSION['id'];
   
   $query = "UPDATE general_items_donation_bookings SET gItemD_Name='$gItem_Name', gItemD_Email='$gItem_Email', gItemD_contact='$gItem_Contact', 
   gItemD_item='$gItem', Date='$formattedDateG1', gItemD_NIC='$gItem_NIC', gItem_quentity='$gItem_quentity' WHERE gItemD_ID='$gItem_ID'";
 
        if(mysqli_query($conn, $query))
        {
   
          
         $query1 = "UPDATE `events1` SET E_Date='$formattedDateG1', Status='2' WHERE E_ID='$gItem_ID'";
 
           if(mysqli_query($conn, $query1))
           {
               echo 'Inserted';
               
           }
         
           
        }else{
           echo 'Not_Insert';
        }
 
 }



// ======================================================= Fetch blood Edit Data ==============================================================
if($_POST["action"] == "drugD_update")
{
    
    $ID = $_POST['UserID'];
    $query = "SELECT * FROM drug_donation WHERE drug_DID = $ID";
    $result = mysqli_query($conn,$query);

    while($row=mysqli_fetch_array($result))
    {
        

        $User_data[0]=$row['drug_DID'];
        $User_data[1]=$row['drug_DName'];
        $User_data[2]=$row['drug_DEmail'];
        $User_data[3]=$row['drug_DContact'];
        $User_data[4]=$row['drug_DDrug'];
        $User_data[5]=$row['drug_DNIC'];
        $User_data[6]=$row['drug_DDate'];
       
       
        


    }
    echo json_encode($User_data);
}




if ($_POST["action"] == "ddrug_edit") {
// echo("pppppppp");


  $gItem_ID = $_POST["gItem_ID"];
  $gItem_Name = $_POST["gItem_Name"];
  $gItem_Email = $_POST["gItem_Email"];
  $gItem_Contact = $_POST["gItem_Contact"];
  $gItem_NIC = $_POST["gItem_NIC"];
  $gItem = $_POST["gItem"];


  $formattedDateG1 = $_POST["formattedDateG"];
  
   
   $query = "UPDATE drug_donation SET drug_DName='$gItem_Name', drug_DEmail='$gItem_Email', drug_DContact='$gItem_Contact', 
   drug_DDrug='$gItem', drug_DDate='$formattedDateG1', drug_DNIC='$gItem_NIC' WHERE drug_DID='$gItem_ID'";
 
        if(mysqli_query($conn, $query))
        {
   
          
         $query1 = "UPDATE `events1` SET E_Date='$formattedDateG1', Status='2' WHERE E_ID='$gItem_ID'";
 
           if(mysqli_query($conn, $query1))
           {
               echo 'Inserted';
               
           }
         
           
        }else{
           echo 'Not_Insert';
        }
 
 }


























































































































































































































































































































}



?>