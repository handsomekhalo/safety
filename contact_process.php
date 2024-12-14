<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $contact_no = $_POST['contact_no'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    // Basic validation
    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill in all required fields.";
        exit;
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Your email sending or database storage logic goes here
    // For example:
    $to = "handsomekhalo@gmail.com";
    $subject = "New Contact Form Submission";
    $email_body = "Name: $name\n";
    $email_body .= "Contact No: $contact_no\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Message:\n$message";

    // Send email
    if (mail($to, $subject, $email_body)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }
}
?>