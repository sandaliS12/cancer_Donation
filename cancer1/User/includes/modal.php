<?php
include "template/db_conn.php";
?>



<!-- ========================================================== CHAT-BOT EDIT =========================================================== -->
<div class="modal fade" id="EeAct_edit_modal" tabindex="-2" role="dialog" aria-labelledby="EeAct_edit_modal"
  aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EeAct_edit_modal">Entertain Activity Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" id="EeAct_edit">

          <input type="hidden" id="EeAct_edit" name="action" value="EeAct_edit">
          <input type="hidden" id="EeAct_ID" name="EeAct_ID" value="">

          <div class="form-group">
            <label>Name</label>
            <input type="text" name="EeAct_Name" id="EeAct_Name" value="" class="form-control" placeholder="Enter Name">
          </div>

          <div class="form-group">
            <label>Contact</label>
            <input type="text" name="EeAct_contact" id="EeAct_contact" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>NIC</label>
            <input type="text" name="EeAct_NIC" id="EeAct_NIC" value="" class="form-control" placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Activity</label>
            <input type="text" name="EeAct" id="EeAct" value="" class="form-control" placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Activity Desc</label>
            <input type="text" name="EeAct_Desc" id="EeAct_Desc" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Prefered ward</label>
            <select name="enterwards" id="enterwards" class="form-control">

              <?php
              $queryEWard = "SELECT * FROM wards";
              $queryEW = mysqli_query($conn, $queryEWard);

              echo '<option value="0">Select Ward You prefer</option>';

              while ($rowE = mysqli_fetch_array($queryEW)) {
                echo ' <option value=' . $rowE["ID"] . '>' . $rowE["W_ID"] . '</option>';
              }
              ?>

            </select>

          </div>

          <div class="form-group">
            <label>No Of Visitors</label>
            <input type="text" name="EeAct_noofvisiters" id="EeAct_noofvisiters" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Date</label>
            <input type="text" id="datepickerEntertain" name="datepickerEntertain" class="form-control">
          </div>



      </div>


      <div class="modal-footer">

        <button type="submit" class="btn btn-primary chat_bot_edit_data" name="CB_edit" value="Edit"
          id="CB_add">Edit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

      </div>
      </form>
    </div>
  </div>
</div>





<!-- ========================================================== CHAT-BOT EDIT =========================================================== -->
<div class="modal fade" id="ggItemD_edit_modal" tabindex="-2" role="dialog" aria-labelledby="ggItemD_edit_modal"
  aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ggItemD_edit_modal">General Item Donation Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" id="ggItemD_edit">

          <input type="hidden" id="ggItemD_edit" name="action" value="ggItemD_edit">
          <input type="hidden" id="ggItemD_ID" name="ggItemD_ID" value="">

          <div class="form-group">
            <label>Name</label>
            <input type="text" name="ggItemD_Name" id="ggItemD_Name" value="" class="form-control"
              placeholder="Enter Name">
          </div>

          <div class="form-group">
            <label>Contact</label>
            <input type="text" name="ggItemD_Email" id="ggItemD_Email" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>NIC</label>
            <input type="text" name="ggItemD_contact" id="ggItemD_contact" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>No Of Visitors</label>
            <input type="text" name="ggItemD_NIC" id="ggItemD_NIC" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Drug list</label>
            <select name="drugList" id="gItem" class="form-control" multiple>

              <?php
              $querydlist = "SELECT * FROM general_items";
              $querydrug = mysqli_query($conn, $querydlist);

              echo '<option value="0">Select Item You donate</option>';

              while ($rowE = mysqli_fetch_array($querydrug)) {
                echo ' <option value=' . $rowE["Item"] . '>' . $rowE["Item"] . '</option>';
              }
              ?>


            </select>

          </div>

          <div class="form-group">
            <label>Prefered ward</label>
            <select name="otherwards" id="otherwards" class="form-control">

              <?php
              $queryEWard = "SELECT * FROM wards";
              $queryEW = mysqli_query($conn, $queryEWard);

              echo '<option value="0">Select Ward You prefer</option>';

              while ($rowE = mysqli_fetch_array($queryEW)) {
                echo '<option value=' . $rowE["ID"] . '>' . $rowE["W_ID"] . '</option>';
              }
              ?>

            </select>

          </div>

          <div class="form-group">
            <label>Date</label>
            <input type="date" id="dateGItem" name="dateGItem" value="" class="form-control">
          </div>


          <div class="form-group">
            <label>Quentity</label>
            <input type="text" id="ggItem_quentity" name="ggItem_quentity" class="form-control">
          </div>



      </div>


      <div class="modal-footer">

        <button type="submit" class="btn btn-primary chat_bot_edit_data" name="CB_edit" value="Edit"
          id="CB_add">Edit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

      </div>
      </form>
    </div>
  </div>
