
$(document).ready(function()
{
    setInterval(function(){
        Blood_count_check();
    },1000);
    
    all();

    function all()
    {
        Blood_donor_fetch();
        chat_bot();
        
       
    }

    function Blood_donor_fetch()
    {
    var action = "Blood_donor_fetch";
    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#Blood_donor_fetch').html(data);  
            }
        })
    }

      // Sacan QR Code & Login
  $('#login_qr').click(function() {
    
    var QrModel=$('#login_qr_modal').modal
  console.log(QrModel)
  $('#login_qr_modal').modal("show");

  
    
    let scanner = new Instascan.Scanner({ video: document.getElementById('login_qr_preview')});
   
    Instascan.Camera.getCameras().then(function(cameras){
        if(cameras.length > 0 ){
            scanner.start(cameras[0]);
        } else{
            alert('Camera Not Found'); // If device not have camera, popup error message
        }

    }).catch(function(e) {
        console.error(e);
    });

    scanner.addListener('scan',function (c){ // Read QR Code
      
      $('#qr_email').val(c); // QR values add in to text box
     
      
        $('#login_with_qr').submit(); // submit login forms
    });
  });



    function Blood_count_check()
    {
    var action = "Blood_count_check";
    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
            }
        })
    }

    function Book_Time1()
    {
      
    var action = "Book_Time1";
    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#Blood_donor_fetch').html(data);  
            }
        })
    }

// function admin_dashboard()
//     {
//     var action = "admin_dashboard";
//     $.ajax(
//         {
//             url:"action.php",
//             method:"POST",
//             data:{action:action},
//             success:function(data)
//             {
//                 $('#Blood_donor_fetch').html(data);  
//             }
//         })
//     }



    $(document).on('click', '.Blood_donor_fetch', function(){
        $('#Blood_donor_fetch').html("");// Clear Div tag data
        $('#title').html("Blood Donor List");// Title Change
        Blood_donor_fetch();// Data Add to the Div tag
    });

    $(document).on('click', '.Book_Time1', function(){
        $('#Blood_donor_fetch').html("");
        $('#title').html("Blood Donor List2");
        Book_Time1();
    });

    $(document).on('click', '.Donor_Add_Donor_Form', function(){
        $('#Blood_donor_fetch').html("");
        $('#title').html("Add Blood Donor");
        
        var action = "Donor_Add_Donor_Form";
        $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#Blood_donor_fetch').html(data);  
            }
        })
    });

    $(document).on('click', '#addDonor', function(){
        var named = $('#named').val();
        var nicd = $('#nicnumd').val();
        var emaild = $('#emaild').val();
        var phoned = $('#phoned').val();
        var heightd = $('#heightd').val();
        var weightd = $('#weightd').val();
        var bgroup = $('#bgroup').val();

        console.log(named);
        console.log(nicd);
        console.log(emaild);
        console.log(phoned);
        console.log(heightd);
        console.log(weightd);
        console.log(bgroup);

        if(named == ""){
            console.log("enter name");
            
        }else{
            var action = "addDonor";
            $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action,named:named,nicd:nicd,emaild:emaild,phoned:phoned,heightd:heightd,weightd:weightd,bgroup:bgroup},
                success:function(data)
                {
                   if(data == "inserted"){
                    console.log('inseted');
                    swal('Successfull','Donor Added!','success');
                   }else{
                    console.log('Not Insert');
                   }
                }
            })
        }
        
    });


    
    // $(document).on('click', '.admin_dashboard', function(){
    //     $('#Blood_donor_fetch').html("");
    //     $('#title').html("Dashboard");
    //     admin_dashboard();
    // });


 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // View Donors
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    // $(document).on('click', '.Add_Staff', function(){
    //     $('#Blood_donor_fetch').html("");
    //     $('#title').html("View Donors");
        
    //     var action = "Add_Staff";
    //     $.ajax(
    //     {
    //         url:"action.php",
    //         method:"POST",
    //         data:{action:action},
    //         success:function(data)
    //         {
    //             $('#Blood_donor_fetch').html(data);  
    //         }
    //     })
    // });


    function view_donors()
    {
    var action = "view_donors";
    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#Blood_donor_fetch').html(data);  

                $('#datatableviewDonor').DataTable({
                  dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            }
        })
    }


    $(document).on('click', '.Add_Staff', function(){
        $('#Blood_donor_fetch').html("");
        $('#title').html("View Donors");
        view_donors();
    });

    // $(document).on('click', '#insertStaff', function(){
    //     var named = $('#named').val();
    //     var nicd = $('#nicnumd').val();
    //     var emaild = $('#emaild').val();
    //     var phoned = $('#phoned').val();
    //     var add_Password = $('#add_Password').val();
    //     var add_reassword = $('#add_reassword').val();
    //     var add_Status = $('#add_Status').val();

    //     console.log(named);
    //     console.log(nicd);
    //     console.log(emaild);
    //     console.log(phoned);
    //     console.log(add_Password);
    //     console.log(add_reassword);
    //     console.log(add_Status);

    //     if(named == ""){
    //         console.log("enter name");
            
    //     }else{
    //         var action = "insertStaff";
    //         $.ajax(
    //         {
    //             url:"action.php",
    //             method:"POST",
    //             data:{action:action,named:named,nicd:nicd,emaild:emaild,phoned:phoned,add_Password:add_Password,add_reassword: add_reassword,add_Status:add_Status},
    //             success:function(data)
    //             {
    //                if(data == "inserted"){
    //                 console.log('inseted');
    //                 swal('Successfull','Staff Successfully Added!','success');
    //                }else{
    //                 console.log('Not Insert');
    //                }
    //             }
    //         })
    //     }
        
    // });


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // view_Staff
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function view_staff()
    {
    var action = "view_staff";
    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#Blood_donor_fetch').html(data);  

                $('#datatable122').DataTable({
                  dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            }
        })
    }


    $(document).on('click', '.view_staff', function(){
        $('#Blood_donor_fetch').html("");
        $('#title').html("View Staff");
        view_staff();
    });

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Add Food Categories
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $(document).on('click', '.Add_Food_Category_Form', function(){
        $('#Blood_donor_fetch').html("");
        $('#title').html("Add Food Category");
        
        var action = "Add_Food_Category_Form";
        $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#Blood_donor_fetch').html(data);  
            }
        })
    });

    $(document).on('click', '.Fetch_Food_Bookings', function(){
        $('#Blood_donor_fetch').html("");
        $('#title').html("View Bookings");
        
        console.log("test1");
        var action = "Fetch_Food_Bookings";
        $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#Blood_donor_fetch').html(data); 
                $('#eventTable').DataTable({
                  dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                }); 
                console.log("test2");
                test3();
            }
        })
    });

    $(document).on('click', '#addFCategory_confirm', function(){
       
      var action = "addFCategory";
        var fcategory = $('#fcategory').val();
        var fcdesc = $('#fcdesc').val();
        var timeFC = $('#timeFC').val();
       

        console.log(fcategory);
        console.log(fcdesc);
        console.log(timeFC);
       

        if(fcategory == ""){
            console.log("enter category");
            
        }else{
            var action = "addFCategory";
            $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action,fcategory:fcategory,fcdesc:fcdesc,timeFC:timeFC},
                success:function(data)
                {
                   if(data == "inserted"){
                    console.log('inseted');
                    swal('Successfull','Food Category Added!','success');
                    $('#fcategory').val('');
                    $('#fcdesc').val('');
                    $('#timeFC').val('');
                   }else{
                    console.log('Not Insert');
                   }
                }
            })
        }
        
    });

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
    //                                              Calender
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
        
