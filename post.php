<?php
$receiver = "admin@patrickwithams.com";
$incoming = "incoming@patrickwithams.com";
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing E-mail.
// After sanitization Validation is performed
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $subject = $email;
    // To send HTML mail, the Content-type header must be set.
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From:' . $incoming. "\r\n"; // Sender's Email
    // $headers .= 'Cc:' . $email. "\r\n"; // Carbon copy to Sender
    $template = '<div>'
    . '<br/>New website submission<br/><br/>'
    . 'Name:' . $name . '<br/>'
    . 'Email:' . $email . '<br/>'
    . 'Message:' . $message . '<br/><br/>'
    . '</div>';
    $sendmessage = $template;
    // Message lines should not exceed 70 characters (PHP rule), so wrap it.
    $sendmessage = wordwrap($sendmessage, 70);
    // Send mail by PHP Mail Function.
    mail($receiver, $subject, $sendmessage, $headers);
    echo "<p>Message sent</p>";
} else {
    echo "<p class=\"error\">Invalid email</p>";
}

?>
