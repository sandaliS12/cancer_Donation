<?php

include('includes/check_login.php');
include("includes/db_conn.php");

if (isset($_POST["action"])) {


  if ($_POST["action"] == "Blood_donor_fetch") {
    $query = "SELECT * FROM donor";
    $result = mysqli_query($conn, $query);
    $output = '
      <div class="table-responsive small">  
      <table class="table table-bordered" id="datatable1" width="100%" celllspacing="0">
        <thead>
          <tr>
            <th>Donor Name</th>
            <th>Donor NIC</th>
            <th>Donor Email</th>
            <th>Donor Phone</th>
            <th>Donor Height</th>
            <th>Donor Weight</th>
            <th>Blood Group</th>
            <th width="15%">Action</th>
          </tr>
        </thead>
       
        <tbody>
          ';
    while ($row = mysqli_fetch_array($result)) {
      $output .= '

              <tr>
              <td>' . $row["donor_name"] . '</td>
              <td>' . $row["donor_nic"] . '</td>
              <td>' . $row["donor_email"] . '</td>
              <td>' . $row["donor_phone"] . '</td>
              <td>' . $row["donor_height"] . '</td>
              <td>' . $row["donor_weight"] . '</td>
              <td>' . $row["donor_bgroup"] . '</td>
          <td>
          <button type="button" name="admin_update" class=" btn-success bt-xs admin_update" id="' . $row["donor_name"] . '" title="Edit"><i class="fa fa-edit"></i></button>
          <button type="button" name="admin_delete" class=" btn-danger bt-xs admin_delete" id="' . $row["donor_name"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
          </tr>
        ';
    }
    $output .= '</tbody>
        </table>
        </div>';
    echo $output;

  }

  if ($_POST["action"] == "Donor_Bookings") {
    $query = "SELECT * FROM admin";
    $result = mysqli_query($conn, $query);
    $output = '
      <div class="table-responsive small">  
      <table class="table table-bordered" id="datatable1" width="100%" celllspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Admin Name</th>
            <th>Email</th>
            <th width="15%">Action</th>
          </tr>
        </thead>
        <tfoot>
        <tr>
            <th>ID</th>
            <th>Admin Name</th>
            <th>Email</th>
            <th width="15%">Action</th>
        </tr>
        </tfoot>
        <tbody>
          ';
    while ($row = mysqli_fetch_array($result)) {
      $output .= '

              <tr>
              <td>' . $row["ID"] . '</td>
              <td>' . $row["AdminName"] . '</td>
              <td>' . $row["Password"] . '</td>

          <td>
          <button type="button" name="admin_update" class=" btn-success bt-xs admin_update" id="' . $row["ID"] . '" title="Edit"><i class="fa fa-edit"></i></button>
          <button type="button" name="admin_delete" class=" btn-danger bt-xs admin_delete" id="' . $row["ID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
          </tr>
        ';
    }
    $output .= '</tbody>
        </table>
        </div>';
    echo $output;
  }

  if ($_POST["action"] == "Donor_Add_Donor_Form") {
    $output = '<div class="container">

      

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-8 col-md-8">

               
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                    

                                    <div class="form-floating sm-3 sm-3">
                                    <input type="text" class="form-control" id="named" placeholder="Enter name" name="named">
                                    <label for="named">Name</label>
                                  </div>

                                  <div class="form-floating sm-3 sm-3" style="margin-top:15px;">
                                    <input type="text" class="form-control" id="nicnumd" placeholder="Enter nicnum" name="nicnumd">
                                    <label for="nicnumd">NIC Number</label>
                                  </div>
                                  
                                  <div class="form-floating mt-3 mb-3">
                                    <input type="text" class="form-control" id="emaild" placeholder="Enter email" name="emaild">
                                    <label for="emaild">Email</label>
                                  </div>

                                  <div class="form-floating sm-3 sm-3">
                                    <input type="text" class="form-control" id="phoned" placeholder="Enter phone number" name="phone">
                                    <label for="phoned">Phone</label>
                                  </div>

                                 
                                  
                                  <div class="form-floating mt-3 mb-3">
                                    <input type="text" class="form-control" id="heightd" placeholder="Enter height" name="heightd">
                                    <label for="heightd">Height</label>
                                  </div>

                                  <div class="form-floating sm-3 sm-3">
                                    <input type="text" class="form-control" id="weightd" placeholder="Enter weight" name="weightd">
                                    <label for="weightd">Weight</label>
                                  </div>
                                  
                                  <div class="form-floating mt-3 mb-3">
                                    <input type="text" class="form-control" id="bgroup" placeholder="Enter blood group" name="bgroup">
                                    <label for="bgroup">Blood Group</label>
                                  </div>

                                 
    
                                  
                                  <input class = "btn btn-primary btn-user btn-block" type="submit" name = "" value = "Add" id = "addDonor">
                                     
                
            </div>
          </div>
        </div>

</div>

  </div>
  ';
    echo $output;
  }


  if ($_POST["action"] == "addDonor") {

    $named = $_POST['named'];
    $nicd = $_POST['nicd'];
    $emaild = $_POST['emaild'];
    $phoned = $_POST['phoned'];
    $heightd = $_POST['heightd'];
    $weightd = $_POST['weightd'];
    $bgroup = $_POST['bgroup'];

    $query = "INSERT INTO `donor`(`donor_name`, `donor_nic`, `donor_email`, `donor_phone`, `donor_height`, `donor_weight`, `donor_bgroup`) 
    VALUES ('$named','$nicd','$emaild','$phoned','$heightd','$weightd','$bgroup')";

    if (mysqli_query($conn, $query)) {
      echo 'inserted';

    } else {
      echo 'Not_inserted';
    }

  }






  if ($_POST["action"] == "admin_dashboard") {

    $output = '
  <div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
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

    <!-- Earnings (Monthly) Card Example -->
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

    <!-- Earnings (Monthly) Card Example -->
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

    <!-- Pending Requests Card Example -->
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
   
          ';

    $output .= '
        </div>';
    echo $output;
  }

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//         Staff Register
////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  if ($_POST["action"] == "Add_Staff") {
    $output = '<div class="container">

    

      <!-- Outer Row -->
      <div class="row justify-content-center">

          <div class="col-xl-8 col-lg-8 col-md-8">

             
                      <div class="row">
                          
                          <div class="col-lg-12">
                              <div class="p-5">
                                  <div class="text-center">
                                  

                                  <div class="form-floating sm-3 sm-3">
                                  <input type="text" class="form-control" id="named" placeholder="Enter name" name="named">
                                  <label for="named">Name</label>
                                </div>

                                <div class="form-floating sm-3 sm-3" style="margin-top:15px;">
                                  <input type="text" class="form-control" id="nicnumd" placeholder="Enter NIC" name="nicnumd">
                                  <label for="nicnumd">NIC Number</label>
                                </div>
                                
                                <div class="form-floating mt-3 mb-3">
                                  <input type="text" class="form-control" id="emaild" placeholder="Enter email" name="emaild">
                                  <label for="emaild">Email</label>
                                </div>

                                <div class="form-floating sm-3 sm-3">
                                  <input type="text" class="form-control" id="phoned" placeholder="Enter phone number" name="phone">
                                  <label for="phoned">Phone</label>
                                </div>

                               
                                
                                <div class="form-floating mt-3 mb-3">
                                  <input type="text" class="form-control" id="add_Password" placeholder="Enter Password" name="add_Password">
                                  <label for="add_Password">Password</label>
                                </div>

                                <div class="form-floating sm-3 sm-3">
                                  <input type="text" class="form-control" id="add_reassword" placeholder="Retype Password" name="add_reassword">
                                  <label for="add_reassword">Retype Password</label>
                                </div>
                                
                                <div class="form-floating mt-3 mb-3">
                                  <input type="text" class="form-control" id="add_Status" placeholder="Enter Section" name="add_Status">
                                  <label for="bgroup">Section</label>
                                </div>

                               
  
                                
                                <input class = "btn btn-primary btn-user btn-block" type="submit" name = "" value = "Add" id = "insertStaff">
                                   
              
          </div>
        </div>
      </div>

</div>

</div>
';
    echo $output;
  }


  // if ($_POST["action"] == "insertStaff") {

  //   $named = $_POST['named'];
//   $nicd = $_POST['nicd'];
//   $emaild = $_POST['emaild'];
//   $phoned = $_POST['phoned'];
//   $heightd = $_POST['heightd'];
//   $weightd = $_POST['weightd'];
//   $bgroup = $_POST['bgroup'];

  //   $query = "INSERT INTO `donor`(`donor_name`, `donor_nic`, `donor_email`, `donor_phone`, `donor_height`, `donor_weight`, `donor_bgroup`) 
//   VALUES ('$named','$nicd','$emaild','$phoned','$heightd','$weightd','$bgroup')";

  //   if(mysqli_query($conn, $query)){
//     echo 'inserted';

  //   }else{
//     echo 'Not_inserted';
//   }

  // }


  if ($_POST["action"] == "insertStaff") {

    $pass = $_POST['add_Password'];

    $re_pass = $_POST['add_reassword'];
    $name = $_POST['add_Name'];
    $nic = $_POST['add_NIC'];

    $Email_Address = $_POST['add_Email'];
    $Phone_Number = $_POST['add_Number'];
    $status = $_POST['add_Status'];

    // String Password => md5 Password
    $pass = md5($pass);

    $sql = "SELECT * FROM admin WHERE AdminEmail='$Email_Address' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      echo 'email';
    } else {
      $sql2 = "INSERT INTO admin(AdminName, AdminEmail, Phone, NIC, Password, Status) VALUES('$name','$Email_Address', '$Phone_Number','$pass','$status', '$nic')";
      $result2 = mysqli_query($conn, $sql2);
      if ($result2) {
        echo 'Created';

      } else {
        echo 'Error';
      }
    }
  }

  ///////////////////////////////////////////////////////////////////////////////////////////////////////////
