<?php

include ('template/db_conn.php');
include('template/check_login.php');

// echo $_SESSION['status'];

if(!isset($_POST["action"]) || $_POST["action"] == "update_Uprofile1")
{
    $output = '';
    $UID = $_SESSION['id']; 
    $query = "SELECT * FROM donor WHERE donor_id = $UID";
    $result = mysqli_query($conn, $query);
    
    if ($row = mysqli_fetch_array($result)) {
      //  echo  $row["U_DOB"];
       
        $date=date_create_from_format("Y-m-d",$row["U_DOB"]);
        //echo $date;
        $u_dob= date_format($date,"Y-m-d");
       
        // $timestamp = strtotime($row["U_DOB"]);
        // $u_dob = date('d/m/Y', $timestamp);
       // echo $u_dob;
        // $u_dob=
       

 ?>



 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="https://cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  
  <style>

.rounded {
  background-image: url("https://cdn.pixabay.com/photo/2016/08/31/11/54/icon-1633249_640.png");
  width: 300px;
  height: 300px;
  border-radius: 50%;
  background-repeat: no-repeat;
  background-size: cover;
}

    .profile .profile-card img {
  max-width: 120px;
}

.profile .profile-card h2 {
  font-size: 24px;
  font-weight: 700;
  color: #2c384e;
  margin: 10px 0 0 0;
}

.profile .profile-card h3 {
  font-size: 18px;
}

.profile .profile-card .social-links a {
  font-size: 20px;
  display: inline-block;
  color: rgba(1, 41, 112, 0.5);
  line-height: 0;
  margin-right: 10px;
  transition: 0.3s;
}

.profile .profile-card .social-links a:hover {
  color: #012970;
}

.profile .profile-overview .row {
  margin-bottom: 20px;
  font-size: 15px;
}

.profile .profile-overview .card-title {
  color: #012970;
}

.profile .profile-overview .label {
  font-weight: 600;
  color: rgba(1, 41, 112, 0.6);
}

.profile .profile-edit label {
  font-weight: 600;
  color: rgba(1, 41, 112, 0.6);
}

.profile .profile-edit img {
  max-width: 120px;
}
  </style>
  <script src="vendor/jquery/jquery.min.js"></script>
</head>
<body>

 <main id="main" class="main">

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <div class="rounded"></div>
              <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
              <!-- <label name="donor_name" type="text" class="form-control" id="donor_name" value="<?= $row["donor_name"]?>">

              <h3>Web Designer</h3> -->
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <!-- <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li> -->

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic">You are enrolling for the cancer hospital Donation system. These are the details of you.</p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?= $row["donor_name"]?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?= $row["donor_email"] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">NIC</div>
                    <div class="col-lg-9 col-md-8"><?= $row["donor_nic"]?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Contact</div>
                    <div class="col-lg-9 col-md-8"><?= $row["donor_phone"]?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Height(f)</div>
                    <div class="col-lg-9 col-md-8"><?= $row["donor_height"]?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Weight(kg)</div>
                    <div class="col-lg-9 col-md-8"><?= $row["donor_weight"]?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">B Group</div>
                    <div class="col-lg-9 col-md-8"><?= $row["donor_bgroup"]?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Gender</div>
                    <div class="col-lg-9 col-md-8"><?= $row["U_Gender"]?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">DOB</div>
                    <div class="col-lg-9 col-md-8"><?=$u_dob?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                 
                  <form method="POST" enctype="multipart/form-data"  id="user_profile_edit">
                  <input type="hidden" id="userId" name="userId" value="<?=$UID?>">
                   

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="donor_name" type="text" class="form-control" id="donor_name" value="<?= $row["donor_name"]?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="donor_email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="donor_email" type="text" class="form-control" id="donor_email" value="<?= $row["donor_email"] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="donor_nic" class="col-md-4 col-lg-3 col-form-label">NIC</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="donor_nic" type="text" class="form-control" id="donor_nic" value="<?= $row["donor_nic"]?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="donor_phone" class="col-md-4 col-lg-3 col-form-label">Contact</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="donor_phone" type="text" class="form-control" id="donor_phone" value="<?= $row["donor_phone"]?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="donor_height" class="col-md-4 col-lg-3 col-form-label">Height(f)</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="donor_height" type="text" class="form-control" id="donor_height" value="<?= $row["donor_height"]?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="donor_weight" class="col-md-4 col-lg-3 col-form-label">Weight(kg)</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="donor_weight" type="text" class="form-control" id="donor_weight" value="<?= $row["donor_weight"]?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="donor_bgroup" class="col-md-4 col-lg-3 col-form-label">B Group</label>
                      <div class="col-md-8 col-lg-9">
                        <select name="donor_bgroup" type="donor_bgroup" class="form-control" id="donor_bgroup" value="<?= $row["donor_bgroup"]?>">
                        <option value="A-">A-</option>
                        <option value="A+">A+</option>
                        <option value="B-">B-</option>
                        <option value="B+">B+</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="U_Gender" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="U_Gender" type="text" class="form-control" id="U_Gender" value="<?= $row["U_Gender"]?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="U_DOB" class="col-md-4 col-lg-3 col-form-label">DOB</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="date" name="U_DOB" class="form-control" id="U_DOB" value="<?=$u_dob?>">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="POST" action="password_change.php"  id="user_password_form">

                  <div class="row mb-3">
                      <label for="username" class="col-md-4 col-lg-3 col-form-label">User Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" type="text" class="form-control" id="username" value="<?= $row["donor_name"]?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="CuserPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="CuserPassword" type="password" class="form-control" id="CuserPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="NewuserPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="NewuserPassword" type="password" class="form-control" id="NewuserPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Confirm_userPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="Confirm_userPassword" type="password" class="form-control" id="Confirm_userPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <script src="js/sweetalert.min.js"></script>
  <script>

$(document).on('submit', '#user_profile_edit', function(e){
           
    e.preventDefault(); // Prevent the default form submission
    // var userId =
    console.log(userId);
    

    // Serialize the form data
    var formData = $(this).serialize();
    
    // Send form data to the server using jQuery AJAX
    $.ajax({
      type: 'POST',
      url: 'profile_update.php',
      data: formData,
      success: function(response) {
        swal('Done','Appointment Received Us','success');
        // Handle successful response from the server
        window.location.href="./dashboard.php"
        console.log("response");
        console.log(response);
       
 
        
      }
    });
  });
       



    //    $('#user_profile_edit').submit(function(event){
    //     event.preventDefault();
      
    //     var donor_name = $('#donor_name').val();
    //     var donor_email = $('#donor_email').val();
    //     var donor_nic = $('#donor_nic').val();
    //     var donor_phone = $('#donor_phone').val();
    //     var donor_height = $('#donor_height').val();
    //     var donor_weight = $('#donor_weight').val();
    //     var donor_bgroup = $('#donor_bgroup').val();
    //     var U_Gender = $('#U_Gender').val();
    //     var U_DOB = $('#U_DOB').val();
       
    //   console.log("kkl");
    //     if(donor_name == '')
    //     {
    //     swal('Opps...Fill in the Blank','Please Enter Quection','info');
    //     return false;
    //     }else
    //     if(donor_email == '')
    //     {
    //     swal('Opps...Fill in the Blank','Please Enter Answer','info');
    //     return false;
    //     }else
    //     {
    //     $.ajax({
    //     url:"profile_update.php",
    //     method:"POST",
    //     data:new FormData(this),
    //     contentType:false,
    //     processData:false,
    //     success:function(data)
    //     {
    //         if(data == 'insert')
    //         {
    //             swal('Greate Job..','This General Item Update Now','success');
               
               
    //         }else
    //         if(data == 'not_update')
    //         {
    //             swal('Opps...Somthing Went Wrong','Please Contact Developer','error');
    //         }
            
    //     }
    //     });
    //     }
    //   });
  </script>
 
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 
  </body>
<?php
}
}
echo $output;
?>




