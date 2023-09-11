<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="position: relative;background-color:#00b300">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
        <div class="sidebar-brand-icon ">
            <i class="icofont-travelling"></i>
        </div>
        <div class="sidebar-brand-text mx-0">CANCER dONATION <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" aria-expanded="true">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class="collapse-item hide Fetch_Food_Bookings">Dashboard</span>
        </a>

    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php
        if ($Astatus == 1) {
        ?>

    <li class="nav-item">
    <a class="nav-link collapsed" data-toggle="collapse" data-target="#Staff_manage" aria-expanded="true" aria-controls="Staff_manage">
           <i class="fas fa-user"></i>
            <span> Users</span>
        </a>

        <div id="Staff_manage" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components:</h6>
                
                  
                    <p class="collapse-item hide view_staff"> Admins</p>
                    <p class="collapse-item hide Add_Staff">Donors</p>
                
                


            </div>
        </div>

    </li>

    <?php
     }else { ?>

<?php } ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    
    <?php
        if ($Astatus == 0) {
        ?>
<!-- Heading -->
<div class="sidebar-heading">
        Blood donations
    </div>


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#Blood_donation" aria-expanded="true" aria-controls="Blood_donation">
            <i class="bi bi-droplet-fill"></i>
            <span>Blood donation</span>
        </a>
        <div id="Blood_donation" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components:</h6>
                
                    <!-- <p class="collapse-item hide Blood_donor_fetch">Donor Details</p>
                    <p class="collapse-item hide Donor_Bookings">Bookings</p> -->
                    <a class="collapse-item hide Book_Time1">Add Donor</a>
                
                


            </div>
        </div>
    </li>

    <?php
    } else if($Astatus == 2){ ?>
        
        <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#Funds_Donation" aria-expanded="true" aria-controls="Funds_Donation">
            <i class="fas fa-user"></i>
            <span>Food Donation</span>
        </a>
        <div id="Funds_Donation" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components:</h6>

                <a class="collapse-item hide" href="Funds_Donor.php">Food Donor</a>
                <a class="collapse-item hide" href="Funds_Donation.php">Bookings</a>

            </div>
        </div>
    </li>

    <?php
    } else if($Astatus == 3){ ?>
    
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#Visiting_Appointments" aria-expanded="true" aria-controls="Visiting_Appointments">
            <i class="bi bi-people"></i>
            <span>Visiting Appointments</span>
        </a>
        <div id="Visiting_Appointments" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components:</h6>

                <a class="collapse-item hide" href="Visiting_Appointments.php">Appointments</a>

            </div>
        </div>
    </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#Visiting_Appointments" aria-expanded="true" aria-controls="Visiting_Appointments">
            <i class="bi bi-people"></i>
            <span>Entertainment Activity</span>
        </a>
        <div id="Visiting_Appointments" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components:</h6>

                <a class="collapse-item hide" href="Visiting_Appointments.php">Appointments</a>

            </div>
        </div>
    </li>

   
  


    <?php
    } else if($Astatus == 4){ ?>

        <li class="nav-item">
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#Funds_Donation" aria-expanded="true" aria-controls="Funds_Donation">
                    <i class="fas fa-user"></i>
                    <span>Drugs Donation</span>
                </a>
                <div id="Funds_Donation" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Components:</h6>

                        <a class="collapse-item hide" href="Funds_Donor.php">Drugs Donor</a>
                        <a class="collapse-item hide" href="Funds_Donation.php">Bookings</a>

                    </div>
                </div>
            </li>


            <?php
    } else if($Astatus == 4){ ?>


            <li class="nav-item">
                    <a class="nav-link collapsed" data-toggle="collapse" data-target="#Item_Donation" aria-expanded="true" aria-controls="Item_Donation">
                        <i class="bi bi-layers"></i>
                        <span>Item Donation</span>
                    </a>
                    <div id="Item_Donation" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Components:</h6>

                            <p class="collapse-item hide Add_General_Item_Form">Add Items Categories</p>
                            <a class="collapse-item hide" href="Item_Donors.php">Donors</a>
                            <a class="collapse-item hide" href="Item_Bookings.php">Bookings</a>

                        </div>
                    </div>
                </li>

        <?php
     }else { ?>
       
  
       <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#Blood_donation" aria-expanded="true" aria-controls="Blood_donation">
            <i class="bi bi-droplet-fill"></i>
            <span>Blood donation</span>
        </a>
        <div id="Blood_donation" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components:</h6>
                
                    <!-- <p class="collapse-item hide Blood_donor_fetch">Donor Details</p> -->
                    <p class="collapse-item hide view_all_blood">Bookings</p>
                    <a class="collapse-item hide Book_Time1">Add Donor</a>
                
                


            </div>
        </div>
    </li>



    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#Funds_Donation" aria-expanded="true" aria-controls="Funds_Donation">
            <i class="fas fa-user"></i>
            <span>Drugs Donation</span>
        </a>
        <div id="Funds_Donation" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components:</h6>

                <a class="collapse-item hide drug_list_add">Drug List</a>
                <a class="collapse-item hide all_drug_bookings">Donation</a>

            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#Food_Donation" aria-expanded="true" aria-controls="Food_Donation">
            <i class="fa fa-coffee"></i>
            <span>Food Donation</span>
        </a>
        <div id="Food_Donation" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components:</h6>

                <!-- <p class="collapse-item hide Add_Food_Category_Form">Add Food Categories</p> -->
                <p class="collapse-item hide View_food_Category" >Food Categories</p>
                
                <p class="collapse-item hide view_all_food" >View all donations</p>
                <p class="collapse-item hide View_food_recipes" >Resipes</p>

            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#Item_Donation" aria-expanded="true" aria-controls="Item_Donation">
            <i class="bi bi-layers"></i>
            <span>Item Donation</span>
        </a>
        <div id="Item_Donation" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components:</h6>

                <!-- <p class="collapse-item hide Add_General_Item_Form">Add Items Categories</p> -->
                <a class="collapse-item hide View_general_item">Add Items Categories</a>
                <a class="collapse-item hide general_item_Booking">Bookings</a>

            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#Visiting_Appointments" aria-expanded="true" aria-controls="Visiting_Appointments">
            <i class="bi bi-people"></i>
            <span>Entertainment Activity</span>
        </a>
        <div id="Visiting_Appointments" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components:</h6>

                <a class="collapse-item hide entertainment_view">All Appointments</a>

            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#reg_volunteer" aria-expanded="true" aria-controls="reg_volunteer">
            <i class="bi bi-people"></i>
            <span>Volunteers</span>
        </a>
        <div id="reg_volunteer" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components:</h6>

                <a class="collapse-item hide registered_volunteer">Registered Volunteers </a>

            </div>
        </div>
    </li>

    <?php } ?>
     <!-- Divider -->
     <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#chat_bot" aria-expanded="true" aria-controls="chat_bot">
            <i class="fa fa-robot"></i>
            <span>Other Tools</span>
        </a>
        <div id="chat_bot" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components:</h6>

                <p class="collapse-item hide chat_bot2">Chat-Bot Q & A</p>
              

            </div>
        </div>
    </li>

   

   


     
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->






<script>
    document.getElementById('button2').addEventListener('click',
        function() {
            document.querySelector('.login-box1').style.display = 'block';

        });
</script>