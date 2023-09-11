<?php
  include "./db_conn.php";
?>

<!-- ===============================================================================================
                                        Insert New Events
================================================================================================ -->
<div class="modal fade" id="InsertNewEvents" tabindex="1" role="dialog" aria-labelledby="InsertNewEvents" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EventModelHeader1">Insert New Event</h5>
        <h5 class="modal-title" id="EventModelHeader2">Update Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <select name="" id="Select_Event_list" class="btn-success form-control">
                <option value="0">--Select Event--</option>
                <option value="1">Blood Donation</option>
                <option value="2">Food Donation</option>
                <option value="3">Fund Donation</option>
                <option value="4">Other Donation</option>
            </select>
        </div>

        <div class="form-group">
            <select name="" id="Select_Donor" class="btn-success form-control">
                <option value="0">--Select Donor--</option>
                    <?php
                    $query = "SELECT * FROM donor";
                    $query_run = mysqli_query($conn,$query);
                    if(mysqli_num_rows($query_run) > 0)
                        {
                        while($row1 = mysqli_fetch_assoc($query_run))
                        {
                    ?>
                
                        <option value="<?php echo $row1['donor_id']; ?>"><?php echo $row1['donor_name']; ?></option>

                    <?php }
                    }?>
            </select>
        </div>

        <div class="form-group">
            <select name="" id="Select_Ward" class="btn-success form-control">
                <option value="0">--Select Ward--</option>
                    <?php
                    $query = "SELECT * FROM wards";
                    $query_run = mysqli_query($conn,$query);
                    if(mysqli_num_rows($query_run) > 0)
                        {
                        while($row1 = mysqli_fetch_assoc($query_run))
                        {
                    ?>
                
                        <option value="<?php echo $row1['ID']; ?>"><?php echo $row1['W_ID']; ?></option>

                    <?php }
                    }?>
            </select>
        </div>
      
        <div id="New_Event_Body"></div>

        <input type="hidden" name="E_ID" id="E_ID">
        <input type="hidden" name="U_ID" id="U_ID">
        <input type="hidden" name="E_Type" id="E_Type">
        <input type="hidden" name="W_Type" id="W_Type">
        <input type="date" name="UpdateE_Date" id="UpdateE_Date" style="display: none;">

      </div>
      <div class="modal-footer">
        
        <button class="btn btn-success New_Event" name="New_Event" value="" id="New_Event">Add</button>
        <button class="btn btn-success Update_Event" name="Update_Event" value="" id="Update_Event">Update</button>

      </div>
      </div>
  </div>
</div>


<!-- ===============================================================================================
                                          BOT-CHAT START
================================================================================================ -->
<div class="modal fade" id="bot_chat_add_modal" tabindex="-2" role="dialog" aria-labelledby="bot_chat_add_modal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bot_chat_add_modal">Bot Chat Quections & Answers</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" id="chat_bot_QA_add"> 

        <input type="hidden" id="action" name="action" value="chat_bot_QA_add">
        
        <div class="form-group">
          <label>Quection</label>
          <input type="text" name="CB_Quection" id="CB_Quection" value="" class="form-control" placeholder="Enter Quection">
        </div>

        <div class="form-group">
          <label>Answer</label>
          <input type="text" name="CB_Answer" id="CB_Answer" value="" class="form-control" placeholder="Enter Answer">
        </div>

        </div>


        <div class="modal-footer">
          
              <button type="submit" class="btn btn-primary chat_bot_add_data" name="CB_add" value="Add" id="CB_add" >Add</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

        </div>
        </form>
        </div>
    </div>
    </div>
