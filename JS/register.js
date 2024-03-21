$(document).ready(function() {
    $("#registration-form").on("submit", function(event) {
        event.preventDefault();

        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var confirm_password = $("#confirm_password").val();

        if (password !== confirm_password) {
            $("#message").html("Error: Passwords do not match!");
        } else {
            $.ajax({
                url: "./PHP/register.php",
                type: "POST",
                data: {
                    firstname: firstname,
                    lastname: lastname,
                    email: email,
                    password: password,
                    confirm_password: confirm_password
                },
                success: function(response) {
                    $("#message").html(response);
                }
            });
        }
    });
});