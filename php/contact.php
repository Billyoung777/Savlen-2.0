<?php

/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["comments"];

    // Customize the email content
    $to = "billyoungl777.bl@gmail.com";  // Replace with your email address
    $subject = "New Contact Form Submission - $subject";
    $headers = "From: $name <$email>" . "\r\n";

    // Add additional headers if needed (e.g., content type)
    // $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

    // Compose the email body
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Subject: $subject\n\n";
    $body .= "Message:\n$message";

    // Send the email
    mail($to, $subject, $body, $headers);

    // Redirect to thank-you page
    header("Location: thank-you.html");
    exit();
} else {
    // Redirect to an error page if someone tries to access this script directly
    header("Location: error.html");
    exit();
}
*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["comments"]);


    // Basic validation (you should enhance this based on your needs)
    if (empty($name) || empty($email) || empty($subject) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid input or all fields are required";
        exit;
    }

    // Construct the email message
    $to = "billyoungl777.bl@gmail.com";  // Replace with your email address
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $emailMessage = "
        <html>
        <body>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Subject:</strong> $subject</p>
            <p><strong>Message:</strong> $message</p>
        </body>
        </html>
    ";

    // Send the email
    if (mail($to, $subject, $emailMessage, $headers)) {
        echo "Email sent successfully";
    } else {
        echo "Error sending email. Details: " . print_r(error_get_last(), true);
    }
}