<!-- ========================================================== CHAT-BOT EDIT =========================================================== -->
    <div class="modal fade" id="bot_chat_edit_modal" tabindex="-2" role="dialog" aria-labelledby="bot_chat_edit_modal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bot_chat_edit_modal">Bot Chat Quections & Answers Edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" id="chat_bot_QA_edit"> 

        <input type="hidden" id="chat_bot_QA_edit" name="action" value="chat_bot_QA_edit">
        <input type="hidden" id="QA_ID" name="QA_ID" value="">
        
        <div class="form-group">
          <label>Quection</label>
          <input type="text" name="CB_Quection_edit" id="CB_Quection_edit" value="" class="form-control" placeholder="Enter Quection">
        </div>

        <div class="form-group">
          <label>Answer</label>
          <input type="text" name="CB_Answer_edit" id="CB_Answer_edit" value="" class="form-control" placeholder="Enter Answer">
        </div>

        </div>


        <div class="modal-footer">
          
              <button type="submit" class="btn btn-primary chat_bot_edit_data" name="CB_edit" value="Edit" id="CB_add" >Edit</button>
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
  <div class="modal fade" id="admin_update" tabindex="-2" role="dialog" aria-labelledby="admin_update" aria-hidden="true">
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

      <input type="hidden" name="edit_ID" id="edit_ID" value="" >

      <input type="hidden" name="action" id="admin_update" value="admin_update" />

      <div class="form-group">
        <label>Name</label>
        <input type="text" name="edit_Name" id="edit_Name" value="" class="form-control" placeholder="Admin Name">
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="text" name="edit_Email" id="edit_Email" value="" class="form-control" placeholder="Admin Email" >
      </div>

      <div class="form-group">
        <label>Contact Number</label>
        <input type="text" name="edit_Number" id="edit_Number" value="" class="form-control" placeholder="Admin Contact Number">
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" name="edit_Password" id="edit_Password" value="" class="form-control" placeholder="Admin Password">
      </div>

      <div class="form-group password">
        <label>Confirm Password</label>
        <input type="password" name="edit_reassword" id="edit_reassword" value="" class="form-control" placeholder="Confirm Password">
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
      
        <input type="hidden" name="delete_ID" id="delete_ID" value="" >
      

      <div class="form-group">
        <label>Admin Name</label>
        <input type="text" name="delete_Name" id="delete_Name" value="" class="form-control" placeholder="Admin Name" readonly>
      </div>

      <div class="form-group">
        <label>Enter Admin Password</label>
        <input type="password" name="delete_Password" id="delete_Password" value="" class="form-control" placeholder="Admin Password">
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
  <div class="modal fade" id="AdminAddModal" tabindex="-1" role="dialog" aria-labelledby="AdminAddModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="admin_add">Add New Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
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
        <input type="text" name="add_Email" id="add_Email" value="" class="form-control" placeholder="Admin Email">
      </div>

      <div class="form-group">
        <label>Contact Number</label>
        <input type="text" name="add_Number" id="add_Number" value="" class="form-control" placeholder="Admin Contact Number">
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" name="add_Password" id="add_Password" value="" class="form-control" placeholder="Admin Password">
      </div>

      <div class="form-group password">
        <label>Confirm Password</label>
        <input type="password" name="add_reassword" id="add_reassword" value="" class="form-control" placeholder="Confirm Password">
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
<div class="modal fade" id="login_qr_modal" tabindex="-1" role="dialog" aria-labelledby="login_qr_modal" aria-hidden="true">
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
<div class="modal fade" id="event_Reject_Model" tabindex="-2" role="dialog" aria-labelledby="event_Reject_Model" aria-hidden="true">
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
          <input type="text" name="rejectFeedEnter" id="rejectFeedEnter" value="" class="form-control" placeholder="Enter Reason">
        </div>

       

        </div>


        <div class="modal-footer">
          
              <button type="submit" class="btn btn-primary ER_Reject_data" name="ER_Reject" value="Add" id="ER_Reject" >Submit</button>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <form method="POST" enctype="multipart/form-data" id="foodCat_form">

      <input type="hidden" name="action" id="addFCategory" value="addFCategory">

      <!-- <input type="hidden" name="aid" id="aid" value="" /> -->

      <div class="form-group">
        <label>Category name</label>
        <input type="text" name="fcategory" id="fcategory" value="" class="form-control" placeholder="Enter Category name">
      </div>

      <div class="form-group">
        <label>Description</label>
        <input type="textarea" name="fcdesc" id="fcdesc" value="" class="form-control" placeholder="Enter Description">
      </div>

      <div class="form-group password">
        <label>Times per day</label>
        <input type="number" name="timeFC" min = "1" max="10" value="" class="form-control" id="timeFC">
       
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

      <input type="hidden" name="fcat_ID" id="fcat_ID" value="" >

      <input type="hidden" name="f_Status" id="f_Status" value="" >

      <input type="hidden" name="action" id="fcat_update" value="fcat_update" />

      

      <div class="form-group">
        <label>Category</label>
        <input type="text" name="edit_fcName" id="edit_fcName" value="" class="form-control" placeholder="Food category">
        
      </div>

      <div class="form-group">
        <label>Description</label>
        <input type="text" name="edit_fcdesc" id="edit_fcdesc" value="" class="form-control" placeholder="Add description" >
 
      </div>

      <div class="form-group">
        <label>Times per day</label>
        <input type="number" name="edit_fcNumber" id="edit_fcNumber" value="" class="form-control" placeholder="Number of times it gives">
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
<div class="modal fade" id="gItem_add_modal" tabindex="-2" role="dialog" aria-labelledby="gItem_add_modal" aria-hidden="true">
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
          
              <button type="submit" class="btn btn-primary chat_bot_add_data" name="GI_add" value="Add" id="GI_add" >Add</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

        </div>
        </form>
        </div>
    </div>
    </div>
