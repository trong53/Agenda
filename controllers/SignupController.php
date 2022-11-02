<?php
require models('Signup');

$validation_params = array(
  'password'      =>  [   
                          'pattern'   => '/^(?=.*\d)(?=.*\W)(?=.*[A-Z]).{8,}$/',
                          'error'     => ''
                      ],
  'name'          =>  [
                          'pattern'   => '/^([A-z]{1,}\-?\s?[A-z]{1,})+$/',
                          'error'     => ''
                      ],
  'email'         =>  [
                          'pattern'   => '/^[A-z][A-z0-9_\.\-]{2,32}@([A-z0-9\.\-]{3,15})(\.[A-z]{2,8}){1,2}$/',
                          'error'     => ''
                      ],                 
);

$validation = false;
$message_signup = '';

if (isset($_POST['submitSignup'])) {
      
    $_POST['name'] = strtolower($_POST['name']);
    $_POST['email'] = strtolower($_POST['email']);

    $validation = true;
    
    foreach ($validation_params as $field => $condition){
    
        if (validate($_POST[$field], $condition['pattern'])){
            $validation *= true;
        } else {
            $validation *= false;
            $validation_params[$field]['error'] = "Your $field is not correct !";
        }
    }
      
    if ($validation) {
        if (checkExist('email', $_POST['email'])) {
            $validation_params['email']['error'] = "Your email already existed !";
            $validation = false;
        }
    }

    if ($validation) {
        $message_signup = 'Your inscription was saved successfully';
     
        $password = md5($_POST['password']);
        $created_at = date('Y-m-d');
        
        insertUser($_POST['name'], $password, $_POST['email'], $created_at);
        
    } else {
        $message_signup = 'Error: Your information was not correct';
    }
}
require views('Signup');