</div>



<!-- ========================================================== CHAT-BOT EDIT =========================================================== -->
<div class="modal fade" id="ddrug_edit_modal" tabindex="-2" role="dialog" aria-labelledby="ddrug_edit_modal"
  aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ddrug_edit_modal">Drug Donation Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" id="ddrug_edit">

          <input type="hidden" id="ddrug_edit" name="action" value="ddrug_edit">
          <input type="hidden" id="ddrug_DID" name="ddrug_DID" value="">


          <div class="form-group">
            <label>Name</label>
            <input type="text" name="ddrug_DName" id="ddrug_DName" value="" class="form-control"
              placeholder="Enter Name">
          </div>

          <div class="form-group">
            <label>Contact</label>
            <input type="text" name="ddrug_DContact" id="ddrug_DContact" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="text" name="ddrug_DEmail" id="ddrug_DEmail" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>NIC</label>
            <input type="text" name="ddrug_DNIC" id="ddrug_DNIC" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Drug list</label>
            <select name="ddrug_DDrug" id="ddrug_DDrug" class="form-control" multiple>

              <?php
              $querydlist = "SELECT * FROM drugs_list";
              $querydrug = mysqli_query($conn, $querydlist);

              echo '<option value="0">Select Drug You donate</option>';

              while ($rowE = mysqli_fetch_array($querydrug)) {
                echo '<option value=' . $rowE["drug_name"] . '>' . $rowE["drug_name"] . '    ' . $rowE["drug_weight"] . '</option>';
              }
              ?>


            </select>

          </div>



          <div class="form-group">
            <label>Date</label>
            <input type="date" id="ddrug_DDate" name="ddrug_DDate" value="" class="form-control">
          </div>

      </div>


      <div class="modal-footer">

        <button type="submit" class="btn btn-primary chat_bot_edit_data" name="CB_edit" value="Edit"
          id="CB_add">Edit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

      </div>
      </form>
    </div>
  </div>
</div>

<!-- ========================================================== CHAT-BOT EDIT =========================================================== -->
<div class="modal fade" id="blood_edit_modal" tabindex="-2" role="dialog" aria-labelledby="blood_edit_modal"
  aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="blood_edit_modal">Blood Donation Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" id="blood_edit">

          <input type="hidden" id="blood_edit" name="action" value="blood_edit">
          <input type="hidden" id="blood_ID" name="blood_ID" value="">

          <div class="form-group">
            <label>Name</label>
            <input type="text" name="blood_name" id="blood_name" value="" class="form-control" placeholder="Enter Name">
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="text" name="blood_email" id="blood_email" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Contact</label>
            <input type="text" name="blood_contact" id="blood_contact" value="blood_contact" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Weight</label>
            <input type="text" name="blood_weight" id="blood_weight" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Height</label>
            <input type="text" name="blood_height" id="blood_height" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Date</label>
            <input type="text" name="datepicker" id="datepicker" value="" class="form-control">
          </div>

          <div class="form-group">
            <label>Time</label>
            <select id="BBlood_time_slot" name="BBlood_time_slot" class="form-control">
              <option value="1" ' . $ED1 . '>9.00 am to 9.30 am</option>
              <option value="2" ' . $ED2 . '>9.30 am to 10.00 am</option>
              <option value="3" ' . $ED3 . '>10.00 am to 10.30 am</option>
              <option value="4" ' . $ED4 . '>10.30 am to 11.00 am</option>
              <option value="5" ' . $ED5 . '>11.00 am to 11.30 am</option>
              <option value="6" ' . $ED6 . '>11.30 am to 12.00 am</option>
            </select>

          </div>


          <div class="form-group">
            <label>Donate blood before</label>
            <select id="blood_DBefore" name="blood_DBefore" class="form-control">
              <option value="Y">Yes</option>
              <option value="N">No</option>
            </select>

            <!-- <input type="text" name="blood_DBefore" id="blood_DBefore" value="" class="form-control" placeholder="Enter Answer"> -->
          </div>

          <div class="form-group">
            <label>How many times donate</label>
            <input type="text" name="blood_HM_times" id="blood_HM_times" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Last Blood donate date</label>
            <input type="date" name="blood_LBDate" id="blood_LBDate" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Blood Group</label>
            <!-- <input type="text" name="blood_Group" id="blood_Group" value="" class="form-control" placeholder="Enter Answer"> -->
            <select name="blood_Group" class="form-control" id="blood_Group" value="">
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


      <div class="modal-footer">

        <button type="submit" class="btn btn-primary chat_bot_edit_data" name="CB_edit" value="Edit"
          id="CB_add">Edit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

      </div>
      </form>
    </div>
  </div>
