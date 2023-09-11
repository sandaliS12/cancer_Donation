<?php 
    
    include "db_conn.php";
    include ('includes/check_login.php');
    include ('includes/header.php');
    include ('includes/sidebar.php');
    include ('includes/topbar.php');
    ?>

    <div class="container-fluid">
      <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center"id="title">
            <!-- <button  name="AdminAdd" class="btn btn-primary"data-toggle="modal" id="AdminAdd">Add New</button></h6> -->
          </div>
        <div class="card-body" id="Blood_donor_fetch"  style="height: 80vh; overflow-y: scroll;">
        <?php 
        ?>
        </div>
      </div>
    </div>

    
    <?php 
    include ('includes/script.php');
    include ('includes/footer.php');
    include ('includes/modal.php');
    ?>