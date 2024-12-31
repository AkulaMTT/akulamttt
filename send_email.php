<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $inquiry = htmlspecialchars($_POST['inquiry']);
    $services = htmlspecialchars($_POST['services']);
    $to = "akulamttt@gmail.com";
    $subject = "New Contact Inquiry from $name";

    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone\n";
    $message .= "Inquiry: $inquiry\n";
    $message .= "Services: $services\n";

    $headers = "From: $email";

    if (mail($to, $subject, $message, $headers)) {
        echo "Your inquiry has been sent successfully.";
    } else {
        echo "There was an error sending your inquiry. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>
