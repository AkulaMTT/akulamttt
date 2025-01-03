<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

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

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mail = new PHPMailer(true);
        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'your-email@gmail.com'; // Your Gmail address
            $mail->Password = 'your-email-password'; // Your Gmail password or app-specific password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('your-email@gmail.com', $name);
            $mail->addAddress($to);
            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();
            echo "Your inquiry has been sent successfully.";
        } catch (Exception $e) {
            echo "There was an error sending your inquiry. Please try again later. Mailer Error: " . $mail->ErrorInfo;
        }
    } else {
        echo "Invalid email address. Please provide a valid email.";
    }
} else {
    echo "Invalid request method.";
}
?>
