<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = 'bhattiabhishek09@gmail.com';
    $subject = $_POST['subject'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validate input
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "Please fill in all required fields.";
        exit;
    }

    // Email headers
    $headers = 'From: ' . $email . "\r\n" .
               'Reply-To: ' . $email . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // Compose the email message
    $message_body = "Name: " . $name . "\n";
    $message_body .= "Email: " . $email . "\n";
    $message_body .= "Message:\n" . $message;

    // Send the email
    if (mail($to, $subject, $message_body, $headers)) {
        echo "Your message has been sent. Thank you!";
    } else {
        echo "Message delivery failed. Please check your server's email configuration or try again later.";
    }
} else {
    echo "Invalid request";
}
