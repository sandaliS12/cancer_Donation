$(document).ready(function () {
    console.log("intialize")
    setInterval(function () {

    }, 1000);

    all();

    function all() {
        Dashboard();
    }

    function Dashboard() {
        var action = "Dashboard";
        $.ajax(
            {
                url: "action.php",
                method: "POST",
                data: { action: action },
                success: function (data) {
                    $('#Body_fetch').html("");
                    $('#title').html("Dashboard");
                    $('#Body_fetch').html(data);
                }
            })
    }


    function my_Bookings() {
        var action = "my_Bookings";
        $.ajax(
            {
                url: "action.php",
                method: "POST",
                data: { action: action },
                success: function (data) {
                    console.log("test2");

                    $('#Body_fetch').html(data);
                }
            })
    }


    function my_food_Bookings() {
        var action = "my_food_Bookings";
        $.ajax(
            {
                url: "action.php",
                method: "POST",
                data: { action: action },
                success: function (data) {
                    console.log("test2");

                    $('#Body_fetch').html(data);
                }
            })
    }


    $(document).on('click', '.Dashboard', function () {
        $('#Body_fetch').html("");
        $('#title').html("Dashboard");

        var action = "Dashboard";
        $.ajax(
            {
                url: "action.php",
                method: "POST",
                data: { action: action },
                success: function (data) {
                    $('#Body_fetch').html(data);
                }
            })
    });

    $(document).on('click', '.Book_Time', function () {
        $('#Body_fetch').html("");

        var action = "Book_Time";
        $.ajax(
            {
                url: "action.php",
                method: "POST",
                data: { action: action },
                success: function (data) {
                    $('#Body_fetch').html(data);

                    var i = 0;
                    disableDates(i);
                }
            })
    });

    function disableDates(i) {
        var action = "disabledDates";
        $.ajax(
            {
                url: "action.php",
                method: "POST",
                data: { action: action, i: i },
                success: function (data) {
                    var disabledDates = data;
                    console.log(data);
                    $("#datepicker").datepicker({
                        beforeShowDay: function (date) {
                            var today = new Date();
                            today.setHours(0, 0, 0, 0);

                            var dateString = $.datepicker.formatDate("m/dd/yy", date);
                            var isDisabled = (disabledDates.indexOf(dateString) !== -1) || (date < today);
                            //   return false;

                            return [!isDisabled];


                        }

                    });

                }
            })


    }

    $(document).on('change', '#datepicker', function () {

        var date = $('#datepicker').val();

        var date1 = date;
        var [month1, day1, year1] = date1.split("/");

        var formattedDate1 = parseInt(month1, 10) + "/" + day1 + "/" + year1;

        var action = "SelectBloodDonDate";
        $.ajax(
            {
                url: "action.php",
                method: "POST",
                data: { action: action, formattedDate1: formattedDate1 },
                success: function (data) {
                    console.log(data);
                    $('#BBlood_time_slot').html(data);
                    console.log(data);
                }
            })
    })

    $(document).on('click', '.test39', function () {
        let newWindow = window.open("http://localhost/donation/cancer/User/dashboard.php", "");

        // wait for the new tab to finish loading
        newWindow.onload = function () {
            // execute JavaScript code in the new tab
            newWindow.eval("$('#Body_fetch').html(''); var action = 'Book_Time'; $.ajax({url:'action.php',method:'POST',data:{action:action},success:function(data){$('#Body_fetch').html(data);}})");

        };

    });

    $(document).on('click', '#blood_donor_form_confirm', function () {

        console.log("ssssss")
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

        var Gander = "";
        if (document.getElementById('U_Female').checked) {
            Gander = "F";
        } else if (document.getElementById('U_Male').checked) {
            Gander = "M";
        }

        var D_before = "";

        if (document.getElementById('D_before1').checked) {
            D_before = "Y";
        } else if (document.getElementById('D_before2').checked) {
            D_before = "N";
        }

        //   var Inconvinionce="";
        // if(document.getElementById('Inconvinionce_Y').checked) {
        //     Inconvinionce = "Y";
        //   }else if(document.getElementById('Inconvinionce_N').checked) {
        //     Inconvinionce = "N";
        //   }

        //   var Advice="";
        // if(document.getElementById('Advice_Y').checked) {
        //     Advice = "Y";
        //   }else if(document.getElementById('Advice_N').checked) {
        //     Advice = "N";
        //   }

        //   var InstructionsD="";
        //   if(document.getElementById('Instructions_Y').checked) {
        //     InstructionsD = "Y";
        //     }else if(document.getElementById('Instructions_N').checked) {
        //         InstructionsD = "N";
        //     }

        //     var Comfortable="";
        //   if(document.getElementById('Comfortable_Y').checked) {
        //     Comfortable = "Y";
        //     }else if(document.getElementById('Comfortable_N').checked) {
        //         Comfortable = "N";
        //     }

        //     var Medicine="";
        //     if(document.getElementById('Medicine_Y').checked) {
        //         Medicine = "Y";
        //       }else if(document.getElementById('Medicine_N').checked) {
        //         Medicine = "N";
        //       }

        //       var Surgery="";
        //     if(document.getElementById('Surgery_Y').checked) {
        //         Surgery = "Y";
        //       }else if(document.getElementById('Surgery_N').checked) {
        //         Surgery = "N";
        //       }

        //       var Pregnant="";
        //       if(document.getElementById('Pregnant_Y').checked) {
        //         Pregnant = "Y";
        //         }else if(document.getElementById('Pregnant_N').checked) {
        //             Pregnant = "N";
        //         } 

        //         var Hepatitis="";
        //       if(document.getElementById('Hepatitis_Y').checked) {
        //         Hepatitis = "Y";
        //         }else if(document.getElementById('Hepatitis_N').checked) {
        //             Hepatitis = "N";
        //         }

        //         var Typhoid="";
        //       if(document.getElementById('Typhoid_Y').checked) {
        //         Typhoid = "Y";
        //         }else if(document.getElementById('Typhoid_N').checked) {
        //             Typhoid = "N";
        //         }

        //         var Dengue="";
        //       if(document.getElementById('Dengue_Y').checked) {
        //         Dengue = "Y";
        //         }else if(document.getElementById('Dengue_N').checked) {
        //             Dengue = "N";
        //         }

        //         var Fever="";
        //       if(document.getElementById('Fever_Y').checked) {
        //         Fever = "Y";
        //         }else if(document.getElementById('Fever_N').checked) {
        //             Fever = "N";
        //         }

        //         var Antibiotic="";
        //       if(document.getElementById('Antibiotic_Y').checked) {
        //         Antibiotic = "Y";
        //         }else if(document.getElementById('Antibiotic_N').checked) {
        //             Antibiotic = "N";
        //         }

        //         var deceases1="";
        //       if(document.getElementById('Deceases_1').checked) {
        //         deceases1 = "Heart Attack";
        //         }else{
        //             deceases1 = "";
        //         }

        //         var deceases2="";
        //       if(document.getElementById('Deceases_2').checked) {
        //         deceases2 = "Diabetic";
        //         }else{
        //             deceases2 = "";
        //         }

        //         var deceases3="";
        //       if(document.getElementById('Deceases_3').checked) {
        //         deceases3 = "Fits";
        //         }else{
        //             deceases3 = "";
        //         }

        //         var deceases4="";
        //       if(document.getElementById('Deceases_4').checked) {
        //         deceases4 = "Paralysis";
        //         }else{
        //             deceases4 = "";
        //         }

        //         var deceases5="";
        //       if(document.getElementById('Deceases_5').checked) {
        //         deceases5 = "Lung disease";
        //         }else{
        //             deceases5 = "";
        //         }

        //         var deceases6="";
        //       if(document.getElementById('Deceases_6').checked) {
        //         deceases6 = "Liver disease";
        //         }else{
        //             deceases6 = "";
        //         }

        //         var deceases7="";
        //       if(document.getElementById('Deceases_7').checked) {
        //         deceases7 = "Kidney disease";
        //         }else{
        //             deceases7 = "";
        //         }

        //         var deceases8="";
        //       if(document.getElementById('Deceases_8').checked) {
        //         deceases8 = "Blood disease";
        //         }else{
        //             deceases8 = "";
        //         }

        //         var deceases9="";
        //       if(document.getElementById('Deceases_8').checked) {
        //         deceases9 = "Cancer";
        //         }else{
        //             deceases9 = "";
        //         }


        var date1 = date;
        var [month1, day1, year1] = date1.split("/");

        var formattedDate1 = parseInt(month1, 10) + "/" + day1 + "/" + year1;

        // if (deceases1!="" ||deceases2!="" ||deceases3!="" ||deceases4!="" ||deceases5!="" ||deceases6!="" ||deceases7!="" ||deceases8!="" ||deceases9!="") {
        //     swal('Opps...!','You Cant','info');
        // }else
        if (D_before == "Y" && HM_Times == "" || LB_Date == "") {
            swal('Opps...!', 'Please Select Time and date', 'info');
        } else

            if (diffDays < 120) {
                swal('Opps...!', 'You can donate after 4 months from your last donation.', 'warning');
            } else
                if (name == '') {
                    swal('Opps...!', 'Please Enter Your Name', 'info');
                } else
                    if (email == '') {
                        swal('Opps...!', 'Please Enter Your Email', 'info');
                    } else
                        if (contact == '') {
                            swal('Opps...!', 'Please Enter Your Contact Number', 'info');
                        } else
                            if (contact.length != 10) {
                                swal('Opps...!', 'Please Check Your Contact Number', 'info');
                            } else
                                if (whight == '') {
                                    swal('Opps...!', 'Please Enter Your Whight', 'info');
                                } else
                                    if (hight == '') {
                                        swal('Opps...!', 'Please Enter Your Hight', 'info');
                                    } else
                                        if (BBlood_group == '0') {
                                            swal('Opps...!', 'Please Selct Blood Group', 'info');
                                        } else
                                            if (Donor_nic == '') {
                                                swal('Opps...!', 'Please Enter NIC', 'info');
                                            } else
                                                if (D_DOB == '') {
                                                    swal('Opps...!', 'Please Enter DOB', 'info');
                                                } else
                                                    if (D_before == '') {
                                                        swal('Opps...!', 'Please Fill all fields', 'info');
                                                        // }else
                                                        // if (Inconvinionce == 'Y') {
                                                        //     swal('Opps...!','Sorry You unable to give blood, Because you have incovinions after donations','info');
                                                        // }else
                                                        // if (Comfortable == 'N') {
                                                        //     swal('Opps...!','Sorry You unable to give blood, Because you are not comfortable for donations','info');
                                                        // }else 
                                                        // if (Advice == 'Y') {
                                                        //     swal('Opps...!','Sorry You unable to give blood, Because you received advice not to give blood','info');
                                                        // }else
                                                        // if (InstructionsD == 'N') {
                                                        //     swal('Opps...!','Please read the instruction first','info');
                                                        // }else 
                                                        // if (Medicine == '') {
                                                        //     swal('Opps...!','Please Fill all fields','info');
                                                        // }else
                                                        // if (Pregnant == '') {
                                                        //     swal('Opps...!','Please Fill all fields','info');
                                                        // }else
                                                        // if (Hepatitis == '') {
                                                        //     swal('Opps...!','Please Fill all fields','info');
                                                        // }else
                                                        // if (Surgery == '') {
                                                        //     swal('Opps...!','Please Fill all fields','info');
                                                        // }else
                                                        // if (Typhoid == '') {
                                                        //     swal('Opps...!','Please Fill all fields','info');
                                                        // }else
                                                        // if (Dengue == '') {
                                                        //     swal('Opps...!','Please Fill all fields','info');
                                                        // }else
                                                        // if (Fever == '') {
                                                        //     swal('Opps...!','Please Fill all fields','info');
                                                        // }else
                                                        // if (Antibiotic == '') {
                                                        //     swal('Opps...!','Please Fill all fields','info');
                                                    } else
                                                        if (formattedDate1 == '') {
                                                            swal('Opps...!', 'Please Selct Date', 'info');
                                                        } else
                                                            if (formattedDate1 == 'NaN/undefined/undefined') {
                                                                swal('Opps...!', 'Please Selct Date', 'info');
                                                            } else
                                                                if (time == '0') {
                                                                    swal('Opps...!', 'Please Select Time', 'info');
                                                                } else {
                                                                    $.ajax(
                                                                        {
                                                                            url: 'action.php',
                                                                            method: 'POST',
                                                                            data: { action: action, name: name, email: email, contact: contact, whight: whight, hight: hight, date: formattedDate1, time: time, BBlood_group: BBlood_group, Gander: Gander, D_before: D_before, HM_Times: HM_Times, LB_Date: LB_Date, Donor_nic: Donor_nic },
                                                                            success: function (data) {
                                                                                if (data == 'Inserted') {
                                                                                    swal('Done', 'Appointment Received Us', 'success');

                                                                                    $('#datepicker').val('');
                                                                                    $('#BBlood_time_slot').val('');
                                                                                    $('#D_before').val('');
                                                                                    $('#HM_Times').val('');
                                                                                    $('#LB_Date').val('');
                                                                                    // $('#Inconvinionce').val('');
                                                                                    // $('#Inconvinionce_D').val('');
                                                                                    // $('#Advice').val('');
                                                                                    // $('#InstructionsD').val('');
                                                                                    // $('#Comfortable').val('');
                                                                                    // $('#Medicine').val('');
                                                                                    // $('#Surgery').val('');
                                                                                    // $('#Pregnant').val('');
                                                                                    // $('#Hepatitis').val('');
                                                                                    // $('#Typhoid').val('');
                                                                                    // $('#Dengue').val('');
                                                                                    // $('#Fever').val('');
                                                                                    // $('#Antibiotic').val('');

                                                                                } else {
                                                                                    swal('Error', 'Somthing Went Wrong', 'warning');
                                                                                }

                                                                            }
                                                                        })
                                                                }
    });


    $(document).on('click', '.my_Bookings', function () {
        console.log("test1");

        $('#Body_fetch').html("");
        $('#title').html("My Bookings");
        my_Bookings();
    });


    $(document).on('click', '.my_food_Bookings', function () {
        console.log("test1");

        $('#Body_fetch').html("");
        $('#title').html("My Food Bookings");
        my_food_Bookings();
    });


    $(document).on('click', '.entertainmentAcc_Booking', function () {
        $('#Body_fetch').html("");

        var action = "entertainmentAcc_Booking";
        $.ajax(
            {
                url: "action.php",
                method: "POST",
                data: { action: action },
                success: function (data) {
                    $('#Body_fetch').html(data);

                    var i = 1;
                    enterdisableDates();
                }
            })
    });

    $(document).on('click', '.volunteeringReg', function () {
        $('#Body_fetch').html("");

        var action = "volunteeringReg";
        $.ajax(
            {
                url: "action.php",
                method: "POST",
                data: { action: action },
                success: function (data) {
                    $('#Body_fetch').html(data);

                    var i = 1;
                    disableDates(i);
                }
            })
    });

    $(document).on('click', '.update_Uprofile', function () {
        $('#Body_fetch').html("");
        console.log("kk");
        var action = "update_Uprofile1";

        $.ajax(
            {
                url: "userprofile.php",
                method: "POST",
                data: { action: action },
                success: function (data) {
                    $('#Body_fetch').html(data);
                }
            })
    });



    $(document).on('click', '.my_Volunteer_Bookings', function () {
        $('#Body_fetch').html("");

        var action = "my_Volunteer_Bookings";
        $.ajax(
            {
                url: "action.php",
                method: "POST",
                data: { action: action },
                success: function (data) {
                    $('#Body_fetch').html(data);

                    $('#datatableRvolunteer').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                }
            })
    });


    $(document).on('click', '.my_Visiting_Requests', function () {
        $('#Body_fetch').html("");

        var action = "my_Visiting_Requests";
        $.ajax(
            {
                url: "action.php",
                method: "POST",
                data: { action: action },
                success: function (data) {
                    $('#Body_fetch').html(data);

                    $('#datatablemyVisit').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });

                    // var i = 1;
                    // disableDates(i);


                }
            })
    });




    $(document).on('click', '.foodDonation_Booking', function () {
        $('#Body_fetch').html("");

        var action = "foodDonation_Booking";
        $.ajax(
            {
                url: "action.php",
                method: "POST",
                data: { action: action },
                success: function (data) {
                    $('#Body_fetch').html(data);

                    var i = 1;
                    fDateDisable(i);
                }
            })
    });


    async function selectcatfunction() {
        var Fcategory = $('#Fcategory1').val();
        var action = "Fcategory1_Selected";
        await $.ajax(
            {
                url: "action.php",
                method: "POST",
                data: { action: action, Fcategory: Fcategory },
                success: function (data) {
                    if (data == "3") {
                        $('#FTime1').html('<option value="0">Select Category</option> <option value="1">Breackfast</option> <option value="2">Lunch</option> <option value="3">Dinner</option>');
                    } else
                        if (data == "2") {
                            $('#FTime1').html('<option value="0">Select Category</option> <option value="1">Morning Soup</option><option value="2">Evening Soup</option>');
                        } else
                            if (data == "1") {
                                $('#FTime1').html('<option value="0">Select Category</option> <option value="1">Time 1</option>');
                            } else {
                                swal('Error', 'Somthing Went Wrong', 'warning');
                            }

                }
            })

    }

    $(document).on('change', '#Fcategory1',
        selectcatfunction
    );

    $(document).on('change', '#FTime1', function () {
        fDateDisable();
    });

    function fDateDisable() {
        var category = $('#Fcategory1').val();
        var time = $('#FTime1').val();
        var action = "FTime1DisabledDates";
        $.ajax(
            {
                url: "action.php",
                method: "POST",
                data: { action: action, category: category, time: time },
                success: function (data) {
                    console.log(data);
                    $("#FoodDatepicker").datepicker("destroy");
                    var disabledDates = data;
                    $("#FoodDatepicker").datepicker({
                        beforeShowDay: function (date) {
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

    $(document).on('click', '#food_donor_form_confirm', function () {

        var action = "food_donor_form_confirm";
        var FDonor_Name = $('#FDonor_Name').val();
        var FDonor_Passport = $('#FDonor_Passport').val();
        var FDonor_Email = $('#FDonor_Email').val();
        var FDonor_Contact = $('#FDonor_Contact').val();
        var Fcategory1 = $('#Fcategory1').val();
        var FTime1 = $('#FTime1').val();
        var FoodDatepicker = $('#FoodDatepicker').val();
        var Fwards = $('#Fwards').val();
        var FVisitors = $('#FVisitors').val();
        var FDescription = $('#FDescription').val();

        var date1 = FoodDatepicker;
        var [month1, day1, year1] = date1.split("/");

        var formattedDate1 = parseInt(month1, 10) + "/" + parseInt(day1, 10) + "/" + year1;

        if (FDonor_Name == '') {
            swal('Opps...!', 'Please Enter Your Name', 'info');
        } else
            if (FDonor_Passport == '') {
                swal('Opps...!', 'Please Enter Your NIC/Passport Number', 'info');
            } else
                if (FDonor_Contact == '') {
                    swal('Opps...!', 'Please Enter Your Contact Number', 'info');
                } else
                    if (FDonor_Contact.length != 10) {
                        swal('Opps...!', 'Please Check Your Contact Number', 'info');
                    } else
                        if (FDonor_Email == '') {
                            swal('Opps...!', 'Please Enter Your Email', 'info');
                        } else
                            if (Fcategory1 == '0') {
                                swal('Opps...!', 'Please Select Category', 'info');
                            } else
                                if (FTime1 == '0') {
                                    swal('Opps...!', 'Please Selct Blood Group', 'info');
                                } else
                                    if (FoodDatepicker == '') {
                                        swal('Opps...!', 'Please Enter NIC', 'info');
                                    } else
                                        if (FVisitors == '') {
                                            swal('Opps...!', 'Please Fill all fields', 'info');
                                        } else {
                                            $.ajax(
                                                {
                                                    url: 'action.php',
                                                    method: 'POST',
                                                    data: {
                                                        action: action, FDonor_Name: FDonor_Name, FDonor_Passport: FDonor_Passport, FDonor_Contact: FDonor_Contact, FDonor_Email: FDonor_Email, Fcategory1: Fcategory1, FTime1: FTime1, formattedDate1: formattedDate1, FVisitors: FVisitors, FDescription: FDescription
                                                    },
                                                    success: function (data) {
                                                        console.log(data);
                                                        if (data == 'Inserted') {


                                                            $('#Fcategory1').val('');
                                                            $('#FTime1').val('');
                                                            $('#FoodDatepicker').val('');
                                                            $('#FVisitors').val('').change();
                                                            swal('Done', 'Food Received Us', 'success');


                                                        } else {
                                                            swal('Error', 'Somthing Went Wrong', 'warning');
                                                        }

                                                    }
                                                })
                                        }
    });

    $(document).on('submit', '#package_overview_new_form', function (e) {
        e.preventDefault();

        var formData = new FormData($("#package_overview_new_form")[0]);
        var date1 = $('#volun_DOB').val();

        var [month1, day1, year1] = date1.split("/");

        var formattedDate1 = parseInt(month1, 10) + "/" + parseInt(day1, 10) + "/" + year1;

        var dataObject = {};
        var files = $("#myFile1")[0].files;

        var promises = [];

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            promises.push(convertFileToBase64(file));
        }

        Promise.all(promises).then(function (base64Array) {
            formData.forEach(function (value, key) {
                dataObject[key] = value;
            });
            dataObject.filesBase64 = base64Array;


            var jsonData = JSON.stringify(dataObject);

            console.log(jsonData)
            // Send JSON data to server using AJAX
            $.ajax({
                type: "POST",
                url: "volunteer_file.php/",
                data: jsonData,
                contentType: "application/json",
                success: function (response) {
                    console.log("Response from server:", response);
                    swal('Successfull', 'Volunteer Added!', 'success');

                },
                error: function (error) {
                    console.error("Error sending data:", error);
                }
            });
        });




    });
    function convertFileToBase64(file) {
        return new Promise(function (resolve) {
            var reader = new FileReader();
            reader.onload = function (event) {
                resolve(event.target.result);
            };
            reader.readAsDataURL(file);
        });
    }




    //    $(document).on('click', '#volunteer_ins', function(){
    //     console.log("kkkkkkkkkkk"); 
    //     var action = "volunteer_form";
    //     var volun_Name = $('#volun_Name').val();
    //     var volun_DOB = $('#volun_DOB').val();
    //     var volun_Email = $('#volun_Email').val();
    //     var volun_Contact = $('#volun_Contact').val();
    //     var volun_NIC = $('#volun_NIC').val();
    //     var volun_occupation = $('#volun_occupation').val();
    //     var volun_Experience = $('#volun_Experience').val();
    //     var volun_Activity = $('#volun_Activity').val();
    //     var volun_Act_Desc = $('#volun_Act_Desc').val();
    //     var myFile = $('#myFile1').val();
    //     // var myFile = $('#myFile');
    //    console.log(myFile);
    //     if (volun_Name == '') {
    //         swal('Opps...!','Please Enter Your Name','info');
    //     }else
    //     if (volun_DOB == '') {
    //         swal('Opps...!','Please Enter Your Email','info');
    //     }else
    //     if (volun_Contact == '') {
    //         swal('Opps...!','Please Enter Your Contact Number','info');
    //     }else
    //     if (volun_Contact.length !=10) {
    //         swal('Opps...!','Please Check Your Contact Number','info');
    //     }else
    //     if (volun_Email == '') {
    //         swal('Opps...!','Please Enter Your Whight','info');
    //     }else
    //     if (volun_occupation == '') {
    //         swal('Opps...!','Please Enter Your Hight','info');
    //     }else
    //     if (volun_Experience == '') {
    //         swal('Opps...!','Please Selct Blood Group','info');
    //     }else
    //     if (volun_NIC == '') {
    //         swal('Opps...!','Please Enter NIC','info');
    //     }else
    //     if (volun_Activity == '') {
    //         swal('Opps...!','Please Enter DOB','info');
    //     }else 
    //     if (volun_Act_Desc == '' ) {
    //         swal('Opps...!','Please Fill all fields','info');
    //     }
    //     else
    //     // var form_data = new Form_data();
    //     // formData.append("action", action);
    //     // formData.append("volun_Name", volun_Name);
    //     // formData.append("volun_DOB", volun_DOB);
    //     // formData.append("volun_Email", volun_Email);
    //     // formData.append("volun_Contact", volun_Contact);
    //     // formData.append("volun_NIC", volun_NIC);
    //     // formData.append("volun_occupation", volun_occupation);
    //     // formData.append("volun_Experience", volun_Experience);
    //     // formData.append("volun_Activity", volun_Activity);
    //     // formData.append("volun_Act_Desc", volun_Act_Desc);
    //     // formData.append("userfile", myFile.files);



    //     $.ajax(
    //     {
    //         url: 'action.php',
    //         method: 'POST',
    //         data:
    //         // form_data
    //         {action:action, volun_Name:volun_Name, volun_DOB:volun_DOB, volun_Email:volun_Email, volun_Contact:volun_Contact, volun_NIC:volun_NIC, volun_occupation:volun_occupation, volun_Experience:volun_Experience, volun_Activity:volun_Activity,volun_Act_Desc:volun_Act_Desc
    //             }
    //             ,
    //         success: function(data)
    //         {
    //            console.log(data);
    //             if (data == 'Inserted') {
    //                 swal('Done','Appointment Received Us','success');


    //             }else{
    //                 swal('Error','Somthing Went Wrong1','warning');
    //             }

    //         }
    //     })

    //    });



    $(document).on('click', '#entertainment_form_confirm', function () {
        console.log("Enter_Name");
        var action = "entertainment_form";
        var Enter_Name = $('#Enter_Name').val();
        var Enter_Email = $('#Enter_Email').val();
        var Enter_Contact = $('#Enter_Contact').val();
        var Enter_NIC = $('#Enter_NIC').val();
        var Enter_Desc = $('#Enter_Desc').val();
        var enterwards = $('#enterwards').val();
        var NoOfenterVisitor = $('#NoOfenterVisitor').val();
        var datepickerEntertain = $('#datepickerEntertain').val();
        var entertain_hours = $('#entertain_hours').val();

        var dateE = datepickerEntertain;
        var [month1, day1, year1] = dateE.split("/");

        var formattedDateE = parseInt(month1, 10) + "/" + parseInt(day1, 10) + "/" + year1;


        if (Enter_Name == '') {
            swal('Opps...!', 'Please Enter Your Name', 'info');
        } else
            if (Enter_Contact == '') {
                swal('Opps...!', 'Please Enter Your Contact Number', 'info');
            } else
                if (Enter_Contact.length != 10) {
                    swal('Opps...!', 'Please Check Your Contact Number', 'info');
                } else
                    if (Enter_Email == '') {
                        swal('Opps...!', 'Please Enter Your Whight', 'info');
                    } else
                        if (Enter_NIC == '') {
                            swal('Opps...!', 'Please Enter NIC', 'info');
                        } else
                            if (Enter_Desc == '') {
                                swal('Opps...!', 'Please Enter DOB', 'info');
                            } else
                                if (NoOfenterVisitor == '') {
                                    swal('Opps...!', 'Please Enter DOB', 'info');
                                } else
                                    if (entertain_hours == '') {
                                        swal('Opps...!', 'Please Enter DOB', 'info');
                                    } else
                                        if (formattedDateE == '') {
                                            swal('Opps...!', 'Please Enter DOB', 'info');
                                        } else
                                            if (enterwards == '0') {
                                                swal('Opps...!', 'Please Fill all fields', 'info');
                                            } else {
                                                $.ajax(
                                                    {
                                                        url: 'action.php',
                                                        method: 'POST',
                                                        data: {
                                                            action: action, Enter_Name: Enter_Name, Enter_Email: Enter_Email, Enter_Contact: Enter_Contact, Enter_NIC: Enter_NIC, Enter_Desc: Enter_Desc, enterwards: enterwards, NoOfenterVisitor: NoOfenterVisitor, formattedDateE: formattedDateE, entertain_hours: entertain_hours
                                                        },
                                                        success: function (data) {
                                                            console.log(data);
                                                            if (data != 'Insert') {
                                                                swal('Done', 'Appointment Received Us', 'success');
                                                                $('#entertain_form')[0].reset();

                                                            } else {
                                                                swal('Error', 'Somthing Went Wrong', 'warning');
                                                            }

                                                        }
                                                    })
                                            }
    });


    $(document).on('change', '#enterwards', function () {
        enterdisableDates();
    });

    function enterdisableDates() {

        var enterwards = $('#enterwards').val();
        console.log(enterwards);
        var action = "disableEntertaindate";
        $.ajax(
            {
                url: "action.php",
                method: "POST",
                data: { action: action, enterwards: enterwards },
                success: function (data) {
                    console.log(data);
                    $("#datepickerEntertain").datepicker("destroy");
                    var disabledDates = data;
                    $("#datepickerEntertain").datepicker({
                        beforeShowDay: function (date) {
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


    $(document).on('click', '.generalItem_Booking', function () {
        $('#Body_fetch').html("");

        var action = "gItem_Booking";
        $.ajax(
            {
                url: "action.php",
                method: "POST",
                data: { action: action },
                success: function (data) {
                    $('#Body_fetch').html(data);

                    // var i = 1;
                    // enterdisableDates();
                }
            })
    });


    // $(document).on('change', '#gitem_category', function(){
    //     var gitem_category = $('#gitem_category').val();
    //     var action = "gitem_Selected";
    //     $.ajax(
    //     {
    //         url:"action.php",
    //         method:"POST",
    //         data:{action:action,gitem_category:gitem_category},
    //         success:function(data)
    //         {


    //         }
    //     })


    // });



    $(document).on('change', '#gitem_category', function () {
        var gitem_category = $('#gitem_category').val();
        var action = "gitem_Selected";
        console.log('Called')

        const formData = new FormData()
        formData.append("action", action);
        formData.append("gitem_category", gitem_category);



        $.ajax({
            url: "action.php",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                console.log(data)
                var FTime1Dropdown = $('#gItem'); // The <select> element
                let elements = JSON.parse(data)
                FTime1Dropdown.empty()
                // Loop through the selected items and append to the itemsDiv
                elements.map((option) => {
                    console.log(option)
                    FTime1Dropdown.append(`<option value="${option.GI_id}">${option.GI_Name}</option>`)

                })
                // data.map(element => {

                // });
                // for (var i = 0; i < data.selectedItems.length; i++) {
                //     itemsDiv.append('<p>' + data.selectedItems[i].GI_Name + '</p>');
                // }
            }
        });
    });


    $(document).on('click', '#generalItem_form_confirm1', function () {
        console.log("Enter_Name");
        var action = "generalItem_form";

        var gItem_Name = $('#gItem_Name').val();
        var gItem_Email = $('#gItem_Email').val();
        var gItem_Contact = $('#gItem_Contact').val();
        var gItem_NIC = $('#gItem_NIC').val();
        // var gitem_category = $('#gitem_category').val();
        var gItem = $('#gItem').val();
        var otherwards = $('#otherwards').val();


        var datepickerGItem = $('#datepickerGItem').val();
        console.log(datepickerGItem);
        var gItem_quentity = $('#gItem_quentity').val();

        const dateObject = new Date(datepickerGItem);

        // Extract the year, month, and day
        const year = dateObject.getFullYear();
        let month = (dateObject.getMonth() + 1).toString(); // Convert month to a string
        const day = dateObject.getDate().toString().padStart(2, '0');

        // Remove the leading zero if present in the month
        if (month.length === 2 && month[0] === '0') {
            month = month[1];
        }

        // Format the date in the desired output format
        const formattedDateG = `${month}/${day}/${year}`;

        // var formattedDateG = parseInt(day1, 10) +parseInt(month1, 10) + "/" + "/" + year1;
        console.log("pp", formattedDateG);

        if (gItem_Name == '') {
            swal('Opps...!', 'Please Enter Your Name', 'info');
        } else
            if (gItem_Email == '') {
                swal('Opps...!', 'Please Enter Your Contact Number', 'info');
            } else
                if (gItem_Contact == '') {
                    swal('Opps...!', 'Please Enter Your Whight', 'info');
                } else
                    if (gItem_NIC == '') {
                        swal('Opps...!', 'Please Enter NIC', 'info');
                        // }else
                        // if (gitem_category == '') {
                        //     swal('Opps...!','Please Enter DOB','info');
                        // }else
                        // if (gItem == '') {
                        //     swal('Opps...!','Please Enter DOB','info');
                    } else
                        if (formattedDateG == '') {
                            swal('Opps...!', 'Please Enter DOB', 'info');
                        } else {
                            $.ajax(
                                {
                                    url: 'action.php',
                                    method: 'POST',
                                    data: {
                                        action: action, gItem_Name: gItem_Name, gItem_Email: gItem_Email, gItem_Contact: gItem_Contact, gItem_NIC: gItem_NIC, gItem: JSON.stringify(gItem), formattedDateG: formattedDateG, otherwards: otherwards, gItem_quentity: gItem_quentity
                                    },
                                    success: function (data) {
                                        console.log(data);
                                        if (data == 'Inserted') {
                                            swal('Done', 'Appointment Received Us', 'success');
                                            $('#gItem').val('').change();
                                            $('#otherwards').val('').change();
                                            $('#datepickerGItem').val('').change();
                                            $('#gItem_quentity').val('').change();

                                        } else {
                                            swal('Error', 'Somthing Went Wrong', 'warning');
                                        }

                                    }
                                })
                        }
    });


    $(document).on('click', '.drug_Booking', function () {
        $('#Body_fetch').html("");

        var action = "drug_Booking_Booking";
        $.ajax(
            {
                url: "action.php",
                method: "POST",
                data: { action: action },
                success: function (data) {
                    $('#Body_fetch').html(data);
                }
            })
    });

    $(document).on('click', '#drug_form_confirm', function () {
        console.log("Enter_Name");
        console.log($('#datepickerDrug').val());
        var action = "drug_form";
        var drugD_Name = $('#drugD_Name').val();
        var drugD_Email = $('#drugD_Email').val();
        var drugD_Contact = $('#drugD_Contact').val();
        var drugD_NIC = $('#drugD_NIC').val();
        var drugList = $('#drugList').val();
        var datepickerDrug = $('#datepickerDrug').val();

        const dateObject = new Date(datepickerDrug);

        // Extract the year, month, and day
        const year = dateObject.getFullYear();
        const month = (dateObject.getMonth() + 1).toString().padStart(2, '0'); // Add 1 to the month since it's zero-based
        const day = dateObject.getDate().toString().padStart(2, '0');

        // Format the date in the desired output format
        const formattedDateD = `${month}/${day}/${year}`;


        // $date=date_create_from_format("m/d/yy",datepickerDrug);
        // //echo $date;
        // $formattedDateD= date_format($date,"m/d/yy");

        // var dateD = datepickerDrug;

        // var [month1, day1, year1] = dateD.split("/");
        // var formattedDateD = parseInt(month1, 10) + "/" + parseInt(day1, 10) + "/" + year1;

        if (drugD_Name == '') {
            swal('Opps...!', 'Please Enter Your Name', 'info');
        } else
            if (drugD_Email == '') {
                swal('Opps...!', 'Please Enter Your Contact Number', 'info');
            } else
                if (drugD_Contact.length != 10) {
                    swal('Opps...!', 'Please Check Your Contact Number', 'info');
                } else
                    if (drugD_Contact == '') {
                        swal('Opps...!', 'Please Enter Your Whight', 'info');
                    } else
                        if (drugD_NIC == '') {
                            swal('Opps...!', 'Please Enter NIC', 'info');
                        } else
                            if (drugList == '') {
                                swal('Opps...!', 'Please Enter DOB', 'info');
                            } else
                                if (formattedDateD == '') {
                                    swal('Opps...!', 'Please Enter DOB', 'info');
                                } else {
                                    $.ajax(
                                        {
                                            url: 'action.php',
                                            method: 'POST',
                                            data: {
                                                action: action, drugD_Name: drugD_Name, drugD_Email: drugD_Email, drugD_Contact: drugD_Contact, drugD_NIC: drugD_NIC, drugList: JSON.stringify(drugList), formattedDateD: formattedDateD
                                            },
                                            success: function (data) {
                                                console.log(data);
                                                if (data == 'Inserted') {
                                                    swal('Done', 'Appointment Received Us', 'success');
                                                    // $('#entertain_form')[0].reset();
                                                    $('#drugList').val('').change();
                                                    $('#datepickerDrug').val('').change();


                                                } else {
                                                    swal('Error', 'Somthing Went Wrong', 'warning');
                                                }

                                            }
                                        })
                                }
    });

    //  Edit Q & A for chat-bot
    $(document).on('click', '.bloodD_edit', function () {

        var action = "blood_edit_value";
        var ID = $(this).attr('id');
        console.log(ID);
        $.ajax(
            {
                url: 'action.php',
                method: 'POST',
                data: { UserID: ID, action: action },
                dataType: 'JSON',
                success: function (data) {

                    $('#blood_ID').val(data[0]);
                    $('#blood_name').val(data[1]);
                    $('#blood_email').val(data[2]);
                    $('#blood_contact').val(data[3]);
                    $('#blood_weight').val(data[4]);
                    $('#blood_height').val(data[5]);
                    $('#blood_Group').val(data[6]);
                    $('#datepicker').val(data[7]);
                    $('#BBlood_time_slot').val(data[8]);
                    $('#blood_DBefore').val(data[9]);
                    $('#blood_HM_times').val(data[10]);
                    $('#blood_LBDate').val(data[11]);
                    var i = 0;
                    disableDates(i);
                    $('#blood_edit_modal').modal("show");
                }
            })
    });

    $('#blood_edit').submit(function (event) {
        event.preventDefault();

        var Bblood_ID = $('#blood_ID').val();
        var Bblood_name = $('#blood_name').val();
        var Bblood_email = $('#blood_email').val();
        var Bblood_contact = $('#blood_contact').val();
        var Bblood_weight = $('#blood_weight').val();
        var Bblood_height = $('#blood_height').val();
        var Bblood_Group = $('#blood_Group').val();
        var Bdatepicker = $('#datepicker').val();
        var BBBlood_time_slot = $('#BBlood_time_slot').val();
        var Bblood_DBefore = $('#blood_DBefore').val();
        var Bblood_HM_times = $('#blood_HM_times').val();
        var Bblood_LBDate = $('#blood_LBDate').val();

        var date2 = new Date(Bblood_LBDate);
        var date3 = new Date(Bdatepicker);

        // Calculate the time difference in milliseconds
        var timeDiff = Math.abs(date3.getTime() - date2.getTime());

        // Convert the time difference to days
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));


        if (Bblood_DBefore == "Y" && Bblood_HM_times == "" || Bblood_LBDate == "") {
            swal('Opps...!', 'Please Select Time and date', 'info');
        } else

            if (diffDays < 120) {
                swal('Opps...!', 'You can donate after 4 months from your last donation.', 'warning');
            } else
                if (Bblood_ID == '') {
                    swal('Opps...Fill in the Blank', 'Please Enter Quection', 'info');
                    return false;
                } else
                    if (Bblood_name == '') {
                        swal('Opps...Fill in the Blank', 'Please Enter Answer', 'info');
                        return false;
                    } else {
                        $.ajax({
                            url: "action.php",
                            method: "POST",
                            data: new FormData(this),
                            contentType: false,
                            processData: false,
                            success: function (data) {
                                if (data == 'Inserted') {
                                    swal('Greate Job..', 'You update your donation Now', 'success');

                                    $('#blood_edit_modal').modal('hide');
                                    all();
                                } else
                                    if (data == 'not_update') {
                                        swal('Opps...Somthing Went Wrong', 'Please Contact Developer', 'error');
                                    }

                            }
                        });
                    }
    });
    // Delete Q & A for chat-bot
    $(document).on('click', '.bloodD_delete', function () {
        var ID = $(this).attr("id");
        var action = "blood_delete";
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
                        url: "action.php",
                        method: "POST",
                        data: { TravelID: ID, action: action },
                        success: function (data) {
                            if (data == 'delete') {
                                swal('Greate Job..', 'This Quection & Answer Deleted Now', 'success');
                                all();
                            } else
                                if (data == 'not_delete') {
                                    swal('Opps..Somthing Went Wrong', 'Please Contact Developer', 'error');
                                }

                        }
                    })
                } else {
                    swal("This Quection & Answer is safe!");
                }
            });
    });




    // Delete Q & A for chat-bot
    $(document).on('click', '.volunteer_delete', function () {
        var ID = $(this).attr("id");
        var action = "volunt_delete";
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
                        url: "action.php",
                        method: "POST",
                        data: { TravelID: ID, action: action },
                        success: function (data) {
                            if (data == 'delete') {
                                swal('Greate Job..', 'This Quection & Answer Deleted Now', 'success');
                                all();
                            } else
                                if (data == 'not_delete') {
                                    swal('Opps..Somthing Went Wrong', 'Please Contact Developer', 'error');
                                }

                        }
                    })
                } else {
                    swal("This Quection & Answer is safe!");
                }
            });
    });

    $(document).on('click', '.view_gItem', function () {
        $('#Body_fetch').html("");

        var action = "gItem_bookings";
        $.ajax(
            {
                url: "action.php",
                method: "POST",
                data: { action: action },
                success: function (data) {
                    $('#Body_fetch').html(data);

                    $('#datatableGItem').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                }
            })
    });

    // Delete Q & A for chat-bot
    $(document).on('click', '.GItem_Booking_delete1', function () {
        var ID = $(this).attr("id");
        var action = "gItem_delete";
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
                        url: "action.php",
                        method: "POST",
                        data: { TravelID: ID, action: action },
                        success: function (data) {
                            if (data == 'delete') {
                                swal('Greate Job..', 'This Quection & Answer Deleted Now', 'success');
                                all();
                            } else
                                if (data == 'not_delete') {
                                    swal('Opps..Somthing Went Wrong', 'Please Contact Developer', 'error');
                                }

                        }
                    })
                } else {
                    swal("This Quection & Answer is safe!");
                }
            });
    });





    $(document).on('click', '.view_drugBooking', function () {
        $('#Body_fetch').html("");

        var action = "drug_bookings";
        $.ajax(
            {
                url: "action.php",
                method: "POST",
                data: { action: action },
                success: function (data) {
                    $('#Body_fetch').html(data);

                    $('#datatableGItem').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                }
            })
    });

    // Delete Q & A for chat-bot
    $(document).on('click', '.drug_Booking_delete1', function () {
        var ID = $(this).attr("id");
        var action = "drug_delete";
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
                        url: "action.php",
                        method: "POST",
                        data: { TravelID: ID, action: action },
                        success: function (data) {
                            if (data == 'delete') {
                                swal('Greate Job..', 'This Quection & Answer Deleted Now', 'success');
                                all();
                            } else
                                if (data == 'not_delete') {
                                    swal('Opps..Somthing Went Wrong', 'Please Contact Developer', 'error');
                                }

                        }
                    })
                } else {
                    swal("This Quection & Answer is safe!");
                }
            });
    });



    //  Edit Q & A for chat-bot
    $(document).on('click', '.food_update', function () {

        var action = "food_edit_value";
        var ID = $(this).attr('id');
        console.log(ID);
        $.ajax(
            {
                url: 'action.php',
                method: 'POST',
                data: { UserID: ID, action: action },
                dataType: 'JSON',
                success: function (data) {
                    console.log(data);
                    $('#food_ID').val(data[0]);
                    $('#Fcategory1').val(data[1]);

                    $('#FoodDatepicker').val(data[3]);
                    $('#add_desc').val(data[4]);
                    $('#n_of_visit').val(data[5]);

                    // var i = 1;
                    // fDateDisable(i);
                    selectcatfunction().then(() => $('#FTime1').val(data[2]));


                    $('#food_edit_modal1').modal("show");


                }
            })
    });

    $('#food_edit').submit(function (event) {
        event.preventDefault();

        var Ffood_ID = $('#food_ID').val();
        var FFcategory1 = $('#Fcategory1').val();
        var FFTime1 = $('#FTime1').val();
        var Fadd_desc = $('#add_desc').val();
        var Fn_of_visit = $('#n_of_visit').val();
        var FFoodDatepicker = $('#FoodDatepicker').val();


        if (FFcategory1 == '') {
            swal('Opps...Fill in the Blank', 'Please Enter Category', 'info');
            return false;
        } else
            if (FFTime1 == '') {
                swal('Opps...Fill in the Blank', 'Please Enter Time', 'info');
                return false;
            } else {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data == 'Inserted') {
                            swal('Greate Job..', 'This Update your donation Nowerrr', 'success');

                            $('#food_edit_modal1').modal('hide');
                           
                        } else
                            if (data == 'not_update') {
                                swal('Opps...Somthing Went Wrong', 'Please Contact Developer', 'error');
                            }

                    }
                });
            }
    });
    // Delete Q & A for chat-bot
    $(document).on('click', '.foodD_delete', function () {
        var ID = $(this).attr("id");
        var action = "blood_delete";
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
                        url: "action.php",
                        method: "POST",
                        data: { TravelID: ID, action: action },
                        success: function (data) {
                            if (data == 'delete') {
                                swal('Greate Job..', 'This Quection & Answer Deleted Now', 'success');
                                all();
                            } else
                                if (data == 'not_delete') {
                                    swal('Opps..Somthing Went Wrong', 'Please Contact Developer', 'error');
                                }

                        }
                    })
                } else {
                    swal("This Quection & Answer is safe!");
                }
            });
    });


    //  Edit Q & A for chat-bot
    $(document).on('click', '.volunteer_edit', function () {

        var action = "volunteer_edit1";
        var ID = $(this).attr('id');
        console.log(ID);
        $.ajax(
            {
                url: 'action.php',
                method: 'POST',
                data: { UserID: ID, action: action },
                dataType: 'JSON',
                success: function (data) {



                    $('#volunt_ID').val(data[0]);
                    $('#volunt_Name').val(data[1]);
                    $('#volunt_DOB').val(data[2]);
                    $('#volunt_Email').val(data[3]);
                    $('#volunt_Contact').val(data[4]);
                    $('#volunt_NIC').val(data[5]);
                    $('#volunt_Occupation').val(data[6]);
                    $('#volunt_Experience').val(data[7]);
                    $('#volunt_Activity').val(data[8]);
                    $('#volunt_Description').val(data[9]);

                    $('#volunt_edit_modal1').modal("show");

                }
            })
    });

    $('#food_edit').submit(function (event) {
        event.preventDefault();

        var Ffood_ID = $('#food_ID').val();
        var FFcategory1 = $('#Fcategory1').val();
        var FFTime1 = $('#FTime1').val();
        var Fadd_desc = $('#add_desc').val();
        var Fn_of_visit = $('#n_of_visit').val();
        var FFoodDatepicker = $('#FoodDatepicker').val();


        if (FFcategory1 == '') {
            swal('Opps...Fill in the Blank', 'Please Enter Category', 'info');
            return false;
        } else
            if (FFTime1 == '') {
                swal('Opps...Fill in the Blank', 'Please Enter Time', 'info');
                return false;
            } else {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data == 'Inserted') {
                            swal('Greate Job..', 'This Update your donation Now', 'success');

                            $('#food_edit_modal').modal('hide');
                            all();
                        } else
                            if (data == 'not_update') {
                                swal('Opps...Somthing Went Wrong', 'Please Contact Developer', 'error');
                            }

                    }
                });
            }
    });




    //  Edit Q & A for chat-bot
    $(document).on('click', '.evnterD_update', function () {

        var action = "evnterD_update1";
        var ID = $(this).attr('id');
        console.log(ID);
        $.ajax(
            {
                url: 'action.php',
                method: 'POST',
                data: { UserID: ID, action: action },
                dataType: 'JSON',
                success: function (data) {


                    $('#EeAct_ID').val(data[0]);
                    $('#EeAct_Name').val(data[1]);
                    $('#EeAct_contact').val(data[2]);
                    $('#EeAct_NIC').val(data[3]);
                    $('#EeAct').val(data[4]);
                    $('#EeAct_Desc').val(data[5]);
                    $('#enterwards').val(data[6]);
                    $('#EeAct_noofvisiters').val(data[7]);
                    $('#datepickerEntertain').val(data[8]);

                    var i = 1;
                    enterdisableDates();

                    $('#EeAct_edit_modal').modal("show");
                }
            })
    });

    $('#EeAct_edit').submit(function (event) {
        event.preventDefault();

        var EeAct_ID = $('#EeAct_ID').val();
        var EeAct_Name = $('#EeAct_Name').val();
        var EeAct_contact = $('#EeAct_contact').val();
        var EeAct_NIC = $('#EeAct_NIC').val();
        var EeAct = $('#EeAct').val();
        var EeAct_Desc = $('#EeAct_Desc').val();
        var enterwards = $('#enterwards').val();
        var EeAct_noofvisiters = $('#EeAct_noofvisiters').val();
        var datepickerEntertain = $('#datepickerEntertain').val();




        if (datepickerEntertain == '') {
            swal('Opps...Fill in the Blank', 'Please Enter Date', 'info');
            return false;
        } else {
            $.ajax({
                url: "action.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data == 'Inserted') {
                        swal('Greate Job..', 'You update your Activity Now', 'success');

                        $('#EeAct_edit_modal').modal('hide');
                        all();
                    } else
                        if (data == 'not_update') {
                            swal('Opps...Somthing Went Wrong', 'Please Contact Developer', 'error');
                        }

                }
            });
        }
    });



    $(document).on('click', '.GIDonor_update', function () {

        var action = "GIDonor_update";
        var ID = $(this).attr('id');
        // console.log(ID);
        $.ajax(
            {
                url: 'action.php',
                method: 'POST',
                data: { UserID: ID, action: action },
                dataType: 'JSON',
                success: function (data) {

                    console.log(data);
                    $('#ggItemD_ID').val(data[0]);
                    $('#ggItemD_Name').val(data[1]);
                    $('#ggItemD_Email').val(data[2]);
                    $('#ggItemD_contact').val(data[3]);
                    $('#gItem').val(JSON.parse(data[4]));

                    // $('#dateGItem').val(data[5]);

                    $('#ggItemD_NIC').val(data[6]);
                    $('#ggItem_quentity').val(data[7]);
                    $('#otherwards').val(data[8]);

                    // Assuming data[5] contains the date in "m/d/yyyy" format
                    var dateParts = data[5].split('/'); // Split the date string into parts
                    var year = dateParts[2];
                    var month = dateParts[0];
                    var day = dateParts[1];

                    // Pad month and day with leading zeros if needed (e.g., 09 instead of 9)
                    if (month.length === 1) {
                        month = '0' + month;
                    }
                    if (day.length === 1) {
                        day = '0' + day;
                    }

                    // Create the date in "yyyy-mm-dd" format
                    var formattedDate = year + '-' + month + '-' + day;

                    // Set the value in your input element
                    $('#dateGItem').val(formattedDate);



                    $('#ggItemD_edit_modal').modal("show");
                }
            })
    });

    $('#ggItemD_edit').submit(function (event) {
        event.preventDefault();
        // console.log("uiiii");
        var action = "ggItemD_edit";
        var gItem_ID = $('#ggItemD_ID').val();
        var gItem_Name = $('#ggItemD_Name').val();
        var gItem_Email = $('#ggItemD_Email').val();
        var gItem_Contact = $('#ggItemD_contact').val();
        var gItem_NIC = $('#ggItemD_NIC').val();

        var gItem = $('#gItem').val();
        var otherwards = $('#otherwards').val();


        var datepickerGItem = $('#dateGItem').val();
        console.log(datepickerGItem);
        var gItem_quentity = $('#ggItem_quentity').val();

        const dateObject = new Date(datepickerGItem);

        // Extract the year, month, and day
        const year = dateObject.getFullYear();
        let month = (dateObject.getMonth() + 1).toString(); // Convert month to a string
        const day = dateObject.getDate().toString().padStart(2, '0');

        // Remove the leading zero if present in the month
        if (month.length === 2 && month[0] === '0') {
            month = month[1];
        }

        // Format the date in the desired output format
        const formattedDateG = `${month}/${day}/${year}`;

        // var formattedDateG = parseInt(day1, 10) +parseInt(month1, 10) + "/" + "/" + year1;
        console.log("pp", formattedDateG);

        if (gItem_Name == '') {
            swal('Opps...!', 'Please Enter Your Name', 'info');
        } else
            if (gItem_Email == '') {
                swal('Opps...!', 'Please Enter Your Contact Number', 'info');
            } else
                if (gItem_Contact == '') {
                    swal('Opps...!', 'Please Enter Your Whight', 'info');
                } else
                    if (gItem_NIC == '') {
                        swal('Opps...!', 'Please Enter NIC', 'info');
                        // }else
                        // if (gitem_category == '') {
                        //     swal('Opps...!','Please Enter DOB','info');
                        // }else
                        // if (gItem == '') {
                        //     swal('Opps...!','Please Enter DOB','info');
                    } else
                        if (formattedDateG == '') {
                            swal('Opps...!', 'Please Enter DOB', 'info');
                        } else {

                            $.ajax({
                                url: 'action.php',
                                method: 'POST',
                                data: {
                                    action: action, gItem_ID: gItem_ID, gItem_Name: gItem_Name, gItem_Email: gItem_Email, gItem_Contact: gItem_Contact, gItem_NIC: gItem_NIC, gItem: JSON.stringify(gItem), formattedDateG: formattedDateG, otherwards: otherwards, gItem_quentity: gItem_quentity
                                },

                                success: function (data) {
                                    if (data == 'Inserted') {
                                        swal('Greate Job..', 'You update your Donation Now', 'success');

                                        $('#ggItemD_edit_modal').modal('hide');
                                        all();
                                    } else
                                        if (data == 'not_update') {
                                            swal('Opps...Somthing Went Wrong', 'Please Contact Developer', 'error');
                                        }

                                }
                            });
                        }
    });




    $(document).on('click', '.drugD_update', function () {

        var action = "drugD_update";
        var ID = $(this).attr('id');
        // console.log(ID);
        $.ajax(
            {
                url: 'action.php',
                method: 'POST',
                data: { UserID: ID, action: action },
                dataType: 'JSON',
                success: function (data) {

                    $('#ddrug_DID').val(data[0]);
                    $('#ddrug_DName').val(data[1]);
                    $('#ddrug_DEmail').val(data[2]);
                    $('#ddrug_DContact').val(data[3]);
                    $('#ddrug_DDrug').val(data[4]);

                    $('#ddrug_DNIC').val(data[5]);



                    // Assuming data[5] contains the date in "m/d/yyyy" format
                    var dateParts = data[6].split('/'); // Split the date string into parts
                    var year = dateParts[2];
                    var month = dateParts[0];
                    var day = dateParts[1];

                    // Pad month and day with leading zeros if needed (e.g., 09 instead of 9)
                    if (month.length === 1) {
                        month = '0' + month;
                    }
                    if (day.length === 1) {
                        day = '0' + day;
                    }

                    // Create the date in "yyyy-mm-dd" format
                    var formattedDate = year + '-' + month + '-' + day;

                    // Set the value in your input element
                    $('#ddrug_DDate').val(formattedDate);



                    $('#ddrug_edit_modal').modal("show");
                }
            })
    });

    $('#ddrug_edit').submit(function (event) {
        event.preventDefault();
        // console.log("uiiii");
        var action = "ddrug_edit";

        var gItem_ID = $('#ddrug_DID').val();
        var gItem_Name = $('#ddrug_DName').val();
        var gItem_Email = $('#ddrug_DEmail').val();
        var gItem_Contact = $('#ddrug_DContact').val();
        var gItem_NIC = $('#ddrug_DNIC').val();

        var gItem = $('#ddrug_DDrug').val();


        var datepickerGItem = $('#ddrug_DDate').val();
        console.log(datepickerGItem);

        const dateObject = new Date(datepickerGItem);

        // Extract the year, month, and day
        const year = dateObject.getFullYear();
        let month = (dateObject.getMonth() + 1).toString(); // Convert month to a string
        const day = dateObject.getDate().toString().padStart(2, '0');

        // Remove the leading zero if present in the month
        if (month.length === 2 && month[0] === '0') {
            month = month[1];
        }

        // Format the date in the desired output format
        const formattedDateG = `${month}/${day}/${year}`;

        // var formattedDateG = parseInt(day1, 10) +parseInt(month1, 10) + "/" + "/" + year1;
        console.log("pp", formattedDateG);

        if (gItem_Name == '') {
            swal('Opps...!', 'Please Enter Your Name', 'info');
        } else
            if (gItem_Email == '') {
                swal('Opps...!', 'Please Enter Your Contact Number', 'info');
            } else
                if (gItem_Contact == '') {
                    swal('Opps...!', 'Please Enter Your Whight', 'info');
                } else
                    if (gItem_NIC == '') {
                        swal('Opps...!', 'Please Enter NIC', 'info');
                        // }else
                        // if (gitem_category == '') {
                        //     swal('Opps...!','Please Enter DOB','info');
                        // }else
                        // if (gItem == '') {
                        //     swal('Opps...!','Please Enter DOB','info');
                    } else
                        if (formattedDateG == '') {
                            swal('Opps...!', 'Please Enter DOB', 'info');
                        } else {

                            $.ajax({
                                url: 'action.php',
                                method: 'POST',
                                data: {
                                    action: action, gItem_ID: gItem_ID, gItem_Name: gItem_Name, gItem_Email: gItem_Email, gItem_Contact: gItem_Contact, gItem_NIC: gItem_NIC, gItem: JSON.stringify(gItem), formattedDateG: formattedDateG
                                },

                                success: function (data) {
                                    if (data == 'Inserted') {
                                        swal('Greate Job..', 'You update your Donation Now', 'success');

                                        $('#ddrug_edit_modal').modal('hide');
                                        all();
                                    } else
                                        if (data == 'not_update') {
                                            swal('Opps...Somthing Went Wrong', 'Please Contact Developer', 'error');
                                        }

                                }
                            });
                        }
    });




























































































































































































































































































});