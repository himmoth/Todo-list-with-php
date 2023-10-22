<?php

require_once 'config/init.php';
$user = new User();
$template = new Template('templates/users/index.php');

$template->users = $user->all();

 
echo $template;