<!-- ========================================================== GENERAL ITEM EDIT =========================================================== -->
    <div class="modal fade" id="GItem_edit_modal" tabindex="-2" role="dialog" aria-labelledby="GItem_edit_modal" aria-hidden="true">
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
          <input type="text" class="form-control" id="gidesc_EDIT" placeholder="Enter Description" name="gidesc_EDIT">
        </div>
        </div>


        <div class="modal-footer">
          
              <button type="submit" class="btn btn-primary chat_bot_edit_data" name="CB_edit" value="Edit" id="CB_add" >Edit</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

        </div>
        </form>
        </div>
    </div>
    </div>


    <!-- ========================================================== GENERAL ITEM EDIT2 =========================================================== -->
    <div class="modal fade" id="GItem_edit_modal2" tabindex="-2" role="dialog" aria-labelledby="GItem_edit_modal2" aria-hidden="true">
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
          <input type="text" class="form-control" id="gidesc_EDIT2" placeholder="Enter Description" name="gidesc_EDIT2">
        </div>
        </div>


        <div class="modal-footer">
          
              <button type="submit" class="btn btn-primary chat_bot_edit_data" name="CB_edit" value="Edit" id="CB_add" >Edit</button>
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
<div class="modal fade" id="voluntEmail_modal" tabindex="-2" role="dialog" aria-labelledby="voluntEmail_modal" aria-hidden="true">
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

      <input type="hidden" name="volunteer_ID" id="volunteer_ID" value="" >

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
          <textarea rows="5" class="form-control" id="Vo_Message" placeholder="Enter Message" name="Vo_Message"></textarea>
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
<div class="modal fade" id="donorEmail_modal" tabindex="-2" role="dialog" aria-labelledby="donorEmail_modal" aria-hidden="true">
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

      <input type="hidden" name="donor_id" id="donor_id" value="" >

      <input type="hidden" name="action" id="donorEmail_send" value="donorEmail_send" />

      

      <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" id="donor_name" placeholder="Enter Description" name="donor_name">
        </div>
       

        <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control" id="donor_email" placeholder="Enter Description" name="donor_email">
            
        </div>
       

        <div class="form-group">
          <label>Message</label>
          <textarea rows="5" class="form-control" id="donor_Message" placeholder="Enter Message" name="donor_Message"></textarea>
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
<div class="modal fade" id="drugListModal" tabindex="-1" role="dialog" aria-labelledby="drugListModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="admin_add">Add New Drug</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <form method="POST" enctype="multipart/form-data" id="drugAdd_form">

      <input type="hidden" name="action" id="adddrugs" value="adddrugs">

      <!-- <input type="hidden" name="aid" id="aid" value="" /> -->

      <div class="form-group">
        <label>Drug name</label>
        <input type="text" name="drug_name" id="drug_name" value="" class="form-control" placeholder="Enter Category name">
      </div>

      <div class="form-group">
        <label>Weight</label>
        <input type="text" name="drug_weight" id="drug_weight" value="" class="form-control" placeholder="Enter Description">
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
<div class="modal fade" id="drugsList_update" tabindex="-2" role="dialog" aria-labelledby="drugsList_update" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Selected Drug</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="POST" enctype="multipart/form-data" id="drug_edit_form11">   

      

      <input type="hidden" name="action" id="drug_edit_form11" value="drug_edit_form11" />
      <input type="hidden" name="drugID" id="edit_drug_ID" value="" >
      
      

      <div class="form-group">
        <label>Drug Name</label>
        <input type="text" name="edit_drug_name" id="edit_drug_name" class="form-control" placeholder="Food category">
        
      </div>

      <div class="form-group">
        <label>Weight</label>
        <input type="text" name="edit_drug_weight" id="edit_drug_weight" class="form-control" placeholder="Add description" >
 
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


  <!-- ====================================================================================================================================
                                                              USER PASSWORD CHANGE MODAL