//       view staff
///////////////////////////////////////////////////////////////////////////////////////////////////////////

  if ($_POST["action"] == "view_staff") {
    $query = "SELECT * FROM admin";
    $result = mysqli_query($conn, $query);
    $output = '
    <div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Admin Details
          <button  name="AdminAdd" class="btn btn-primary"data-toggle="modal" id="AdminAdd">Add New</button></h6>
        </div>
      
  
   


      
    <div class="table-responsive small">  
    <table class="table table-bordered" id="datatable122" width="100%" celllspacing="0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Admin Name</th>
        <th>Email</th>
        <th>Comntact Number</th>
        <th width="15%">Action</th>
      </tr>
    </thead>
   
    <tbody>
    ';
    while ($row = mysqli_fetch_array($result)) {
      $output .= '

        <tr>
        <td>' . $row["ID"] . '</td>
        <td>' . $row["AdminName"] . '</td>
        <td>' . $row["AdminEmail"] . '</td>
        <td>' . $row["A_Number"] . '</td>

        ';
      $status = $row['Status'];

      if ($status == 1) {
        $status1 = '<button type="button" class=" btn-success bt-xs super_admin" id="' . $row["ID"] . '" title="Super Admin"><i class="fas fa-shield-alt"></i></button>';
      } else
        if ($status !== 1) {
          $status1 = '<button type="button" class=" btn-secondary bt-xs admin_deactive" id="' . $row["ID"] . '" title="Other admins"><i class="fas fa-lock"></i></button>';
        } else
          if ($status == 10) {
            $status1 = '<button type="button" class=" btn-info bt-xs admin_active" id="' . $row["ID"] . '" title="Active"><i class="fas fa-unlock"></i></button>';
          }

      $output .= '

        <td>' . $status1 . '
       
        <button type="button" name="admin_update" class=" btn-success bt-xs admin_update" id="' . $row["ID"] . '" title="Edit"><i class="fa fa-edit"></i></button>
        <button type="button" name="admin_delete" class=" btn-danger bt-xs admin_delete" id="' . $row["ID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
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




  ///////////////////////////////////////////////////////////////////////////////////////////////////////////
//       view Donors
///////////////////////////////////////////////////////////////////////////////////////////////////////////

  if ($_POST["action"] == "view_donors") {
    $query = "SELECT * FROM donor";
    $result = mysqli_query($conn, $query);
    $output = '
    <div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Donor Details
          
        </div>
      
  
   


      
    <div class="table-responsive small">  
    <table class="table table-bordered" id="datatableviewDonor" width="100%" celllspacing="0">
    <thead>
      <tr>
        
        <th>Donor Name</th>
        <th>Email</th>
        <th>NIC</th>
        <th>Contact</th>
        <th>Height</th>
        <th>Weight</th>
        <th>B Group</th>
        <th width="15%">Action</th>
      </tr>
    </thead>
   
    <tbody>
    ';
    while ($row = mysqli_fetch_array($result)) {
      $output .= '

        <tr>
        
        <td>' . $row["donor_name"] . '</td>
        <td>' . $row["donor_nic"] . '</td>
        <td>' . $row["donor_email"] . '</td>
        <td>' . $row["donor_phone"] . '</td>
        <td>' . $row["donor_height"] . '</td>
        <td>' . $row["donor_weight"] . '</td>
        <td>' . $row["donor_bgroup"] . '</td>

        

        <td>
        <button type="button" class=" btn-primary bt-xs donorSend_email" id="' . $row["donor_id"] . '" title="mail"><i class="fas fa-envelope"></i></button>
    
        <button type="button" name="donor_delete" class=" btn-danger bt-xs donor_delete1" id="' . $row["donor_id"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
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



  ///////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Add Food Category
///////////////////////////////////////////////////////////////////////////////////////////////////////////
  if ($_POST["action"] == "Add_Food_Category_Form") {
    $output = '<div class="container">

      

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-8 col-md-8">

               
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                    

                                    <div class="form-floating sm-3 sm-3">
                                    <input type="text" class="form-control" id="fcategory" placeholder="Enter Category name" name="fcategory">
                                    <label for="fcategory">Food Category</label>
                                  </div>

                                  <div class="form-floating sm-3 sm-3" style="margin-top:15px;">
                                    <input type="textarea" class="form-control" id="fcdesc" placeholder="Enter Description" name="fcdesc">
                                    <label for="fcdesc">Description</label>
                                  </div>

                                  <div class="form-floating sm-3 sm-3" style="margin-top:15px;margin-bottom:15px;">
                                  <input type="number" name="timeFC" min = "1" max="10" class="form-control" id="timeFC">
                                  <label for="timeFC">Times per day</label>
                                    
                                  </div>
                                  
                                  
                          
                                  <input class = "btn btn-primary btn-user btn-block" type="submit" name = "" value = "Add" id = "addFCategory_confirm">
                                     
                
            </div>
          </div>
        </div>

</div>

  </div>
  ';
    echo $output;
  }


  if ($_POST["action"] == "addFCategory") {

    $fcategory = $_POST['fcategory'];
    $fcdesc = $_POST['fcdesc'];
    $timeFC = $_POST['timeFC'];



    $query = "INSERT INTO `food_category`(`f_categoryId`,`f_categoryName`, `f_categoryDesc`,`f_Status`) 
    VALUES ('$timeFC','$fcategory','$fcdesc','$timeFC')";

    if (mysqli_query($conn, $query)) {
      echo 'inserted';

    } else {
      echo 'Not_inserted';
    }

  }


  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // Food Categories
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


  if ($_POST["action"] == "View_food_Category") {
    $query = "SELECT * FROM food_category";
    $result = mysqli_query($conn, $query);
    $output = '
      <div class="container-fluid">
      <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">FOOD CATEGORY
            <button  name="FCAdd" class="btn btn-primary"data-toggle="modal" id="FCAdd">Add New</button></h6>
          </div>
        
    
     
  
  
        
      <div class="table-responsive small">  
      <table class="table table-bordered" id="datatableviewFC" width="100%" celllspacing="0">
      <thead>
        <tr>
         
          <th>Category</th>
          <th>Description</th>
          <th>Times per day</th>
          <th width="15%">Action</th>
        </tr>
      </thead>
     
      <tbody>
      ';
    while ($row = mysqli_fetch_array($result)) {
      $output .= '
  
          <tr>
         
          <td>' . $row["f_categoryName"] . '</td>
          <td>' . $row["f_categoryDesc"] . '</td>
          <td>' . $row["f_Status"] . '</td>
  
          
  
          <td>
         
          <button type="button" name="admin_update" class=" btn-success bt-xs fcat_update" id="' . $row["fcat_ID"] . '" title="Edit"><i class="fa fa-edit"></i></button>
          <button type="button" name="admin_delete" class=" btn-danger bt-xs FC_delete1" id="' . $row["fcat_ID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
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






  if ($_POST["action"] == "Fetch_Food_Bookings") {
    $output = '<div id="CalenderBody">
    <div id="Ccontainer">
      <div id="header">
        <div id="monthDisplay"></div>
        <div>
          <button id="backButton">Back</button>
          <button id="nextButton">Next</button>
        </div>
      </div>

      <div id="weekdays">
        <div>Sunday</div>
        <div>Monday</div>
        <div>Tuesday</div>
        <div>Wednesday</div>
        <div>Thursday</div>
        <div>Friday</div>
        <div>Saturday</div>
      </div>

      <div id="calendar"></div>
    </div>

      <div class="donationList">
        <div class="donationHeader row">
            <h4 class="col-lg-5">Filter Donation</h4>
            <select name="Filter_Donation" id="Filter_Donation" class="col-lg-5 form-control">
            ';

    $A_Status = $_SESSION['A_Status'];
    if ($A_Status == 1 || $A_Status == 0) {

      $output .= '
<option value="0">All Donations</option>
                <option value="1">Blood Donation</option>
                ';
    }

    if ($A_Status == 1 || $A_Status == 2) {
      $output .= '
                <option value="0">All Donations</option>
                <option value="2">Food Donation</option>
                ';
    }

    if ($A_Status == 1 || $A_Status == 3) {
      $output .= '
                <option value="0">All Donations</option>
                <option value="3">Entertainment</option>

                ';
    }

    if ($A_Status == 1 || $A_Status == 4) {
      $output .= '

                <option value="0">All Donations</option>
                <option value="4">Other Donation</option>
                ';
    }

    $output .= '
            </select>
        </div>

        <div class="donationListBody">
';

    $A_Status = $_SESSION['A_Status'];
    if ($A_Status == 1 || $A_Status == 0) {

      $output .= '
  <div id="event1">
          <div class="ListBodyTopic form-control">
            <div class="event1"></div>
            <h5 class="col-lg-5">Blood Donation</h5>
          </div>
          <div id="eventTable1"></div>
        </div>
      ';
    }

    if ($A_Status == 1 || $A_Status == 2) {
      $output .= '
  <div id="event2">
  <div class="ListBodyTopic form-control">
    <div class="event2"></div>
    <h5 class="col-lg-5">Food Donation</h5>
    <button name="view_all_food" style="background-color:orange" id="view_all_food"><i class="bi bi-aspect-ratio"></i></button>
  </div>
  <div id="eventTable2"></div>
</div>
';
    }

    if ($A_Status == 1 || $A_Status == 3) {
      $output .= '
  <div id="event3">
          <div class="ListBodyTopic form-control">
            <div class="event3"></div>
            <h5 class="col-lg-5">Entertainment</h5>
          </div>
          <div id="eventTable3"></div>
        </div>
';
    }

    if ($A_Status == 1 || $A_Status == 4) {
      $output .= '
  <div id="event4">
          <div class="ListBodyTopic form-control">
            <div class="event4"></div>
            <h5 class="col-lg-5">Other Donation</h5>
          </div>
          <div id="eventTable4"></div>
        </div>
';
    }

    $output .=
      '</div>
      </div>

    </div>
    
    <div id="Ccontainer">
    <h3>List of Wards</h3>
      <div id="calendar1">
      </div>
    </div>

    <div id="newEventModal">
      <h2>New Event</h2>

      <input id="eventTitleInput" placeholder="Event Title" />

      <button id="saveButton">Save</button>
      <button id="cancelButton">Cancel</button>
    </div>

    <div id="deleteEventModal">
      <h2>Event</h2>

      <p id="eventText"></p>

      <button id="deleteButton">Delete</button>
      <button id="closeButton">Close</button>
    </div>

    <div id="modalBackDrop"></div>
    ';
    echo $output;
  }

  if ($_POST["action"] == "Calender_fetch") {
    $A_Status = $_SESSION['A_Status'];

    $query = "SELECT * FROM events1 WHERE (Status = 1 or Status = 2) ";
    if ($A_Status == 0) {
      $query .= ' AND E_Type=0';

    }
    if ($A_Status == 2) {
      $query .= ' AND E_Type=2';

    }
    if ($A_Status == 3) {
      $query .= ' AND E_Type=3';

    }
    if ($A_Status == 4) {
      $query .= ' AND E_Type=4';

    }

    $result = mysqli_query($conn, $query);

    $DB_Arry = array();
    while ($row = mysqli_fetch_array($result)) {
      $DB_Arry[] = array(
        $DB_data[0] = $row['E_ID'],
        $DB_data[1] = $row['U_ID'],
        $DB_data[2] = $row['E_Type'],
        $DB_data[3] = $row['E_Date'],
        $DB_data[4] = $row['Status']
      );
    }
    echo json_encode($DB_Arry);

  }

  if ($_POST["action"] == "addEvent") {

    $ID = $_POST['E_ID'];
    $Date = $_POST['date'];
    $U_ID = $_POST['donor'];
    $E_Type = $_POST['event'];
    $W_Type = $_POST['ward'];

    $query = "INSERT INTO `events1`(`E_ID`,`U_ID`, `E_Type`, `W_ID`, `E_Date`, `Status`) 
    VALUES ('$ID','$U_ID','$E_Type','$W_Type','$Date','0')";

    if (mysqli_query($conn, $query)) {
      echo 'inserted';

    } else {
      echo 'Not_inserted';
    }

  }

  if ($_POST["action"] == "DeleteEvent") {

    $E_ID = $_POST['E_ID'];

    $query = "DELETE FROM events1 WHERE E_ID = '" . $_POST["E_ID"] . "'";
    if (mysqli_query($conn, $query)) {
      echo 'Delete';
    } else {
      echo 'Not Delete';
    }

  }

  if ($_POST["action"] == "filterEvents") {
    $A_Status = $_SESSION['A_Status'];
    $S_Date = $_POST['startOfMonthStr'];
    $E_Date = $_POST['endOfMonthStr'];
    $E_Type = $_POST['donationType'];


    $query = "SELECT * FROM events1 WHERE E_Date BETWEEN '$S_Date' AND '$E_Date' && E_Type = '$E_Type' && Status != 5";
    $result = mysqli_query($conn, $query);



    $output = '
    
      <div class="table-responsive small">  
            <table class="table table-bordered" id="eventTable' . $E_Type . '" width="100%" celllspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Contact Number</th>
                  <th>Date</th>

                  ';
    if ($E_Type >= 3) {
      $output .= '<th>Ward</th>
                    ';
    }
    $output .= '
                  


                  ';
    if ($E_Type == 3 || $E_Type == 2) {
      $output .= '<th>Feedback</th>
                    ';
    }
    $output .= '
      
      
                  ';
    if ($E_Type > 1) {
      $output .= '<th>Status</th>
                    ';
    }
    $output .= '
                  
                  
                  <th width="15%">Action</th>
                </tr>
              </thead>
              
              <tbody>
          ';
    while ($row = mysqli_fetch_array($result)) {

      $U_ID = $row["U_ID"];
      $W_ID = $row["W_ID"];
      $Status = $row["Status"];
      $feedback = $row["feedback"];
      $outputinner='';
      $query1 = "SELECT * FROM donor WHERE donor_id = '$U_ID'";
      $result1 = mysqli_query($conn, $query1);
      $outputinner .= '<tr> ';
      while ($row1 = mysqli_fetch_array($result1)) {
        $D_Name = $row1["donor_name"];
        $D_Contact = $row1["donor_phone"];



        $outputinner .= '

             


              <td>' . $D_Name . '</td>
              <td>' . $D_Contact . '</td>';
      }
      $outputinner .= '
              <td>' . $row["E_Date"] . '</td>


              ';
      if ($E_Type >= 3) {
        $outputinner .= '<td>' . $W_ID . '</td>
                    ';
      }
      $outputinner .= '
                  ';


      if ($E_Type == 3) {
        if ($A_Status == 0 && $Status < 2) {
          $outputinner .= '<td>
                ';
          if ($feedback == 0) {
            $outputinner .= 'Processing';
          } else if ($feedback == 1) {
            $outputinner .= 'Waiting for Director Approval';
          } else {
            $outputinner .= '' . $feedback . '';
          }
          $outputinner .= '
                </td>
                ';
        } else {
          $outputinner .= '<td>
                ';
          if ($feedback == 0) {
            $outputinner .= 'Processing';
          } else if ($feedback == 1 && $Status == 1) {
            $outputinner .= 'Admin Accepted';
          } else if ($feedback == 1 && $Status == 2) {
            $outputinner .= 'Can Proceed';
          } else {
            $outputinner .= '' . $feedback . '';
          }
          $outputinner .= '
                </td>
                ';
        }
      } else if ($E_Type == 2) {
        $outputinner .= '<td>
                ';
        if ($feedback == 0) {
          $outputinner .= 'Processing';
        } else if ($feedback == 1 && $Status == 2) {
          $outputinner .= 'Can Proceed';
        } else {
          $outputinner .= '' . $feedback . '';
        }
        $outputinner .= '
                </td>
                ';
      }



      if ($E_Type > 1) {
        $outputinner .= '<td>';
        if (($A_Status == 3 || $A_Status == 2 || $A_Status == 0 || $A_Status == 4) && $Status <= 2) {
          if ($Status == 0) {
            $outputinner .= '<button type="button" name="event_Deactive" class=" btn-primary bt-xs event_Deactive" id="' . $row["ID"] . '" title="Deactive">Active</button>
                  <button type="button" name="event_view" class=" btn-warning bt-xs event_view" id="' . $row["ID"] . '" title="View">View</button>
                  <button type="button" name="event_Reject_Model" class=" btn-warning bt-xs event_Reject_Model" id="' . $row["ID"] . '" title="Reject">Reject</button>';

          } else if ($feedback == 1 && $Status == 1) {
            // $output .= '<button type="button" name="event_Active" class=" btn-success bt-xs event_Active" id="' . $row["ID"] . '" title="Active">Active</button></td>';
            $outputinner .= 'Waiting for Super Admin Approvel';
          } else if ($feedback == 1 && $Status == 2) {
            // $output .= '<button type="button" name="event_Active" class=" btn-success bt-xs event_Active" id="' . $row["ID"] . '" title="Active">Active</button></td>';
            $outputinner .= 'Received Approval';
          } else if ($Status == 2) {
            // $output .= '<button type="button" name="event_Active" class=" btn-success bt-xs event_Active" id="' . $row["ID"] . '" title="Active">Active</button></td>';
            $outputinner .= 'Approved';
          } else {
            $outputinner .= 'Rejected';
          }
        } else {
          if ($Status == 1) {
            $outputinner .= '<button data-admintype="super" type="button" name="event_Deactive" class=" btn-danger bt-xs event_Deactive" id="' . $row["ID"] . '" title="Deactive">Deactive</button>
                <button type="button" name="Sevent_Reject_Model" class=" btn-warning bt-xs Sevent_Reject_Model" id="' . $row["ID"] . '" title="Reject">Reject</button>';

          } else if ($Status == 2) {
            // $output .= '<button type="button" name="Sevent_Active" class=" btn-success bt-xs Sevent_Active" id="' . $row["ID"] . '" title="Active">Active</button></td>';
            $outputinner .= 'Received Approval';
          } else if ($Status == 3) {
            $outputinner .= 'Rejected';
          }
        }
        $outputinner .= '';
      }

      if ($E_Type == 2) {
        $outputinner .=

          '<td>
       <button type="button" name="event_view1" class=" btn-success bt-xs event_view1" id="' . $row["ID"] . '" title="Edit"><i class="fa fa-edit"></i></button>
       <button type="button" name="event_delete" class=" btn-danger bt-xs event_delete" id="' . $row["ID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button>
       <button type="button" name="event_doneF" class=" btn-warning bt-xs event_doneF" id="' . $row["ID"] . '" title="Edit"><i class="bi bi-check-square-fill"></i></button>
       </td>
       
       </tr>
     ';
      }
      if ($E_Type == 0) {
        $outputinner .=

          '<td>
       <button type="button" name="eventBlood_view1" class=" btn-success bt-xs eventBlood_view1" id="' . $row["ID"] . '" title="Edit"><i class="fa fa-edit"></i></button>
       <button type="button" name="event_delete" class=" btn-danger bt-xs event_delete" id="' . $row["ID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button>
       <button type="button" name="event_doneB" class=" btn-warning bt-xs event_doneB" id="' . $row["ID"] . '" title="Closed"><i class="bi bi-check-square-fill"></i></button></td>
       
       </tr>
     ';
      } else if ($E_Type == 3) {
        $outputinner .=

          '<td>
          <button type="button" name="eventEntertainment_view1" class=" btn-success bt-xs eventEntertainment_view1" id="' . $row["ID"] . '" title="Edit"><i class="fa fa-edit"></i></button>
          <button type="button" name="event_delete" class=" btn-danger bt-xs event_delete" id="' . $row["ID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button>
          <button type="button" name="event_doneentertain" class=" btn-warning bt-xs event_doneentertain" id="' . $row["ID"] . '" title="Closed"><i class="bi bi-check-square-fill"></i></button></td>
       
          </tr>
        ';
      } else if ($E_Type == 4) {
        $outputinner .=

          '<td>
      <button type="button" name="eventGeneral_view1" class=" btn-success bt-xs eventGeneral_view1" id="' . $row["ID"] . '" title="Edit"><i class="fa fa-edit"></i></button>
      <button type="button" name="event_delete" class=" btn-danger bt-xs event_delete" id="' . $row["ID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button>
      <button type="button" name="event_doneOther" class=" btn-warning bt-xs event_doneOther" id="' . $row["ID"] . '" title="Closed"><i class="bi bi-check-square-fill"></i></button></td>
       
      </tr>
    ';
      }




      if ($A_Status == 1 && $E_Type == 3 && $Status == 0) {
        $outputinner = "";
      }
      if ($A_Status == 1 && $E_Type == 2 && $Status == 0) {
       
        $outputinner = "";
      }
      if ($A_Status == 1 && $E_Type == 4 && $Status == 0) {
        $outputinner = "";
      }

      $output .=$outputinner;
    }
    $output .= '</tbody>
        </table>
        </div>';

    if ($A_Status == 0 && $E_Type != 0) {
      $output = "<div></div>";
    }


    echo $output;
  }

  if ($_POST["action"] == "event_update") {

    $E_ID = $_POST['E_ID'];
    $query = "SELECT * FROM events1 WHERE E_ID ='$E_ID'";
    $result = mysqli_query($conn, $query);
    $D_Name = "";

    while ($row = mysqli_fetch_array($result)) {

      $data[0] = $row['E_ID'];
      $data[1] = $row['U_ID'];
      $data[2] = $row['E_Date'];

      // $U_ID = $row["U_ID"];
      // $query1 = "SELECT * FROM donor WHERE donor_id = '$U_ID'";
      // $result1 = mysqli_query($conn, $query1);
      // while ($row1 = mysqli_fetch_array($result1)) {
      //   $D_Name =  $row1["donor_name"];
      // }

      // $data[3]=$D_Name ;
      $data[3] = $row['E_Type'];
      $data[4] = $row['W_ID'];

    }
    echo json_encode($data);
  }

  if ($_POST["action"] == "Update_Event") {

    $E_ID = $_POST['E_ID'];
    $U_ID = $_POST['U_ID'];
    $E_Date = $_POST['E_Date'];
    $E_Type = $_POST['E_Type'];
    $W_Type = $_POST['ward'];

    $date = new DateTime($E_Date);
    $formattedDate = $date->format('n/j/Y');

    $query = "UPDATE `events1` SET U_ID='$U_ID',E_Type='$E_Type',W_ID='$W_Type',E_Date='$formattedDate' WHERE E_ID='$E_ID' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {

      echo 'Updated';

    } else {
      echo 'Not Updated';
    }
  }

  if ($_POST["action"] == "event_Deactive") {

    $isSuperAdmin = $_POST['isSuperAdmin'];
    $E_ID = $_POST['E_ID'];

    $count = 0;
    $select_query = "SELECT E_Type FROM events1 WHERE ID=$E_ID";

    $result = mysqli_query($conn, $select_query);
    $event_type = -1;
    while ($row1 = mysqli_fetch_array($result)) {
      $event_type = $row1['E_Type'];

    }

    $new_status = 2;

    if ($event_type == 3 && $isSuperAdmin != 'true') {
      $new_status = 1;
    }


    $query = "UPDATE `events1` SET Status='$new_status' , feedback='1' WHERE ID='$E_ID' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {

      echo 'Updated';

    } else {
      echo 'Not Updated';
    }


  }

  if ($_POST["action"] == "Blood_count_check") {

    $E_Type = 1;
    $Date2;
    $count1 = 0;
    $count2 = 0;
    $count3 = 0;
    $count4 = 0;
    $count5 = 0;
    $count6 = 0;

    $Time1 = 1;
    $Time2 = 2;
    $Time3 = 3;
    $Time4 = 4;
    $Time5 = 5;
    $Time6 = 6;

    $query1 = "SELECT * FROM `blood_donation` INNER JOIN events1 ON events1.E_ID = blood_donation.ID WHERE events1.Status=1 AND events1.E_Type=$E_Type ORDER BY `events1`.`E_Date` ASC";
    $result1 = mysqli_query($conn, $query1);
    while ($row1 = mysqli_fetch_array($result1)) {

      $Date = $row1["E_Date"];
      $Time = $row1["Time"];

      if ($Date == $Date2) {
        if ($Time1 == $Time) {
          $count1 = $count1 + 1;
        } else
          if ($Time2 == $Time) {
            $count2 = $count2 + 1;
          } else
            if ($Time3 == $Time) {
              $count3 = $count3 + 1;
            } else
              if ($Time4 == $Time) {
                $count4 = $count4 + 1;
              } else
                if ($Time5 == $Time) {
                  $count5 = $count5 + 1;
                } else
                  if ($Time6 == $Time) {
                    $count6 = $count6 + 1;
                  }
      } else {
        $Date2 = $Date;
        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
        $count4 = 0;
        $count5 = 0;
        $count6 = 0;
      }

      if ($count1 >= 5) {
        $query = "UPDATE `events1` SET Status='Please Select Another Date' WHERE E_Type='$E_Type' AND Status='0' AND E_Date='$Date'";
        $query_run = mysqli_query($conn, $query);

      } else
        if ($count2 >= 5) {
          $query = "UPDATE `events1` SET Status='Please Select Another Date' WHERE E_Type='$E_Type' AND Status='0' AND E_Date='$Date'";
          $query_run = mysqli_query($conn, $query);

        } else
          if ($count3 >= 5) {
            $query = "UPDATE `events1` SET Status='Please Select Another Date' WHERE E_Type='$E_Type' AND Status='0' AND E_Date='$Date'";
            $query_run = mysqli_query($conn, $query);

          } else
            if ($count4 >= 5) {
              $query = "UPDATE `events1` SET Status='Please Select Another Date' WHERE E_Type='$E_Type' AND Status='0' AND E_Date='$Date'";
              $query_run = mysqli_query($conn, $query);

            } else
              if ($count5 >= 5) {
                $query = "UPDATE `events1` SET Status='Please Select Another Date' WHERE E_Type='$E_Type' AND Status='0' AND E_Date='$Date'";
                $query_run = mysqli_query($conn, $query);

              } else
                if ($count6 >= 5) {
                  $query = "UPDATE `events1` SET Status='Please Select Another Date' WHERE E_Type='$E_Type' AND Status='0' AND E_Date='$Date'";
                  $query_run = mysqli_query($conn, $query);

                }
    }



  }

  if ($_POST["action"] == "event_Active") {

    $E_ID = $_POST['E_ID'];
    $query = "UPDATE `events1` SET Status='0' , feedback='0' WHERE E_ID='$E_ID' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {

      echo 'Updated';

    } else {
      echo 'Not Updated';
    }
  }

  if ($_POST["action"] == "fetch_word") {

    $S_Date = $_POST['startOfMonthStr'];
    $E_Date = $_POST['endOfMonthStr'];
    $E_Type = $_POST['donationType'];

    $output = '';
    $query1 = "SELECT * FROM wards";
    $result1 = mysqli_query($conn, $query1);

    while ($row1 = mysqli_fetch_array($result1)) {
      $Number = $row1["W_ID"];

      $output .= '
                <div class="day">
                ' . $Number . '';

      if ($E_Type == 0) {
        // Get Last Date
        $query2 = "SELECT * FROM events1 WHERE W_ID = '$Number' AND Status =5 ORDER BY E_Date desc";
        $query2 = mysqli_query($conn, $query2);

        if ($row2 = mysqli_fetch_array($query2)) {

          $output .= '<div class="date"> ' . $row2["E_Date"] . '</div>';

        }

        // Get Count
        $query3 = "SELECT * FROM events1 WHERE E_Date BETWEEN '$S_Date' AND '$E_Date' && W_ID = '$Number' AND Status =5";
        $query3 = mysqli_query($conn, $query3);

        $count = mysqli_num_rows($query3);

        if ($count == 0) {
          $output .= '<div class="counnt"></div>';
        } else {
          $output .= '<div class="counnt">' . mysqli_num_rows($query3) . '</div>';
        }
      } else if ($E_Type == 4) {
        // Get Last Date
        $query2 = "SELECT * FROM events1 WHERE E_Type = '$E_Type' && W_ID = '$Number' ORDER BY E_Date desc";
        $query2 = mysqli_query($conn, $query2);

        if ($row2 = mysqli_fetch_array($query2)) {

          $output .= '<div class="date"> ' . $row2["E_Date"] . '</div>';

        }

        // Get Count
        $query3 = "SELECT * FROM events1 WHERE E_Date BETWEEN '$S_Date' AND '$E_Date' && E_Type = '$E_Type' && W_ID = '$Number'";
        $query3 = mysqli_query($conn, $query3);

        $count = mysqli_num_rows($query3);

        if ($count == 0) {
          $output .= '<div class="counnt"></div>';
        } else {
          $output .= '<div class="counnt">' . mysqli_num_rows($query3) . '</div>';
        }
      }

      $output .= '
              </div>
          ';

    }

    echo $output;
  }


  if ($_POST["action"] == "get_admin_update") {

    $AID = $_POST['UserID'];
    $query = "SELECT * FROM admin WHERE ID ='$AID'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {

      $User_data[0] = $row['ID'];
      $User_data[1] = $row['AdminName'];
      $User_data[2] = $row['AdminEmail'];
      $User_data[3] = $row['A_Number'];


    }
    echo json_encode($User_data);
  }


  if ($_POST["action"] == "event_Reject_Model_Submit") {

    $Astatus = $_SESSION['A_Status'];
    $Aid = $_SESSION['A_ID'];
    $ID = $_POST["ER_ID"];
    $rejectFeedEnter = $_POST["rejectFeedEnter"];

    $date = date('Y-m-d');
    $alert = "Admin $Aid Reject This Event $ID - Reason - $rejectFeedEnter";
    $status = "2";

    if ($Astatus > 0) {

      $query = "UPDATE events1 SET Status='3', feedBack='$rejectFeedEnter'
    WHERE ID= '$ID'";

      if (mysqli_query($conn, $query)) {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if (mysqli_query($conn, $query)) {
          echo 'insert';
        }


      } else {
        echo 'not_insert';
      }
    } else {
      echo 'admin';
    }

  }



























  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////// chat_bot
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////


  if ($_POST["action"] == "chat_bot") {
    $query = "SELECT * FROM donor";
    $result = mysqli_query($conn, $query);
    $output = '
      <div class="table-responsive small">  
      <table class="table table-bordered" id="datatable1" width="100%" celllspacing="0">
        <thead>
          <tr>
            <th>Donor Name</th>
            <th>Donor NIC</th>
            <th>Donor Email</th>
            <th>Donor Phone</th>
            <th>Donor Height</th>
            <th>Donor Weight</th>
            <th>Blood Group</th>
            <th width="15%">Action</th>
          </tr>
        </thead>
       
        <tbody>
          ';
    while ($row = mysqli_fetch_array($result)) {
      $output .= '

              <tr>
              <td>' . $row["donor_name"] . '</td>
              <td>' . $row["donor_nic"] . '</td>
              <td>' . $row["donor_email"] . '</td>
              <td>' . $row["donor_phone"] . '</td>
              <td>' . $row["donor_height"] . '</td>
              <td>' . $row["donor_weight"] . '</td>
              <td>' . $row["donor_bgroup"] . '</td>
          <td>
          <button type="button" name="admin_update" class=" btn-success bt-xs admin_update" id="' . $row["donor_name"] . '" title="Edit"><i class="fa fa-edit"></i></button>
          <button type="button" name="admin_delete" class=" btn-danger bt-xs admin_delete" id="' . $row["donor_name"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
          </tr>
        ';
    }
    $output .= '</tbody>
        </table>
        </div>';
    echo $output;

  }


  // ============================================== CHAT-BOT FETCH =============================================================
  if ($_POST["action"] == "fetch_chat_bot") {
    $query = "SELECT * FROM chat_bot ORDER BY ID desc";
    $result = mysqli_query($conn, $query);
    $output = '
  <div class="table-responsive small">
      <table class="table table-bordered" id="datatable12" width="100%" celllspacing="0" style="font-size: 12px;">
        <thead>
          <tr>
            <th>Questions</th>
            <th>Answers</th>
            <th width="15%">Action</th>
          </tr>
        </thead>
        <tbody>
  ';
    while ($row = mysqli_fetch_array($result)) {
      $output .= '

      <tr>
      
      <td>' . $row["Questions"] . '</td>
      <td>' . $row["Answers"] . '</td>

      <td  style="text-align: center;">
      <button type="button" class=" btn-success bt-xs bot_edit" id="' . $row["ID"] . '" title="Edit"><i class="fas fa-edit"></i></button>
      <button type="button" class=" btn-danger bt-xs bot_delete" id="' . $row["ID"] . '" title="Delete"><i class="fas fa-trash"></i></button>
      </td>
      </tr>
  ';
    }
    $output .= '</tbody>
  </table>
  </div>';
    echo $output;
  }

  // =================================================== Chat-Bot QA ======================================================================
  if ($_POST["action"] == "chat_bot_QA_add") {

    $Quection = $_POST["CB_Quection"];
    $Answer = $_POST["CB_Answer"];

    $date = date('Y-m-d');
    $alert = "New Chat-Bot Quection & Answer Insert Into Database - $Quection - $Answer";
    $status = "2";

    $query = "INSERT INTO chat_bot (Questions, Answers)
  VALUES ('$Quection','$Answer')";

    if (mysqli_query($conn, $query)) {
      $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
      if (mysqli_query($conn, $query)) {
        echo 'insert';
      }


    } else {
      echo 'not_insert';
    }
  }

  // ============================================== Chat-Bot QA EDIT =========================================================================
  if ($_POST["action"] == "chat_bot_QA_edit") {

    $ID = $_POST["QA_ID"];
    $quection = $_POST["CB_Quection_edit"];
    $answer = $_POST["CB_Answer_edit"];


    $date = date('Y-m-d');
    $alert = "Chat-Bot Quection & Answer Updated";
    $status = "2";

    $query = "UPDATE chat_bot SET Questions='$quection', Answers='$answer'
  WHERE ID= '" . $_POST["QA_ID"] . "'";

    if (mysqli_query($conn, $query)) {
      $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
      if (mysqli_query($conn, $query)) {
        echo 'update';
      }


    } else {
      echo 'not_update';
    }
  }
  // ======================================================= Fetch Chat-Bot Edit Data ==============================================================
  if ($_POST["action"] == "bot_edit_value") {

    $ID = $_POST['UserID'];
    $query = "SELECT * FROM chat_bot WHERE ID ='$ID'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {


      $User_data[0] = $row['ID'];
      $User_data[1] = $row['Questions'];
      $User_data[2] = $row['Answers'];



    }
    echo json_encode($User_data);
  }

  // ============================================== CHAT-BOT DATA DELETE ==============================================
  if ($_POST["action"] == "bot_delete") {
    $date = date('Y-m-d');
    $alert = "Chat-Bot Quection & Answer Deleted";
    $status = "2";

    $query = "DELETE FROM chat_bot WHERE ID = '" . $_POST["TravelID"] . "'";
    if (mysqli_query($conn, $query)) {
      $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
      if (mysqli_query($conn, $query)) {
        echo 'delete';
      }

    } else {
      echo 'not_delete';
    }
  }


  ///////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Chat bot
///////////////////////////////////////////////////////////////////////////////////////////////////////////

  if ($_POST["action"] == "chat_bot2") {
    $query = "SELECT * FROM chat_bot ORDER BY ID desc";
    $result = mysqli_query($conn, $query);
    $output = '
  <div class="card shadow mb-4">
  <div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary">Chat-Bot Settings
  <button  name="Bot_Add" class="btn btn-primary"data-toggle="modal" id="Bot_Add">Add New</button></h6>
</div>
<div class="card-body" id="bot_chat_data" style="height: 70vh; overflow-y: scroll;">


<div class="table-responsive small">
<table class="table table-bordered" id="datatablechat" width="100%" celllspacing="0" style="font-size: 12px;">
  <thead>
    <tr>
      <th>Questions</th>
      <th>Answers</th>
      <th width="15%">Action</th>
    </tr>
  </thead>
  <tbody>
';
    while ($row = mysqli_fetch_array($result)) {
      $output .= '

<tr>

<td>' . $row["Questions"] . '</td>
<td>' . $row["Answers"] . '</td>

<td  style="text-align: center;">
<button type="button" class=" btn-success bt-xs bot_edit" id="' . $row["ID"] . '" title="Edit"><i class="fas fa-edit"></i></button>
<button type="button" class=" btn-danger bt-xs bot_delete" id="' . $row["ID"] . '" title="Delete"><i class="fas fa-trash"></i></button>
</td>
</tr>
';
    }
    $output .= '</tbody>
</table>
</div>
</div>';
    echo $output;
  }
  // ------------------------------------blood cancel after 5------------------------------------------------
  if ($_POST["action"] == "Blood_count_check") {

    $E_Type = 1;
    $Date2;
    $count = 0;

    $query1 = "SELECT * FROM `blood_donation` INNER JOIN events1 ON events1.E_ID = blood_donation.ID WHERE events1.Status=1 AND events1.E_Type=$E_Type";
    $result1 = mysqli_query($conn, $query1);
    while ($row1 = mysqli_fetch_array($result1)) {

      $Date = $row1["E_Date"];

      if ($Date == $Date2) {
        $count = $count + 1;
      } else {
        $Date2 = $Date;
        $count = 0;
      }

      if ($count >= 5) {
        $query = "UPDATE `events1` SET Status='Please Select Another Date' WHERE E_Type='$E_Type' AND Status='0' AND E_Date='$Date'";
        $query_run = mysqli_query($conn, $query);

      }
    }






    // ============================================== ADMIN FETCH==============================================
    if ($_POST["action"] == "admin_fetch") {
      $query = "SELECT * FROM admin";
      $result = mysqli_query($conn, $query);
      $output = '
    <div class="table-responsive small">  
    <table class="table table-bordered" id="datatable122" width="100%" celllspacing="0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Admin Name</th>
        <th>Email</th>
        <th>Comntact Number</th>
        <th width="15%">Action</th>
      </tr>
    </thead>
    <tfoot>
    <tr>
        <th>ID</th>
        <th>Admin Name</th>
        <th>Email</th>
        <th>Comntact Number</th>
        <th width="15%">Action</th>
    </tr>
</tfoot>
    <tbody>
    ';
      while ($row = mysqli_fetch_array($result)) {
        $output .= '

        <tr>
        <td>' . $row["A_ID"] . '</td>
        <td>' . $row["A_Name"] . '</td>
        <td>' . $row["A_Email"] . '</td>
        <td>' . $row["A_Number"] . '</td>

        ';
        $status = $row['A_Status'];

        if ($status == 2) {
          $status1 = '<button type="button" class=" btn-success bt-xs super_admin" id="' . $row["A_ID"] . '" title="Super Admin"><i class="fas fa-shield-alt"></i></button>';
        } else
          if ($status == 0) {
            $status1 = '<button type="button" class=" btn-secondary bt-xs admin_deactive" id="' . $row["A_ID"] . '" title="Deactive"><i class="fas fa-lock"></i></button>';
          } else
            if ($status == 1) {
              $status1 = '<button type="button" class=" btn-info bt-xs admin_active" id="' . $row["A_ID"] . '" title="Active"><i class="fas fa-unlock"></i></button>';
            }

        $output .= '

        <td>' . $status1 . '
        <button type="button" name="admin_update" class=" btn-success bt-xs admin_update" id="' . $row["A_ID"] . '" title="Edit"><i class="fa fa-edit"></i></button>
        <button type="button" name="admin_delete" class=" btn-danger bt-xs admin_delete" id="' . $row["A_ID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
        </tr>
    ';
      }
      $output .= '</tbody>
    </table>
    </div>';
      echo $output;
    }


  }


  // ============================================== Admin INSERT ==============================================
  if ($_POST["action"] == "admin_insert") {
    $name = $_POST['add_Name'];
    $Email_Address = $_POST['add_Email'];
    $Phone_Number = $_POST['add_Number'];
    $pass1 = $_POST['add_Password'];
    $pass = md5($pass1);


    $sql = "SELECT * FROM admin WHERE AdminEmail='$Email_Address' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      echo 'email';
      exit();

    } else {
      $sql2 = "INSERT INTO admin(AdminName, Password, AdminEmail, A_Number) VALUES('$name','$pass','$Email_Address', '$Phone_Number')";
      $result2 = mysqli_query($conn, $sql2);
      if ($result2) {
        echo 'Created';
        exit();

      } else {
        echo 'Error';
        exit();

      }
    }

  }


  // ============================================== ADMIN DELETE ==============================================
  if ($_POST["action"] == "admin_delete") {
    $aid = $_POST['UserID'];
    $pass1 = $_POST['password'];
    $pass = md5($pass1);

    $date = date('Y-m-d');
    $alert = "Admin Account Deleted";
    $status = "2";


    $sql = "SELECT * FROM admin WHERE ID='$aid' AND Password='$pass'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);

      if ($row['Status'] == 1) {
        echo 'cant';
        exit();
      } else
        if ($row['Status'] != 1) {
          if ($row['Password'] === $pass) {

            $admin = $row['AdminName'];

            $query = "DELETE FROM admin WHERE ID='$aid' ";
            $query_run = mysqli_query($conn, $query);

            if ($query_run) {

              $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$admin $alert','$status')";
              if (mysqli_query($conn, $query)) {
                echo 'Deleted';
              }

            } else {
              echo 'NotDelete';
            }
          }
          exit();
        }
    } else {
      echo "Password";
      exit();
    }
  }
  // 
  if ($_POST["action"] == "get_admin_delete") {

    $AID = $_POST['UserID'];
    $query = "SELECT * FROM admin WHERE ID ='$AID'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {

      $User_data[0] = $row['ID'];
      $User_data[1] = $row['AdminName'];


    }
    echo json_encode($User_data);
  }


  // ============================================== ADMIN EDIT ==============================================
  if ($_POST["action"] == "admin_update") {
    $aid = $_POST['edit_ID'];
    $name = $_POST['edit_Name'];
    $Email_Address = $_POST['edit_Email'];
    $Phone_Number = $_POST['edit_Number'];
    $pass1 = $_POST['edit_Password'];

    $pass = md5($pass1);

    $date = date('Y-m-d');
    $alert = "Admin Account Updated";
    $status = "2";

    $sql = "SELECT * FROM admin WHERE ID='$aid' AND Password='$pass'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if ($row['Password'] === $pass) {

        $a_name = $row['AdminName'];

        $query = "UPDATE admin SET AdminName='$name',Password='$pass',AdminEmail='$Email_Address',A_Number='$Phone_Number' WHERE ID='$aid' ";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {

          $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$a_name $alert','$status')";
          if (mysqli_query($conn, $query)) {
            echo 'Updated';
          }

        } else {
          echo 'NotUpdated';
        }
      }
      exit();
    } else {
      echo 'Password';
      exit();
    }
  }

  // ============================================== DONOR DELETE ==============================================




  if ($_POST["action"] == "donor_delete1") {
    $date = date('Y-m-d');
    $alert = "Package Overview Deleted";
    $status = "2";

    $query = "DELETE FROM donor WHERE donor_id = '" . $_POST["TravelID"] . "'";
    if (mysqli_query($conn, $query)) {
      $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
      if (mysqli_query($conn, $query)) {
        echo 'Package Overview Deleted from Database';
      }

    }
  }

  //////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////Add General Item
