<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Set the recipient email address
    $to = "theunitybridgefoundation@gmail.com";  // Replace with your actual email address

    // Set the email subject
    $subject = "New Contact Us Message from: " . $name;

    // Set the email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: " . $email . "\r\n";  // Sender's email

    // Create the email body
    $body = "<h2>You have received a new message from your contact form:</h2>";
    $body .= "<p><strong>Name:</strong> " . $name . "</p>";
    $body .= "<p><strong>Email:</strong> " . $email . "</p>";
    $body .= "<p><strong>Message:</strong> " . nl2br($message) . "</p>";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "There was an error sending the message.";
    }
} else {
    echo "Invalid request method.";
}
?>