function test3(){

let clicked = null;
var SelectDonor = '';
var SelectEvent = '';
var SelectWard = '';
var donationType = 0;
var E_ID;


const event1 = document.getElementById('event1');
const event2 = document.getElementById('event2');
const event3 = document.getElementById('event3');
const event4 = document.getElementById('event4');


Calender_fetch();


function Calender_fetch(){
  var events1 = [];
  let nav = 0;
    var action = "Calender_fetch";
    $.ajax({
        url:"action.php",
        method:"POST",
        data:{action:action},
        dataType: 'JSON',
        success:function(data)
        {
            events1 = data;
            console.log("qq",events1);
            for (var i = 0; i < events1.length; i++) {
                console.log(events1[i][4]);
            }
        
              const calendar = document.getElementById('calendar');
              const newEventModal = document.getElementById('newEventModal');
              const deleteEventModal = document.getElementById('deleteEventModal');
              const backDrop = document.getElementById('modalBackDrop');
              const eventTitleInput = document.getElementById('eventTitleInput');
              const weekdays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
              
              
              const EventModelHeader1 = document.getElementById('EventModelHeader1');
              const EventModelHeader2 = document.getElementById('EventModelHeader2');
              const New_Event = document.getElementById('New_Event');
              const Update_Event = document.getElementById('Update_Event');
              const Select_Donor = document.getElementById('Select_Donor');

              function openModal(date) {
                clicked = date;
                $('#New_Event_Body').html('');
                EventModelHeader1.style.display = 'block';
                EventModelHeader2.style.display = 'none';
                New_Event.style.display = 'block';
                Update_Event.style.display = 'none';
                Select_Donor.style.display = 'block';

                $('#New_Event_Body').html('<div class="form-floating sm-3 sm-3" style="margin-top:15px;"><input type="text" value="'+clicked+'" class="form-control" id="E_Date" placeholder="Event Date" name="E_Date" disabled><label for="fcdesc">Event Date</label></div>')
                $('#InsertNewEvents').modal("show");
              }

              function load() {
                const dt = new Date();

                if (nav !== 0) {
                  dt.setMonth(new Date().getMonth() + nav);
                }

                const day = dt.getDate();
                const month = dt.getMonth();
                const year = dt.getFullYear();

                const firstDayOfMonth = new Date(year, month, 1);
                const daysInMonth = new Date(year, month + 1, 0).getDate();
                const endOfMonth = new Date(year, month + 1, 0);

                var startOfMonthStr = firstDayOfMonth.toLocaleDateString('en-US');
                var endOfMonthStr = endOfMonth.toLocaleDateString('en-US');

                const dateString = firstDayOfMonth.toLocaleDateString('en-us', {
                  weekday: 'long',
                  year: 'numeric',
                  month: 'numeric',
                  day: 'numeric',
                });

                if(donationType > 0){

                  clearEventsTables();

                  var action = "filterEvents";
                  $.ajax(
                  {
                      url:"action.php",
                      method:"POST",
                      data:{action:action,donationType:donationType,startOfMonthStr:startOfMonthStr,endOfMonthStr:endOfMonthStr},
                      
                      success:function(data)
                      {
                        
                        console.log(data);
                        if(donationType == 0){
                          $('#eventTable1').html(data);
                        }else
                        if(donationType == 2){
                          $('#eventTable2').html(data);
                        }else
                        if(donationType == 3){
                          $('#eventTable3').html(data);
                        }else
                        if(donationType == 4){
                          $('#eventTable4').html(data);
                        }
                      }
                  })

                }else{

                  clearEventsTables();

                  for (let donationType1 = 0; donationType1 < 5; donationType1++) {
  
                    console.log(donationType1);
                    var action = "filterEvents";
                    $.ajax(
                    {
                        url:"action.php",
                        method:"POST",
                        data:{action:action,donationType:donationType1,startOfMonthStr:startOfMonthStr,endOfMonthStr:endOfMonthStr},
                        
                        success:function(data)
                        {
                          if(donationType1 == 0){
                            $('#eventTable1').html(data);
                          }else
                          if(donationType1 == 2){
                            $('#eventTable2').html(data);
                          }else
                          if(donationType1 == 3){
                            $('#eventTable3').html(data);
                          }else
                          if(donationType1 == 4){
                            $('#eventTable4').html(data);
                          }
                        }
                    })
                  }

                }        
                
                function clearEventsTables(){
                  $('#eventTable1').html('');
                  $('#eventTable2').html('');
                  $('#eventTable3').html('');
                  $('#eventTable4').html('');
                }

                const paddingDays = weekdays.indexOf(dateString.split(', ')[0]);

                document.getElementById('monthDisplay').innerText = 
                  `${dt.toLocaleDateString('en-us', { month: 'long' })} ${year}`;

                calendar.innerHTML = '';

                for(let i = 1; i <= paddingDays + daysInMonth; i++) {
                  const daySquare = document.createElement('div');
                  daySquare.classList.add('day');

                  const dayString = `${month + 1}/${i - paddingDays}/${year}`;

                  if (i > paddingDays) {
                    daySquare.innerText = i - paddingDays;

                    var eventForDay = events1.find(function(event) {
                      return event[3] === dayString;
                    });

                    if (i - paddingDays === day && nav === 0) {
                      daySquare.id = 'currentDay';
                    }

                    if (eventForDay) {

                      const eventSquare = document.createElement('div');
                        eventSquare.classList.add('eventSquare');
                      for (var x = 0; x < events1.length; x++) {

                          if (events1[x][3] == dayString) {
                          
                            if(events1[x][2] > 0 && donationType == 0){
                              if(events1[x][2] == 0){
                                const eventDiv = document.createElement('div');
                                eventDiv.classList.add('event1');
                                // eventDiv.innerText = events1[x][3];
                                eventSquare.appendChild(eventDiv);
                              }else
                              if(events1[x][2] == 2){
                                const eventDiv = document.createElement('div');
                                eventDiv.classList.add('event2');
                                // eventDiv.innerText = events1[x][3];
                                eventSquare.appendChild(eventDiv);
                              }else
                              if(events1[x][2] == 3){
                                const eventDiv = document.createElement('div');
                                eventDiv.classList.add('event3');
                                // eventDiv.innerText = events1[x][3];
                                eventSquare.appendChild(eventDiv);
                              }else
                              if(events1[x][2] == 4){
                                const eventDiv = document.createElement('div');
                                eventDiv.classList.add('event4');
                                // eventDiv.innerText = events1[x][3];
                                eventSquare.appendChild(eventDiv);
                              }
                            }else{
                              if(events1[x][2] == 0 && donationType == 0){
                                const eventDiv = document.createElement('div');
                                eventDiv.classList.add('event1');
                                // eventDiv.innerText = events1[x][3];
                                eventSquare.appendChild(eventDiv);
                              }else
                              if(events1[x][2] == 2 && donationType == 2){
                                const eventDiv = document.createElement('div');
                                eventDiv.classList.add('event2');
                                // eventDiv.innerText = events1[x][3];
                                eventSquare.appendChild(eventDiv);
                              }else
                              if(events1[x][2] == 3 && donationType == 3){
                                const eventDiv = document.createElement('div');
                                eventDiv.classList.add('event3');
                                // eventDiv.innerText = events1[x][3];
                                eventSquare.appendChild(eventDiv);
                              }else
                              if(events1[x][2] == 4 && donationType == 4){
                                const eventDiv = document.createElement('div');
                                eventDiv.classList.add('event4');
                                // eventDiv.innerText = events1[x][3];
                                eventSquare.appendChild(eventDiv);
                              }
                            }

                        }
                        
                      }
                      daySquare.appendChild(eventSquare);
                    }

                    daySquare.addEventListener('click', () => openModal(dayString));
                  } else {
                    daySquare.classList.add('padding');
                  }

                  calendar.appendChild(daySquare);    
                }
                fetch_word();

                function fetch_word(){
                  var action = "fetch_word";
                  $('#calendar1').html('');
                  $.ajax(
                    {
                        url:"action.php",
                        method:"POST",
                        data:{action:action,donationType:donationType,startOfMonthStr:startOfMonthStr,endOfMonthStr:endOfMonthStr},
                        success:function(data)
                        {
                          $('#calendar1').html(data);
                        }
                    });
                }
              }

              function closeModal() {
                eventTitleInput.classList.remove('error');
                newEventModal.style.display = 'none';
                deleteEventModal.style.display = 'none';
                backDrop.style.display = 'none';
                eventTitleInput.value = '';
                clicked = null;
                Calender_fetch();
              }

              function initButtons() {
                document.getElementById('nextButton').addEventListener('click', () => {
                  nav++;
                  load();
                });

                document.getElementById('backButton').addEventListener('click', () => {
                  nav--;
                  load();
                });

                document.getElementById('cancelButton').addEventListener('click', closeModal);
                document.getElementById('closeButton').addEventListener('click', closeModal);
              }

              initButtons();
              load();

        }
    })
  }

  $("#Filter_Donation").change(function(){

    donationType = $('#Filter_Donation').val();
    

    if(donationType == 0){
      event1.style.display = 'block';
      event2.style.display = 'block';
      event3.style.display = 'block';
      event4.style.display = 'block';
      Calender_fetch();
    }else
    if(donationType == 1){
      event1.style.display = 'block';
      event2.style.display = 'none';
      event3.style.display = 'none';
      event4.style.display = 'none';
      Calender_fetch();
    }else
    if(donationType == 2){
      event1.style.display = 'none';
      event2.style.display = 'block';
      event3.style.display = 'none';
      event4.style.display = 'none';
      Calender_fetch();
    }else
    if(donationType == 3){
      event1.style.display = 'none';
      event2.style.display = 'none';
      event3.style.display = 'block';
      event4.style.display = 'none';
      Calender_fetch();
    }else
    if(donationType == 4){
      event1.style.display = 'none';
      event2.style.display = 'none';
      event3.style.display = 'none';
      event4.style.display = 'block';
      Calender_fetch();
    }
    
  });


  $("#Select_Donor").change(function(){
    SelectDonor = $('#Select_Donor').val();
  })

  $("#Select_Event_list").change(function(){
    SelectEvent = $('#Select_Event_list').val();
    $('#E_Type').val(SelectEvent);
  })

  $("#Select_Ward").change(function(){
    SelectWard = $('#Select_Ward').val();
    $('#W_Type').val(SelectWard);
  })

  $("#New_Event").click(function(){
    var action = "addEvent";

    E_ID = $('#E_ID').val();
    if(SelectDonor ==""){
      swal('Opps...!','Please Select Donor!','info');
    }else
    if(SelectEvent ==""){
      swal('Opps...!','Please Select Event!','info');
    }else
    if(SelectWard ==""){
      swal('Opps...!','Please Select Ward!','info');
    }else{
        $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action,E_ID:E_ID,date:clicked,donor:SelectDonor, event:SelectEvent,ward:SelectWard},
            success:function(data)
            {
                if(data == "inserted"){
                swal('Successfull','New Event Added!','success');
                Calender_fetch();
                $('#InsertNewEvents').modal("hide");
                }else{
                swal('Opps...!','Event Not Insert!','error');
                }

                SelectDonor ="";
                SelectEvent ="";
                SelectWard ="";
            }
        })
      }
    
  })

  $(document).on('click', '.event_update', function(){
    var E_ID = $(this).attr('id');

    var action = "event_update";
        $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action,E_ID:E_ID},
            dataType: 'JSON',
            success:function(data)
            {
              EventModelHeader1.style.display = 'none';
              EventModelHeader2.style.display = 'block';
              New_Event.style.display = 'none';
              Update_Event.style.display = 'block';
              Select_Donor.style.display = 'none';

              $('#E_ID').val(data[0]);
              $('#U_ID').val(data[1]);
              $('#E_Date').val(data[2]);
              $('#E_Type').val(data[3]);
              $('#UpdateE_Date').val(data[3]);
              $('#W_Type').val(data[4]);
              $('#New_Event_Body').html('');
              $('#New_Event_Body').html('<div class="form-floating sm-3 sm-3" style="margin-top:15px;"><input type="text" value="'+data[2]+'" class="form-control" id="E_Date" placeholder="Previous Event Date" name="E_Date" disabled><label for="fcdesc">Previous Event Date</label></div><div class="form-floating sm-3 sm-3" style="margin-top:15px;"><input type="date" class="form-control" id="UE_Date" placeholder="Update Event Date" name="UE_Date" value=""><label for="fcdesc">Update Event Date</label></div>')
              $('#New_Event').val("Update Event");
              $('#InsertNewEvents').modal("show");

              $("#UE_Date").change(function(){
                var newDate = $('#UE_Date').val();
                $('#UpdateE_Date').val(newDate);
              })
            }
        })
  })

  $(document).on('click', '.Update_Event', function(){
    var E_ID = $('#E_ID').val();
    var U_ID = $('#U_ID').val();
    var E_Date = $('#UpdateE_Date').val();
    var E_Type = $('#E_Type').val();
    var W_Type = $('#W_Type').val();

    SelectEvent = E_Type;
    var action = "Update_Event";

    if(SelectEvent ==""){
      swal('Opps...!','Please Select Event!','info');
    }else
    if(SelectWard ==""){
      swal('Opps...!','Please Select Ward!','info');
    }else{
    $.ajax(
      {
          url:"action.php",
          method:"POST",
          data:{action:action,E_ID:E_ID,U_ID:U_ID, E_Date:E_Date, E_Type:E_Type,ward:SelectWard},
          success:function(data)
          {
            console.log(data);
              if(data == "Updated"){
              swal('Successfull','Event Updated!','success');
              Calender_fetch();
              $('#InsertNewEvents').modal("hide");
              }else{
              swal('Opps...!','Event Not Updated!','error');
              }

              SelectDonor ="";
              SelectEvent ="";
              SelectWard = "";
          }
      })
    }
  })

  $(document).on('click', '.event_delete', function(){

    var E_ID = $(this).attr('id');
    var action = "DeleteEvent";
    swal({
        title: "Are you sure?",
        text: "Do you want to Delete this Event!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
        
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{E_ID:E_ID, action:action},
            success:function(data)
            {
                if(data == 'Delete'){
                  swal('Successfull','Event Deleted!','success');
                  Calender_fetch();
                  $('#InsertNewEvents')[0].reset();
                }else {
                  swal("Somthing Went to Wrong!");
                }
                
            }
        })
        } else {
        swal("This Event is Not Delete!");
        }
    });
    
  });

  $(document).on('click', '.event_Deactive', function(){

    var admin_type = $(this).attr('data-admintype');
    var isSuperAdmin=false;
    if (admin_type=="super"){
      isSuperAdmin=true;
    }
    var E_ID = $(this).attr('id');
    var action = "event_Deactive";
    console.log(E_ID+"aa"+admin_type+"ee"+isSuperAdmin);
    swal({
        title: "Are you sure?",
        text: "Do you want to Active this Event!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
      console.log("hhhh"+willDelete);
        if (willDelete) {
        
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{E_ID:E_ID,isSuperAdmin:isSuperAdmin,action:action},
            success:function(data)
            {
                if(data == 'Updated'){
                  swal('Successfull','Event Activeted!','success');
                  Calender_fetch();
                }else 
                if(data == 'Send Message'){
                  swal("Plese Send Message!");
                }
                else{
                  swal("Somthing Went to Wrong!");
                }
                
            }
        })
        } else {
        swal("This Event is Not Active!");
        }
    }).catch((error) =>console.log(error));
    
    
  });

  $(document).on('click', '.event_Active', function(){

    var E_ID = $(this).attr('id');
    var action = "event_Active";
    swal({
        title: "Are you sure?",
        text: "Do you want to Deactive this Event!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
        
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{E_ID:E_ID, action:action},
            success:function(data)
            {
                if(data == 'Updated'){
                  swal('Successfull','Event Deactiveted!','success');
                  Calender_fetch();
                }else {
                  swal("Somthing Went to Wrong!");
                }
                
            }
        })
        } else {
        swal("This Event is Not Deactive!");
        }
    });
    
  });

}



// ============================================= Chat-Bot ==========================================
function chat_bot()
{
    var action = "fetch_chat_bot";
    $.ajax({
        url:"action.php",
        method:"POST",
        data:{action:action},
        success:function(data)
        {
            $('#bot_chat_data').html(data);

            
        }
    })
}



// ================================================== Chat Bot ========================================
$(document).on('click', '#Bot_Add', function(){

  $('#bot_chat_add_modal').modal("show");

  });
//  Add Q & A for chat-bot
$('#chat_bot_QA').submit(function(event){
  event.preventDefault();

  var quection = $('#CB_Quection').val();
  var answer = $('#CB_Answer').val();

  if(quection == '')
  {
  swal('Opps...Fill in the Blank','Please Enter Quection','info');
  return false;
  }else
  if(answer == '')
  {
  swal('Opps...Fill in the Blank','Please Enter Answer','info');
  return false;
  }else
  
  {
  $.ajax({
  url:"action.php",
  method:"POST",
  data:new FormData(this),
  contentType:false,
  processData:false,
  success:function(data)
  {
      if(data == 'insert')
      {
          swal('Greate Job..','New Chat-Bot Quection & Answer Insert into Database','success');
          $('#bot_chat_add_modal').modal("hide");
          $('#CB_Quection').val('');
          $('#CB_Answer').val('');
          all();
      }else
      if(data == 'not_insert')
      {
          swal('Opps..Somthing Went Wrong','Please Contact Developer','error');
      }
      
  }
  });
  }
  });
//  Edit Q & A for chat-bot
$(document).on('click', '.bot_edit', function(){
  
  var action = "bot_edit_value";
  var ID = $(this).attr('id');
  // console.log(ID);
  $.ajax(
      {
          url: 'action.php',
          method: 'POST',
          data:{UserID:ID, action:action},
          dataType: 'JSON',
          success: function(data)
          {
              
              $('#QA_ID').val(data[0]);
              $('#CB_Quection_edit').val(data[1]);
              $('#CB_Answer_edit').val(data[2]);
              $('#bot_chat_edit_modal').modal("show");
          }
      })
});

