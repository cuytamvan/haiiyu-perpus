<?php
  $table = 'authors';

  if(isset($_POST['submit'])){  
    $name         = antiInject(post('name'));
    $phone_number = antiInject(post('phone_number'));
    $facebook     = antiInject(post('facebook'));
    $twitter      = antiInject(post('twitter'));
    $address      = antiInject(post('address'));

    $q = mysqli_query($conn, "INSERT INTO `$table` (`name`, `phone_number`, `facebook`, `twitter`, `address`) values ('$name', '$phone_number', '$facebook', '$twitter', '$address')");
    if($q){
      echo '<script>
        alert(\'Berhasil\');
        document.location.href=\''.url('?c=author').'\'
      </script>';
    }else{
      echo '<script>
        alert(\'Gagal\');
        document.location.href=\''.url('?c=author-create').'\'
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
              <div class="col-sm-12 col-md-6 col-lg-3 form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" placeholder="Masukan nama" autocomplete="off" required>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-3 form-group">
                <label>No telp</label>
                <input type="text" name="phone_number" class="form-control" placeholder="Masukan no telp" autocomplete="off" required>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-3 form-group">
                <label>Facebook</label>
                <input type="text" name="facebook" class="form-control" placeholder="Masukan url profil facebook" autocomplete="off" required>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-3 form-group">
                <label>Twitter</label>
                <input type="text" name="twitter" class="form-control" placeholder="Masukan url profil twitter" autocomplete="off" required>
              </div>
              <div class="col-sm-12 form-group">
                <label>Alamat</label>
                <textarea name="address" class="form-control" rows="6" placeholder="Masukan alamat" required></textarea>
              </div>
              <div class="col-sm-12 ">
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                <a href="<?=url('?c=author')?>" class="btn btn-light">Kembali</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>