======================================================================================================================================-->
<div class="modal fade" id="user_password_modal" tabindex="-1" role="dialog" aria-labelledby="user_password_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="user_password_modal">User Password Change</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            
          </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="password_change.php"  id="user_password_form">

        <input type="hidden" id="Cuserid" name="Cuserid" value="<?php echo $_SESSION['User_ID']; ?>">

        <input type="hidden" name="action" id="action" value="user_password_change">

          <div class="col-sm-12 form-group">
            <label for="username" class="form-label">User name</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['Name']; ?>" readonly>
          </div>

          <div class="col-sm-12 form-group">
            <label for="CuserPassword" class="form-label">User Current Password</label>
            <input type="password" class="form-control" id="CuserPassword" name="CuserPassword" value="">
          </div>

          <div class="col-sm-12 form-group">
            <label for="NewuserPassword" class="form-label">User New Password</label>
            <input type="password" class="form-control" id="NewuserPassword" name="NewuserPassword" value="">
          </div>

          <div class="col-sm-12 form-group">
            <label for="Confirm_userPassword" class="form-label">Confirm New Password</label>
            <input type="password" class="form-control" id="Confirm_userPassword" name="Confirm_userPassword" value="">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Change Now</button>
        </div>
        </form>
      </div>
    </div>
  </div>



  <!-- ========================================================== EVENT VIEW =========================================================== -->
  <div class="modal fade" id="event_view_modal" tabindex="-2" role="dialog" aria-labelledby="event_view_modal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="event_view_modal">EVENT VIEW</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" id="GItem_edit"> 

        <input type="hidden" id="GItem_edit" name="action" value="GItem_edit">
        <input type="hidden" id="FEvent_ID" name="FEvent_ID" value="">
        
        

        <div class="form-group">
          <label>Donor Name</label>
          <input type="text" class="form-control" id="FE_ID" placeholder="Enter Description" name="FE_ID">
        </div>
        <div class="form-group">
          <label>Donor NIC</label>
          <input type="text" class="form-control" id="FU_ID" placeholder="Enter Description" name="FU_ID">
        </div>
        <div class="form-group">
          <label>Donor Email</label>
          <input type="text" class="form-control" id="FE_Type" placeholder="Enter Description" name="FE_Type">
        </div>
        <div class="form-group">
          <label>Donor Contact</label>
          <input type="text" class="form-control" id="Fphone" placeholder="Enter Description" name="Fphone">
        </div>
        <div class="form-group">
          <label>Date</label>
          <input type="text" class="form-control" id="FE_Date" placeholder="Enter Description" name="FE_Date">
        </div>
        <div class="form-group">
          <label>Category</label>
          <input type="text" class="form-control" id="Ffood_category_b" placeholder="Enter Description" name="Ffood_category_b">
        </div>
       

        <div class="form-group">
          <label>Time</label>
          <input type="text" class="form-control" id="Fselected_time" placeholder="Enter Description" name="Fselected_time">
        </div>
        <div class="form-group">
          <label>Description</label>
          <textarea class="form-control" id="Fadditional_desc" placeholder="Enter Description" name="Fadditional_desc"></textarea>
        </div>
        <div class="form-group">
          <label>No of Visit</label>
          <input type="text" class="form-control" id="Fno_of_visit" placeholder="Enter Description" name="Fno_of_visit">
        </div>
                  </div>

        <div class="modal-footer">
          
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

        </div>
        </form>
        </div>
    </div>
    </div>



    
  <!-- ========================================================== EVENT VIEW BLOOD=========================================================== -->
  <div class="modal fade" id="event_Bloodview_modal" tabindex="-2" role="dialog" aria-labelledby="event_Bloodview_modal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="event_Bloodview_modal">EVENT VIEW</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" id="GItem_edit"> 

        <input type="hidden" id="GItem_edit" name="action" value="GItem_edit">
        <input type="hidden" id="BEvent_ID" name="BEvent_ID" value="">
        
        

        <div class="form-group">
          <label>Donor Name</label>
          <input type="text" class="form-control" id="BName" placeholder="Enter Description" name="BName">
        </div>
        <div class="form-group">
          <label>Donor NIC</label>
          <input type="text" class="form-control" id="Bbd_NIC" placeholder="Enter Description" name="Bbd_NIC">
        </div>
        <div class="form-group">
          <label>Donor Email</label>
          <input type="text" class="form-control" id="BEmail" placeholder="Enter Description" name="BEmail">
        </div>
        <div class="form-group">
          <label>Donor Contact</label>
          <input type="text" class="form-control" id="BContact" placeholder="Enter Description" name="BContact">
        </div>
        <div class="form-group">
          <label>Weight</label>
          <input type="text" class="form-control" id="BWhight" placeholder="Enter Description" name="BWhight">
        </div>
        <div class="form-group">
          <label>Height</label>
          <input type="text" class="form-control" id="BHight" placeholder="Enter Description" name="BHight">
        </div>
       

        <div class="form-group">
          <label>B Group</label>
          <input type="text" class="form-control" id="BGroup" placeholder="Enter Description" name="BGroup">
        </div>
        <div class="form-group">
          <label>Date</label>
          <input type="text" class="form-control" id="BDate" placeholder="Enter Description" name="BDate"></input>
        </div>
        <div class="form-group">
          <label>Time</label>
          <input type="text" class="form-control" id="BTime" placeholder="Enter Description" name="BTime">
        </div>
        <div class="form-group">
          <label>Donate Before</label>
          <input type="text" class="form-control" id="BD_before" placeholder="Enter Description" name="BD_before">
        </div>
        <div class="form-group">
          <label>How Many Times</label>
          <input type="text" class="form-control" id="BHM_Times" placeholder="Enter Description" name="BHM_Times">
        </div>
        <div class="form-group">
          <label>Last Blood Donate Date</label>
          <input type="text" class="form-control" id="BLB_Date" placeholder="Enter Description" name="BLB_Date">
        </div>
       
                  </div>

        <div class="modal-footer">
          
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

        </div>
        </form>
        </div>
    </div>
    </div>


     <!-- ========================================================== EVENT Entertainment VIEW =========================================================== -->
  <div class="modal fade" id="event_Entertainmentview_modal" tabindex="-2" role="dialog" aria-labelledby="event_Entertainmentview_modal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="event_Entertainmentview_modal">EVENT VIEW</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" id="GItem_edit"> 

       
        <input type="hidden" id="BEEvent_ID" name="BEEvent_ID" value="">
        
        

        <div class="form-group">
          <label>Donor Name</label>
          <input type="text" class="form-control" id="EeAct_Name" placeholder="Enter Description" name="EeAct_Name">
        </div>
        <div class="form-group">
          <label>Donor NIC</label>
          <input type="text" class="form-control" id="EeAct_NIC" placeholder="Enter Description" name="EeAct_NIC">
        </div>
        
        <div class="form-group">
          <label>Donor Contact</label>
          <input type="text" class="form-control" id="EeAct_contact" placeholder="Enter Description" name="EeAct_contact">
        </div>
        <div class="form-group">
          <label>Date</label>
          <input type="text" class="form-control" id="EeAct_Date" placeholder="Enter Description" name="EeAct_Date">
        </div>
        <div class="form-group">
          <label>Activity</label>
          <textarea class="form-control" id="EeAct" placeholder="Enter Description" name="EeAct"></textarea>
        </div>
       
        <div class="form-group">
          <label>Description</label>
          <textarea class="form-control" id="EeAct_Desc" placeholder="Enter Description" name="EeAct_Desc"></textarea>
        </div>
        <div class="form-group">
          <label>Ward</label>
          <input type="text" class="form-control" id="EeAct_ward" placeholder="Enter Description" name="EeAct_ward">
        </div>
       
        <div class="form-group">
          <label>No of Visit</label>
          <input type="text" class="form-control" id="EeAct_noofvisiters" placeholder="Enter Description" name="EeAct_noofvisiters">
        </div>
                  </div>

        <div class="modal-footer">
          
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

        </div>
        </form>
        </div>
    </div>
    </div>


      <!-- ========================================================== EVENT GENERAL ITEM VIEW =========================================================== -->
  <div class="modal fade" id="event_Generalview_modal" tabindex="-2" role="dialog" aria-labelledby="event_Generalview_modal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="event_Generalview_modal">EVENT VIEW</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" id="GItem_wardedit1"> 

        <input type="hidden" id="GItem_wardedit1" name="action" value="GItem_wardedit1">
        <input type="hidden" id="GU_ID" name="GU_ID" value="">
        
        

        <div class="form-group">
          <label>Donor Name</label>
          <input type="text" class="form-control" id="GgItemD_Name" placeholder="Enter Description" name="GgItemD_Name" disabled>
        </div>
        <div class="form-group">
          <label>Donor Email</label>
          <input type="text" class="form-control" id="GgItemD_Email" placeholder="Enter Description" name="GgItemD_Email" disabled>
        </div>
        <div class="form-group">
          <label>Donor NIC</label>
          <input type="text" class="form-control" id="GgItemD_NIC" placeholder="Enter Description" name="GgItemD_NIC" disabled>
        </div>

        
        <div class="form-group">
          <label>Donor Contact</label>
          <input type="text" class="form-control" id="GgItemD_contact" placeholder="Enter Description" name="GgItemD_contact" disabled>
        </div>

        <div class="form-group">
          <label>Ward</label>
          <input type="text" class="form-control" id="GgItemD_ward" placeholder="Enter ward" name="GgItemD_ward">
        </div>

        <div class="form-group">
          <label>Date</label>
          <input type="text" class="form-control" id="GDate" placeholder="Enter Description" name="GDate" disabled>
        </div>
        <div class="form-group">
          <label>Items</label>
          <textarea class="form-control" id="GgItemD_item" placeholder="Enter Description" name="GgItemD_item" disabled><?php echo $displayValue; ?></textarea>
        </div>
       
        
        <div class="form-group">
          <label>Quentity</label>
          <input type="text" class="form-control" id="GgItem_quentity" placeholder="Enter Description" name="GgItem_quentity" disabled>
        </div>
       
       
                  </div>

        <div class="modal-footer">
          
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
               <button type="submit" class="btn btn-primary ward_data" name="ward_data" value="Edit" id="ward_data" >Ward Edit</button>

        </div>
        </form>
        </div>
    </div>
    </div>



     <!-- ===============================================================================================
                                          VOLUNTEER EMAIL SEND
