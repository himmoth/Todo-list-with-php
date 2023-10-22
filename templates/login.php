<?php
if(isset($_SESSION['username'])){
  header('Location: index.php');
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Login</title>
  <style>
        .invalid{
            border: 1px solid red;
        }
        .invalid::placeholder{
            color: red;
        }
        .red{
            color: red;
        }
    </style>
</head>

<body>

  <div class="container">
    <div class="row d-flex justify-content-center align-items-center mt-5 ">
      <div class="col-6 shadow p-5">
        <h3 class="text-center mb-3">Login</h3>
        <?php if(isset($error['logerror'])):?>
          <div class="alert alert-danger" role="alert">
          <?php echo $error['logerror']?>
        </div>
        <?php endif;?>

        <form action="login.php" method="POST">
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control  <?php echo isset($error['email']) ? 'invalid' : '' ;?>" name="email" id="email" aria-describedby="emailHelp" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''?>">
            <?php echo isset($error['email']) ? '<div class="red mt-1">'.$error['email'] . '</div>' : '' ;?>

          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control <?php echo isset($error['password']) ? 'invalid' : '' ;?>" id="password">
            <?php echo isset($error['password']) ? '<div class="red mt-1">'.$error['password'] . '</div>' : '' ;?>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" name="remember" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Remember</label>
          </div>
          <button type="submit" class="btn btn-primary float-end" name="login">Login</button>
          <a href="register.php">If you don't have account please register</a>
        </form>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>