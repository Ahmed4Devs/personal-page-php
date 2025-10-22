<?php
// CSRF

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

// if empty return bad request
if (empty($name) || empty($email) || empty($message)) {
  badRequest();
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  badRequest("Email field is invalied");
}

$insertd = insertMessage(
  connectDb(), 
  name: $name, 
  email: $email, 
  message: $message
);

if ($inserted) {
  $safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
  addFlashMessage('success', "Thank you, $safeName, for your message. it was stored successfully.");
  redirect('/guestbook');
}

addFlashMessage('error', "Could not store the message, sorry");
redirect('/guestbook');