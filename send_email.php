<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
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

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (mail($to, $subject, $message, $headers)) {
            echo "Your inquiry has been sent successfully.";
        } else {
            echo "There was an error sending your inquiry. Please try again later.";
        }
    } else {
        echo "Invalid email address. Please provide a valid email.";
    }
} else {
    echo "Invalid request method.";
}
?>