$('#chat_bot_QA_edit').submit(function(event){
  event.preventDefault();

  var quection = $('#CB_Quection_edit').val();
  var answer = $('#CB_Answer_edit').val();

  if(quection == '')
  {
  swal('Opps...Fill in the Blank','Please Enter Quection','info');
  return false;
  }else
  if(answer == '')
  {
  swal('Opps...Fill in the Blank','Please Enter Answer','info');
  return false;
  }else
  {
  $.ajax({
  url:"action.php",
  method:"POST",
  data:new FormData(this),
  contentType:false,
  processData:false,
  success:function(data)
  {
      if(data == 'update')
      {
          swal('Greate Job..','This Quection & Answer Update Now','success');
          $('#chat_bot_QA_edit')[0].reset();
          $('#bot_chat_edit_modal').modal('hide');
          all();
      }else
      if(data == 'not_update')
      {
          swal('Opps...Somthing Went Wrong','Please Contact Developer','error');
      }
      
  }
  });
  }
});
// Delete Q & A for chat-bot
$(document).on('click', '.bot_delete', function(){
  var ID = $(this).attr("id");
  var action = "bot_delete";
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  })
  .then((willDelete) => {
      if (willDelete) {
      
      $.ajax({
          url:"action.php",
          method:"POST",
          data:{TravelID:ID, action:action},
          success:function(data)
          {
              if(data == 'delete')
              {
                  swal('Greate Job..','This Quection & Answer Deleted Now','success');
                  all();
              }else
              if(data == 'not_delete')
              {
                  swal('Opps..Somthing Went Wrong','Please Contact Developer','error');
              }
          
          }
      })
      } else {
      swal("This Quection & Answer is safe!");
      }
  });
});  





////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // view_Staff2
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function chat_bot2()
    {
    var action = "chat_bot2";
    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#Blood_donor_fetch').html(data);  
            }
        })
    }


    $(document).on('click', '.chat_bot2', function(){
        $('#Blood_donor_fetch').html("");
        $('#title').html("Chat Bot");
        chat_bot2();
    });



// ============================================== ADMIN ADD==============================================

$(document).on('click', '#AdminAdd', function(){
  var AdminModel=$('#AdminAddModal').modal
  console.log(AdminModel)
  $('#AdminAddModal').modal("show");

  });

  
  // $(document).on('click', '#A_add', function(){

  //   $('#A_add').modal("show");
  
  //   });
  

  
  $('#AdminAdd').click(function(){
    $('#Admin_Add').modal('show');
    // $('#admin_form')[0].reset();
    $('#action').val('Ainsert');
    $('#A_add').val("Insert");
    $('#A_add').text("Insert");
    // var action = "addFCategory";
    
   });

   $('#admin_form').submit(function(event){
    event.preventDefault();

    var email_filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
    var admin_name = $('#add_Name').val();
    var admin_email = $('#add_Email').val();
    var admin_number = $('#add_Number').val();
    var admin_password = $('#add_Password').val();
    var admin_con_password = $('#add_reassword').val();
    var adminRole = $('#adminRole').val();

    if(admin_name == '')
    {
     swal('Opps...Fill in the Blank','Please Enter Admin Name ','info');
     return false;
    }
    else 
    if(admin_email == '')
    {
     swal('Opps...Fill in the Blank','Please Enter Admin E-mail ','info');
     return false;
    }else
    if(admin_number == '')
    {
     swal('Opps...Fill in the Blank','Please Enter Admin Contact Number ','info');
     return false;
    }
    else 
    if(admin_number.length !=10){
    swal('Invalid Contact Number','Please Check Your Contact Number','error');
    return false;
     }else
    if(admin_password == '')
    {
     swal('Opps...Fill in the Blank','Please Enter Admin Password','info');
     return false;
    }else
    if(admin_con_password == '')
    {
     swal('Opps...Fill in the Blank','Please Enter Admin Confirm Password','info');
     return false;
    }else
    if(adminRole == '')
    {
     swal('Opps...Fill in the Blank','Please Enter Admin Role','info');
     return false;
    }else
    if(admin_password !== admin_con_password)
    {
     swal('Opps...Admin Password','Admin Password & Confirm Password not Match','info');
     return false;
    }else
    if(!(email_filter.test(admin_email))){
       swal('Email Not Valid','Please Enter Valid Email Address','error');
       return false;
    }else
    {

      $.ajax({
       url:"signup_check.php",
       method:"POST",
       data:new FormData(this),
       contentType:false,
       processData:false,
       success:function(data){
        console.log(data+"--")
        if(data != "Created")
       {
        swal('New Admin Account Has Been Created Now','Check Given E-mail, System Sent Admin QR Code','success');
        $('#AdminAddModal').modal('hide');
        $('#admin_form')[0].reset();
        
        // all();
        // swal('Greate Job','Admin Account Has Been Created Successfully','success');
        // email_send();
        
       }else
       if(data == "Error")
       {
        swal('Opps...','Unknown Error Occurred','error');
       }else
       if(data == "email")
       {
        swal('Opps...','This E-mail Already Taken, Please Enter Another E-mail','info');
       }
        
       }
      });
     }
    
   });
    
  //    {
  //     $.ajax({
  //      url:"action.php",
  //      method:"POST",
  //      data:new FormData(this),
  //      contentType:false,
  //      processData:false,
  //      success:function(data){
  //       if(data == "Created")
  //      {
  //       swal('Greate Job','Admin Account Has Been Created Successfully','success');
  //       // var action = "addFCategory";
  //       $('#admin_form')[0].reset();
  //       // email_send();
  //       $('#AdminAdd').modal('hide');
  //       all();
  //      }else
  //      if(data == "Error")
  //      {
  //       swal('Opps...','Unknown Error Occurred','error');
  //      }else
  //      if(data == "email")
  //      {
  //       swal('Opps...','This E-mail Already Taken, Please Enter Another E-mail','info');
  //      }
        
  //      }
  //     });
  //    }
    
  //  });

   function email_send()
   {
     var email = $('#add_Email').val();
     var name = $('#add_Name').val();
     var password = $('#add_reassword').val();

    //  var action = "email_send";

     $.ajax({
       url:"signup_check.php",
       method:"POST",
       data:{action:action, email:email, name:name, password:password},
       success:function(data)
       {
         
           swal('New Admin Account Has Been Created Now','Check Given E-mail, System Sent Admin QR Code','success');
           $('#admin_form')[0].reset();

         
       }
   })
   }

  //  $(document).on('click', '#addFCategory_confirm', function(){
       
  //   var action = "addFCategory";
  //     var fcategory = $('#fcategory').val();
  //     var fcdesc = $('#fcdesc').val();
     

  //     console.log(fcategory);
  //     console.log(fcdesc);
     

  //     if(fcategory == ""){
  //         console.log("enter category");
          
  //     }else{
  //         var action = "addFCategory";
  //         $.ajax(
  //         {
  //             url:"action.php",
  //             method:"POST",
  //             data:{action:action,fcategory:fcategory,fcdesc:fcdesc},
  //             success:function(data)
  //             {
  //                if(data == "inserted"){
  //                 console.log('inseted');
  //                 swal('Successfull','Food Category Added!','success');
  //                 $('#fcategory').val('');
  //                 $('#fcdesc').val('');
  //                }else{
  //                 console.log('Not Insert');
  //                }
  //             }
  //         })
  //     }
      
  // });

 // ============================================== ADMIN EDIT ==============================================



 $(document).on('click', '.admin_update', function(){

  var action = "get_admin_update";
  var ID = $(this).attr('id');
  console.log(ID);
  $.ajax(
      {
          url: 'action.php',
          method: 'POST',
          data:{UserID:ID, action:action},
          dataType: 'JSON',
          success: function(data)
          {
            console.log("ddd");
              $('#edit_ID').val(data[0]);
              $('#edit_Name').val(data[1]);
              $('#edit_Email').val(data[2]);
              $('#edit_Number').val(data[3]);
              $('#admin_update').modal("show");
          }
      })
});

$('#admin_edit_form').submit(function(event){
  event.preventDefault();
  var admin_name = $('#edit_Name').val();
  var admin_email = $('#edit_Email').val();
  var admin_number = $('#edit_Number').val();
  var admin_password = $('#edit_Password').val();
 var edit_reassword = $('#edit_reassword').val();
  var admin_id = $('#edit_ID').val();
  var adminRoleEdit = $('#adminRoleEdit').val();
  $('#action').val('admin_update');

  if(admin_name == '')
  {
   swal('Opps...Fill in the Blank','Please Enter Admin Name ','info');
   return false;
  }
  else 
  if(admin_email == '')
  {
   swal('Opps...Fill in the Blank','Please Enter Admin E-mail ','info');
   return false;
  }else
  if(admin_id == '')
  {
   swal('Opps...Fill in the Blank','Please Enter Admin ID ','info');
   return false;
  }else
  if(admin_number == '')
  {
   swal('Opps...Fill in the Blank','Please Enter Admin Contact Number ','info');
   return false;
  }
  else
  if(admin_number.length !=10){
  swal('Invalid Contact Number','Please Check Your Contact Number','error');
  return false;
      }else 
  if(admin_password == '')
  {
   swal('Opps...Fill in the Blank','Please Enter Admin Password','info');
   return false;
  }else 
  if(adminRoleEdit == '')
  {
   swal('Opps...Fill in the Blank','Please Enter Admin Role','info');
   return false;
  }else
   {
    $.ajax({
     url:"action.php",
     method:"POST",
     data:new FormData(this),
     contentType:false,
     processData:false,
     success:function(data)
     {if(data == "Updated")
     {
      swal('Greate Job','Admin Account Has Been Updated Successfully','success');
      all();
      $('#admin_update').modal('hide');
      $('#admin_edit_form')[0].reset();
      
     }else
     if(data == "NotUpdated")
     {
      swal('Opps...','Unknown Error Occurred','error');
     }else
     if(data == "Password")
     {
      swal('Opps...','Admin Password Not Match','info');
     }
      
     }
    });
   }
  
 });


 // ============================================== ADMIN DELETE ==============================================
 $(document).on('click', '.admin_delete', function(){
  var AID = $(this).attr("id");
  var action = "get_admin_delete";
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this Account!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  })
  .then((willDelete) => {
      if (willDelete) {
      
      $.ajax({
          url:"action.php",
          method:"POST",
          data:{UserID:AID, action:action},
          dataType: 'JSON',
          success:function(data)
          {
              $('#delete_ID').val(data[0]);
              $('#delete_Name').val(data[1]);
              $('#Admin_Delete').modal("show");
          }
      })
      } else {
      swal("This Admin Account is safe!");
      }
  });
});

$('#Admin_Delete').submit(function(event){
  event.preventDefault();
  var admin_id = $('#delete_ID').val();
  var admin_password = $('#delete_Password').val();
  var action = "admin_delete";
  if(admin_password == '')
  {
   swal('Opps...Fill in the Blank','Please Enter Admin Password ','info');
   return false;
  }else{
      $.ajax({
          url:"action.php",
          method:"POST",
          data:{UserID:admin_id, action:action, password:admin_password},
          
          success:function(data)
          {
              if (data == "Deleted")
              {
                  swal('Greate Job..','Admin Account Deleted Now','success');
                  all();
                  $('#admin_delete_form')[0].reset();
                  $('#Admin_Delete').modal("hide");
              }else
              if (data == "NotDelete")
              {
                  swal('Opps..','Admin Account Not Delete','info');
              }else
              if (data == "Password")
              {
                  swal('Opps..','Admin Account Password Not Match','error');
              }else
              if (data == "cant")
              {
                  swal('Opps..','Super Admin Account Cant Delete','error');
              }
           
          }
         });
  }
});




 // ============================================== DONOR DELETE ==============================================

 $(document).on('click', '.donor_delete1', function(){
  var TID = $(this).attr("id");
  var action = "donor_delete1";
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this Package Overview!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  })
  .then((willDelete) => {
      if (willDelete) {
      
      $.ajax({
          url:"action.php",
          method:"POST",
          data:{TravelID:TID, action:action},
          success:function(data)
          {
          swal('Greate Job..',data,'success');
          all();
          }
      })
      } else {
      swal("This Package Overview is safe!");
      }
  });
}); 



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Add General items
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $(document).on('click', '.Add_General_Item_Form', function(){
      $('#Blood_donor_fetch').html("");
      $('#title').html("Add Wanted Items");
      
      var action = "Add_General_Item_Form";
      $.ajax(
      {
          url:"action.php",
          method:"POST",
          data:{action:action},
          success:function(data)
          {
              $('#Blood_donor_fetch').html(data);  
          }
      })
  });

  $(document).on('click', '.Fetch_Food_Bookings', function(){
      $('#Blood_donor_fetch').html("");
      $('#title').html("View Bookings");
      
      console.log("test1");
      var action = "Fetch_Food_Bookings";
      $.ajax(
      {
          url:"action.php",
          method:"POST",
          data:{action:action},
          success:function(data)
          {
              $('#Blood_donor_fetch').html(data);  
              console.log("test2");
              test3();
          }
      })
  });

  // $(document).on('click', '#addFCategory_confirm', function(){
     
  //   var action = "addFCategory";
  //     var fcategory = $('#fcategory').val();
  //     var fcdesc = $('#fcdesc').val();
     

  //     console.log(fcategory);
  //     console.log(fcdesc);
     

  //     if(fcategory == ""){
  //         console.log("enter category");
          
  //     }else{
  //         var action = "addFCategory";
  //         $.ajax(
  //         {
  //             url:"action.php",
  //             method:"POST",
  //             data:{action:action,fcategory:fcategory,fcdesc:fcdesc},
  //             success:function(data)
  //             {
  //                if(data == "inserted"){
  //                 console.log('inseted');
  //                 swal('Successfull','Food Category Added!','success');
  //                 $('#fcategory').val('');
  //                 $('#fcdesc').val('');
  //                }else{
  //                 console.log('Not Insert');
  //                }
  //             }
  //         })
  //     }
      
  // });



