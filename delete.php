<?php

require_once 'config/init.php';
$todo = new Todo;

$todo_id = isset($_GET['id']) ? $_GET['id'] : null;

// if($todo->finished($todo_id)){
//     header('location: index.php');
// }

if($todo->delete($todo_id)){

    redirect('index.php', 'Your todo is deleted','success');
}else{
    redirect('index.php', 'Your todo is not  deleted','error');
}





