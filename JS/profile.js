$(document).ready(function() {
    $('#registrationForm').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: "./PHP/register.php",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(response) {
                $('#message').html(response.message);
            },
            error: function(xhr, status, error) {
                $('#message').html('An error occurred: ' + status + ' ' + error);
            }
        });
    });
});
