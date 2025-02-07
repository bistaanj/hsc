<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    // Sanitize input
    $name = trim(htmlspecialchars(strip_tags($_POST['name'])));
    $emailFrom = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $msgTxt = trim(htmlspecialchars(strip_tags($_POST['message'])));

    // Validate email
    if (!filter_var($emailFrom, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Email details
    $subject = "Inquiry from " . $name;
    $mailingAddress = "info@fubonmining.com";
    $headers = "From: $emailFrom\r\n";
    $headers .= "Reply-To: $emailFrom\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $emailTxt = "You have an inquiry from: $name ($emailFrom)\r\n\r\n";
    $emailTxt .= "Message:\r\n$msgTxt";

    // Send email and check for success
    if (mail($mailingAddress, $subject, $emailTxt, $headers)) {
        // Redirect to another page after success
        header("Location: ../index.html");
        exit;
    } else {
        echo "Failed to send email. Please try again later.";
    }
} else {
    echo "No Data Found.";
}
?>