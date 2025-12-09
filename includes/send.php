<?php

require_once 'connect.php';

if (isset($_POST['submit'])) {

    $visitor_name    = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $visitor_email   = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $visitor_message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    if ($visitor_name !== "" && $visitor_email !== "" && $visitor_message !== "") {

        $to      = "ngjnathalie.ca@gmail.com";
        $subject = "New Contact Form Message from " . $visitor_name;

        $body  = "Visitor Name: " . $visitor_name . "\n";
        $body .= "Visitor Email: " . $visitor_email . "\n\n";
        $body .= "Message:\n" . $visitor_message . "\n";

        $headers  = "From: " . $visitor_name . " <" . $visitor_email . ">\r\n";
        $headers .= "Reply-To: " . $visitor_email . "\r\n";

        mail($to, $subject, $body, $headers);

        header("Location: ../contact.php?success=true");
        exit;

    } else {
        header("Location: ../contact.php?error=empty");
        exit;
    }

} else {
    header("Location: ../contact.php");
    exit;
}

?>
