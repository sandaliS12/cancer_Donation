<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.0/css/buttons.dataTables.min.css">
</head>

<body>

<section id="about_us" class="about_us">
    <div class="container col-lg-10 pb-5">

    <div class="section-title" data-aos="zoom-out">
        <h2>General Item Donation</h2>
    </div>

    <div class="boarder">
        <div class="p-5 row text-center">
            
            <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" id="tab1">Why Donate Items</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab2">How to Donate</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab3">Wanted Items</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab4">Donation Gallery</a>
            </li>
            </ul>

        </div>

        <div class="tab1 text-justify ps-5 pe-5 pb-5">
            
            <b class="text-center">Why Cancer Hospital Need general item donations</b>
            <p>Cancer hospitals in Sri Lanka rely on donations from people to support patient care and treatment.Because of the severe difficulties that a rural hospital is currently having in providing amenities for patients. As a result, getting the basic necessities from the hospital is challenging.In order to meet their needs, the hospital is appealing for contributors' donations.
            
</p>
            <ul >
                <li>Donations help provide necessary medical equipment and supplies for cancer patients.</li>
                <li>Donations support the research and development of new cancer treatments and therapies.</li>
                <li>Donations from the public contribute to creating a compassionate and supportive environment for cancer patients and their families.</li>
                
                          </ul> 
        </div>

        <div class="tab2 ps-5 pe-5 pb-5 display-none">
            <div class="text-center">
             
                <p>The General items donation process is as follow.</p>
            </div>
            <b>Search</b>
            <div class="row">
                <div class="col-md-3">
                    <img src="slides_images/reg2.jpg" alt="" height="200px" width="100%">
                </div>
                <div class="col-md-9">
                    <p>When you went to wanted items tab you can see the updated current needed items list.
                        <br> So you can select something what you want to donate</p>
                </div>
            </div>

            <b>Register</b>
            <div class="row">
                <div class="col-md-3">
                    <img src="slides_images/login_1.jpg" alt="" height="200px" width="100%">
                </div>
                <div class="col-md-9">
                    <p>If you want to donate them you can book a time to donate them. To book a time, firstly you should register and login to the system.</p>
                </div>
            </div>

            <b>Book a Time</b>
            <div class="row">
                <div class="col-md-3">
                    <img src="slides_images/request.jpg" alt="" height="200px" width="100%">
                </div>
                <div class="col-md-9">
                    <p>After you login to the system, you can go to the user dashboard and then you can book a time to donate.</p>
                </div>
            </div>

            <b>Confirmation</b>
            <div class="row">
                <div class="col-md-3">
                    <img src="slides_images/accept.jpg" alt="" height="200px" width="100%">
                </div>
                <div class="col-md-9">
                    <p>When you sent a request to book a time to donate, it is in a pending status and then the admin should accept it. So, after admin's approval, you can donate them at that time.</p>
                </div>
            </div>
        </div>

        <div class="tab3 text-center ps-5 pe-5 pb-5 display-none">

        <p>We sincerely appreciate your generous donations. We kindly request that you obtain official approval from the hospital prior to directly providing donations to inward and clinic patients. Additionally, we urge you to verify the patients with the medical staff before distributing food, supplements, and medicines donations.</p>
            

 <div class="table-responsive small">
     <table class="table table-bordered" id="datatablegeneralitem" width="100%" celllspacing="0" style="font-size: 12px;">
       <thead>
         <tr>
           <th>General Items</th>
           <th>Food Items</th>
           
         </tr>
       </thead>
       <tbody>
       <?php
        // Assuming you have established a database conn

        // Fetch data from the "foods" table
        $foodsQuery = "SELECT * FROM general_items ORDER BY `general_items`.`ID` ASC";
        $foodsResult = mysqli_query($conn, $foodsQuery);

        // Fetch data from the "vegetable" table
        $vegetableQuery = "SELECT * FROM general_item_food ORDER BY `general_item_food`.`ID` ASC";
        $vegetableResult = mysqli_query($conn, $vegetableQuery);

        // Get all rows from the "foods" table
        $foods = mysqli_fetch_all($foodsResult, MYSQLI_ASSOC);

        // Get all rows from the "vegetable" table
        $vegetables = mysqli_fetch_all($vegetableResult, MYSQLI_ASSOC);

        // Get the maximum number of rows between "foods" and "vegetable" tables
        $maxRows = max(count($foods), count($vegetables));
        
        // Loop through the maximum number of rows
        for ($i = 0; $i < $maxRows; $i++) {
        echo "<tr>";

        // Display the "foods" column if available
        if (isset($foods[$i])) {
            echo "<td>".$foods[$i]['Item']."</td>";
        } else {
            echo "<td></td>"; // Empty cell if no data available
        }

        // Display the "vegetables" column if available
        if (isset($vegetables[$i])) {
            echo "<td>".$vegetables[$i]['Gf_name']."</td>";
        } else {
            echo "<td></td>"; // Empty cell if no data available
        }

        echo "</tr>";
    }
    ?>

       
        
        <tbody>
 </table>
 </div>
    </div>

        <div class="tab4 text-center ps-5 pe-5 pb-5 display-none">
            <h5>5</h5>
            <p>The National Cancer Institute provides specialized care for the diagnosis and follow up treatment of cancer. Using a full range of modern diagnostic facilities for the accurate diagnosis of all types of cancers. Treatments are provided by leading expert Consultants and extend across the major disciplines of surgery, chemotherapy and radiotherapy. Hospital staff, postgraduates and medical students are trained through the research and training facilities, thereby supporting the continuity of our services for future generations.</p>
            <p>The National Cancer Institute of Sri Lanka was founded in 1956. Originally set up as a ten-ward radiotherapy centre for cancer patients, the hospital has since expanded dramatically to support the increasing number of cancer patients from across the island. In the year 2009 alone, a total number of 40,500 patients were admitted to the hospital. In 2012, the hospital began major re-developments through the “Razavi Project” – sponsored by international tea company Ahmad Tea, in partnership with the Ministry of Health. In 2014 The “Quality Secretariat” was established at the hospital, in order to work towards improving the quality of care delivery at the National Cancer Institute in the long-term. In 2015, a new 7-story medical complex will be opened at the hospital, offering state-of-the-art facilities, and catering for every group of patients.</p>
            <b>So, By using this system you can do many types of donations that you can and help both of hospital and patients. Then all of you, can collect merit by doing them and also can get good mental satisfaction</b>
        </div>
        <p class="p-3">If you want to donate, Please login first.<button class="btn btn-primary"><a class="nav-link scrollto" href="user_log.php">Click Here to Login</a></button> </p>
        <!-- <p class="p-3">If you want to donate your blood.<button class="btn btn-primary" onclick="return confirm('Please Log In First')">Click Here</button> </p> -->
    </div>

    
</div>
</section>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>


<script type="text/javascript" src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.0/js/dataTables.buttons.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.0/js/buttons.html5.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.0/js/buttons.print.min.js"></script>

<script type="text/javascript">
     $('#datatablegeneralitem').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
    </script>
</body>