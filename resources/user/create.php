<?php
  $table = 'users';

  if(isset($_POST['submit'])){  
    $name     = antiInject(post('name'));
    $username = antiInject(post('username'));
    $password = sha1(post('password'));

    $check = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `$table` where username='$username'"));
    if($check > 0){
      echo '<script>
          alert(\'Username sudah ada\');
          document.location.href=\''.url('?c=user-create').'\'
        </script>';
    }else{
      $q = mysqli_query($conn, "INSERT INTO `$table` (`name`, `username`, `password`) values ('$name', '$username', '$password')");
      if($q){
        echo '<script>
          alert(\'Berhasil\');
          document.location.href=\''.url('?c=user').'\'
        </script>';
      }else{
        echo '<script>
          alert(\'Gagal\');
          document.location.href=\''.url('?c=user-create').'\'
        </script>';
      }
    }
  }
?>
<div class="container mt-4">
  <h4><?=isset($title) ? $title : '' ?></h4>
  <div class="row">
    <div class="col-sm-12">
      <div class="card c-card">
        <div class="card-body p-4">
          <form method="post">
            <div class="row">
              <div class="col-sm-12 col-md-4 form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" placeholder="Ex: example" autocomplete="off" required>
              </div>
              <div class="col-sm-12 col-md-4 form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Ex: example" autocomplete="off" required>
              </div>
              <div class="col-sm-12 col-md-4 form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="******" required>
              </div>
              <div class="col-sm-12 ">
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                <a href="<?=url('?c=user')?>" class="btn btn-light">Kembali</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>