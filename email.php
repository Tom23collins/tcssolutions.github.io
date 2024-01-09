<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["firstname"];
    $email = $_POST["email"];
    $service = $_POST["service"];
    $message = $_POST["Message"];

    // Create email content
    $subject = "New Inquiry from $name";
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Service: $service\n";
    $body .= "Message:\n$message";

    // Set additional headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Replace your_email@example.com with the actual email address where you want to receive the form submissions
    $to = "your_email@example.com";

    // Send email
    $success = mail($to, $subject, $body, $headers);

    if ($success) {
        echo "Thank you for your inquiry. We will get back to you soon.";
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
} else {
    // Redirect to the form page if accessed directly
    header("Location: your_form_page.html");
    exit();
}
?>