</div>





<div class="modal fade" id="volunt_edit_modal1" tabindex="-2" role="dialog" aria-labelledby="volunt_edit_modal1"
  aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="volunt_edit_modal1">Volunteer Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" id="package_overview_new_form">

          <input type="hidden" id="volunt_edit" name="action" value="volunt_edit">
          <input type="hidden" id="volunt_ID" name="volunt_ID" value="">




          <div class="form-group">
            <label>Name</label>
            <input type="text" name="volunt_Name" id="volunt_Name" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>DOB</label>
            <input type="text" name="volunt_DOB" id="volunt_DOB" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="text" name="volunt_Email" id="volunt_Email" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Contact</label>
            <input type="text" name="volunt_Contact" id="volunt_Contact" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>NIC</label>
            <input type="text" name="volunt_Email" id="volunt_Email" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Occupation</label>
            <input type="text" name="volunt_Occupation" id="volunt_Occupation" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Experience</label>
            <input type="text" name="volunt_Experience" id="volunt_Experience" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Activity</label>
            <input type="text" name="volunt_Activity" id="volunt_Activity" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Description</label>
            <input type="text" name="volunt_Description" id="volunt_Description" value="" class="form-control"
              placeholder="Enter Answer">
          </div>






          <div class="modal-footer">

            <button type="submit" class="btn btn-primary chat_bot_edit_data" name="CB_edit" value="Edit"
              id="CB_add">Edit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- ========================================================== food EDIT =========================================================== -->


