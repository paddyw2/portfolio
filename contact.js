$(document).ready(function() {
    $("#submit").click(function() {
        var form_name = $("#name").val();
        var form_email = $("#email").val();
        var form_message = $("#message").val();
        $("#returnmessage").empty(); // To empty previous error/success message.
        // Checking for blank fields.
        if (form_name == '' || form_email == '') {
            alert("Please Fill Required Fields");
        } else {
        // Returns successful data submission message when the entered information is stored in database.
            $.post("post.php", {
            name: form_name,
            email: form_email,
            message: form_message,
            }, function(data) {
                $("#returnmessage").append(data); // Append returned message to message paragraph.
                $("#returnmessage").fadeIn();
                if (data == "<p>Message Sent</p>") {
                    $("#form")[0].reset(); // To reset form fields on success.
                }
            });
        }
    });
});
