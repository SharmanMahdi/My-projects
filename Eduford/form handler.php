<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"] ?? ''));
    $email = htmlspecialchars(trim($_POST["email"] ?? ''));
    $subject = htmlspecialchars(trim($_POST["subject"] ?? ''));
    $message = htmlspecialchars(trim($_POST["message"] ?? ''));

    // Validate and process the form data
    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Send email
            $to = "msherma@gmail.com"; // Change to your email
            $headers = "From: $email\r\nReply-To: $email\r\n";
            $mailBody = "Name: $name\nEmail: $email\nSubject: $subject\nMessage:\n$message";
            mail($to, $subject, $mailBody, $headers);

            echo "Thank you, $name! Your message has been sent.";
        } else {
            echo "Invalid email address.";
        }
    } else {
        echo "Please fill in all fields.";
    }
    
}
?>