<?php

require_once 'config/init.php';
$todo = new Todo;

if(isset($_POST['btn-add'])){

    $data['item'] = $_POST['item'];
    
    if($todo->create($data)){

        redirect('index.php', 'Your todo is created','success');
    }else{
        redirect('index.php', 'Your todo is not  created','error');
    }
  

}


$todo_id = isset($_GET['id']) ? $_GET['id'] : null;
if(isset($_POST['btn-update'])){
    $data['item'] = $_POST['item'];

    if($todo->update($todo_id, $data)){

        redirect('index.php', 'Your todo is updated','success');
    }else{
        redirect('index.php', 'Your todo is not  update','error');
    }
 }