<div class="modal fade" id="food_edit_modal1" tabindex="-2" role="dialog" aria-labelledby="volunt_edit_modal1"
  aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="volunt_edit_modal1">Food Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" id="food_edit">

          <input type="hidden" id="food_edit" name="action" value="food_edit">
          <input type="hidden" id="food_ID" name="food_ID" value="">


          <div class="form-group">
            <label>Select Category</label>
            <select name="Fcategory1" id="Fcategory1" class="form-control">
              <?php
              $queryC = "SELECT * FROM food_category";
              $query_run = mysqli_query($conn, $queryC);

              echo '<option value="0">Select Category</option>';

              while ($row1 = mysqli_fetch_assoc($query_run)) {
                echo '<option value="' . $row1["f_categoryId"] . '">' . $row1["f_categoryName"] . '</option>';
              }
              ?>
            </select>
          </div>


          <div class="form-group">
            <label>Select Time</label>
            <select name="FTime1" id="FTime1" class="form-control">
              <option value="0">Select Category</option>
              <option value="1">Breackfast</option>
              <option value="2">Lunch</option>
              <option value="3">Dinner</option>
            </select>
          </div>

          <div class="form-group">
            <label>Date</label>
            <input type="text" name="FoodDatepicker" id="FoodDatepicker" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Description</label>
            <input type="text" name="add_desc" id="add_desc" value="" class="form-control" placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>No of Visit</label>
            <input type="text" name="n_of_visit" id="n_of_visit" value="" class="form-control"
              placeholder="Enter Answer">
          </div>





          <div class="modal-footer">

            <button type="submit" class="btn btn-primary chat_bot_edit_data" name="CB_edit" value="Edit"
              id="CB_add">Edit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="food_edit_modal11" tabindex="-2" role="dialog" aria-labelledby="food_edit_modal1"
  aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="food_edit_modal1">Volunteer Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <div class="modal-body">
  

          <form method="POST" enctype="multipart/form-data" id="food_edit">

            <input type="hidden" id="food_edit" name="action" value="food_edit">
            <input type="hidden" id="food_ID" name="food_ID" value="">


           

            <div class="form-group">
              <label>Date</label>
              <input type="text" name="FoodDatepicker" id="FoodDatepicker" value="" class="form-control"
                placeholder="Enter Answer">
            </div>

            <div class="form-group">
              <label>Description</label>
              <input type="text" name="add_desc" id="add_desc" value="" class="form-control" placeholder="Enter Answer">
            </div>

            <div class="form-group">
              <label>No of Visit</label>
              <input type="text" name="n_of_visit" id="n_of_visit" value="" class="form-control"
                placeholder="Enter Answer">
            </div>





            <div class="modal-footer">

              <button type="submit" class="btn btn-primary chat_bot_edit_data" name="CB_edit" value="Edit"
                id="CB_add">Edit</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

            </div>
          </form>
          </div> -->

      <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" id="package_overview_new_form">

          <input type="hidden" id="volunt_edit" name="action" value="volunt_edit">
          <input type="hidden" id="volunt_ID" name="volunt_ID" value="">




          <div class="form-group">
            <label>Name</label>
            <input type="text" name="volunt_Name" id="volunt_Name" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>DOB</label>
            <input type="text" name="volunt_DOB" id="volunt_DOB" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="text" name="volunt_Email" id="volunt_Email" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Contact</label>
            <input type="text" name="volunt_Contact" id="volunt_Contact" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>NIC</label>
            <input type="text" name="volunt_Email" id="volunt_Email" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Occupation</label>
            <input type="text" name="volunt_Occupation" id="volunt_Occupation" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Experience</label>
            <input type="text" name="volunt_Experience" id="volunt_Experience" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Activity</label>
            <input type="text" name="volunt_Activity" id="volunt_Activity" value="" class="form-control"
              placeholder="Enter Answer">
          </div>

          <div class="form-group">
            <label>Description</label>
            <input type="text" name="volunt_Description" id="volunt_Description" value="" class="form-control"
              placeholder="Enter Answer">
          </div>






          <div class="modal-footer">

            <button type="submit" class="btn btn-primary chat_bot_edit_data" name="CB_edit" value="Edit"
              id="CB_add">Edit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

          </div>
        </form>
      </div>
    </div>
  </div>




  <!-- ===============================================================================================
                                          ADMIN ADD MODAL START
================================================================================================ -->

  <!-- ===============================================================================================
                                          ADMIN EDIT MODAL START
================================================================================================ -->
  <div class="modal fade" id="admin_update" tabindex="-2" role="dialog" aria-labelledby="admin_update"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Admin Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="POST" enctype="multipart/form-data" id="admin_edit_form">

            <input type="hidden" name="edit_ID" id="edit_ID" value="">

            <input type="hidden" name="action" id="admin_update" value="admin_update" />

            <div class="form-group">
              <label>Name</label>
              <input type="text" name="edit_Name" id="edit_Name" value="" class="form-control" placeholder="Admin Name">
            </div>

            <div class="form-group">
              <label>Email</label>
              <input type="text" name="edit_Email" id="edit_Email" value="" class="form-control"
                placeholder="Admin Email">
            </div>

            <div class="form-group">
              <label>Contact Number</label>
              <input type="text" name="edit_Number" id="edit_Number" value="" class="form-control"
                placeholder="Admin Contact Number">
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" name="edit_Password" id="edit_Password" value="" class="form-control"
                placeholder="Admin Password">
            </div>

            <div class="form-group password">
              <label>Confirm Password</label>
              <input type="password" name="edit_reassword" id="edit_reassword" value="" class="form-control"
                placeholder="Confirm Password">
            </div>

            <div class="form-group">
              <label>Select Category</label>

              <select name="adminRoleEdit" id="adminRoleEdit" class="form-control">
                <option value="0">--Select--</option>
                <option value="0">Food Donation Handling Admin</option>
                <option value="2">Blood Donation Handling Admin</option>
                <option value="4">Drug & General Item Donation Handling Admin</option>
                <option value="3">Entertainment & Volunteering Handling Admin</option>

              </select>
            </div>


        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="A_Delete">Close</button>

          <button type="submit" class="btn btn-primary" name="A_edit">Edit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- ===============================================================================================
                                          ADMIN DELETE MODAL START
