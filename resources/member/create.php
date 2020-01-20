<?php
  $table = 'members';

  if(isset($_POST['submit'])){  
    $name         = antiInject(post('name'));
    $phone_number = antiInject(post('phone_number'));
    $address      = antiInject(post('address'));

    $q = mysqli_query($conn, "INSERT INTO `$table` (`name`, `phone_number`, `address`) values ('$name', '$phone_number', '$address')");
    if($q){
      echo '<script>
        alert(\'Berhasil\');
        document.location.href=\''.url('?c=member').'\'
      </script>';
    }else{
      echo '<script>
        alert(\'Gagal\');
        document.location.href=\''.url('?c=member-create').'\'
      </script>';
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
              <div class="col-sm-12 col-md-6 form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" placeholder="Masukan nama" autocomplete="off" required>
              </div>
              <div class="col-sm-12 col-md-6 form-group">
                <label>No telp</label>
                <input type="text" name="phone_number" class="form-control" placeholder="Masukan no telp" autocomplete="off" required>
              </div>
              <div class="col-sm-12 form-group">
                <label>Alamat</label>
                <textarea name="address" class="form-control" rows="6" placeholder="Masukan alamat" required></textarea>
              </div>
              <div class="col-sm-12 ">
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                <a href="<?=url('?c=member')?>" class="btn btn-light">Kembali</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>