================================================================================================ -->
<div class="modal fade" id="bloodDone_modal" tabindex="-2" role="dialog" aria-labelledby="bloodDone_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bloodDone_modal">Send Email to Donors when receiving donations</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="POST" enctype="multipart/form-data" id="foodDone_modal_SUBMIT">   

      <input type="hidden" name="FEvent_ID1" id="FEvent_ID1" value="" >

      <input type="hidden" name="Fdonor_name" id="Fdonor_name" value="" >

      <input type="hidden" name="Fdonor_nic" id="Fdonor_nic" value="" >

      <input type="hidden" name="Fdonor_email" id="Fdonor_email" value="" >

      <input type="hidden" name="action" id="receiveDonorEmail_send" value="receiveDonorEmail_send" />

      


        <div class="form-group">
          <label>If you want to anything special, write here</label>
          <textarea rows="5" class="form-control" id="Fdonor_Message" placeholder="Enter Message" name="Fdonor_Message"></textarea>
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
                                          VOLUNTEER EMAIL SEND
================================================================================================ -->
<div class="modal fade" id="bloodDone_modal2" tabindex="-2" role="dialog" aria-labelledby="bloodDone_modal2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bloodDone_modal2">Send Email to Donors when receiving donations</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="POST" enctype="multipart/form-data" id="boodDone_modal_SUBMIT">   

      <input type="hidden" name="BEvent_ID1" id="BEvent_ID1" value="" >

      <input type="hidden" name="Bdonor_name" id="Bdonor_name" value="" >


      <input type="hidden" name="Bdonor_email" id="Bdonor_email" value="" >

      <input type="hidden" name="action" id="receiveBloodDonorEmail_send" value="receiveBloodDonorEmail_send" />

      


        <div class="form-group">
          <label>If you want to anything special, write here</label>
          <textarea rows="5" class="form-control" id="Bdonor_Message" placeholder="Enter Message" name="Bdonor_Message"></textarea>
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
                                          VOLUNTEER EMAIL SEND
