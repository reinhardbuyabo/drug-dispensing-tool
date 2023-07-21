<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Get the form field values
  $firstName = $_POST["first-name"];
  $lastName = $_POST["last-name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];

  // Email information
  $to = "joab.bodo@strathmore.edu"; // Replace with your own email address
  $subject = "New Contact Form Submission";
  $body = "First Name: " . $firstName . "\n" .
          "Last Name: " . $lastName . "\n" .
          "Email: " . $email . "\n" .
          "Subject: " . $subject . "\n" .
          "Message: " . $message;

  // Send the email
  if (mail($to, $subject, $body)) {
    // Email sent successfully
    echo "Thank you for contacting us. We will get back to you soon!";
  } else {
    // Error sending email
    echo "Oops! Something went wrong. Please try again later.";
  }
}
?>
