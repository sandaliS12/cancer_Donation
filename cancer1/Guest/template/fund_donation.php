<section id="about_us" class="about_us">
    <div class="container col-lg-10 pb-5">

    <div class="section-title" data-aos="zoom-out">
        <h2>Fund Donation</h2>
    </div>

    <div class="boarder">
        <div class="p-5 row text-center">
            
            <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" id="tabfund1">Fund Donation Process</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tabfund2">Fund Raicing Activities</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tabfund3">Donation Gallery</a>
            </li>
           
            </ul>

        </div>

        <div class="tabfund1 text-justify ps-5 pe-5 pb-5">
            
            <b class="text-center">Why Cancer Patients Need Fund</b>
            <p>Cancer hospitals rely on fund donations from generous donors to secure funds for crucial needs, especially for purchasing expensive medications for patients. These contributions ensure that patients have access to essential drugs that can significantly impact their treatment outcomes and quality of life. To guarantee that the donated funds are exclusively allocated for patients' needs, reputable cancer hospitals typically have transparent financial management systems and dedicated mechanisms in place. This ensures that the donated money is used solely for acquiring medications, improving patient care, and advancing medical resources, reinforcing the hospital's commitment to providing optimal care and support for those battling cancer.</p>
            <!-- <p>Every two seconds, someone in the cancer hospital needs blood. Blood is essential to help patients survive surgeries, cancer treatment, chronic illnesses, and traumatic injuries. This lifesaving care starts with one person making a generous donation. The need for blood is constant. But only about 3% of age-eligible people donate blood yearly. So, it is very important to donate blood.</p>
            <p>Also, blood transfusions can act as a resource to implement platelets back into the body after heavy treatments such as chemo or radiation therapy. For cancer patients, blood cells that are made in the bone marrow are often at risk.</p>
            <p>So, Blood transfusions from generous donors provide patients with critical clotting factors, proteins and antibodies needed to help them fight back.</p> -->
            <b>Account Details</b>
            <ul >
                <li><b>Acc Name: Cancer Foundation</b></li>
                <li><b>Bank: Sampath Bank</b></li>
                <li><b>Branch: Maharagama</b></li>
                <li><b>Acc no: 102334975054</b></li>
                          </ul> 
        </div>

        <div class="tabfund2 ps-5 pe-5 pb-5 display-none">
            <div class="text-center">
             
                <p>The blood donation process from the time you arrive until the time you leave takes about an hour. The donation itself is only about 8-10 minutes on average.</p>
            </div>
            <b>Registration</b>
            <div class="row">
                <div class="col-md-3">
                    <img src="slides_images/reg2.jpg" alt="" height="200px" width="100%">
                </div>
                <div class="col-md-9">
                    <p>You’ll be asked to show ID, such as your driver’s license.
                        <br> You’ll read some information about donating blood</p>
                </div>
            </div>

            <b>Health History</b>
            <div class="row">
                <div class="col-md-3">
                    <img src="slides_images/talk2.jpg" alt="" height="200px" width="100%">
                </div>
                <div class="col-md-9">
                    <p>You’ll answer a few questions about your health history and We’ll check your temperature, pulse, blood pressure and hemoglobin level.</p>
                </div>
            </div>

            <b>Your Donation</b>
            <div class="row">
                <div class="col-md-3">
                    <img src="slides_images/don.jpg" alt="" height="200px" width="100%">
                </div>
                <div class="col-md-9">
                    <p>We’ll cleanse an area on your arm and insert a brand new sterile needle for the blood draw. (This feels like a quick pinch and is over in seconds.) A whole blood donation takes about 8-10 minutes, during which you’ll be seated comfortably or lying down. When approximately a pint of whole blood has been collected, the donation is complete and a staff person will place a bandage on your arm.</p>
                </div>
            </div>

            <b>Refreshment and Recovery</b>
            <div class="row">
                <div class="col-md-3">
                    <img src="slides_images/refresh2.jpg" alt="" height="200px" width="100%">
                </div>
                <div class="col-md-9">
                    <p>After donating blood, you’ll have a snack and something to drink in the refreshment area. You’ll leave after 10-15 minutes and continue your normal routine. Enjoy the feeling of accomplishment knowing you are helping to save lives.</p>
                </div>
            </div>
        </div>

        <div class="tabfund3 text-center ps-5 pe-5 pb-5 display-none ">
            <h5>3</h5>
            <div class="row">
                
                    <?php
                     $query = "SELECT * FROM fundgallery";
                     $result = mysqli_query($conn, $query);

                     if(mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_array($result)) {?>
                        <div class="col-md-3 p-1">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($row['f_image'] )?>" height="300px" width="100%"/>
                        </div>
                       <?php }
                     }else{
                        ?>
                        <h5>There are no any images</h5>
                        <?php
                     }
                     
                     ?>
                
            </div>
        </div>

     
    </div>

</div>
</section>

<script>
    document.getElementById('tabfund1').addEventListener('click',
    function(){
    document.getElementById('tabfund1').classList.remove('active');
    document.getElementById('tabfund1').classList.add('active');
    document.getElementById('tabfund2').classList.remove('active');
    document.getElementById('tabfund3').classList.remove('active');
    
    document.querySelector('.tabfund1').style.display = 'inline-block';
    document.querySelector('.tabfund2').style.display = 'none';
    document.querySelector('.tabfund3').style.display = 'none';
     });

    document.getElementById('tabfund2').addEventListener('click',
    function(){
    document.getElementById('tabfund2').classList.remove('active');
    document.getElementById('tabfund2').classList.add('active');
    document.getElementById('tabfund1').classList.remove('active');
    document.getElementById('tabfund3').classList.remove('active');
   
    document.querySelector('.tabfund2').style.display = 'inline-block';
    document.querySelector('.tabfund1').style.display = 'none';
    document.querySelector('.tabfund3').style.display = 'none';
     });

    document.getElementById('tabfund3').addEventListener('click',
    function(){
    document.getElementById('tabfund3').classList.remove('active');
    document.getElementById('tabfund3').classList.add('active');
    document.getElementById('tabfund1').classList.remove('active');
    document.getElementById('tabfund2').classList.remove('active');
   
    document.querySelector('.tabfund3').style.display = 'inline-block';
    document.querySelector('.tabfund1').style.display = 'none';
    document.querySelector('.tabfund2').style.display = 'none';
    
    });
</script>