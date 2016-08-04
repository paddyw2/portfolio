<?php
$receiver = "admin@patrickwithams.com";
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing E-mail.
// After sanitization Validation is performed
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $sendmessage = "Name: " . $name . "<br>Email: " . $email . ", Message: " . $message;

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    // Message lines should not exceed 70 characters (PHP rule), so wrap it.
    $sendmessage = wordwrap($sendmessage, 70);
    // Send mail by PHP Mail Function.
    mail($receiver, "New Website Submission", $sendmessage, $headers);
    echo "<p>Message sent</p>";
} else {
    echo "<p class=\"error\">Invalid email</p>";
}

?>
