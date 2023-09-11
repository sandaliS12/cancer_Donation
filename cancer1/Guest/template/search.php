<style>

/* Stats Section - Home Page
------------------------------*/
.stats {
  --color-default: #ffffff;
  --color-default-rgb: 255, 255, 255;
  --color-background: #000000;
  --color-background-rgb: 0, 0, 0;
  position: relative;
  padding: 120px 0;
}

.stats img {
  position: absolute;
  inset: 0;
  display: block;
  width: 100%;
  height: 100%;
  -o-object-fit: cover;
  object-fit: cover;
  z-index: 1;
}

.stats:before {
  content: "";
  background: rgba(var(--color-background-rgb), 0.6);
  position: absolute;
  inset: 0;
  z-index: 2;
}

.stats .container {
  position: relative;
  z-index: 3;
}

.stats .stats-item {
  padding: 30px;
  width: 100%;
}

.stats .stats-item span {
  font-size: 48px;
  display: block;
  color: var(--color-default);
  font-weight: 700;
}

.stats .stats-item p {
  padding: 0;
  margin: 0;
  font-family: var(--font-primary);
  font-size: 16px;
  font-weight: 700;
  color: rgba(var(--color-default-rgb), 0.6);
}

</style>
  
  
  
<script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="jquery.counterup.min.js"></script>
  
  
  <h1></h1>

  <br>
  <br>
  <br>
  
  
  <!-- Stats Section - Home Page -->
  <section id="stats" class="stats">

<img src="slides_images/doctor.JPG" alt="" data-aos="fade-in">

<div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

  <div class="row gy-4">

    <!-- <div class="col-lg-3 col-md-6">
      <div class="stats-item text-center w-100 h-100">
        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
        <p>Donors</p>
      </div>
    </div> -->
    <div class="col-lg-3 col-6 text-center">
    <div class="stats-item text-center w-100 h-100">
           
            <span data-toggle="counter-up">
            <?php
                $query="SELECT donor_id FROM donor ORDER BY donor_id";
                $query_run = mysqli_query($conn, $query);
                $row = mysqli_num_rows($query_run);
                echo $row;

            ?>
            </span>
            <p>Donors</p>
            </div>
          </div>

          <div class="col-lg-3 col-6 text-center">
    <div class="stats-item text-center w-100 h-100">
           
            <span data-toggle="counter-up">
            <?php
                $query="SELECT drug_ID FROM drugs_list ORDER BY drug_ID";
                $query_run = mysqli_query($conn, $query);
                $row = mysqli_num_rows($query_run);
                echo $row;

            ?>
            </span>
            <p>Needed Drugs</p>
            </div>
          </div>

          <div class="col-lg-3 col-6 text-center">
    <div class="stats-item text-center w-100 h-100">
           
            <span data-toggle="counter-up">
            <?php
                $query="SELECT ID FROM general_items ORDER BY ID";
                $query_run = mysqli_query($conn, $query);
                $row = mysqli_num_rows($query_run);
                echo $row;

            ?>
            </span>
            <p>Wanted Items</p>
            </div>
          </div>

          <div class="col-lg-3 col-6 text-center">
    <div class="stats-item text-center w-100 h-100">
           
            <span data-toggle="counter-up">
            <?php
                $query="SELECT volunteer_ID FROM volunteer_register ORDER BY volunteer_ID";
                $query_run = mysqli_query($conn, $query);
                $row = mysqli_num_rows($query_run);
                echo $row;

            ?>
            </span>
            <p>Registered Volunteers</p>
            </div>
          </div>
  </div>

</div>

</section><!-- End Stats Section -->