================================================================================================ -->
  <div class="modal fade" id="Admin_Delete" tabindex="-3" role="dialog" aria-labelledby="delete" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="delete">Delete Admin Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


          <form method="POST" enctype="multipart/form-data" id="admin_delete_form">

            <input type="hidden" name="delete_ID" id="delete_ID" value="">


            <div class="form-group">
              <label>Admin Name</label>
              <input type="text" name="delete_Name" id="delete_Name" value="" class="form-control"
                placeholder="Admin Name" readonly>
            </div>

            <div class="form-group">
              <label>Enter Admin Password</label>
              <input type="password" name="delete_Password" id="delete_Password" value="" class="form-control"
                placeholder="Admin Password">
            </div>


        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="A_Delete">Close</button>

          <button type="submit" class="btn btn-danger" name="A_delete">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>



  <!-- ===============================================================================================
                                          ADMIN ADD MODAL START
================================================================================================ -->
  <div class="modal fade" id="AdminAddModal" tabindex="-1" role="dialog" aria-labelledby="AdminAddModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="admin_add">Add New Admin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="POST" enctype="multipart/form-data" id="admin_form">

            <input type="hidden" name="action" id="admin_insert" value="admin_insert">

            <!-- <input type="hidden" name="aid" id="aid" value="" /> -->

            <div class="form-group">
              <label>Name</label>
              <input type="text" name="add_Name" id="add_Name" value="" class="form-control" placeholder="Admin Name">
            </div>

            <div class="form-group">
              <label>Email</label>
              <input type="text" name="add_Email" id="add_Email" value="" class="form-control"
                placeholder="Admin Email">
            </div>

            <div class="form-group">
              <label>Contact Number</label>
              <input type="text" name="add_Number" id="add_Number" value="" class="form-control"
                placeholder="Admin Contact Number">
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" name="add_Password" id="add_Password" value="" class="form-control"
                placeholder="Admin Password">
            </div>

            <div class="form-group password">
              <label>Confirm Password</label>
              <input type="password" name="add_reassword" id="add_reassword" value="" class="form-control"
                placeholder="Confirm Password">
            </div>

            <div class="form-group">
              <label>Select Category</label>

              <select name="adminRole" id="adminRole" class="form-control">
                <option value="0">--Select--</option>
                <option value="0">Food Donation Handling Admin</option>
                <option value="2">Blood Donation Handling Admin</option>
                <option value="4">Drug & General Item Donation Handling Admin</option>
                <option value="3">Entertainment & Volunteering Handling Admin</option>

              </select>
            </div>

        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="A_Delete">Close</button>


          <button type="submit" class="btn btn-primary" name="A_add" id="A_add">Add</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- ===============================================================================================
                                          QR LOGIN MODAL
================================================================================================ -->
  <div class="modal fade" id="login_qr_modal" tabindex="-1" role="dialog" aria-labelledby="login_qr_modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="login_qr_modal">Admin Login with QR Code</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <video id="login_qr_preview" width="100%"></video>

          </div>
          <form action="../admin/login_with_qr.php" method="post" id="login_with_qr">

            <input type="hidden" name="qr_email" id="qr_email" readonly placeholder="scan qrcode" class="form-control">

          </form>
        </div>
      </div>
    </div>
  </div>




  <!-- ===============================================================================================
                                          Food Donation Rejection
================================================================================================ -->
  <div class="modal fade" id="event_Reject_Model" tabindex="-2" role="dialog" aria-labelledby="event_Reject_Model"
    aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="event_Reject_Model"> Reject Entertainment Activity</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="POST" enctype="multipart/form-data" id="event_Reject_Model_Form">

            <input type="hidden" id="event_Reject_Model_Submit" name="action" value="event_Reject_Model_Submit">
            <input type="hidden" id="ER_ID" name="ER_ID" value="">

            <div class="form-group">
              <label>Reason</label>
              <input type="text" name="rejectFeedEnter" id="rejectFeedEnter" value="" class="form-control"
                placeholder="Enter Reason">
            </div>



        </div>


        <div class="modal-footer">

          <button type="submit" class="btn btn-primary ER_Reject_data" name="ER_Reject" value="Add"
            id="ER_Reject">Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

        </div>
        </form>
      </div>
    </div>
  </div>




  <!-- ===============================================================================================
                                          FOOD CATEGORY MODAL START
