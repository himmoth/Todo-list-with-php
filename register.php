<?php

require_once 'config/init.php';
$user = new User;
$template = new Template('templates/register.php');




if(isset($_POST['register'])){

    
    
    if($user->validat($_POST)){

        $data['username'] = trim($_POST['username']);
        $data['email'] = trim($_POST['email']);
        $data['password'] = trim(password_hash($_POST['password'], PASSWORD_DEFAULT));
     
        if($user->register($data)){

            redirect('login.php', 'User registered successfully','success');
        }
       
    }

    $template->error = $user->errors;


  
}
 


echo $template;