================================================================================================ -->
<div class="modal fade" id="entertainDone_modal" tabindex="-2" role="dialog" aria-labelledby="entertainDone_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="entertainDone_modal">Send Email to Donors when receiving donations</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="POST" enctype="multipart/form-data" id="entertainDone_modal_SUBMIT">   

      <input type="hidden" name="EnterEvent_ID1" id="EnterEvent_ID1" value="" >

      <input type="hidden" name="Enterdonor_name" id="Enterdonor_name" value="" >


      <input type="hidden" name="Enterdonor_email" id="Enterdonor_email" value="" >

      <input type="hidden" name="action" id="receiveEntertainDonorEmail_send" value="receiveEntertainDonorEmail_send" />

      


        <div class="form-group">
          <label>If you want to anything special, write here</label>
          <textarea rows="5" class="form-control" id="Enterdonor_Message" placeholder="Enter Message" name="Enterdonor_Message"></textarea>
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
                                          VOLUNTEER EMAIL SEND
================================================================================================ -->
<div class="modal fade" id="OtherDone_modal" tabindex="-2" role="dialog" aria-labelledby="OtherDone_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="OtherDone_modal">Send Email to Donors when receiving donations</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="POST" enctype="multipart/form-data" id="OtherDone_modal_SUBMIT">   

      <input type="hidden" name="OtherEvent_ID1" id="OtherEvent_ID1" value="" >

      <input type="hidden" name="Otherdonor_name" id="Otherdonor_name" value="" >


      <input type="hidden" name="Otherdonor_email" id="Otherdonor_email" value="" >

      <input type="hidden" name="action" id="receiveOtherDonorEmail_send" value="receiveOtherDonorEmail_send" />

      


        <div class="form-group">
          <label>If you want to anything special, write here</label>
          <textarea rows="5" class="form-control" id="Otherdonor_Message" placeholder="Enter Message" name="Otherdonor_Message"></textarea>
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
                                          FOOD CATEGORY MODAL START
