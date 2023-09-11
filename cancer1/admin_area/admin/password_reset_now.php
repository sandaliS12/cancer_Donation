<?php
session_start(); 
require_once "includes/db_conn.php";
  include ('includes/header.php');
  include ('includes/header.php');
?>

<!-- <div style=" margin-top: 0; padding: 0;  display: flex;" class="liner_colour_black">  -->
<div style="padding-top: 50px;width:100vw">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xs-12 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-4">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-12">Change My Password</h1>
                                        
                                    </div>
                                    <form action="password_change.php" method="post">
                                        <div class="form-group pt-4">
                                            <label for="">E-mail address</label>
                                            <input type="email" name="email" id="email" class="form-control form-control-user" placeholder="Enter Email Address..." readonly title="E-mail" value="<?php echo $_SESSION['A_Email']; ?>">
                                        </div>

                                        <div class="form-group pt-1">
                                            <label for="">New Password</label>
                                            <input type="password" name="new_pass" id="new_pass" class="form-control form-control-user" placeholder="Enter New Password..." required title="E-mail">
                                        </div>

                                        <div class="form-group pt-1">
                                            <label for="">Re-type New Password</label>
                                            <input type="password" name="con_pass" id="con_pass" class="form-control form-control-user" placeholder="Re-type New Password..." required title="E-mail">
                                        </div>
                                       

                                        <input class = "btn btn-primary btn-user btn-block" type="submit" name = "Confirm_new_password" value = "Confirm" id = "button3" title="Send">
                                        </div>
                                        
                                        
                                    </form>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    <!-- </div> -->
    </div>
    <?php
    
?>
 <?php
      if(isset($_SESSION['status']) && $_SESSION['status'] !='')
      {
          ?>
        
        <script>
        swal({
            title: "<?php echo $_SESSION['status']; ?>",
            
            icon: "<?php echo $_SESSION['status_code']; ?>",
            button: "Done!",
            });
        </script>
        <?php
        unset($_SESSION['status']);
      }

    ?>