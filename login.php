<?php
  require 'app/autoload.php';
  if(isset($_SESSION['auth'])) header('location: '.url(''));
  
  if(isset($_POST['login'])){
    $username = antiInject(post('username'));
    $password = sha1(post('password'));

    $q = mysqli_fetch_object(mysqli_query($conn, "SELECT * from `users` where `username`='$username' and `password`='$password'"));
    if($q){
      $_SESSION['auth'] = $q->id;
      echo '<script>
        document.location.href=\''.url('').'\'
      </script>';
    }else{
      echo '<script>
        alert(\'username atau password salah\');
        document.location.href=\''.url('login.php').'\'
      </script>';
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Haiiyu perpus | login</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?=asset('assets/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?=asset('assets/css/style.css')?>">
  <link rel="shortcut icon" href="favicon.png" type="image/png">
</head>
<body>
  <div class="row">
    <div class="col-sm-12 col-md-6 col-lg-4 offset-lg-4 offset-md-3 mt-4">
      <div class="card c-card">
        <div class="card-body p-5">
          <h4 class="text-center">Login</h4>
          <form method="post">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control" autocomplete="off" required placeholder="Ex: example" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" required placeholder="******" required>
            </div>
            <button class="btn btn-primary" name="login">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="<?=asset('assets/js/jquery.min.js')?>"></script>
  <script src="<?=asset('assets/js/bootstrap.min.js')?>"></script>
  <script src="<?=asset('assets/js/init.js')?>"></script>

  <?php if(function_exists('script')) script(); ?>
</body>
</html>