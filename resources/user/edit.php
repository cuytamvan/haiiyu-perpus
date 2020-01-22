<?php
  $table = 'users';

  $id = antiInject(get('id'));
  $data = mysqli_fetch_object((mysqli_query($conn, "SELECT * FROM `$table` where id='$id'")));

  if(isset($_POST['submit'])){  
    $name     = antiInject(post('name'));
    $username = antiInject(post('username'));
    $password = sha1(post('password'));

    $check = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `$table` where username='$username' and NOT username='$data->username'"));
    if($check > 0){
      echo '<script>
        alert(\'Username sudah ada\');
        document.location.href=\''.url('?c=user-edit&id='.$id).'\'
      </script>';
    }else{
      $sql = post('password') ? "UPDATE `$table` set `name`='$name', `username`='$username', `password`='$password' where id='$id'" : "UPDATE `$table` set `name`='$name', `username`='$username' where id='$id'";

      $q = mysqli_query($conn, $sql);
      if($q){
        echo '<script>
          alert(\'Berhasil\');
          document.location.href=\''.url('?c=user').'\'
        </script>';
      }else{
        echo '<script>
          alert(\'Gagal\');
          document.location.href=\''.url('?c=user-edit&id='.$id).'\'
        </script>';
      }
    }
  }

  if($data){
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
                <input type="text" name="name" class="form-control" placeholder="Masukan nama" autocomplete="off" value="<?=$data->name?>" required>
              </div>
              <div class="col-sm-12 col-md-4 form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Ex: example" autocomplete="off" value="<?=$data->username?>" required>
              </div>
              <div class="col-sm-12 col-md-4 form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="******">
              </div>
              <div class="col-sm-12 ">
                <button type="submit" name="submit" class="btn btn-primary">Simpan perubahan</button>
                <a href="<?=url('?c=user')?>" class="btn btn-light">Kembali</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
  }else{
    include 'resources/error/id-404.php';
  }
?>