================================================================================================ -->
  <div class="modal fade" id="FoodCModal" tabindex="-1" role="dialog" aria-labelledby="FoodCModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="admin_add">Add New Food Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="POST" enctype="multipart/form-data" id="foodCat_form">

            <input type="hidden" name="action" id="addFCategory" value="addFCategory">

            <!-- <input type="hidden" name="aid" id="aid" value="" /> -->

            <div class="form-group">
              <label>Category name</label>
              <input type="text" name="fcategory" id="fcategory" value="" class="form-control"
                placeholder="Enter Category name">
            </div>

            <div class="form-group">
              <label>Description</label>
              <input type="textarea" name="fcdesc" id="fcdesc" value="" class="form-control"
                placeholder="Enter Description">
            </div>

            <div class="form-group password">
              <label>Times per day</label>
              <input type="number" name="timeFC" min="1" max="10" value="" class="form-control" id="timeFC">

            </div>

        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="A_Delete">Close</button>


          <button type="submit" class="btn btn-primary" name="FC_ADD" id="FC_ADD">Add</button>
          </form>
        </div>
      </div>
    </div>
  </div>



  <!-- ===============================================================================================
                                          FOOD CATEGORY EDIT MODAL START
================================================================================================ -->
  <div class="modal fade" id="fcat_update" tabindex="-2" role="dialog" aria-labelledby="fcat_update" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update food category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="POST" enctype="multipart/form-data" id="fcat_edit_form">

            <input type="hidden" name="fcat_ID" id="fcat_ID" value="">

            <input type="hidden" name="f_Status" id="f_Status" value="">

            <input type="hidden" name="action" id="fcat_update" value="fcat_update" />



            <div class="form-group">
              <label>Category</label>
              <input type="text" name="edit_fcName" id="edit_fcName" value="" class="form-control"
                placeholder="Food category">

            </div>

            <div class="form-group">
              <label>Description</label>
              <input type="text" name="edit_fcdesc" id="edit_fcdesc" value="" class="form-control"
                placeholder="Add description">

            </div>

            <div class="form-group">
              <label>Times per day</label>
              <input type="number" name="edit_fcNumber" id="edit_fcNumber" value="" class="form-control"
                placeholder="Number of times it gives">
            </div>

        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="A_Delete">Close</button>

          <button type="submit" class="btn btn-primary" name="FC_edit">Edit</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- ===============================================================================================
                                          General Item START