================================================================================================ -->
<div class="modal fade" id="FoodRModal" tabindex="-1" role="dialog" aria-labelledby="FoodRModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="FoodRModal">Add New Ingredients</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <form method="POST" enctype="multipart/form-data" id="FoodRModal_form">

      <input type="hidden" name="action" id="addFRecipes" value="addFRecipes">

   
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
            </select>
          </div>


      <div class="form-group">
        <label>Ingredient</label></br>
        <label- style="color:red">Please add this for this format. ex: Beans  20kg</label->
        <input type="text" name="fIngredient" id="fIngredient" value="" class="form-control" placeholder="Enter Ingredient & weight ex:  ingredient_name  weight">
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
<div class="modal fade" id="fRECEIPE_update" tabindex="-2" role="dialog" aria-labelledby="fRECEIPE_update" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update food rECEIPY</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="POST" enctype="multipart/form-data" id="fRECEIPE_edit_form">   

      <input type="hidden" name="edit_fRID" id="edit_fRID" value="" >

      

      <input type="hidden" name="action" id="fRECEIPE_edit_form" value="fRECEIPE_edit_form" />

      
      <div class="form-group">
        <label>Ingredient</label>
        <input type="text" name="edit_fRINGREDIENT" id="edit_fRINGREDIENT" value="" class="form-control" placeholder="Add Ingredient" >
 
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
