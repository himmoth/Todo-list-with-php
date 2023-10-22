<?php
session_start();
// Config 
require_once 'config.php';
// Include Helpers
require_once 'helpers/system_helper.php';



spl_autoload_register(function ($class_name) {
    require_once 'lib/' . $class_name . '.php';
 });
 
