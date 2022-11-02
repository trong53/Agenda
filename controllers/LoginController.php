<?php
require models('Login');

if (!empty($_SESSION)) {
  require controllers('home');
  exit;
}

$message_signin = '';

if (isset($_POST['submitLogin'])) {

  $email = strtolower($_POST['email']);
  $password = ($_POST['password']);

  $_SESSION = checkSignIn($email, $password);

  if (!empty($_SESSION)) {
      require controllers('home');
      exit;
  }else{
      $message_signin = 'Error: username and/or password incorrect';
  }
}
require views('Login');





