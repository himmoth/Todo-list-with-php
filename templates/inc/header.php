<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Todo List!</title>

    <style>
        .boder-bottom{
            border-bottom: 1px solid green;
            width: fit-content;
        }
    </style>
</head>

<body>
    
<div class="container mb-5">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">TodoList</a>
      <?php if(isset($_SESSION['username'])):?>
        <p class="navbar-brand mb-0">User: <?php echo $_SESSION['username']?></p>
        <?php endif;?>

      <a class="navbar-brand" href="logout.php">Logout</a>

    </div>
  </nav>
</div>
<div class="container mt-3">
        <div class="row d-flex justify-content-center">
            <div class="col-8">
            <?=displayMessage();?>
            </div>
        </div>
</div>