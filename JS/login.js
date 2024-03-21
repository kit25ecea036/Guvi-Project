$(document).ready(function() {
    $('#loginForm').submit(function(event) {
        event.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();
        $.ajax({                                                   
            url: "./PHP/login.php",          
            type: "POST",
            data: { email: email, password: password },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $('#message').html(response.message);
                    window.location.href = "login.html";
                } else {
                    $('#message').html(response.message);
                }                            
            },                                     
            error: function(xhr,status,error) {
                $('#message').html('An error occurred: ' + status + ' ' + error);
            }
        });
    }); 
}); 