// ================================================== Food Donation Reject ========================================
$(document).on('click', '.event_Reject_Model', function(){

  var action = "event_Reject_Model1";
  var EID = $(this).attr("id");
  console.log(EID)
  $('#ER_ID').val(EID);
 
  
  $.ajax(
      {
          url: 'action.php',
          method: 'POST',
          data:{UserID:EID, action:action},
          dataType: 'JSON',
          success: function(data)
          {
            console.log("ddd");
              $('#edit_ID').val(data[0]);
              $('#event_Reject_Model').modal("show");
          }
      })
});



// $(document).on('click', '.event_Reject_Model', function(){
// console.log("111");
//   // var EID = $(this).attr("id");
//   // $('#ER_ID').val(EID);
//   $('#event_Reject_Model').modal("show");

//   });

  $('#event_Reject_Model_Form').submit(function(event){
    event.preventDefault();
  
    var EID = $('#ER_ID').val();
    var rejectFeedEnter  = $('#rejectFeedEnter').val();
  
    if(EID == '')
    {
    swal('Opps...Somthing Went Wrong','Please Contact Developer','info');
    return false;
    }else
    if(rejectFeedEnter == '')
    {
    swal('Opps...Fill in the Blank','Please Enter Feed Back','info');
    return false;
    }else
    
    {
    $.ajax({
    url:"action.php",
    method:"POST",
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
        if(data == 'insert')
        {
            swal('Greate Job..','You Regect This','success');
            $('#event_Reject_Model').modal("hide");
            $('#ER_ID').val('');
            $('#rejectFeedEnter').val('');
            all();
        }else
        if(data == 'not_insert')
        {
            swal('Opps..Somthing Went Wrong','Please Contact Developer','error');
        }else{
          swal('Opps..','You Cant Reject This','info');
        }
        
    }
    });
    }
    });

//  Add Q & A for chat-bot
$('#chat_bot_QA').submit(function(event){
  event.preventDefault();

  var quection = $('#CB_Quection').val();
  var answer = $('#CB_Answer').val();

  if(quection == '')
  {
  swal('Opps...Fill in the Blank','Please Enter Quection','info');
  return false;
  }else
  if(answer == '')
  {
  swal('Opps...Fill in the Blank','Please Enter Answer','info');
  return false;
  }else
  
  {
  $.ajax({
  url:"action.php",
  method:"POST",
  data:new FormData(this),
  contentType:false,
  processData:false,
  success:function(data)
  {
      if(data == 'insert')
      {
          swal('Greate Job..','New Chat-Bot Quection & Answer Insert into Database','success');
          $('#bot_chat_add_modal').modal("hide");
          $('#CB_Quection').val('');
          $('#CB_Answer').val('');
          all();
      }else
      if(data == 'not_insert')
      {
          swal('Opps..Somthing Went Wrong','Please Contact Developer','error');
      }
      
  }
  });
  }
  });
//  Edit Q & A for chat-bot
$(document).on('click', '.fevent_Reject', function(){
  
  var action = "fevent_Reject_value";
  var ID = $(this).attr('id');
  // console.log(ID);
  $.ajax(
      {
          url: 'action.php',
          method: 'POST',
          data:{UserID:ID, action:action},
          dataType: 'JSON',
          success: function(data)
          {
              
              $('#QA_ID').val(data[0]);
              $('#CB_Quection_edit').val(data[1]);
              $('#CB_Answer_edit').val(data[2]);
              $('#bot_chat_edit_modal').modal("show");
          }
      })
});

$('#chat_bot_QA_edit').submit(function(event){
  event.preventDefault();

  var quection = $('#CB_Quection_edit').val();
  var answer = $('#CB_Answer_edit').val();

  if(quection == '')
  {
  swal('Opps...Fill in the Blank','Please Enter Quection','info');
  return false;
  }else
  if(answer == '')
  {
  swal('Opps...Fill in the Blank','Please Enter Answer','info');
  return false;
  }else
  {
  $.ajax({
  url:"action.php",
  method:"POST",
  data:new FormData(this),
  contentType:false,
  processData:false,
  success:function(data)
  {
      if(data == 'update')
      {
          swal('Greate Job..','This Quection & Answer Update Now','success');
          $('#chat_bot_QA_edit')[0].reset();
          $('#bot_chat_edit_modal').modal('hide');
          all();
      }else
      if(data == 'not_update')
      {
          swal('Opps...Somthing Went Wrong','Please Contact Developer','error');
      }
      
  }
  });
  }
});
// Delete Q & A for chat-bot
$(document).on('click', '.bot_delete', function(){
  var ID = $(this).attr("id");
  var action = "bot_delete";
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  })
  .then((willDelete) => {
      if (willDelete) {
      
      $.ajax({
          url:"action.php",
          method:"POST",
          data:{TravelID:ID, action:action},
          success:function(data)
          {
              if(data == 'delete')
              {
                  swal('Greate Job..','This Quection & Answer Deleted Now','success');
                  all();
              }else
              if(data == 'not_delete')
              {
                  swal('Opps..Somthing Went Wrong','Please Contact Developer','error');
              }
          
          }
      })
      } else {
      swal("This Quection & Answer is safe!");
      }
  });
});  



// ================================================== Entertainment Reject  ========================================

//  Entertainment Reject
$(document).on('click', '.FD_Reject', function(){
  
  var action = "event_Reject_Model";
  var ID = $(this).attr('id');
  // console.log(ID);
  $.ajax(
      {
          url: 'action.php',
          method: 'POST',
          data:{UserID:ID, action:action},
          dataType: 'JSON',
          success: function(data)
          {
              
              $('#QA_ID').val(data[0]);
              $('#CB_Quection_edit').val(data[1]);
              $('#CB_Answer_edit').val(data[2]);
              $('#bot_chat_edit_modal').modal("show");
          }
      })
});

$('#chat_bot_QA_edit').submit(function(event){
  event.preventDefault();

  var quection = $('#CB_Quection_edit').val();
  var answer = $('#CB_Answer_edit').val();

  if(quection == '')
  {
  swal('Opps...Fill in the Blank','Please Enter Quection','info');
  return false;
  }else
  if(answer == '')
  {
  swal('Opps...Fill in the Blank','Please Enter Answer','info');
  return false;
  }else
  {
  $.ajax({
  url:"action.php",
  method:"POST",
  data:new FormData(this),
  contentType:false,
  processData:false,
  success:function(data)
  {
      if(data == 'update')
      {
          swal('Greate Job..','This Quection & Answer Update Now','success');
          $('#chat_bot_QA_edit')[0].reset();
          $('#bot_chat_edit_modal').modal('hide');
          all();
      }else
      if(data == 'not_update')
      {
          swal('Opps...Somthing Went Wrong','Please Contact Developer','error');
      }
      
  }
  });
  }
});
// Delete Q & A for chat-bot
$(document).on('click', '.bot_delete', function(){
  var ID = $(this).attr("id");
  var action = "bot_delete";
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  })
  .then((willDelete) => {
      if (willDelete) {
      
      $.ajax({
          url:"action.php",
          method:"POST",
          data:{TravelID:ID, action:action},
          success:function(data)
          {
              if(data == 'delete')
              {
                  swal('Greate Job..','This Quection & Answer Deleted Now','success');
                  all();
              }else
              if(data == 'not_delete')
              {
                  swal('Opps..Somthing Went Wrong','Please Contact Developer','error');
              }
          
          }
      })
      } else {
      swal("This Quection & Answer is safe!");
      }
  });
});  

//////////////////////////////////////////////////Add Donor//////////////////////////////////////////////////////////////////////////

$(document).on('click', '.Book_Time', function(){
  $('#Body_fetch').html("");

  var action = "Book_Time";
  $.ajax(
  {
      url:"action.php",
      method:"POST",
      data:{action:action},
      success:function(data)
      {
          $('#Body_fetch').html(data);
          
          var i = 1;
          disableDates(i);
      }
  })
});

function disableDates(i)
{
  var action = "disabledDates";
  $.ajax(
      {
          url:"action.php",
          method:"POST",
          data:{action:action, i:i},
          success:function(data)
          {
              var disabledDates = data;
                $("#datepicker").datepicker({
                  beforeShowDay: function(date) {
                    var today = new Date();
                    today.setHours(0, 0, 0, 0);
          
                    var dateString = $.datepicker.formatDate("m/dd/yy", date);
                    var isDisabled = (disabledDates.indexOf(dateString) !== -1) || (date < today);
                    
                    
                    return [!isDisabled];

                    
                  }
                  
                });
                
          }
      })

  
}

$(document).on('change', '#datepicker', function(){

  var date = $('#datepicker').val();
  
  var date1 = date;
  var [month1, day1, year1] = date1.split("/");

  var formattedDate1 = parseInt(month1, 10) + "/" + day1 + "/" + year1;
  
  var action = "SelectBloodDonDate";
  $.ajax(
      {
          url:"action.php",
          method:"POST",
          data:{action:action, formattedDate1:formattedDate1},
          success:function(data)
          {
              console.log(data); 
              $('#BBlood_time_slot').html(data);
              console.log(data); 
          }
      })
})

$(document).on('click', '.test39', function(){
  let newWindow = window.open("http://localhost/donation/cancer/User/dashboard.php", "");

  // wait for the new tab to finish loading
  newWindow.onload = function() {
  // execute JavaScript code in the new tab
  newWindow.eval("$('#Body_fetch').html(''); var action = 'Book_Time'; $.ajax({url:'action.php',method:'POST',data:{action:action},success:function(data){$('#Body_fetch').html(data);}})");
  
  };

});