================================================================================================ -->
  <div class="modal fade" id="gItem_add_modal" tabindex="-2" role="dialog" aria-labelledby="gItem_add_modal"
    aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="gItem_add_modal">General Items Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="POST" enctype="multipart/form-data" id="gitem_db_add">

            <input type="hidden" id="action" name="action" value="gitem_db_add">


            <div class="form-group">
              <label>Type</label>
              <select name="itemdonationtype" id="itemdonationtype" class="form-control">
                <option value="0">Select item type</option>
                <option value="1">General Items</option>
                <option value="2">General Food Items</option>
              </select>
            </div>


            <div class="form-group">
              <label>Item</label>
              <input type="text" class="form-control" id="gidesc" placeholder="Enter Description" name="gidesc">
            </div>





        </div>


        <div class="modal-footer">

          <button type="submit" class="btn btn-primary chat_bot_add_data" name="GI_add" value="Add"
            id="GI_add">Add</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- ========================================================== GENERAL ITEM EDIT =========================================================== -->
  <div class="modal fade" id="GItem_edit_modal" tabindex="-2" role="dialog" aria-labelledby="GItem_edit_modal"
    aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="GItem_edit_modal">GENERAL ITEM Edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="POST" enctype="multipart/form-data" id="GItem_edit">

            <input type="hidden" id="GItem_edit" name="action" value="GItem_edit">
            <input type="hidden" id="GI_ID" name="GI_ID" value="">

            <div class="form-group">
              <label>Type</label>
              <select name="itemdonationtype_EDIT" id="itemdonationtype_EDIT" class="form-control">
                <option value="0">Select item type</option>
                <option value="1">General Items</option>
                <option value="2">General Food Items</option>
              </select>
            </div>


            <div class="form-group">
              <label>Item</label>
              <input type="text" class="form-control" id="gidesc_EDIT" placeholder="Enter Description"
                name="gidesc_EDIT">
            </div>
        </div>


        <div class="modal-footer">

          <button type="submit" class="btn btn-primary chat_bot_edit_data" name="CB_edit" value="Edit"
            id="CB_add">Edit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

        </div>
        </form>
      </div>
    </div>
  </div>


  <!-- ========================================================== GENERAL ITEM EDIT2 =========================================================== -->
  <div class="modal fade" id="GItem_edit_modal2" tabindex="-2" role="dialog" aria-labelledby="GItem_edit_modal2"
    aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="GItem_edit_modal2">GENERAL FOOD ITEM Edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="POST" enctype="multipart/form-data" id="GItem_edit2">

            <input type="hidden" id="GItem_edit2" name="action" value="GItem_edit2">
            <input type="hidden" id="GI_ID2" name="GI_ID2" value="">

            <div class="form-group">
              <label>Type</label>
              <select name="itemdonationtype_EDIT2" id="itemdonationtype_EDIT2" class="form-control">
                <option value="0">Select item type</option>
                <option value="1">General Items</option>
                <option value="2">General Food Items</option>
              </select>
            </div>


            <div class="form-group">
              <label>Item</label>
              <input type="text" class="form-control" id="gidesc_EDIT2" placeholder="Enter Description"
                name="gidesc_EDIT2">
            </div>
        </div>


        <div class="modal-footer">

          <button type="submit" class="btn btn-primary chat_bot_edit_data" name="CB_edit" value="Edit"
            id="CB_add">Edit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

        </div>
        </form>
      </div>
    </div>
  </div>



  <!-- ========================================================== VOLUNTEER EMAIL===========================================================
    <div class="modal fade" id="voluntEmail_modal" tabindex="-2" role="dialog" aria-labelledby="voluntEmail_modal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="voluntEmail_modal">EMAIL TO VOLUNTEER</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" id="voluntEmail_SUBMIT"> 

        <input type="hidden" id="voluntEmail_SUBMIT" name="action" value="voluntEmail_SUBMIT">
        <input type="hidden" id="volunteer_ID" name="volunteer_ID" value="">
        
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" id="Vo_Name" placeholder="Enter Description" name="Vo_Name">
        </div>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control" id="Vo_Email" placeholder="Enter Description" name="Vo_Email">
        </div>
        </div>

        <div class="form-group">
          <label>Message</label>
          <input type="textarea" class="form-control" id="Vo_Message" placeholder="Enter Message" name="Vo_Message">
        </div>
        </div>




        <div class="modal-footer">
          
              <button type="button" class="btn btn-primary vo_submit" name="vo_submit" value="Submit" id="vo_submit" >Send</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

        </div>
        </form>
        </div>
    </div>
    </div> -->



  <!-- ===============================================================================================
                                          VOLUNTEER EMAIL SEND
================================================================================================ -->
  <div class="modal fade" id="voluntEmail_modal" tabindex="-2" role="dialog" aria-labelledby="voluntEmail_modal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Send Email to Volunteers</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="POST" enctype="multipart/form-data" id="voluntEmail_SUBMIT">

            <input type="hidden" name="volunteer_ID" id="volunteer_ID" value="">

            <input type="hidden" name="action" id="vEmail_send" value="vEmail_send" />



            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" id="Vo_Name" placeholder="Enter Description" name="Vo_Name">
            </div>


            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" id="Vo_Email" placeholder="Enter Description" name="Vo_Email">

            </div>


            <div class="form-group">
              <label>Message</label>
              <textarea rows="5" class="form-control" id="Vo_Message" placeholder="Enter Message"
                name="Vo_Message"></textarea>
            </div>



        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="A_Delete">Close</button>

          <button type="submit" class="btn btn-primary" name="FC_edit">Edit</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- ===============================================================================================
                                          DONORS EMAIL SEND