//////////////////////////////////////////////////////////////////////////////////////////////

  if ($_POST["action"] == "Add_General_Item_Form") {
    $output = '<div class="container">

    

      <!-- Outer Row -->
      <div class="row justify-content-center">

          <div class="col-xl-8 col-lg-8 col-md-8">

            <div class="row">
                                        
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                    

                  <div class="form-group">
          
            <select name="itemdonationtype" id="itemdonationtype" class="form-control">
            <option value="0">Select item type</option>
            <option value="1">General Items</option>
            <option value="2">General Food Items</option>         
            </select>
          </div>

                  <div class="form-floating sm-3 sm-3" style="margin-top:15px;">
                    <input type="text" class="form-control" id="fcdesc" placeholder="Enter Description" name="fcdesc">
                    <label for="fcdesc">Item</label>
                  </div>
                  

                  <input class = "btn btn-primary btn-user btn-block" type="submit" name = "" value = "Add" id = "addFCategory_confirm">
                    

            </div>
            </div>
            </div>

</div>

</div>
';
    echo $output;
  }


  if ($_POST["action"] == "addgeneral_Item") {

    $fcategory = $_POST['fcategory'];
    $fcdesc = $_POST['fcdesc'];


    $query = "INSERT INTO `food_category`(`f_categoryName`, `f_categoryDesc`) 
  VALUES ('$fcategory','$fcdesc')";

    if (mysqli_query($conn, $query)) {
      echo 'inserted';

    } else {
      echo 'Not_inserted';
    }

  }


  // ======================================================= Reject entertainment ==============================================================
  if ($_POST["action"] == "enter_rejection") {
    $ID = $_POST["QA_ID"];
    $rejectFeedEnter = $_POST["rejectFeedEnter"];
    $Aid = $_SESSION['A_ID'];

    $date = date('Y-m-d');
    $alert = "Rejected a enterainment Activity - $rejectFeedEnter ";
    $status = "2";

    $query = "INSERT INTO rejections (A_ID,comment)
  VALUES ('$Aid', '$rejectFeedEnter')";

    if (mysqli_query($conn, $query)) {
      $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
      if (mysqli_query($conn, $query)) {
        echo 'insert';
      }


    } else {
      echo 'not_insert';
    }
  }

  // ======================================================= Add Donor ==============================================================

  if ($_POST["action"] == "Book_Time1") {



    $output = '
    <div class="container-fluid">
    <div class="card shadow mb-4">
     
      <div class="card-body justify-content-center row" id="" >
        <div class="col-md-6">

          <div class="form-group">
              <label>Name</label>
              <input type="text" name="BDonor_Name" id="BDonor_Name" class="form-control" placeholder="Please Enter Blood Donor Name">
          </div>

          <div class="form-group">
              <label>Email</label>
              <input type="text" name="BDonor_Email" id="BDonor_Email" class="form-control " placeholder="Please Enter Blood Donor Email" >
          </div>

          <div class="form-group">
              <label>Contact Number</label>
              <input type="text" name="BDonor_Contact" id="BDonor_Contact" class="form-control " placeholder="Please Enter Blood Donor Contact Number" >
          </div>

          <div class="form-group">
              <label>Whight</label>
              <input type="text" name="BDonor_Whight" id="BDonor_Whight" class="form-control " placeholder="Please Enter Blood Donor Whight" >
          </div>

          <div class="form-group">
              <label>Hight</label>
              <input type="text" name="BDonor_Hight" id="BDonor_Hight" class="form-control " placeholder="Please Enter Blood Donor Hight">
          </div>

          <div class="form-group">
              <label>Blood Group</label>
              <input type="text" name="BBlood_group" id="BBlood_group" class="form-control " placeholder="Please Enter Blood Group" >
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
              <input type="text" name="" id="Donor_nic" class="form-control " placeholder="Please Enter Blood Group">
          </div>

          <div class="form-group">
              <label>DOB</label>
              <input type="text" name="" id="D_DOB" class="form-control " placeholder="Please Enter Blood Group">
          </div>

          <div class="form-group">
          <input type="radio" id="U_Female" name="U_Gender">
          <label for="">Female</label>
          <input type="radio" id="U_Male" name="U_Gender">
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

          <div class="form-group">
          <label for="vehicle"> Is there any inconvinionce when donate before?</label>
          <input type="radio" id="Inconvinionce_Y" name="inconvinionce1">
            <label for="">Yes</label>
            <input type="radio" id="Inconvinionce_N" name="inconvinionce1">
            <label for="">No</label>
          </div>

          <div class="form-group">
              <label>If yes what happened?</label>
              <input type="text" name="" id="Inconvinionce_D" class="form-control " placeholder="Please Enter Inconvinionce">
          </div>

          <div class="form-group">
              <label>Have you receive advice not to donate blood?</label>
              <input type="radio" id="Advice_Y" name="Advice1">
                <label for="">Yes</label>
                <input type="radio" id="Advice_N" name="Advice1">
                <label for="">No</label>
          </div>

          <div class="form-group">
              <label>Have you read and understand the instructions given before?</label>
              <input type="radio" id="Instructions_Y" name="Instructions1">
          <label for="">Yes</label>
          <input type="radio" id="Instructions_N" name="Instructions1">
          <label for="">No</label>
          </div>

          <div class="form-group">
          <label for="vehicle"> Are you comfortable to donate blood?</label>
          <input type="radio" id="Comfortable_Y" name="Comfortable1">
          <label for="">Yes</label>
          <input type="radio" id="Comfortable_N" name="Comfortable1">
          <label for="">No</label>
          </div>

          <div class="form-group">
          <label for="vehicle"> Do you have or had these deceases?</label></br>
          <input type="checkbox" id="Deceases_1" >
          <label for=""> Heart Attack</label>
          <input type="checkbox" id="Deceases_2" >
          <label for=""> Diabetic</label>
          <input type="checkbox" id="Deceases_3" >
          <label for=""> Fits</label>
          <input type="checkbox" id="Deceases_4" >
          <label for=""> Paralysis</label>
          <input type="checkbox" id="Deceases_5" >
          <label for=""> Lung disease</label></br>
          <input type="checkbox" id="Deceases_6" >
          <label for=""> Liver disease</label>
          <input type="checkbox" id="Deceases_7" >
          <label for=""> Kidney disease</label>
          <input type="checkbox" id="Deceases_8" >
          <label for=""> Blood disease</label>
          <input type="checkbox" id="Deceases_9" >
          <label for=""> Cancer</label>
          </div>

          <div class="form-group">
          <label for="vehicle"> Are you getting any medicine?</label>
          <input type="radio" id="Medicine_Y" name="Medicine1">
          <label for="">Yes</label>
          <input type="radio" id="Medicine_N" name="Medicine1">
          <label for="">No</label>
          </div>

          <div class="form-group">
          <label for="vehicle"> Have you faced any surgery?</label>
          <input type="radio" id="Surgery_Y" name="Surgery1">
          <label for="">Yes</label>
          <input type="radio" id="Surgery_N" name="Surgery1">
          <label for="">No</label>
          </div>

          <div class="form-group">
          <label for="vehicle"> Are you Pregnant or Postpartum?</label>
          <input type="radio" id="Pregnant_Y" name="Pregnant1">
          <label for="">Yes</label>
          <input type="radio" id="Pregnant_N" name="Pregnant1">
          <label for="">No</label>
          </div>

          <div class="form-group">
          <label for="vehicle"> Do you faced for hepatitis?</label>
          <input type="radio" id="Hepatitis_Y" name="Hepatitis1">
          <label for="">Yes</label>
          <input type="radio" id="Hepatitis_N" name="Hepatitis1">
          <label for="">No</label>
          </div>

          <div class="form-group">
          <label for="vehicle"> Did you abuse from Typhoid last 2 years?</label>
          <input type="radio" id="Typhoid_Y" name="Typhoid1">
          <label for="">Yes</label>
          <input type="radio" id="Typhoid_N" name="Typhoid1">
          <label for="">No</label>
          </div>

          <div class="form-group">
          <label for="vehicle"> Did you suffered from dengue last 6 months?</label>
          <input type="radio" id="Dengue_Y" name="Dengue1">
          <label for="">Yes</label>
          <input type="radio" id="Dengue_N" name="Dengue1">
          <label for="">No</label>
          </div>

          <div class="form-group">
          <label for="vehicle"> Did you suffered from fever last week?</label>
          <input type="radio" id="Fever_Y" name="Fever1">
          <label for="">Yes</label>
          <input type="radio" id="Fever_N" name="Fever1">
          <label for="">No</label>
          </div>

          <div class="form-group">
          <label for="vehicle"> Did you get any antibiotic or asprin in last week?</label>
          <input type="radio" id="Antibiotic_Y"  name="Antibiotic1">
          <label for="">Yes</label>
          <input type="radio" id="Antibiotic_N" name="Antibiotic1">
          <label for="">No</label>
          </div>
          
          <div class="text-right">
            <button class="btn btn-primary" id="blood_donor_form_confirm">Confirm</button>
          </div>
          
        </div>
      </div>
    </div>
    </div>';

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
    $Inconvinionce = $_POST["Inconvinionce"];
    $Inconvinionce_D = $_POST["Inconvinionce_D"];
    $InstructionsD = $_POST["InstructionsD"];
    $Comfortable = $_POST["Comfortable"];
    $Medicine = $_POST["Medicine"];
    $Surgery = $_POST["Surgery"];
    $Pregnant = $_POST["Pregnant"];
    $Hepatitis = $_POST["Hepatitis"];
    $Typhoid = $_POST["Typhoid"];
    $Dengue = $_POST["Dengue"];
    $Fever = $_POST["Fever"];
    $Antibiotic = $_POST["Antibiotic"];
    $Advice = $_POST["Advice"];
    $BBlood_group = $_POST["BBlood_group"];

    $query = "INSERT INTO `blood_donation`(`U_ID`, `Name`, `Email`, `Contact`, `Whight`, `Hight`, `B_Group`, `Date`, `Time`, `D_before`, `HM_Times`, `LB_Date`, `Inconvinionce`, `Inconvinionce_D`, `InstructionsD`, `Comfortable`, `Medicine`, `Surgery`, `Pregnant`, `Hepatitis`, `Typhoid`, `Dengue`, `Fever`, `Antibiotic`, `Advice`, `bd_NIC`) 
    VALUES ('$UID','$BDonor_Name','$BDonor_Email','$BDonor_Contact','$BDonor_Whight','$BDonor_Hight','$BBlood_group','$BDonor_Date','$BBlood_time_slot','$D_before','$HM_Times','$LB_Date','$Inconvinionce','$Inconvinionce_D',
    '$InstructionsD','$Comfortable','$Medicine','$Surgery','$Pregnant','$Hepatitis','$Typhoid','$Dengue','$Fever','$Antibiotic','$Advice','$NIC')";
    if (mysqli_query($conn, $query)) {
      $query2 = "SELECT * FROM blood_donation WHERE U_ID=$UID ORDER BY ID DESC LIMIT 1";
      $result2 = mysqli_query($conn, $query2);
      if ($row2 = mysqli_fetch_array($result2)) {

        $E_ID = $row2["ID"];
        $query1 = "INSERT INTO events1 (E_ID,U_ID,E_Type,E_Date,Status) 
            VALUES ('$E_ID','$UID','$BBlood_group','$BDonor_Date','1')";
        if (mysqli_query($conn, $query1)) {
          echo 'Inserted';

        }
      }

    } else {
      echo 'Not_Insert';
    }

  }

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////food Category update
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  if ($_POST["action"] == "get_fcategory_update") {

    $AID = $_POST['fcat'];
    $query = "SELECT * FROM food_category WHERE fcat_ID ='$AID'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {

      $User_data[0] = $row['fcat_ID'];

      $User_data[1] = $row['f_categoryName'];
      $User_data[2] = $row['f_categoryDesc'];
      $User_data[3] = $row['f_categoryId'];
      $User_data[4] = $row['f_Status'];


    }
    echo json_encode($User_data);
  }

  if ($_POST["action"] == "fcat_edit_form") {

    $ID = $_POST["fcat_ID"];
    $edit_fcdesc = $_POST["edit_fcdesc"];
    $edit_fcNumber = $_POST["edit_fcNumber"];
    $edit_fcName = $_POST["edit_fcName"];
    $f_Status = $_POST["f_Status"];

    echo $ID;
    echo $edit_fcdesc;
    echo $edit_fcNumber;
    echo $edit_fcName;
    echo $f_Status;

    $date = date('Y-m-d');
    $alert = "Chat-Bot Quection & Answer Updated";
    $status = "2";


    $query = "UPDATE food_category SET f_categoryDesc='$edit_fcdesc', f_categoryName='$edit_fcName',f_categoryId='$edit_fcNumber',f_Status='$f_Status'
  WHERE fcat_ID= '$ID'";

    if (mysqli_query($conn, $query)) {
      $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
      if (mysqli_query($conn, $query)) {
        echo 'insert';
      }


    } else {
      echo 'not_insert';
    }



  }


  // ============================================== FOOD CATEGORY DELETE ==============================================




  if ($_POST["action"] == "FC_delete1") {
    $date = date('Y-m-d');
    $alert = "Package Overview Deleted";
    $status = "2";

    $query = "DELETE FROM food_category WHERE fcat_ID = '" . $_POST["fcat_ID"] . "'";
    if (mysqli_query($conn, $query)) {
      $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
      if (mysqli_query($conn, $query)) {
        echo 'Food Category Deleted from Database';
      }

    }
  }



  // ============================================== GENERAL ITEM-NORMAL FETCH =============================================================
  if ($_POST["action"] == "View_general_item") {
    $query = "SELECT * FROM general_items ORDER BY ID desc";
    $result = mysqli_query($conn, $query);
    $output = '
<div class="card shadow mb-4">
  <div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary">General Items Settings
  <button  name="GItem_Add" class="btn btn-primary"data-toggle="modal" id="GItem_Add">Add New</button></h6>
</div>

<div class="row">
<div class="col-6">
<div class="table-responsive small">
    <table class="table table-bordered" id="datatableGNItem" width="100%" celllspacing="0" style="font-size: 12px;">
      <thead>
      
        <tr>
          <th><b>Normal Item</b></th>
          
          <th width="15%">Action</th>
        </tr>
      </thead>
      <tbody>
';
    while ($row = mysqli_fetch_array($result)) {
      $output .= '

    <tr>
    
    <td>' . $row["Item"] . '</td>
    

    <td  style="text-align: center;">
    <button type="button" class=" btn-success bt-xs GI_edit" id="' . $row["ID"] . '" title="Edit"><i class="fas fa-edit"></i></button>
    <button type="button" class=" btn-danger bt-xs GI_delete" id="' . $row["ID"] . '" title="Delete"><i class="fas fa-trash"></i></button>
    </td>
    </tr>
';
    }
    $output .= '</tbody>
</table>
</div>

</div>';
    echo $output;

//     $query = "SELECT * FROM general_item_food ORDER BY ID desc";
//     $result = mysqli_query($conn, $query);
//     $output = '

// <div class="col-6">
// <div class="table-responsive small">
//     <table class="table table-bordered" id="datatableGNItem2" width="100%" celllspacing="0" style="font-size: 12px;">
//       <thead>
      
//         <tr>
//           <th><b>Food Item</b></th>
          
//           <th width="15%">Action</th>
//         </tr>
//       </thead>
//       <tbody>
// ';
//     while ($row = mysqli_fetch_array($result)) {
//       $output .= '

//     <tr>
    
//     <td>' . $row["Gf_name"] . '</td>
    

//     <td  style="text-align: center;">
//     <button type="button" class=" btn-success bt-xs GI_edit2" id="' . $row["ID"] . '" title="Edit"><i class="fas fa-edit"></i></button>
//     <button type="button" class=" btn-danger bt-xs GI_delete2" id="' . $row["ID"] . '" title="Delete"><i class="fas fa-trash"></i></button>
//     </td>
//     </tr>
// ';
//     }
//     $output .= '</tbody>
// </table>
// </div>
// </div>
// </div>';
//     echo $output;

  }





  // =================================================== General Item Added ======================================================================
  if ($_POST["action"] == "gitem_db_added") {

    $itemdonationtype = $_POST["itemdonationtype"];
    $gidesc = $_POST["gidesc"];
    echo "ooo";
    $date = date('Y-m-d');
    $alert = "New Chat-Bot Quection & Answer Insert Into Database - $itemdonationtype - $gidesc";
    $status = "2";

    if ($itemdonationtype == 1) {
      $query = "INSERT INTO general_items (C_Id, Item)
  VALUES ('$itemdonationtype','$gidesc')";

      if (mysqli_query($conn, $query)) {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if (mysqli_query($conn, $query)) {
          echo 'insert';
        }


      } else {
        echo 'not_insert';
      }

    } else {
      $query2 = "INSERT INTO general_item_food (Gf_name, C_ID)
  VALUES ('$gidesc','$itemdonationtype')";

      if (mysqli_query($conn, $query2)) {
        $query2 = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if (mysqli_query($conn, $query2)) {
          echo 'insert';
        }


      } else {
        echo 'not_insert';
      }
    }

  }


  // ======================================================= General Item  Edit Data ==============================================================
  if ($_POST["action"] == "GI_edit_value") {

    $ID = $_POST['UserID'];
    $query = "SELECT * FROM general_items WHERE ID ='$ID'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {


      $User_data[0] = $row['ID'];
      $User_data[1] = $row['C_Id'];
      $User_data[2] = $row['Item'];



    }
    echo json_encode($User_data);
  }

  // ======================================================= General Item  Edit Data2 ==============================================================
  if ($_POST["action"] == "GI_edit_value2") {

    $ID = $_POST['UserID'];
    $query = "SELECT * FROM general_item_food WHERE ID ='$ID'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {


      $User_data[0] = $row['ID'];
      $User_data[1] = $row['C_ID'];
      $User_data[2] = $row['Gf_name'];



    }
    echo json_encode($User_data);
  }


  // ============================================== GI EDIT =========================================================================
  if ($_POST["action"] == "GItem_edit") {

    $ID = $_POST["GI_ID"];
    $itemdonationtype_EDIT = $_POST["itemdonationtype_EDIT"];
    $gidesc_EDIT = $_POST["gidesc_EDIT"];


    $date = date('Y-m-d');
    $alert = "Chat-Bot Quection & Answer Updated";
    $status = "2";



    if ($itemdonationtype_EDIT == 1) {
      $query = "UPDATE general_items SET C_Id='$itemdonationtype_EDIT', Item='$gidesc_EDIT'
  WHERE ID= '$ID'";

      if (mysqli_query($conn, $query)) {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if (mysqli_query($conn, $query)) {
          echo 'insert';
        }


      } else {
        echo 'not_insert';
      }

    } else {
      $query2 = "UPDATE general_item_food SET C_ID='1', Gf_name='$gidesc_EDIT'
  WHERE ID= '" . $_POST["GI_ID"] . "'";

      if (mysqli_query($conn, $query2)) {
        $query2 = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if (mysqli_query($conn, $query2)) {
          echo 'insert';
        }


      } else {
        echo 'not_insert';
      }
    }

  }


  // ============================================== GI EDIT2 =========================================================================
  if ($_POST["action"] == "GItem_edit2") {

    $ID = $_POST["GI_ID2"];
    $itemdonationtype_EDIT = $_POST["itemdonationtype_EDIT2"];
    $gidesc_EDIT = $_POST["gidesc_EDIT2"];


    $date = date('Y-m-d');
    $alert = "Chat-Bot Quection & Answer Updated";
    $status = "2";



    if ($itemdonationtype_EDIT == 1) {
      $query = "UPDATE general_items SET C_Id='$itemdonationtype_EDIT', Item='$gidesc_EDIT'
WHERE ID= '$ID'";

      if (mysqli_query($conn, $query)) {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if (mysqli_query($conn, $query)) {
          echo 'insert';
        }


      } else {
        echo 'not_insert';
      }

    } else {
      $query2 = "UPDATE general_item_food SET C_ID='2', Gf_name='$gidesc_EDIT'
WHERE ID= '" . $_POST["GI_ID2"] . "'";

      if (mysqli_query($conn, $query2)) {
        $query2 = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if (mysqli_query($conn, $query2)) {
          echo 'insert';
        }


      } else {
        echo 'not_insert';
      }
    }

  }


  // ============================================== General Item DATA DELETE ==============================================
  if ($_POST["action"] == "GI_delete") {
    $date = date('Y-m-d');
    $alert = "General Item Quection & Answer Deleted";
    $status = "2";

    $query = "DELETE FROM general_items WHERE ID = '" . $_POST["ID"] . "'";
    if (mysqli_query($conn, $query)) {
      $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
      if (mysqli_query($conn, $query)) {
        echo 'delete';
      }

    } else {
      echo 'not_delete';
    }
  }

  // ============================================== General Item DATA DELETE ==============================================
  if ($_POST["action"] == "GI_delete2") {
    $date = date('Y-m-d');
    $alert = "General Item Quection & Answer Deleted";
    $status = "2";

    $query = "DELETE FROM general_item_food WHERE ID = '" . $_POST["ID"] . "'";
    if (mysqli_query($conn, $query)) {
      $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
      if (mysqli_query($conn, $query)) {
        echo 'delete';
      }

    } else {
      echo 'not_delete';
    }
  }


  // ============================================== GENERAL ITEM-NORMAL FETCH =============================================================
  if ($_POST["action"] == "registered_volunteer") {
    $query = "SELECT * FROM volunteer_register INNER JOIN vo_docs on vo_docs.volunteer_ID = volunteer_register.volunteer_ID";
    $result = mysqli_query($conn, $query);
    ?>

 
          <h6 class="m-0 font-weight-bold text-primary">Volunteer Details
          <button  name="vol_Add" class="btn btn-primary"data-toggle="modal" id="vol_Add">Add New</button></h6>


        <div class="row">

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
              $volunteers = [];
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


              foreach ($volunteers as $row) {
                ?>

                <tr>
    
                <td><?= $row["Vo_Name"] ?></td>
                <td><?= $row["Vo_DOB"] ?></td>
                <td><?= $row["Vo_Email"] ?></td>
                <td><?= $row["Vo_Contact"] ?></td>
                <td><?= $row["Vo_NIC"] ?></td>
                <td><?= $row["Vo_Occupation"] ?></td>
                <td><?= $row["Vo_Experience"] ?></td>
                <td><?= $row["Vo_Activity"] ?></td>
                <td><?= $row["Vo_Description"] ?></td>
                <td><?php
                foreach ($row['docs'] as $item) {
                  ?>
                            <p><a href="http://<?= $_SERVER['SERVER_NAME'] . "/updated%207.17/cancer1/" . $item["doc_name"] ?>"><?= $item["doc_name"] ?></a></p>
                          <?php
                }

                ?></td>
    

                <td  style="text-align: center;">
                <button type="button" class=" btn-primary bt-xs volunt_email" id="<?= $row["volunteer_ID"] ?>" title="mail"><i class="fas fa-envelope"></i></button>
                <button type="button" class=" btn-danger bt-xs GI_delete" id="<?= $row["volunteer_ID"] ?>" title="Delete"><i class="fas fa-trash"></i></button>
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

  // // ======================================================= volunteer email ==============================================================
  if ($_POST["action"] == "volant_email_send") {

    $ID = $_POST['UserID'];
    $query = "SELECT * FROM volunteer_register WHERE volunteer_ID ='$ID'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {


      $User_data[0] = $row['volunteer_ID'];
      $User_data[1] = $row['Vo_Name'];
      $User_data[2] = $row['Vo_Email'];



    }
    echo json_encode($User_data);
  }

  if ($_POST["action"] == "vEmail_send") {
    $Vo_Name = $_POST['Vo_Name'];
    $Vo_Email = $_POST['Vo_Email'];
    $Vo_Message = $_POST['Vo_Message'];



    $sql2 = "INSERT INTO volun_email(Vo_Name, Vo_Email, Vo_Message) VALUES('$Vo_Name','$Vo_Email','$Vo_Message')";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2) {
      echo 'Created';
      exit();

    } else {
      echo 'Error';
      exit();

    }


  }


  // ======================================================= donors email ==============================================================
  if ($_POST["action"] == "donors_email_send") {

    $ID = $_POST['UserID'];
    $query = "SELECT * FROM donor WHERE donor_id ='$ID'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {


      $User_data[0] = $row['donor_id'];
      $User_data[1] = $row['donor_name'];
      $User_data[2] = $row['donor_email'];



    }
    echo json_encode($User_data);
  }

  if ($_POST["action"] == "donorEmail_send") {
    $donor_name = $_POST['donor_name'];
    $donor_email = $_POST['donor_email'];
    $donor_Message = $_POST['donor_Message'];



    $sql2 = "INSERT INTO volun_email(Vo_Name, Vo_Email, Vo_Message) VALUES('$donor_name','$donor_email','$donor_Message')";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2) {
      echo 'Created';
      exit();

    } else {
      echo 'Error';
      exit();

    }


  }

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // Drug List Add
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


  if ($_POST["action"] == "drug_list_add") {
    $query = "SELECT * FROM drugs_list";
    $result = mysqli_query($conn, $query);
    $output = '
        <div class="container-fluid">
        <div class="card shadow mb-4">
              <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DRUG LIST
              <button  name="dlAdd" class="btn btn-primary"data-toggle="modal" id="dlAdd">Add New</button></h6>
             
            </div>
          
      
       
    
    
          
        <div class="table-responsive small">  
        <table class="table table-bordered" id="datatableDrugList" width="100%" celllspacing="0">
        <thead>
          <tr>
           
            <th>Drug Name</th>
            <th>Weight</th>
           
            <th width="15%">Action</th>
          </tr>
        </thead>
       
        <tbody>
        ';
    while ($row = mysqli_fetch_array($result)) {
      $output .= '
    
            <tr>
           
            <td>' . $row["drug_name"] . '</td>
            <td>' . $row["drug_weight"] . '</td>
            
    
            
    
            <td>
           
            <button type="button" name="drug_update" class=" btn-success bt-xs drug_update" id="' . $row["drug_ID"] . '" title="Edit"><i class="fa fa-edit"></i></button>
            <button type="button" name="drug_delete" class=" btn-danger bt-xs drug_delete11" id="' . $row["drug_ID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
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



  if ($_POST["action"] == "adddrugs") {

    $drug_name = $_POST['drug_name'];
    $drug_weight = $_POST['drug_weight'];


    $query = "INSERT INTO `drugs_list`(`drug_name`,`drug_weight`) 
        VALUES ('$drug_name','$drug_weight')";

    if (mysqli_query($conn, $query)) {
      echo 'inserted';

    } else {
      echo 'Not_inserted';
    }

  }


  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////Drug List update
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  if ($_POST["action"] == "get_druglist_update") {

    $AID = $_POST['drugID'];

    $query = "SELECT * FROM drugs_list WHERE drug_ID ='$AID'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {

      $User_data[0] = $row['drug_ID'];
      $User_data[1] = $row['drug_name'];
      $User_data[2] = $row['drug_weight'];


    }
    echo json_encode($User_data);
  }




  // ============================================== DRUG LIST DELETE ==============================================




  if ($_POST["action"] == "drug_delete11") {
    $date = date('Y-m-d');
    $alert = "Package Overview Deleted";
    $status = "2";

    $query = "DELETE FROM drugs_list WHERE drug_ID = '" . $_POST["fcat_ID"] . "'";
    if (mysqli_query($conn, $query)) {
      $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
      if (mysqli_query($conn, $query)) {
        echo 'Food Category Deleted from Database';
      }

    }
  }



  if ($_POST["action"] == "event_Reject_Model1") {

    $AID = $_POST['UserID'];
    $query = "SELECT * FROM events1 WHERE ID ='$AID'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {

      $User_data[0] = $row['ID'];



    }
    echo json_encode($User_data);
  }

  //-------------------------------------------Food Bookings View-----------------
