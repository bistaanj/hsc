<?php
if (isset($_POST['submit'])) {
    // Sanitize input
    $name = htmlspecialchars(strip_tags($_POST['name']));
    $emailFrom = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $msgTxt = htmlspecialchars(strip_tags($_POST['message']));

    // Validate email
    if (!filter_var($emailFrom, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Email details
    $subject = "Inquiry";
    $mailingAddress = "bistaanj@gmail.com"; 
    $header = "From: $emailFrom\r\nReply-To: $emailFrom\r\n";
    $emailTxt = "You have an inquiry from: $emailFrom\r\n\r\nThe inquiry reads:\r\n$msgTxt";

    // Sending email and checking for success
    if (mail($mailingAddress, $subject, $emailTxt, $header)) {
        // Redirect to other page after Success
        header("Location: ../html/index.html");
        exit; // Stop further execution
    } else {
        echo "Failed to send email. Please try again later.";
    }
} else {
    echo "No Data Found.";
}
?>
