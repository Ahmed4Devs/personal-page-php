<?php
// CSRF

// getting the data:
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

var_dump($name, $email, $message);die;