//----------------------------------
//-----------------------------------------------------------------------------------------------

  if ($_POST["action"] == "view_all_food") {


    $output = '';

    $query = "SELECT * FROM `food_donation` INNER JOIN events1 ON events1.E_ID = food_donation.food_ID";

    $result = mysqli_query($conn, $query);


    $output = '
  

      <div class="table-responsive small">
<table class="table table-bordered" id="datatableviewFDAll" width="100%" celllspacing="0" style="font-size: 12px;">
<thead>
  <tr>
   
    <th>Category</th>
    <th>No Of visitors</th>
    <th>Description</th>
   
    <th>Date</th>
    <th>Time</th>
    <th>Status</th>
    <th width="15%">Action</th>
  </tr>
</thead>
<tbody>
        ';
    while ($row = mysqli_fetch_array($result)) {

      // $D_Name =  $row["Name"];
      // $D_Email =  $row["Email"];
      // $D_Contact =  $row["Contact"];
      $food_category_b = $row["food_category_b"];
      $selected_time = $row["selected_time"];
      $additional_desc = $row["additional_desc"];
      $no_of_visit = $row["no_of_visit"];
      $Status = $row["Status"];
      $Date = $row["Date"];




      $output .= '

            <tr>
            <td>';

      if ($food_category_b == 3) {
        $output .= 'Food';
      } else if ($food_category_b == 2) {
        $output .= 'Soup</td>';
      } else {
        $output .= '' . $Status . '';
      }

      $output .=

        '</td>
          
            <td>' . $no_of_visit . '</td>
            <td>' . $additional_desc . '</td>
            <td>' . $row["Date"] . '</td>
            <td>';

      if ($food_category_b == 3 && $selected_time == 1) {
        $output .= 'BreakFast';
      } else if ($food_category_b == 3 && $selected_time == 2) {
        $output .= 'Lunch</td>';
      } else if ($food_category_b == 3 && $selected_time == 3) {
        $output .= 'Dinner</td>';
      } else if ($food_category_b == 2 && $selected_time == 1) {
        $output .= 'Morning Soup</td>';
      } else if ($food_category_b == 2 && $selected_time == 2) {
        $output .= 'Evening Soup</td>';
      } else {
        $output .= '' . $Status . '';
      }

      $output .=

        '</td>
          
          
           
            <td>';

      if ($Status == 0) {
        $output .= '<button type="button" name="event_Deactive" class=" btn-danger bt-xs event_Deactive" id="' . $row["E_ID"] . '" title="Deactive">Wating for Approval</button>';
      } else if ($Status == 2) {
        $output .= '<button type="button" name="event_Active" class=" btn-success bt-xs event_Active" id="' . $row["E_ID"] . '" title="Active">Approved</button></td>';
      } else {
        $output .= '<button type="button" name="event_Deactive" class=" btn-warning bt-xs event_Deactive" id="' . $row["E_ID"] . '" title="Deactive">Done</button>';
   
      }

      $output .=

        '</td>

        <td>
        <button type="button" name="event_delete" class=" btn-danger bt-xs foodD_delete" id="' . $row["E_ID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
        </tr>
      ';


    }
    $output .= '</tbody>
      </table>
      </div>';
    echo $output;
  }
  //////////////////////////////////////////////////////////view all blood ////////////////////////////////////
  if ($_POST["action"] == "view_all_blood") {


    $output = '';

    $query = "SELECT * FROM `blood_donation` INNER JOIN events1 ON events1.E_ID = blood_donation.ID";

    $result = mysqli_query($conn, $query);


    $output = '
 

      <div class="table-responsive small">
<table class="table table-bordered" id="datatableviewBDAll" width="100%" celllspacing="0" style="font-size: 12px;">
<thead>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Contact</th>
    <th>Blood Group</th>
    <th>NIC</th>
    <th>Booked Date</th>
    <th>Booked Time</th>
    <th>Status</th>
    <th width="15%">Action</th>
  </tr>
</thead>
<tbody>
        ';
    while ($row = mysqli_fetch_array($result)) {

      $D_Name = $row["Name"];
      $D_Email = $row["Email"];
      $D_Contact = $row["Contact"];
      $D_Bgroup = $row["B_Group"];
      $NIC = $row["bd_NIC"];

      $D_before = $row["D_before"];

      $Date = $row["Date"];
      $D_Time = $row["Time"];
      $Status = $row["Status"];



      $output .= '

            <tr>
            <td>' . $D_Name . '</td>
            <td>' . $D_Email . '</td>
            <td>' . $D_Contact . '</td>
            <td>' . $D_Bgroup . '</td>
            <td>' . $NIC . '</td>

            <td>' . $row["Date"] . '</td>
            
            <td>';
      if ($D_Time == 1) {
        $output .= '9.00 am to 9.30 am';
      } else if ($D_Time == 2) {
        $output .= '9.30 am to 10.00 am';
      } else if ($D_Time == 3) {
        $output .= '10.00 am to 10.30 am';
      } else if ($D_Time == 4) {
        $output .= '10.30 am to 11.00 am';
      } else if ($D_Time == 5) {
        $output .= '11.00 am to 11.30 am';
      } else if ($D_Time == 6) {
        $output .= '11.30 am to 12.00 am';
      } else {
        $output .= '' . $Status . '';
      }
      $output .=
        '</td>


            <td>';

      if ($Status == 2) {
        $output .= '<button type="button" name="event_Deactive" class=" btn-success bt-xs event_Deactive" id="' . $row["E_ID"] . '" title="Deactive">Active</button>';
      } else if ($Status == 1) {
        $output .= '<button type="button" name="event_Active" class=" btn-success bt-xs event_Active" id="' . $row["E_ID"] . '" title="Active">Active</button></td>';
      } else {
        $output .= '<button type="button" name="event_Deactive" class=" btn-warning bt-xs event_Deactive" id="' . $row["E_ID"] . '" title="Deactive">Done</button>';
     }

      $output .=

        '</td>

        <td>
         <button type="button" name="bloodD_delete" class=" btn-danger bt-xs bloodD_delete" id="' . $row["E_ID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
        </tr>
      ';


    }
    $output .= '</tbody>
      </table>
      </div>';
    echo $output;
  }




  //---------------------------------------------drug View-------------------------------
  //--------------------------------
  //--------------------------------------------------------------------------------------------

  if ($_POST["action"] == "all_drug_bookings") {
    $output = '';

    $query = "SELECT * FROM drug_donation";
    $result = mysqli_query($conn, $query);
    $output = '
      <div class="container-fluid">
      <div class="card shadow mb-4">
           
      <div class="table-responsive small">  
      <table class="table table-bordered" id="datatableviewdrugDAll" width="100%" celllspacing="0">
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
    while ($row = mysqli_fetch_array($result)) {
      $output .= '
  
          <tr>
         
          <td>' . $row["drug_DName"] . '</td>
          <td>' . $row["drug_DEmail"] . '</td>
          <td>' . $row["drug_DContact"] . '</td>
          <td>' . $row["drug_DNIC"] . '</td>
         
          <td>';

      $items = json_decode($row["drug_DDrug"]);
      foreach ($items as $item) {
        $output .= $item . '</br>';
      }

      $output .= '</td>

          <td>' . $row["drug_DDate"] . '</td>
          
  
          
  
          <td>
         
          <button type="button" name="admin_delete" class=" btn-danger bt-xs drug_Booking_delete1" id="' . $row["drug_DID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
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




  //---------------------------------------------Voluntier View-------------------------------
  //--------------------------------
  //--------------------------------------------------------------------------------------------

  if ($_POST["action"] == "general_item_Booking") {
    $output = '';

    $query = "SELECT * FROM general_items_donation_bookings";
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
    while ($row = mysqli_fetch_array($result)) {
      $output .= '
  
          <tr>
         
          <td>' . $row["gItemD_Name"] . '</td>
          <td>' . $row["gItemD_Email"] . '</td>
          <td>' . $row["gItemD_contact"] . '</td>
          <td>' . $row["gItemD_NIC"] . '</td>
     
          <td>';

      $items = json_decode($row["gItemD_item"]);
      foreach ($items as $item) {
        $output .= $item . '</br>';
      }

      $output .= '</td>
          <td>' . $row["Date"] . '</td>
        
          <td>' . $row["gItem_quentity"] . '</td>
  
          
  
          <td>
         
          <button type="button" name="admin_delete" class=" btn-danger bt-xs GItem_Booking_delete1" id="' . $row["gItemD_ID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
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

  //-------------------------------------------My Entertainment Activity Requests View----------------
//----------------------------------
//-----------------------------------------------------------------------------------------------


  if ($_POST["action"] == "entertainment_view") {


    $output = '';

    $query = "SELECT * FROM `entertainment_act_booking` INNER JOIN events1 ON events1.E_ID = entertainment_act_booking.eAct_ID";

    $result = mysqli_query($conn, $query);


    $output = '
  
      <div class="table-responsive small">
<table class="table table-bordered" id="datatable12" width="100%" celllspacing="0" style="font-size: 12px;">
<thead>
  <tr>
   
  <th>Name</th>

  <th>Contact</th>
    <th>NIC</th>
    <th>Activity</th>
    <th>Description</th>
    <th>Ward</th>
    <th>No of Visitors</th>
    <th>Date</th>
    <th>Status</th>
    <th>Feedback</th>
  
  </tr>
</thead>
<tbody>
        ';
    while ($row = mysqli_fetch_array($result)) {

      $Status = $row["Status"];
      $eAct = $row["eAct"];
      $eAct_Desc = $row["eAct_Desc"];
      $eAct_ward = $row["eAct_ward"];
      $feedback = $row["feedback"];
      $eAct_noofvisiters = $row["eAct_noofvisiters"];


      $output .= '

            <tr>
            <td>' . $row["eAct_Name"] . '</td>
            
            <td>' . $row["eAct_contact"] . '</td>
            <td>' . $row["eAct_NIC"] . '</td>
            <td>' . $row["eAct"] . '</td>
          
            <td>' . $eAct_Desc . '</td>
            <td>' . $eAct_ward . '</td>
            <td>' . $eAct_noofvisiters . '</td>
            <td>' . $row["eAct_Date"] . '</td>
           
            <td>';

      if ($feedback == 0) {
        $output .= 'Processing';
      } else if ($feedback == 1) {
        $output .= 'Waiting for Director Approval';
      } else if ($feedback == 2) {
        $output .= 'Your Request Approved. You can proceed. Our Staff will contact you as soon as possible for more info';
      }else if ($Status == 0) {
        $output .= 'Processing';
      } else {
        $output .= '' . $Status . '';
      }

      $output .=

        '</td>';

      if ($Status == 0) {
        $output .= '<td>
               <button type="button" name="event_delete" class=" btn-danger bt-xs event_delete" id="' . $row["E_ID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button>
               </td>';
      } else if ($Status == 2) {
        $output .= '<td>
             <button type="button" name="event_delete" class=" btn-danger bt-xs event_delete" id="' . $row["E_ID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button>
             </td>';
      } else {
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

  // ======================================================= event View Data ==============================================================
  if ($_POST["action"] == "event_view1") {

    $ID = $_POST['UserID'];

    $query = " SELECT * FROM `food_donation` INNER JOIN events1 ON events1.E_ID = food_donation.food_ID 
    INNER JOIN donor ON food_donation.U_ID = donor.donor_id  WHERE events1.ID = '$ID'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {


      $User_data[0] = $row['ID'];
      $User_data[1] = $row['donor_name'];
      $User_data[2] = $row['donor_nic'];
      $User_data[3] = $row['donor_email'];
      $User_data[4] = $row['E_Date'];
      $User_data[5] = $row['Status'];
      $User_data[6] = $row['food_category_b'];
      $User_data[7] = $row['selected_time'];
      $User_data[8] = $row['additional_desc'];
      $User_data[9] = $row['no_of_visit'];
      $User_data[10] = $row['donor_phone'];


    }
    echo json_encode($User_data);
  }


  // ======================================================= event View Blood Data ==============================================================
  if ($_POST["action"] == "eventBlood_view1") {

    $ID = $_POST['UserID'];

    $query = " SELECT * FROM `blood_donation` INNER JOIN events1 ON events1.E_ID = blood_donation.ID 
    WHERE events1.ID = '$ID'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {


      $User_data[0] = $row['U_ID'];
      $User_data[1] = $row['Name'];
      $User_data[2] = $row['Email'];
      $User_data[3] = $row['Contact'];
      $User_data[4] = $row['bd_NIC'];
      $User_data[5] = $row['Whight'];
      $User_data[6] = $row['Hight'];
      $User_data[7] = $row['B_Group'];
      $User_data[8] = $row['Date'];
      $User_data[9] = $row['Time'];
      $User_data[10] = $row['D_before'];
      $User_data[11] = $row['HM_Times'];
      $User_data[12] = $row['LB_Date'];



    }
    echo json_encode($User_data);
  }


  // ======================================================= event View Entertainment Data ==============================================================
  if ($_POST["action"] == "eventEntertainment_view1") {

    $ID = $_POST['UserID'];

    $query = " SELECT * FROM `entertainment_act_booking` INNER JOIN events1 ON events1.E_ID = entertainment_act_booking.eAct_ID 
    WHERE events1.ID = '$ID'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {


      $User_data[0] = $row['U_ID'];
      $User_data[1] = $row['eAct_Name'];
      $User_data[2] = $row['eAct_contact'];
      $User_data[3] = $row['eAct_NIC'];
      $User_data[4] = $row['eAct'];
      $User_data[5] = $row['eAct_Desc'];
      $User_data[6] = $row['eAct_ward'];
      $User_data[7] = $row['eAct_noofvisiters'];
      $User_data[8] = $row['eAct_Date'];




    }
    echo json_encode($User_data);
  }

  // ======================================================= event View General Item Data ==============================================================
  if ($_POST["action"] == "eventGeneral_view1") {

    $ID = $_POST['UserID'];

    $query = " SELECT * FROM `general_items_donation_bookings` INNER JOIN events1 ON events1.E_ID = general_items_donation_bookings.gItemD_ID 
    WHERE events1.ID = '$ID'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {


      $User_data[0] = $row['ID'];
      $User_data[1] = $row['gItemD_Name'];
      $User_data[2] = $row['gItemD_Email'];
      $User_data[3] = $row['gItemD_contact'];
      $User_data[4] = $row['gItemD_NIC'];
      $gItemD_item_json = json_decode($row['gItemD_item']);
      if (is_array($gItemD_item_json)) {
          $User_data[5] = implode(", ", $gItemD_item_json);
      } else {
          $User_data[5] = $row['gItemD_item']; // If it's not a valid JSON array, keep the original value
      }
      $User_data[6] = $row['Date'];
      $User_data[7] = $row['gItem_quentity'];
      $User_data[8] = $row['W_ID'];

     
    }
    echo json_encode($User_data);
  }

  // ======================================================= event View Data ==============================================================
  if ($_POST["action"] == "event_done1") {

    $ID = $_POST['UserID'];

    $query = " SELECT * FROM `food_donation` INNER JOIN events1 ON events1.E_ID = food_donation.food_ID 
    INNER JOIN donor ON food_donation.U_ID = donor.donor_id  WHERE events1.ID = '$ID'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {


      $User_data[0] = $row['ID'];

      $User_data[1] = $row['donor_name'];
      $User_data[2] = $row['donor_nic'];
      $User_data[3] = $row['donor_email'];



    }
    echo json_encode($User_data);
  }


  if ($_POST["action"] == "receiveDonorEmail_send") {
    $Vo_Name = $_POST['Fdonor_name'];
    $Vo_Email = $_POST['Fdonor_email'];
    $Vo_Message = $_POST['Fdonor_Message'];



    $sql2 = "INSERT INTO receive_email(receiveD_Name, receiveD_Email, receiveD_Message) VALUES('$Vo_Name','$Vo_Email','$Vo_Message')";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2) {
      echo 'Created';
      exit();

    } else {
      echo 'Error';
      exit();

    }


  }

  // ======================================================= event View Data ==============================================================
  if ($_POST["action"] == "event_doneB1") {

    $ID = $_POST['UserID'];

    $query = "SELECT * FROM `blood_donation` INNER JOIN events1 ON events1.E_ID = blood_donation.ID 
   WHERE events1.ID = '$ID'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {


      $User_data[0] = $row['ID'];
      $User_data[1] = $row['Name'];
      $User_data[2] = $row['Email'];



    }
    echo json_encode($User_data);
  }

  if ($_POST["action"] == "event_doneentertain") {

    $ID = $_POST['UserID'];

    $query = "SELECT * FROM `entertainment_act_booking` INNER JOIN events1 ON events1.E_ID = entertainment_act_booking.eAct_ID  
    INNER JOIN donor ON entertainment_act_booking.U_ID = donor.donor_id  WHERE events1.ID = '$ID'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {


      $User_data[0] = $row['ID'];
      $User_data[1] = $row['eAct_Name'];
      $User_data[2] = $row['donor_email'];



    }
    echo json_encode($User_data);
  }


  if ($_POST["action"] == "event_doneOther") {

    $ID = $_POST['UserID'];

    $query = "SELECT * FROM `general_items_donation_bookings` INNER JOIN events1 ON events1.E_ID = general_items_donation_bookings.gItemD_ID  
   WHERE events1.ID = '$ID'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {


      $User_data[0] = $row['ID'];
      $User_data[1] = $row['gItemD_Name'];
      $User_data[2] = $row['gItemD_Email'];



    }
    echo json_encode($User_data);
  }


  if($_POST["action"] == "GItem_wardedit1")
  {

  $ID= $_POST["GU_ID"];

  $edit_ward = $_POST["GgItemD_ward"];



  $query = "UPDATE `events1` SET `W_ID`='$edit_ward' WHERE `ID` = '".$_POST["GU_ID"]."'"; 
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


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // Food Recipes
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


  if ($_POST["action"] == "View_food_recipes") {
    $query = "SELECT * FROM food_receips WHERE receip_category='3' && receip_time='1'";
    $result = mysqli_query($conn, $query);
    $output = '
    <div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Receipes Settings
    <button  name="FRAdd" class="btn btn-primary"data-toggle="modal" id="FRAdd">Add New</button></h6>
  </div>
  
  <div class="row">
  <div class="col-4">
  <h6 class="m-0 font-weight-bold text-primary">Breackfast</h6></br>
  <div class="table-responsive small">  
      <table class="table table-bordered" id="datatableviewFR" width="100%" celllspacing="0">
      <thead>
        <tr>
         
          <th>Breackfast - Ingredieant</th>
          <th width="15%">Action</th>
        </tr>
      </thead>
     
      <tbody>
      ';
    while ($row = mysqli_fetch_array($result)) {
      $output .= '
  
          <tr>
         
          <td>' . $row["receip_ingredient"] . '</td>
        
  
          
  
          <td>
         
          <button type="button" name="admin_update" class=" btn-success bt-xs fRECEIPE_update" id="' . $row["receip_ID"] . '" title="Edit"><i class="fa fa-edit"></i></button>
          <button type="button" name="admin_delete" class=" btn-danger bt-xs FR_delete1" id="' . $row["receip_ID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
          </tr>
  ';
      }
      $output .= '</tbody>
  </table>
  </div>
  
  </div>';
      echo $output;
  
      $query = "SELECT * FROM food_receips WHERE receip_category='3' && receip_time='2'";
      $result = mysqli_query($conn, $query);
      $output = '
  
  <div class="col-4">
  <h6 class="m-0 font-weight-bold text-primary">Lunch</h6></br>
  <div class="table-responsive small">
      <table class="table table-bordered" id="datatableviewFRLunch" width="100%" celllspacing="0" style="font-size: 12px;">
        <thead>
        
          <tr>
          <th>Lunch - Ingredieant</th>
          <th width="15%">Action</th>
        </tr>
      </thead>
     
      <tbody>
      ';
    while ($row = mysqli_fetch_array($result)) {
      $output .= '
  
          <tr>
         
          <td>' . $row["receip_ingredient"] . '</td>
        
  
          
  
          <td>
         
          <button type="button" name="admin_update" class=" btn-success bt-xs fRECEIPE_update" id="' . $row["receip_ID"] . '" title="Edit"><i class="fa fa-edit"></i></button>
          <button type="button" name="admin_delete" class=" btn-danger bt-xs FR_delete1" id="' . $row["receip_ID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
          </tr>
  ';
      }
      $output .= '</tbody>
  </table>
  </div>
 
  </div>';
      echo $output;


      $query = "SELECT * FROM food_receips WHERE receip_category='3' && receip_time='3'";
      $result = mysqli_query($conn, $query);
      $output = '
  
  <div class="col-4">
  <h6 class="m-0 font-weight-bold text-primary">Dinner</h6></br>
  <div class="table-responsive small">
      <table class="table table-bordered" id="datatableviewFRDinner" width="100%" celllspacing="0" style="font-size: 12px;">
        <thead>
        
          <tr>
          <th>Dinner - Ingredieant</th>
          <th width="15%">Action</th>
        </tr>
      </thead>
     
      <tbody>
      ';
    while ($row = mysqli_fetch_array($result)) {
      $output .= '
  
          <tr>
         
          <td>' . $row["receip_ingredient"] . '</td>
        
  
          
  
          <td>
         
          <button type="button" name="admin_update" class=" btn-success bt-xs fRECEIPE_update" id="' . $row["receip_ID"] . '" title="Edit"><i class="fa fa-edit"></i></button>
          <button type="button" name="admin_delete" class=" btn-danger bt-xs FR_delete1" id="' . $row["receip_ID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
          </tr>
  ';
      }
      $output .= '</tbody>
  </table>
  </div>
  </div>
  </div>
  </div>';
      echo $output;








      $query = "SELECT * FROM food_receips WHERE receip_category='2' && receip_time='1'";
      $result = mysqli_query($conn, $query);
      $output = '
      <div class="card shadow mb-4">
      <div class="card-header py-3">
    
    <div class="row">
    <div class="col-4">
    <h6 class="m-0 font-weight-bold text-primary">Special Soup</h6></br>
    <div class="table-responsive small">  
        <table class="table table-bordered" id="datatableviewFRSoup1" width="100%" celllspacing="0">
        <thead>
          <tr>
           
            <th>Special Soup - Ingredieant</th>
            <th width="15%">Action</th>
          </tr>
        </thead>
       
        <tbody>
        ';
      while ($row = mysqli_fetch_array($result)) {
        $output .= '
    
            <tr>
           
            <td>' . $row["receip_ingredient"] . '</td>
          
    
            
    
            <td>
           
            <button type="button" name="admin_update" class=" btn-success bt-xs fRECEIPE_update" id="' . $row["receip_ID"] . '" title="Edit"><i class="fa fa-edit"></i></button>
            <button type="button" name="admin_delete" class=" btn-danger bt-xs FR_delete1" id="' . $row["receip_ID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
            </tr>
    ';
        }
        $output .= '</tbody>
    </table>
    </div>
    
    </div>';
        echo $output;
    
        $query = "SELECT * FROM food_receips WHERE receip_category='2' && receip_time='1'";
        $result = mysqli_query($conn, $query);
        $output = '
    
    <div class="col-4">
    <h6 class="m-0 font-weight-bold text-primary">Normal Soup</h6></br>
    <div class="table-responsive small">
        <table class="table table-bordered" id="datatableviewFRSoup2" width="100%" celllspacing="0" style="font-size: 12px;">
          <thead>
          
            <tr>
            <th>Normal Soup - Ingredieant</th>
            <th width="15%">Action</th>
          </tr>
        </thead>
       
        <tbody>
        ';
      while ($row = mysqli_fetch_array($result)) {
        $output .= '
    
            <tr>
           
            <td>' . $row["receip_ingredient"] . '</td>
          
    
            
    
            <td>
           
            <button type="button" name="admin_update" class=" btn-success bt-xs fRECEIPE_update" id="' . $row["receip_ID"] . '" title="Edit"><i class="fa fa-edit"></i></button>
            <button type="button" name="admin_delete" class=" btn-danger bt-xs FR_delete1" id="' . $row["receip_ID"] . '" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
            </tr>
    ';
        }
        $output .= '</tbody>
    </table>
    </div>
   
    </div>';
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



  if ($_POST["action"] == "addFRecipes") {

    $fcategory = $_POST['fRcategory'];
    $fcdesc = $_POST['fRTime'];
    $timeFC = $_POST['fRingredients'];

   

    $query = "INSERT INTO `food_receips`(`receip_category`, `receip_time`,`receip_ingredient`) 
    VALUES ('$fcategory','$fcdesc','$timeFC')";

    if (mysqli_query($conn, $query)) {
      echo 'inserted';

    } else {
      echo 'Not_inserted';
    }

  }


 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////food RECEIPE update
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($_POST["action"] == "fRECEIPE_update") {

  $AID = $_POST['fcat'];
  $query = "SELECT * FROM food_receips WHERE receip_ID ='$AID'";
  $result = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_array($result)) {

    $User_data[0] = $row['receip_ID'];

    $User_data[1] = $row['receip_ingredient'];
   


  }
  echo json_encode($User_data);
}

if ($_POST["action"] == "fRECEIPE_edit_form") {


  $ID = $_POST["edit_fRID"];
  $edit_fcdesc = $_POST["edit_fRINGREDIENT"];
 
  $date = date('Y-m-d');
  $alert = "Chat-Bot Quection & Answer Updated";
  $status = "2";


  $query = "UPDATE food_receips SET receip_ingredient='$edit_fcdesc'
WHERE receip_ID= '$ID'";

  if (mysqli_query($conn, $query)) {
    $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
    if (mysqli_query($conn, $query)) {
      echo 'insert';
    }


  } else {
    echo 'not_insert';
  }



}


// ============================================== FOOD CATEGORY DELETE ==============================================




if ($_POST["action"] == "FR_delete1") {
  $date = date('Y-m-d');
  $alert = "Package Overview Deleted";
  $status = "2";

  $query = "DELETE FROM food_receips WHERE receip_ID = '" . $_POST["fcat_ID"] . "'";
  if (mysqli_query($conn, $query)) {
    $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
    if (mysqli_query($conn, $query)) {
      echo 'Food Category Deleted from Database';
    }

  }
}

























































































































































































































































}