$(document).on('click', '#blood_donor_form_confirm', function(){

  var action = "blood_donor_form";
  var name = $('#BDonor_Name').val();
  var email = $('#BDonor_Email').val();
  var contact = $('#BDonor_Contact').val();
  var whight = $('#BDonor_Whight').val();
  var hight = $('#BDonor_Hight').val();
  var date = $('#datepicker').val();
  var time = $('#BBlood_time_slot').val();
  var BBlood_group = $('#BBlood_group').val();
  var Donor_nic = $('#Donor_nic').val();
  var D_DOB = $('#D_DOB').val();
  var HM_Times = $('#HM_Times').val();
  var LB_Date = $('#LB_Date').val();
  var Inconvinionce_D = $('#D_DOB').val();
  
  var LB_Date = $('#LB_Date').val();


  var currentDate = new Date();

  var year1 = currentDate.getFullYear();
  var month1 = currentDate.getMonth() + 1; // Note: Months are zero-based
  var day1 = currentDate.getDate();

  var formattedDate2 = year1 + "-" + month1 + "-" + day1;

  var date2 = new Date(LB_Date);
  var date3 = new Date(formattedDate2);

  // Calculate the time difference in milliseconds
  var timeDiff = Math.abs(date3.getTime() - date2.getTime());

  // Convert the time difference to days
  var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

  var Gander="";
  if(document.getElementById('U_Female').checked) {
      Gander = "F";
    }else if(document.getElementById('U_Male').checked) {
      Gander = "M";
    }

    var D_before="";

  if(document.getElementById('D_before1').checked) {
      D_before = "Y";
    }else if(document.getElementById('D_before2').checked) {
      D_before = "N";
    }

    var Inconvinionce="";
  if(document.getElementById('Inconvinionce_Y').checked) {
      Inconvinionce = "Y";
    }else if(document.getElementById('Inconvinionce_N').checked) {
      Inconvinionce = "N";
    }

    var Advice="";
  if(document.getElementById('Advice_Y').checked) {
      Advice = "Y";
    }else if(document.getElementById('Advice_N').checked) {
      Advice = "N";
    }

    var InstructionsD="";
    if(document.getElementById('Instructions_Y').checked) {
      InstructionsD = "Y";
      }else if(document.getElementById('Instructions_N').checked) {
          InstructionsD = "N";
      }

      var Comfortable="";
    if(document.getElementById('Comfortable_Y').checked) {
      Comfortable = "Y";
      }else if(document.getElementById('Comfortable_N').checked) {
          Comfortable = "N";
      }

      var Medicine="";
      if(document.getElementById('Medicine_Y').checked) {
          Medicine = "Y";
        }else if(document.getElementById('Medicine_N').checked) {
          Medicine = "N";
        }

        var Surgery="";
      if(document.getElementById('Surgery_Y').checked) {
          Surgery = "Y";
        }else if(document.getElementById('Surgery_N').checked) {
          Surgery = "N";
        }

        var Pregnant="";
        if(document.getElementById('Pregnant_Y').checked) {
          Pregnant = "Y";
          }else if(document.getElementById('Pregnant_N').checked) {
              Pregnant = "N";
          } 

          var Hepatitis="";
        if(document.getElementById('Hepatitis_Y').checked) {
          Hepatitis = "Y";
          }else if(document.getElementById('Hepatitis_N').checked) {
              Hepatitis = "N";
          }

          var Typhoid="";
        if(document.getElementById('Typhoid_Y').checked) {
          Typhoid = "Y";
          }else if(document.getElementById('Typhoid_N').checked) {
              Typhoid = "N";
          }

          var Dengue="";
        if(document.getElementById('Dengue_Y').checked) {
          Dengue = "Y";
          }else if(document.getElementById('Dengue_N').checked) {
              Dengue = "N";
          }

          var Fever="";
        if(document.getElementById('Fever_Y').checked) {
          Fever = "Y";
          }else if(document.getElementById('Fever_N').checked) {
              Fever = "N";
          }

          var Antibiotic="";
        if(document.getElementById('Antibiotic_Y').checked) {
          Antibiotic = "Y";
          }else if(document.getElementById('Antibiotic_N').checked) {
              Antibiotic = "N";
          }

          var deceases1="";
        if(document.getElementById('Deceases_1').checked) {
          deceases1 = "Heart Attack";
          }else{
              deceases1 = "";
          }

          var deceases2="";
        if(document.getElementById('Deceases_2').checked) {
          deceases2 = "Diabetic";
          }else{
              deceases2 = "";
          }

          var deceases3="";
        if(document.getElementById('Deceases_3').checked) {
          deceases3 = "Fits";
          }else{
              deceases3 = "";
          }

          var deceases4="";
        if(document.getElementById('Deceases_4').checked) {
          deceases4 = "Paralysis";
          }else{
              deceases4 = "";
          }

          var deceases5="";
        if(document.getElementById('Deceases_5').checked) {
          deceases5 = "Lung disease";
          }else{
              deceases5 = "";
          }

          var deceases6="";
        if(document.getElementById('Deceases_6').checked) {
          deceases6 = "Liver disease";
          }else{
              deceases6 = "";
          }

          var deceases7="";
        if(document.getElementById('Deceases_7').checked) {
          deceases7 = "Kidney disease";
          }else{
              deceases7 = "";
          }

          var deceases8="";
        if(document.getElementById('Deceases_8').checked) {
          deceases8 = "Blood disease";
          }else{
              deceases8 = "";
          }

          var deceases9="";
        if(document.getElementById('Deceases_8').checked) {
          deceases9 = "Cancer";
          }else{
              deceases9 = "";
          }
  
          
  var date1 = date;
  var [month1, day1, year1] = date1.split("/");

  var formattedDate1 = parseInt(month1, 10) + "/" + day1 + "/" + year1;

  if (deceases1!="" ||deceases2!="" ||deceases3!="" ||deceases4!="" ||deceases5!="" ||deceases6!="" ||deceases7!="" ||deceases8!="" ||deceases9!="") {
      swal('Opps...!','You Cant','info');
  }else
  if(D_before == "Y" && HM_Times == "" || LB_Date == ""){
      swal('Opps...!','Please Select Time and date','info');
  }else

  if(diffDays<120){
      swal('Opps...!','You can donate after 4 months from your last donation.','warning');
  }else
  if (name == '') {
      swal('Opps...!','Please Enter Your Name','info');
  }else
  if (email == '') {
      swal('Opps...!','Please Enter Your Email','info');
  }else
  if (contact == '') {
      swal('Opps...!','Please Enter Your Contact Number','info');
  }else
  if (contact.length !=10) {
      swal('Opps...!','Please Check Your Contact Number','info');
  }else
  if (whight == '') {
      swal('Opps...!','Please Enter Your Whight','info');
  }else
  if (hight == '') {
      swal('Opps...!','Please Enter Your Hight','info');
  }else
  if (BBlood_group == '0') {
      swal('Opps...!','Please Selct Blood Group','info');
  }else
  if (Donor_nic == '') {
      swal('Opps...!','Please Enter NIC','info');
  }else
  if (D_DOB == '') {
      swal('Opps...!','Please Enter DOB','info');
  }else 
  if (D_before == '' ) {
      swal('Opps...!','Please Fill all fields','info');
  }else
  if (Inconvinionce == 'Y') {
      swal('Opps...!','Sorry You unable to give blood, Because you have incovinions after donations','info');
  }else
  if (Comfortable == 'N') {
      swal('Opps...!','Sorry You unable to give blood, Because you are not comfortable for donations','info');
  }else 
  if (Advice == 'Y') {
      swal('Opps...!','Sorry You unable to give blood, Because you received advice not to give blood','info');
  }else
  if (InstructionsD == 'N') {
      swal('Opps...!','Please read the instruction first','info');
  }else 
  if (Medicine == '') {
      swal('Opps...!','Please Fill all fields','info');
  }else
  if (Pregnant == '') {
      swal('Opps...!','Please Fill all fields','info');
  }else
  if (Hepatitis == '') {
      swal('Opps...!','Please Fill all fields','info');
  }else
  if (Surgery == '') {
      swal('Opps...!','Please Fill all fields','info');
  }else
  if (Typhoid == '') {
      swal('Opps...!','Please Fill all fields','info');
  }else
  if (Dengue == '') {
      swal('Opps...!','Please Fill all fields','info');
  }else
  if (Fever == '') {
      swal('Opps...!','Please Fill all fields','info');
  }else
  if (Antibiotic == '') {
      swal('Opps...!','Please Fill all fields','info');
  }else
  if (formattedDate1 == '') {
      swal('Opps...!','Please Selct Date','info');
  }else
  if (formattedDate1 == 'NaN/undefined/undefined') {
      swal('Opps...!','Please Selct Date','info');
  }else
  if (time == '0') {
      swal('Opps...!','Please Select Time','info');
  }else{
  $.ajax(
  {
      url: 'action.php',
      method: 'POST',
      data:{action:action, name:name, email:email, contact:contact, whight:whight, hight:hight, date:formattedDate1, time:time, BBlood_group:BBlood_group,Gander:Gander,D_before:D_before,HM_Times:HM_Times,LB_Date:LB_Date,Inconvinionce:Inconvinionce,Inconvinionce_D:Inconvinionce_D,
          Advice:Advice,InstructionsD:InstructionsD,Comfortable:Comfortable,Medicine:Medicine,Surgery:Surgery,Pregnant:Pregnant,Hepatitis:Hepatitis,
          Typhoid:Typhoid,Dengue:Dengue,Fever:Fever,Antibiotic:Antibiotic,Donor_nic:Donor_nic},
      success: function(data)
      {
          if (data == 'Inserted') {
              swal('Done','Appointment Received Us','success');
              
              $('#datepicker').val('');
              $('#BBlood_time_slot').val('');
              $('#D_before').val('');
              $('#HM_Times').val('');
              $('#LB_Date').val('');
              $('#Inconvinionce').val('');
              $('#Inconvinionce_D').val('');
              $('#Advice').val('');
              $('#InstructionsD').val('');
              $('#Comfortable').val('');
              $('#Medicine').val('');
              $('#Surgery').val('');
              $('#Pregnant').val('');
              $('#Hepatitis').val('');
              $('#Typhoid').val('');
              $('#Dengue').val('');
              $('#Fever').val('');
              $('#Antibiotic').val('');
             
          }else{
              swal('Error','Somthing Went Wrong','warning');
          }
          
      }
  })
  }
 });


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Food Categories
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function View_food_Category()
    {
    var action = "View_food_Category";
    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#Blood_donor_fetch').html(data);  

                $('#datatableviewFC').DataTable({
                  dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            }
        })
    }


    $(document).on('click', '.View_food_Category', function(){
        $('#Blood_donor_fetch').html("");
        $('#title').html("View Food Categories");
        View_food_Category();
    });



// ============================================== ADMIN ADD==============================================

$(document).on('click', '#FCAdd', function(){
  var AdminModel=$('#FoodCModal').modal
  console.log(AdminModel)
  $('#FoodCModal').modal("show");

  });


  $('#foodCat_form').submit(function(event){
    event.preventDefault();

    var action = "addFCategory";
    var fcategory = $('#fcategory').val();
    var fcdesc = $('#fcdesc').val();
    var timeFC = $('#timeFC').val();
   

    console.log(fcategory);
    console.log(fcdesc);
    console.log(timeFC);
   

    if(fcategory == ""){
        console.log("enter category");
        
    }else{
        var action = "addFCategory";
        $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action,fcategory:fcategory,fcdesc:fcdesc,timeFC:timeFC},
            success:function(data)
            {
               if(data == "inserted"){
                console.log('inseted');
                swal('Successfull','Food Category Added!','success');
                $('#fcategory').val('');
                $('#fcdesc').val('');
                $('#timeFC').val('');
                $('#FoodCModal').modal('hide');
               }else{
                console.log('Not Insert');
               }
            }
        })
    }
    
});

// ============================================== FOOD CATEGORY EDIT ==============================================



$(document).on('click', '.fcat_update', function(){

  var action = "get_fcategory_update";
  var ID = $(this).attr('id');
  console.log(ID);
  console.log("ID");
  $.ajax(
      {
          url: 'action.php',
          method: 'POST',
          data:{fcat:ID, action:action},
          dataType: 'JSON',
          success: function(data)
          {
            console.log("ddd");
              $('#edit_fcID').val(data[0]);
              $('#edit_fcName').val(data[1]);
              $('#edit_fcdesc').val(data[2]);
              $('#edit_fcNumber').val(data[3]);
              $('#f_Status').val(data[4]);
              $('#fcat_update').modal("show");
          }
      })
});

$('#fcat_edit_form').submit(function(event){
  event.preventDefault();
  var edit_fcName = $('#edit_fcName').val();
  var edit_fcdesc = $('#edit_fcdesc').val();
  var edit_fcNumber = $('#edit_fcNumber').val();
  // var fcat_ID = $('#fcat_ID').val();
  // var f_Status = $('#f_Status').val();
  $('#action').val('fcat_update2');

  if(edit_fcName == '')
  {
   swal('Opps...Fill in the Blank','Please Enter Admin Name ','info');
   return false;
  }
  else 
  if(edit_fcdesc == '')
  {
   swal('Opps...Fill in the Blank','Please Enter Admin E-mail ','info');
   return false;
  }else
  if(edit_fcNumber == '')
  {
   swal('Opps...Fill in the Blank','Please Enter Admin ID ','info');
   return false;
  
  }else
   {
    $.ajax({
     url:"action.php",
     method:"POST",
     data:new FormData(this),
     contentType:false,
     processData:false,
     success:function(data)
     {if(data == "Updated")
     {
      swal('Greate Job','Admin Account Has Been Updated Successfully','success');
      all();
      $('#fcat_update').modal('hide');
      $('#fcat_edit_form')[0].reset();
      
     }else
     if(data == "NotUpdated")
     {
      swal('Opps...','Unknown Error Occurred','error');
     }else
     if(data == "Password")
     {
      swal('Opps...','Admin Password Not Match','info');
     }
      
     }
    });
   }
  
 });



// ============================================== FOOD CATEGORY DELETE ==============================================

$(document).on('click', '.FC_delete1', function(){
  var TID = $(this).attr("id");
  var action = "FC_delete1";
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this FOOD CATEGORY!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  })
  .then((willDelete) => {
      if (willDelete) {
      
      $.ajax({
          url:"action.php",
          method:"POST",
          data:{fcat_ID:TID, action:action},
          success:function(data)
          {
          swal('Greate Job..',data,'success');
          all();
          }
      })
      } else {
      swal("This FOOD CATEGORY is safe!");
      }
  });
}); 


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // General Item Categories
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function View_general_item()
    {
    var action = "View_general_item";
    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#Blood_donor_fetch').html(data);  

                $('#datatableGNItem').DataTable({
                  dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });

                $('#datatableGNItem2').DataTable({
                  dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            }
        })
    }


    $(document).on('click', '.View_general_item', function(){
        $('#Blood_donor_fetch').html("");
        $('#title').html("View General Items");
        View_general_item();
    });





