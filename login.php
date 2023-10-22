<?php

require_once 'config/init.php';
$user = new User();
$template = new Template('templates/login.php');

if(isset($_POST['login'])){

    
    
  

        $data['email'] = trim($_POST['email']);
        $data['password'] = trim($_POST['password']);
       
     
        if($user->login($data)){

            redirect('index.php', 'User logined successfully','success');
        }
       
    

    $template->error = $user->errors;
}
 


echo $template;