================================================================================================ -->
  <div class="modal fade" id="donorEmail_modal" tabindex="-2" role="dialog" aria-labelledby="donorEmail_modal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Send Email to Donors</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="POST" enctype="multipart/form-data" id="donorEmail_SUBMIT">

            <input type="hidden" name="donor_id" id="donor_id" value="">

            <input type="hidden" name="action" id="donorEmail_send" value="donorEmail_send" />



            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" id="donor_name" placeholder="Enter Description" name="donor_name">
            </div>


            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" id="donor_email" placeholder="Enter Description"
                name="donor_email">

            </div>


            <div class="form-group">
              <label>Message</label>
              <textarea rows="5" class="form-control" id="donor_Message" placeholder="Enter Message"
                name="donor_Message"></textarea>
            </div>



        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="A_Delete">Close</button>

          <button type="submit" class="btn btn-primary" name="donor_email">Send</button>
          </form>
        </div>
      </div>
    </div>
  </div>



  <!-- ===============================================================================================
                                          DRUG LIST MODAL START
================================================================================================ -->
  <div class="modal fade" id="drugListModal" tabindex="-1" role="dialog" aria-labelledby="drugListModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="admin_add">Add New Drug</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="POST" enctype="multipart/form-data" id="drugAdd_form">

            <input type="hidden" name="action" id="adddrugs" value="adddrugs">

            <!-- <input type="hidden" name="aid" id="aid" value="" /> -->

            <div class="form-group">
              <label>Drug name</label>
              <input type="text" name="drug_name" id="drug_name" value="" class="form-control"
                placeholder="Enter Category name">
            </div>

            <div class="form-group">
              <label>Weight</label>
              <input type="text" name="drug_weight" id="drug_weight" value="" class="form-control"
                placeholder="Enter Description">
            </div>

        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="A_Delete">Close</button>


          <button type="submit" class="btn btn-primary" name="dr_ADD" id="dr_ADD">Add</button>
          </form>
        </div>
      </div>
    </div>
  </div>



  <!-- ===============================================================================================
                                          Drugs EDIT MODAL START
================================================================================================ -->
  <div class="modal fade" id="drugsList_update" tabindex="-2" role="dialog" aria-labelledby="drugsList_update"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Selected Drug</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="POST" enctype="multipart/form-data" id="drug_edit_form1">

            <input type="hidden" name="drugID" id="drugID" value="">

            <input type="hidden" name="action" id="drug_edit_form1" value="drug_edit_form1" />



            <div class="form-group">
              <label>Drug Name</label>
              <input type="text" name="edit_drug_name" id="edit_drug_name" class="form-control"
                placeholder="Food category">

            </div>

            <div class="form-group">
              <label>Weight</label>
              <input type="text" name="edit_drug_weight" id="edit_drug_weight" class="form-control"
                placeholder="Add description">

            </div>

        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="A_Delete">Close</button>

          <button type="submit" class="btn btn-primary" name="drug_edit">Edit</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- ========================================================== Volunteer EDIT =========================================================== -->


  <!-- ===============================================================================================
                                          Drugs EDIT MODAL START
================================================================================================ -->
  <div class="modal fade" id="volunt_edit_modal1" tabindex="-2" role="dialog" aria-labelledby="volunt_edit_modal1"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Selected Drug</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="POST" enctype="multipart/form-data" id="drug_edit_form1">

            <input type="hidden" name="drugID" id="drugID" value="">

            <input type="hidden" name="action" id="drug_edit_form1" value="drug_edit_form1" />



            <div class="form-group">
              <label>Drug Name</label>
              <input type="text" name="edit_drug_name" id="edit_drug_name" class="form-control"
                placeholder="Food category">

            </div>

            <div class="form-group">
              <label>Weight</label>
              <input type="text" name="edit_drug_weight" id="edit_drug_weight" class="form-control"
                placeholder="Add description">

            </div>

        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="A_Delete">Close</button>

          <button type="submit" class="btn btn-primary" name="drug_edit">Edit</button>
          </form>
        </div>
      </div>
    </div>
  </div>