// ================================================== General Item Add ========================================
$(document).on('click', '#GItem_Add', function(){

  $('#gItem_add_modal').modal("show");

  });




  $('#gitem_db_add').submit(function(event){
    event.preventDefault();

    var action = "gitem_db_added";
    var itemdonationtype = $('#itemdonationtype').val();
    var gidesc = $('#gidesc').val();
   

    console.log(itemdonationtype);
    console.log(gidesc);
    
   

    if(gidesc == ""){
        console.log("enter category");
        
    }else{
        var action = "gitem_db_added";
        $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action,itemdonationtype:itemdonationtype,gidesc:gidesc},
            success:function(data)
            {
               if(data != "notinsert"){
                console.log('inseted');
                swal('Successfull','Food Category Added!','success');
                $('#gItem_add_modal').val('');
                $('#gidesc').val('');
                $('#timeFC').val('');
                $('#gItem_add_modal').modal('hide');
               }else{
                console.log('Not Insert');
               }
            }
        })
    }
    
});


//  Edit Q & A for chat-bot
$(document).on('click', '.GI_edit', function(){
  
  var action = "GI_edit_value";
  var ID = $(this).attr('id');
  // console.log(ID);
  $.ajax(
      {
          url: 'action.php',
          method: 'POST',
          data:{UserID:ID, action:action},
          dataType: 'JSON',
          success: function(data)
          {
              
              $('#GI_ID').val(data[0]);
              $('#itemdonationtype_EDIT').val(data[1]);
              $('#gidesc_EDIT').val(data[2]);
              $('#GItem_edit_modal').modal("show");
          }
      })
});

$('#GItem_edit').submit(function(event){
  event.preventDefault();

  var itemdonationtype_EDIT = $('#itemdonationtype_EDIT').val();
  var gidesc_EDIT = $('#gidesc_EDIT').val();

  if(itemdonationtype_EDIT == '')
  {
  swal('Opps...Fill in the Blank','Please Enter Quection','info');
  return false;
  }else
  if(gidesc_EDIT == '')
  {
  swal('Opps...Fill in the Blank','Please Enter Answer','info');
  return false;
  }else
  {
  $.ajax({
  url:"action.php",
  method:"POST",
  data:new FormData(this),
  contentType:false,
  processData:false,
  success:function(data)
  {
      if(data == 'insert')
      {
          swal('Greate Job..','This General Item Update Now','success');
          $('#GItem_edit')[0].reset();
          $('#GItem_edit_modal').modal('hide');
          all();
      }else
      if(data == 'not_update')
      {
          swal('Opps...Somthing Went Wrong','Please Contact Developer','error');
      }
      
  }
  });
  }
});



//  Edit Q & A for chat-bot
$(document).on('click', '.GI_edit2', function(){
  
  var action = "GI_edit_value2";
  var ID = $(this).attr('id');
  // console.log(ID);
  $.ajax(
      {
          url: 'action.php',
          method: 'POST',
          data:{UserID:ID, action:action},
          dataType: 'JSON',
          success: function(data)
          {
              
              $('#GI_ID2').val(data[0]);
              $('#itemdonationtype_EDIT2').val(data[1]);
              $('#gidesc_EDIT2').val(data[2]);
              $('#GItem_edit_modal2').modal("show");
          }
      })
});

$('#GItem_edit2').submit(function(event){
  event.preventDefault();

  var itemdonationtype_EDIT = $('#itemdonationtype_EDIT2').val();
  var gidesc_EDIT = $('#gidesc_EDIT2').val();

  if(itemdonationtype_EDIT == '')
  {
  swal('Opps...Fill in the Blank','Please Enter Quection','info');
  return false;
  }else
  if(gidesc_EDIT == '')
  {
  swal('Opps...Fill in the Blank','Please Enter Answer','info');
  return false;
  }else
  {
  $.ajax({
  url:"action.php",
  method:"POST",
  data:new FormData(this),
  contentType:false,
  processData:false,
  success:function(data)
  {
      if(data == 'insert')
      {
          swal('Greate Job..','This General Item Update Now','success');
          $('#GItem_edit2')[0].reset();
          $('#GItem_edit_modal2').modal('hide');
          all();
      }else
      if(data == 'not_update')
      {
          swal('Opps...Somthing Went Wrong','Please Contact Developer','error');
      }
      
  }
  });
  }
});


// Delete Q & A for chat-bot
$(document).on('click', '.bot_delete', function(){
  var ID = $(this).attr("id");
  var action = "bot_delete";
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  })
  .then((willDelete) => {
      if (willDelete) {
      
      $.ajax({
          url:"action.php",
          method:"POST",
          data:{TravelID:ID, action:action},
          success:function(data)
          {
              if(data == 'delete')
              {
                  swal('Greate Job..','This Quection & Answer Deleted Now','success');
                  all();
              }else
              if(data == 'not_delete')
              {
                  swal('Opps..Somthing Went Wrong','Please Contact Developer','error');
              }
          
          }
      })
      } else {
      swal("This Quection & Answer is safe!");
      }
  });
});  


// ============================================== GENERAL ITEM DELETE ==============================================

$(document).on('click', '.GI_delete', function(){
  var TID = $(this).attr("id");
  var action = "GI_delete";
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this GENERAL ITEM!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  })
  .then((willDelete) => {
      if (willDelete) {
      
      $.ajax({
          url:"action.php",
          method:"POST",
          data:{fcat_ID:TID, action:action},
          success:function(data)
          {
          swal('Greate Job..',data,'success');
          all();
          }
      })
      } else {
      swal("This GENERAL ITEM is safe!");
      }
  });
}); 



// ============================================== FOOD CATEGORY DELETE ==============================================

$(document).on('click', '.GI_delete2', function(){
  var TID = $(this).attr("id");
  var action = "GI_delete2";
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this GENERAL FOOD ITEM!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  })
  .then((willDelete) => {
      if (willDelete) {
      
      $.ajax({
          url:"action.php",
          method:"POST",
          data:{ID:TID, action:action},
          success:function(data)
          {
          swal('Greate Job..',data,'success');
          all();
          }
      })
      } else {
      swal("This GENERAL FOOD ITEM is safe!");
      }
  });
}); 

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // registered volunteers
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function registered_volunteer()
    {
    var action = "registered_volunteer";
    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#Blood_donor_fetch').html(data);  

                $('#datatableRvolunteer').DataTable({
                  dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            }
        })
    }


    $(document).on('click', '.registered_volunteer', function(){
        $('#Blood_donor_fetch').html("");
        $('#title').html("Registered volunteers");
        registered_volunteer();
    });


//  send volunteer email
$(document).on('click', '.volunt_email', function(){
  
  var action = "volant_email_send";
  var ID = $(this).attr('id');
  // console.log(ID);
  $.ajax(
      {
          url: 'action.php',
          method: 'POST',
          data:{UserID:ID, action:action},
          dataType: 'JSON',
          success: function(data)
          {
              
              $('#volunteer_ID').val(data[0]);
              $('#Vo_Name').val(data[1]);
              $('#Vo_Email').val(data[2]);
              $('#voluntEmail_modal').modal("show");
          }
      })
});

$('#voluntEmail_SUBMIT').submit(function(event){
  event.preventDefault();
  var Vo_Name = $('#Vo_Name').val();
  var Vo_Email = $('#Vo_Email').val();
  var Vo_Message = $('#Vo_Message').val();


  if(Vo_Name == '')
  {
   swal('Opps...Fill in the Blank','Please Enter Name ','info');
   return false;
  }
  else 
  if(Vo_Email == '')
  {
   swal('Opps...Fill in the Blank','Please Enter E-mail ','info');
   return false;
  }else
  if(Vo_Message == '')
  {
   swal('Opps...Fill in the Blank','Please Enter Message ','info');
   return false;
  }else
  {

    $.ajax({
     url:"email_volunteer.php",
     method:"POST",
     data:new FormData(this),
     contentType:false,
     processData:false,
     success:function(data){
      console.log(data+"--")
      if(data != "Created")
     {
      $('#voluntEmail_modal').modal('hide');
      $('#voluntEmail_SUBMIT')[0].reset();
      swal('You send a email','to your volunteer','success');
      all();
      email_send();
      
      
      // all();
      // swal('Greate Job','Admin Account Has Been Created Successfully','success');
      // email_send();
      
     }else
     if(data == "Error")
     {
      swal('Opps...','Unknown Error Occurred','error');
     }else
     if(data == "email")
     {
      swal('Opps...','This E-mail Already Taken, Please Enter Another E-mail','info');
     }
      
     }
    });
   }
  
 });


 //  send donors email
$(document).on('click', '.donorSend_email', function(){
  
  var action = "donors_email_send";
  var ID = $(this).attr('id');
  // console.log(ID);
  $.ajax(
      {
          url: 'action.php',
          method: 'POST',
          data:{UserID:ID, action:action},
          dataType: 'JSON',
          success: function(data)
          {
              
              $('#donor_id').val(data[0]);
              $('#donor_name').val(data[1]);
              $('#donor_email').val(data[2]);
              $('#donorEmail_modal').modal("show");
          }
      })
});

$('#donorEmail_SUBMIT').submit(function(event){
  event.preventDefault();
  var donor_name = $('#donor_name').val();
  var donor_email = $('#donor_email').val();
  var Vo_Message = $('#Vo_Message').val();


  if(donor_name == '')
  {
   swal('Opps...Fill in the Blank','Please Enter Name ','info');
   return false;
  }
  else 
  if(donor_email == '')
  {
   swal('Opps...Fill in the Blank','Please Enter E-mail ','info');
   return false;
  }else
  if(donor_Message == '')
  {
   swal('Opps...Fill in the Blank','Please Enter Message ','info');
   return false;
  }else
  {

    $.ajax({
     url:"email_donor.php",
     method:"POST",
     data:new FormData(this),
     contentType:false,
     processData:false,
     success:function(data){
      console.log(data+"--")
      if(data != "Created")
     {
      $('#donorEmail_modal').modal('hide');
      $('#donorEmail_SUBMIT')[0].reset();
      swal('You send a email','to your Donors','success');
      all();
      email_send();
      
      
      // all();
      // swal('Greate Job','Admin Account Has Been Created Successfully','success');
      // email_send();
      
     }else
     if(data == "Error")
     {
      swal('Opps...','Unknown Error Occurred','error');
     }else
     if(data == "email")
     {
      swal('Opps...','This E-mail Already Taken, Please Enter Another E-mail','info');
     }
      
     }
    });
   }
  
 });


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Drug List
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function drug_list_add()
    {
    var action = "drug_list_add";
    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#Blood_donor_fetch').html(data);  

                $('#datatableDrugList').DataTable({
                  dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            }
        })
    }


    $(document).on('click', '.drug_list_add', function(){
        $('#Blood_donor_fetch').html("");
        $('#title').html("View Food Categories");
        drug_list_add();
    });



// ============================================== Drug List ADD==============================================

$(document).on('click', '#dlAdd', function(){
  var AdminModel=$('#drugListModal').modal
  console.log(AdminModel)
  $('#drugListModal').modal("show");

  });


  $('#drugAdd_form').submit(function(event){
    event.preventDefault();

    var action = "adddrugs";
    var drug_name = $('#drug_name').val();
    var drug_weight = $('#drug_weight').val();
    

    if(drug_name == ""){
        console.log("enter drug");
        
    }else{
        var action = "adddrugs";
        $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action,drug_name:drug_name,drug_weight:drug_weight},
            success:function(data)
            {
               if(data == "inserted"){
                console.log('inseted');
                swal('Successfull','Food Category Added!','success');
                $('#drug_name').val('');
                $('#drug_weight').val('');
                $('#drugListModal').modal('hide');
               }else{
                console.log('Not Insert');
               }
            }
        })
    }
    
});

// ============================================== Drug List EDIT ==============================================



$(document).on('click', '.drug_update', function(){

  var action = "get_druglist_update";
  var ID = $(this).attr('id');
  console.log(ID);
  $.ajax(
      {
          url: 'action.php',
          method: 'POST',
          data:{drugID:ID, action:action},
          dataType: 'JSON',
          success: function(data)
          {
            
              $('#edit_drug_ID').val(data[0]);
              $('#edit_drug_name').val(data[1]);
              $('#edit_drug_weight').val(data[2]);
              $('#drugsList_update').modal("show");
          }
      })
});

$('#drug_edit_form11').submit(function(event){
  event.preventDefault();
  console.log("eeeeeeeeeeeeeeeeeeeeee"+$('#edit_drug_name').val());
  var edit_drug_name = $('#edit_drug_name').val();
  var edit_drug_name = $('#edit_drug_name').val();
  var edit_drug_weight = $('#edit_drug_weight').val();

  // $('#action').val('drug_edit_form1');

  if(edit_drug_name == '')
  {
   swal('Opps...Fill in the Blank','Please Enter Admin Name ','info');
   return false;
  }
  else 
  if(edit_drug_weight == '')
  {
   swal('Opps...Fill in the Blank','Please Enter Admin E-mail ','info');
   return false;
    }else
    {
    $.ajax({
    url:"update_drug.php",
    method:"POST",
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
        if(data == 'insert')
        {
            swal('Greate Job..','This General Item Update Now','success');
            $('#drugsList_update').modal('hide');
           
            all();
        }else
        if(data == 'not_update')
        {
            swal('Opps...Somthing Went Wrong','Please Contact Developer','error');
        }
      
     }
    });
   }
  
 });

 


