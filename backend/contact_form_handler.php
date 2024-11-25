<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Collect form data
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);

  // Validate form inputs
  if (empty($name) || empty($email) || empty($message)) {
    echo "All fields are required.";
    exit;
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address.";
    exit;
  }

  // Email details
  $to = "y.aoun@outlook.com";
  $subject = "New Contact Us Message from $name";
  $body = "You have received a new message:\n\nName: $name\nEmail: $email\n\nMessage:\n$message";
  $headers = "From: $email\r\nReply-To: $email";

  
  if (mail($to, $subject, $body, $headers)) {
    echo "Your message has been sent successfully!";
  } else {
    echo "Failed to send your message. Please try again.";
  }
} else {
  echo "Invalid request method.";
}
?>