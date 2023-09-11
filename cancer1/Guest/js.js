$(document).ready(function()
{
// Chat-bot Icon
$(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.chat-bot').fadeIn('slow');
    } else {
      $('.chat-bot').fadeOut('slow');

    }
  });

  $('#chat_bot').click(function() {
    $('#chat_bot_modal').modal('show');
    
  });

  
  $('#mail_send').click(function() {
        var mail = $('#email').val();
        var subject = $('#subject').val();
        var name = $('#name').val();
        var message = $('#message').val();
       
        var action = "email_send";
        $.ajax(
        {
            url:"../send_mail/send_mail.php",
            method:"POST",
            data:{action:action,mail:mail,subject:subject,name:name,message:message},
            success:function(data)
            {
                $('#Blood_donor_fetch').html(data);  
                swal('Successfull','We will contact you soon!','success');
                $('#name').val('');
                $('#subject').val('');
                $('#email').val('');
                $('#message').val('');
            }
        })
  });




});



