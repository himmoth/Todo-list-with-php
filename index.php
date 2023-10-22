<?php

require_once 'config/init.php';
$todo = new Todo;
$template = new Template('templates/home.php');
$template->todos = $todo->todos();
$template->completeds = $todo->completed();

$todo_id = isset($_GET['id']) ? $_GET['id'] : null;
$template->todo = $todo->todo($todo_id);

 









echo $template;