// ============================================== FOOD CATEGORY DELETE ==============================================

$(document).on('click', '.drug_delete11', function(){
  var TID = $(this).attr("id");
  var action = "drug_delete11";
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this DRUG for this list!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  })
  .then((willDelete) => {
      if (willDelete) {
      
      $.ajax({
          url:"action.php",
          method:"POST",
          data:{fcat_ID:TID, action:action},
          success:function(data)
          {
          swal('Greate Job..',data,'success');
          all();
          }
      })
      } else {
      swal("This DRUG is safe in the list!");
      }
  });
}); 

function view_all_food()
{
var action = "view_all_food";
$.ajax(
    {
        url:"action.php",
        method:"POST",
        data:{action:action},
        success:function(data)
        {
            $('#Blood_donor_fetch').html(data);  

            $('#datatableviewFDAll').DataTable({
              dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        }
    })
}

$(document).on('click', '.view_all_food', function(){
  $('#Blood_donor_fetch').html("");
  $('#title').html("View All Food Donations");
  view_all_food();
});


$(document).on('click', '.view_all_food1', function(){
  $('#Blood_donor_fetch').html("");
  $('#title').html("View All Food Donations");
  view_all_food();
});


function view_all_blood()
{
var action = "view_all_blood";
$.ajax(
    {
        url:"action.php",
        method:"POST",
        data:{action:action},
        success:function(data)
        {
            $('#Blood_donor_fetch').html(data);  

            $('#datatableviewBDAll').DataTable({
              dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        }
    })
}

$(document).on('click', '.view_all_blood', function(){
  $('#Blood_donor_fetch').html("");
  $('#title').html("View All Blood Donations");
  view_all_blood();
});

function all_drug_bookings()
{
var action = "all_drug_bookings";
$.ajax(
    {
        url:"action.php",
        method:"POST",
        data:{action:action},
        success:function(data)
        {
            $('#Blood_donor_fetch').html(data);  

            $('#datatableviewdrugDAll').DataTable({
              dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        }
    })
}

$(document).on('click', '.all_drug_bookings', function(){
  $('#Blood_donor_fetch').html("");
  $('#title').html("View All Drug Donations");
  all_drug_bookings();
});



function general_item_Booking()
{
var action = "general_item_Booking";
$.ajax(
    {
        url:"action.php",
        method:"POST",
        data:{action:action},
        success:function(data)
        {
            $('#Blood_donor_fetch').html(data);  

            $('#datatableviewGitemDAll').DataTable({
              dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        }
    })
}

$(document).on('click', '.general_item_Booking', function(){
  $('#Blood_donor_fetch').html("");
  $('#title').html("View All General Item Donations");
  general_item_Booking();
});


function entertainment_view()
{
var action = "entertainment_view";
$.ajax(
    {
        url:"action.php",
        method:"POST",
        data:{action:action},
        success:function(data)
        {
            $('#Blood_donor_fetch').html(data);  

            $('#datatableviewEntertainmentDAll').DataTable({
              dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        }
    })
}

$(document).on('click', '.entertainment_view', function(){
  $('#Blood_donor_fetch').html("");
  $('#title').html("View All Entertainment Activity");
  entertainment_view();
});


$(document).on('click', '.event_view1', function(){
  
  var action = "event_view1";
  var ID = $(this).attr('id');
  // console.log(ID);
  $.ajax(
      {
          url: 'action.php',
          method: 'POST',
          data:{UserID:ID, action:action},
          dataType: 'JSON',
          success: function(data)
          {
            

              $('#FEvent_ID').val(data[0]);
              $('#FE_ID').val(data[1]);
              $('#FU_ID').val(data[2]);
              $('#FE_Type').val(data[3]);
              $('#FE_Date').val(data[4]);
              $('#FStatus').val(data[5]);
              var selectedCat = data[6];

              // Check if the selectedValue is '2' and update the display value
              if (selectedCat === '3') {
                selectedCat = 'Food';
              }else if(selectedCat === '2') {
                selectedCat = 'Soup';
              }else if(selectedCat === '1') {
                selectedCat = 'King Coconut';
              }
              $('#Ffood_category_b').val(selectedCat);

              var selectedValue = data[7];
             
              if (selectedCat === 'Food' && selectedValue === '1') {
                // Both conditions are met, so set the display value to "morning"
                var displayValue = "Morning";
              } else if(selectedCat === 'Food' && selectedValue === '2') {
                // If the conditions are not met, keep the original selectedValue
                var displayValue = "Lunch";
              }else if(selectedCat === 'Food' && selectedValue === '3') {
                // If the conditions are not met, keep the original selectedValue
                var displayValue = "Dinner";
              }else if(selectedCat === 'Soup' && selectedValue === '1') {
                // If the conditions are not met, keep the original selectedValue
                var displayValue = "Morning";
              }else if(selectedCat === 'Soup' && selectedValue === '2') {
                // If the conditions are not met, keep the original selectedValue
                var displayValue = "Evening";
              }else if(selectedCat === 'King Coconut' && selectedValue === '1') {
                // If the conditions are not met, keep the original selectedValue
                var displayValue = "Morning";
              }
              
              // Set the value in the input field
              $('#Fselected_time').val(displayValue);
              
              $('#Fadditional_desc').val(data[8]);
              $('#Fno_of_visit').val(data[9]);
              $('#Fphone').val(data[10]);
              $('#event_view_modal').modal("show");
          }
      })
});


$(document).on('click', '.eventBlood_view1', function(){
  
  var action = "eventBlood_view1";
  var ID = $(this).attr('id');
  // console.log(ID);
  $.ajax(
      {
          url: 'action.php',
          method: 'POST',
          data:{UserID:ID, action:action},
          dataType: 'JSON',
          success: function(data)
          {
            

              $('#BEvent_ID').val(data[0]);
              $('#BName').val(data[1]);
              $('#BEmail').val(data[2]);
              $('#BContact').val(data[3]);
              $('#Bbd_NIC').val(data[4]);
              $('#BWhight').val(data[5]);
              $('#BHight').val(data[6]);
              $('#BGroup').val(data[7]);
              $('#BDate').val(data[8]);
              // $('#BTime').val(data[9]);
              // $('#BD_before').val(data[10]);
              $('#BHM_Times').val(data[11]);
              $('#BLB_Date').val(data[12]);
             

              var selectedValue = data[9];

              // Check if the selectedValue is '2' and update the display value
              if (selectedValue === '1') {
                selectedValue = '9.00 am to 9.30 am';
              }else if(selectedValue === '2') {
                selectedValue = '9.30 am to 10.00 am';
              }else if(selectedValue === '2') {
                selectedValue = '10.00 am to 10.30 am';
              }else if(selectedValue === '2') {
                selectedValue = '10.30 am to 11.00 am';
              }else if(selectedValue === '2') {
                selectedValue = '11.00 am to 11.30 am';
              }else if(selectedValue === '2') {
                selectedValue = '11.30 am to 12.00 am';
              }
              $('#BTime').val(selectedValue);

              var beforeBlood = data[10];
             
              if (beforeBlood === 'Y') {
                // Both conditions are met, so set the display value to "morning"
                var displayValue = "Yes";
              } else if(beforeBlood === 'N') {
                // If the conditions are not met, keep the original selectedValue
                var displayValue = "No";
              }
              
              // Set the value in the input field
              $('#BD_before').val(displayValue);
              
          
              $('#event_Bloodview_modal').modal("show");
          }
      })
});


$(document).on('click', '.eventEntertainment_view1', function(){
  
  var action = "eventEntertainment_view1";
  var ID = $(this).attr('id');
  // console.log(ID);
  $.ajax(
      {
          url: 'action.php',
          method: 'POST',
          data:{UserID:ID, action:action},
          dataType: 'JSON',
          success: function(data)
          {
          
       
             $('#BEEvent_ID').val(data[0]);
              $('#EeAct_Name').val(data[1]);
              $('#EeAct_contact').val(data[2]);
              $('#EeAct_NIC').val(data[3]);
              $('#EeAct').val(data[4]);
              $('#EeAct_Desc').val(data[5]);
              $('#EeAct_ward').val(data[6]);
              $('#EeAct_noofvisiters').val(data[7]);
              $('#EeAct_Date').val(data[8]);
              
             

              $('#event_Entertainmentview_modal').modal("show");
          }
      })
});

$(document).on('click', '.eventGeneral_view1', function(){
  
  var action = "eventGeneral_view1";
  var ID = $(this).attr('id');
  // console.log(ID);
  $.ajax(
      {
          url: 'action.php',
          method: 'POST',
          data:{UserID:ID, action:action},
          dataType: 'JSON',
          success: function(data)
          {
            
       
             $('#GU_ID').val(data[0]);
              $('#GgItemD_Name').val(data[1]);
              $('#GgItemD_Email').val(data[2]);
              $('#GgItemD_contact').val(data[3]);
              $('#GgItemD_NIC').val(data[4]);
              $('#GgItemD_item').val(data[5]);
              console.log($('#GgItemD_item').val(data[5]));
              $('#GDate').val(data[6]);
              $('#GgItem_quentity').val(data[7]);
              $('#GgItemD_ward').val(data[8]);
             
             

              $('#event_Generalview_modal').modal("show");
          }
      })
});



$(document).on('click', '.event_doneF', function(){
  
  var action = "event_done1";
  var ID = $(this).attr('id');
  console.log(ID);
  $.ajax(
      {
          url: 'action.php',
          method: 'POST',
          data:{UserID:ID, action:action},
          dataType: 'JSON',
          success: function(data)
          {
            
              $('#FEvent_ID1').val(data[0]);  
              console.log($('#FEvent_ID1').val(data[0]));  
              $('#Fdonor_name').val(data[1]);
              $('#Fdonor_nic').val(data[2]);
              $('#Fdonor_email').val(data[3]);
          
             
              $('#bloodDone_modal').modal("show");
          }
      })
});


// $('#drug_edit_form1').submit(function(event){
//   event.preventDefault();
//   var edit_drug_name = $('#edit_drug_name').val();
//   var edit_drug_weight = $('#edit_drug_weight').val();
  
//   $('#action').val('fcat_update2');

//   if(edit_drug_name == '')
//   {
//    swal('Opps...Fill in the Blank','Please Enter Admin Name ','info');
//    return false;
//   }
//   else 
//   if(edit_drug_weight == '')
//   {
//    swal('Opps...Fill in the Blank','Please Enter Admin E-mail ','info');
//    return false;
//   }else
//    {
//     $.ajax({
//      url:"action.php",
//      method:"POST",
//      data:new FormData(this),
//      contentType:false,
//      processData:false,
//      success:function(data)
//      {if(data == "Updated")
//      {
//       swal('Greate Job','Admin Account Has Been Updated Successfully','success');
//       all();
//       $('#drugsList_update').modal('hide');
//       $('#drug_edit_form1')[0].reset();
      
//      }else
//      if(data == "NotUpdated")
//      {
//       swal('Opps...','Unknown Error Occurred','error');
//      }else
//      if(data == "Password")
//      {
//       swal('Opps...','Admin Password Not Match','info');
//      }
      
//      }
//     });
//    }
  
//  });

//  send reminder email
// $(document).on('click', '.remind', function(){
  
//   var action = "remind_email_send";
 

//   var currentDate = new Date(); // Current date and time
//   currentDate.setDate(currentDate.getDate() + 10); // Add 10 days
  
//   var year = currentDate.getFullYear();
//   var month = currentDate.getMonth() + 1; // Note: Months are zero-based
//   var day = currentDate.getDate();
  
//   // Ensure two-digit formatting for month and day
//   var formattedMonth = month < 10 ? "0" + month : month;
//   var formattedDay = day < 10 ? "0" + day : day;
  
//   $formattedFutureDate = formattedDay + "/" + formattedMonth + "/" + year;
  

//   // Retrieve donations
//   $query = "SELECT * FROM event1 WHERE E_Date = '$formattedFutureDate'";

//   $result = mysqli_query($conn,$query);

//     while($row=mysqli_fetch_array($result))
//    {
//       $donor_email = $row['email'];
//       $donation_date = $row['donation_date'];
  
//       // Compose and send reminder email using mail() or PHPMailer
//       $subject = "Reminder: Your Donation on $donation_date";
//       $message = "Dear Donor,\n\nThis is a friendly reminder that your donation is scheduled on $donation_date.";
//       $headers = "From: your_email@example.com";
  
//       mail($donor_email, $subject, $message, $headers);





//    }

//   // console.log(ID);
//   $.ajax(
//       {
//           url: 'action.php',
//           method: 'POST',
//           data:{UserID:ID, action:action},
//           dataType: 'JSON',
//           success: function(data)
//           {
              
//               $('#volunteer_ID').val(data[0]);
//               $('#Vo_Name').val(data[1]);
//               $('#Vo_Email').val(data[2]);
//               $('#voluntEmail_modal').modal("show");
//           }
//       })
// });

$('#foodDone_modal_SUBMIT').submit(function(event){
  event.preventDefault();
  
  var EventVo_ID = $('#FEvent_ID1').val();
  var Vo_Name = $('#Fdonor_name').val();
  var Vo_Email = $('#Fdonor_email').val();
  var Vo_Message = $('#Fdonor_Message').val();


  if(Vo_Message == 'a')
  {
   swal('Opps...Fill in the Blank','Please Enter Message ','info');
   return false;
  }else
  {

    $.ajax({
     url:"email_receiveDonoation.php",
     method:"POST",
     data:new FormData(this),
     contentType:false,
     processData:false,
     success:function(data){
      console.log(data+"--")
      if(data != "Created")
     {
      $('#bloodDone_modal').modal('hide');
      $('#foodDone_modal_SUBMIT')[0].reset();
      swal('You send a email','to your ,Donor','success');
      all();
      email_send();
      
      
      // all();
      // swal('Greate Job','Admin Account Has Been Created Successfully','success');
      // email_send();
      
     }else
     if(data == "Error")
     {
      swal('Opps...','Unknown Error Occurred','error');
     }else
     if(data == "email")
     {
      swal('Opps...','This E-mail Already Taken, Please Enter Another E-mail','info');
     }
      
     }
    });
   }
  
 });


 $(document).on('click', '.event_doneB', function(){
  
  var action = "event_doneB1";
  var ID = $(this).attr('id');
  console.log(ID);
  $.ajax(
      {
          url: 'action.php',
          method: 'POST',
          data:{UserID:ID, action:action},
          dataType: 'JSON',
          success: function(data)
          {
            
              $('#BEvent_ID1').val(data[0]);  
              $('#Bdonor_name').val(data[1]);
              $('#Bdonor_email').val(data[2]);
        
      console.log(data);
              $('#bloodDone_modal2').modal("show");
          }
      })
});


$('#boodDone_modal_SUBMIT').submit(function(event){
  event.preventDefault();

  var EventVo_ID = $('#BEvent_ID1').val();
  var Vo_Name = $('#Bdonor_name').val();
  var Vo_Email = $('#Bdonor_email').val();
  var Vo_Message = $('#Bdonor_Message').val();
  
console.log($('#Bdonor_email').val()) 

  if(Vo_Message == 'a')
  {
   swal('Opps...Fill in the Blank','Please Enter Message ','info');
   return false;
  }else
  {

    $.ajax({
     url:"email_receiveDonoationBlood.php",
     method:"POST",
     data:new FormData(this),
     contentType:false,
     processData:false,
     success:function(data){
      console.log(data+"--")
      if(data != "Created")
     {
      $('#bloodDone_modal2').modal('hide');
      $('#foodDone_modal_SUBMIT')[0].reset();
      swal('You send a email','to your ,Donor','success');
      all();
      email_send();
      
      
      // all();
      // swal('Greate Job','Admin Account Has Been Created Successfully','success');
      // email_send();
      
     }else
     if(data == "Error")
     {
      swal('Opps...','Unknown Error Occurred','error');
     }else
     if(data == "email")
     {
      swal('Opps...','This E-mail Already Taken, Please Enter Another E-mail','info');
     }
      
     }
    });
   }
  
 });



 $(document).on('click', '.event_doneentertain', function(){
  
  var action = "event_doneentertain";
  var ID = $(this).attr('id');
  console.log(ID);
  $.ajax(
      {
          url: 'action.php',
          method: 'POST',
          data:{UserID:ID, action:action},
          dataType: 'JSON',
          success: function(data)
          {
           
            $('#EnterEvent_ID1').val(data[0]);  
            $('#Enterdonor_name').val(data[1]);
            $('#Enterdonor_email').val(data[2]);
            
              $('#entertainDone_modal').modal("show");
          }
      })
});


$('#entertainDone_modal_SUBMIT').submit(function(event){
  event.preventDefault();

  var EventVo_ID = $('#EnterEvent_ID1').val();
  var Vo_Name = $('#Enterdonor_name').val();
  var Vo_Email = $('#Enterdonor_email').val();
  var Vo_Message = $('#Enterdonor_Message').val();

  
console.log($('#Enterdonor_email').val()) 

  if(Vo_Message == 'a')
  {
   swal('Opps...Fill in the Blank','Please Enter Message ','info');
   return false;
  }else
  {

    $.ajax({
     url:"email_receiveDonoationEntertain.php",
     method:"POST",
     data:new FormData(this),
     contentType:false,
     processData:false,
     success:function(data){
      console.log(data+"--")
      if(data != "Created")
     {
      $('#entertainDone_modal').modal('hide');
      $('#entertainDone_modal_SUBMIT')[0].reset();
      swal('You send a email','to your ,Donor','success');
      all();
      email_send();
      
      
      // all();
      // swal('Greate Job','Admin Account Has Been Created Successfully','success');
      // email_send();
      
     }else
     if(data == "Error")
     {
      swal('Opps...','Unknown Error Occurred','error');
     }else
     if(data == "email")
     {
      swal('Opps...','This E-mail Already Taken, Please Enter Another E-mail','info');
     }
      
     }
    });
   }
  
 });


 $(document).on('click', '.event_doneOther', function(){
  
  var action = "event_doneOther";
  var ID = $(this).attr('id');
  console.log(ID);
  $.ajax(
      {
          url: 'action.php',
          method: 'POST',
          data:{UserID:ID, action:action},
          dataType: 'JSON',
          success: function(data)
          {
           
            $('#OtherEvent_ID1').val(data[0]);  
            $('#Otherdonor_name').val(data[1]);
            $('#Otherdonor_email').val(data[2]);
            
              $('#OtherDone_modal').modal("show");
          }
      })
});


$('#OtherDone_modal_SUBMIT').submit(function(event){
  event.preventDefault();

  var EventVo_ID = $('#OtherEvent_ID1').val();
  var Vo_Name = $('#Otherdonor_name').val();
  var Vo_Email = $('#Otherdonor_email').val();
  var Vo_Message = $('#Otherdonor_Message').val();

  
console.log($('#Otherdonor_email').val()) 

  if(Vo_Message == 'a')
  {
   swal('Opps...Fill in the Blank','Please Enter Message ','info');
   return false;
  }else
  {

    $.ajax({
     url:"email_receiveDonoationOther.php",
     method:"POST",
     data:new FormData(this),
     contentType:false,
     processData:false,
     success:function(data){
      console.log(data+"--")
      if(data != "Created")
     {
      $('#OtherDone_modal').modal('hide');
      $('#OtherDone_modal_SUBMIT')[0].reset();
      swal('You send a email','to your ,Donor','success');
      all();
      email_send();
      
      
      // all();
      // swal('Greate Job','Admin Account Has Been Created Successfully','success');
      // email_send();
      
     }else
     if(data == "Error")
     {
      swal('Opps...','Unknown Error Occurred','error');
     }else
     if(data == "email")
     {
      swal('Opps...','This E-mail Already Taken, Please Enter Another E-mail','info');
     }
      
     }
    });
   }
  
 });



 $('#GItem_wardedit1').submit(function(event){
  event.preventDefault();
  console.log("wee")
  var GU_ID = $('#GU_ID').val();
  var GgItemD_ward = $('#GgItemD_ward').val();
action=GItem_wardedit1;
  if(GgItemD_ward == '')
  {
   swal('Opps...Fill in the Blank','Please Enter ward ','info');
   return false;
  }
  else
    {
    $.ajax({
    url:"action.php",
    method:"POST",
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
        if(data == 'insert')
        {
            swal('Greate Job..','This General Item Donating ward updated Now','success');
            $('#event_Generalview_modal').modal('hide');
           
            all();
        }else
        if(data == 'not_update')
        {
            swal('Opps...Somthing Went Wrong','Please Contact Developer','error');
        }
      
     }
    });
   }
  
 });




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Food Categories
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function View_food_recipes()
    {
    var action = "View_food_recipes";
    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#Blood_donor_fetch').html(data);  

                $('#datatableviewFR').DataTable({
                  dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });

                
                $('#datatableviewFRLunch').DataTable({
                  dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });

                $('#datatableviewFRDinner').DataTable({
                  dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
                
                $('#datatableviewFRSoup1').DataTable({
                  dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });

                $('#datatableviewFRSoup2').DataTable({
                  dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
                
            }
        })
    }


    $(document).on('click', '.View_food_recipes', function(){
        $('#Blood_donor_fetch').html("");
        $('#title').html("View Food Recipes");
        View_food_recipes();
    });

    $(document).on('click', '#FRAdd', function(){
      var AdminModel=$('#FoodRModal').modal
      console.log(AdminModel)
      $('#FoodRModal').modal("show");
    
      });
    
    
      $('#FoodRModal_form').submit(function(event){
        event.preventDefault();
    
        var action = "addFRecipes";
        var fRcategory = $('#Fcategory1').val();
        var fRTime = $('#FTime1').val();
        var fRingredients = $('#fIngredient').val();
       
    
        console.log(fRcategory);
        console.log(fRTime);
        console.log(fRingredients);
       
    
        if(fRingredients == ""){
            console.log("enter Ingredient");
            
        }else{
            var action = "addFRecipes";
            $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action,fRcategory:fRcategory,fRTime:fRTime,fRingredients:fRingredients},
                success:function(data)
                {
                   if(data == "inserted"){
                    console.log('inseted');
                    swal('Successfull','Food Ingredient Added!','success');
                   
                    $('#FoodRModal').modal('hide');
                   }else{
                    console.log('Not Insert');
                   }
                }
            })
        }
        
    });


    $(document).on('change', '#Fcategory1', function(){
      var Fcategory = $('#Fcategory1').val();
      var action = "Fcategory1_Selected";
      $.ajax(
      {
          url:"action.php",
          method:"POST",
          data:{action:action,Fcategory:Fcategory},
          success:function(data)
          {
              if (data=="3") {
                  $('#FTime1').html('<option value="0">Select Category</option> <option value="1">Breackfast</option> <option value="2">Lunch</option> <option value="3">Dinner</option>');
              }else
              if (data=="2") {
                  $('#FTime1').html('<option value="0">Select Category</option> <option value="1">Morning Soup</option><option value="2">Evening Soup</option>');
              }else
              if (data=="1") {
                  $('#FTime1').html('<option value="0">Select Category</option> <option value="1">Time 1</option>');
              }else{
                  swal('Error','Somthing Went Wrong','warning');
              }
              
          }
      })

      
  });



// ============================================== FOOD RECEIPE EDIT ==============================================



$(document).on('click', '.fRECEIPE_update', function(){

  var action = "fRECEIPE_update";
  var ID = $(this).attr('id');
  console.log(ID);
  console.log("ID");
  $.ajax(
      {
          url: 'action.php',
          method: 'POST',
          data:{fcat:ID, action:action},
          dataType: 'JSON',
          success: function(data)
          {
            console.log("ddd");
              $('#edit_fRID').val(data[0]);
              $('#edit_fRINGREDIENT').val(data[1]);
            
              $('#fRECEIPE_update').modal("show");
          }
      })
});

$('#fRECEIPE_edit_form').submit(function(event){
  event.preventDefault();
  var edit_fRID = $('#edit_fRID').val();
  var edit_fRINGRE = $('#edit_fRINGREDIENT').val();
 
  // $('#action').val('fcat_update2');

  if(edit_fRINGRE == '')
  {
   swal('Opps...Fill in the Blank','Please Enter Ingredient ','info');
   return false;
  
  }else
   {
    $.ajax({
     url:"action.php",
     method:"POST",
     data:new FormData(this),
     contentType:false,
     processData:false,
     success:function(data)
     {if(data == "insert")
     {
      swal('Greate Job','Ingredient Has Been Updated Successfully','success');
      all();
      $('#fRECEIPE_update').modal('hide');
      $('#fRECEIPE_edit_form')[0].reset();
      
     }else
     if(data == "NotUpdated")
     {
      swal('Opps...','Unknown Error Occurred','error');
     }else
     if(data == "Password")
     {
      swal('Opps...','Admin Password Not Match','info');
     }
      
     }
    });
   }
  
 });



// ============================================== FOOD CATEGORY DELETE ==============================================

$(document).on('click', '.FR_delete1', function(){
  var TID = $(this).attr("id");
  var action = "FR_delete1";
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this Ingredient!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  })
  .then((willDelete) => {
      if (willDelete) {
      
      $.ajax({
          url:"action.php",
          method:"POST",
          data:{fcat_ID:TID, action:action},
          success:function(data)
          {
          swal('Greate Job..',data,'success');
          all();
          }
      })
      } else {
      swal("This FOOD CATEGORY is safe!");
      }
  });
}); 






























































































































































































































































































 


























































































































































































































});

 








  