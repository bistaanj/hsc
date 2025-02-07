<?php
if (mail("your-email@example.com", "Test Mail", "This is a test email from Hostinger.", "From: no-reply@example.com")) {
    echo "Mail sent successfully!";
} else {
    echo "Mail sending failed.";
}
?>