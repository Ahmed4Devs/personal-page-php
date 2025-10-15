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

connectDb();

var_dump($name, $email, $message);die;