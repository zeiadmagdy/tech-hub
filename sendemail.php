<?php

// Recipient
define("RECIPIENT_NAME", "TechHub Website");
define("RECIPIENT_EMAIL", "Info@techhub-me.com");

// Read form values
$userName = isset($_POST['username']) ? trim($_POST['username']) : "";
$lastName = isset($_POST['lastname']) ? trim($_POST['lastname']) : "";
$senderEmail = isset($_POST['email']) ? trim($_POST['email']) : "";
$services = isset($_POST['services']) ? trim($_POST['services']) : "";
$message = isset($_POST['message']) ? trim($_POST['message']) : "";

// If all required values exist, send the email
if ($userName && $lastName && $senderEmail && $message) {

  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $subject = "New Contact Form Submission";

  $msgBody = "Name: $userName $lastName\n";
  $msgBody .= "Email: $senderEmail\n";
  $msgBody .= "Services: $services\n";
  $msgBody .= "Message:\n$message\n";

  $headers = "From: " . RECIPIENT_EMAIL; // Use your domain email to avoid spam

  if (mail($recipient, $subject, $msgBody, $headers)) {
    header("Location: contact.html?message=Success");
  } else {
    header("Location: contact.html?message=Failed");
  }

  exit();

} else {
  header("Location: contact.html?message=Failed");
  exit();
}
?>