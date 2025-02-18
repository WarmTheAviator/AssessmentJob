<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    // Sanitize user input
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

    $to = "Khai.Do883@education.nsw.gov.au";
    $subject = "New Contact Form Submission";
    $headers = "From: " . $name . " <" . $email . ">\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8 \r\n";

    if (mail($to, $subject, $message, $headers)) {
        http_response_code(200);
        echo "Email sent successfully!";
    } else {
        http_response_code(500);
        echo "Oops, something went wrong. Please check again!";
    }
} else {
    http_response_code(403);
    echo "Access Denied";
}
?>
