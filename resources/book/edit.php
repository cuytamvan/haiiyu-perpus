<?php
  $table = 'books';

  $id = antiInject(get('id'));
  $data = mysqli_fetch_object((mysqli_query($conn, "SELECT * FROM `$table` where id='$id'")));

  if(isset($_POST['submit'])){  
    $title        = antiInject(post('title'));
    $author_id    = antiInject(post('author_id'));
    $publisher_id = antiInject(post('publisher_id'));
    $year         = antiInject(post('year'));
    $qty          = antiInject(post('qty'));
    $description  = antiInject(post('description'));

    $q = mysqli_query($conn, "UPDATE `$table` set
        `title`='$title',
        `author_id`='$author_id',
        `publisher_id`='$publisher_id',
        `year`='$year',
        `qty`='$qty',
        `description`='$description'
       where id='$id'");
    if($q){
      echo '<script>
        alert(\'Berhasil\');
        document.location.href=\''.url('?c=book').'\'
      </script>';
    }else{
      echo '<script>
        alert(\'Gagal\');
        document.location.href=\''.url('?c=book-edit&id='.$id).'\'
      </script>';
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
            <div class="col-sm-12 col-md-6 col-lg-4 form-group">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" placeholder="Masukan judul" autocomplete="off" value="<?=$data->title?>" required>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 form-group">
                <label>Pengarang</label>
                <select name="author_id" class="form-control">
                  <?php
                    $q = mysqli_query($conn, "SELECT * FROM authors");
                    while($r = mysqli_fetch_object($q)){
                  ?>
                  <option value="<?=$r->id?>" <?=$r->id == $data->author_id ? 'selected' : '' ?>><?=$r->name?></option>
                    <?php } ?>
                </select>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 form-group">
                <label>Penerbit</label>
                <select name="publisher_id" class="form-control">
                  <?php
                    $q = mysqli_query($conn, "SELECT * FROM publishers");
                    while($r = mysqli_fetch_object($q)){
                  ?>
                  <option value="<?=$r->id?>" <?=$r->id == $data->publisher_id ? 'selected' : '' ?>><?=$r->name?></option>
                    <?php } ?>
                </select>
              </div>
              <div class="col-sm-12 col-md-6 form-group">
                <label>Tahun</label>
                <input type="text" name="year" class="form-control only-number" placeholder="Masukan tahun" autocomplete="off" value="<?=$data->year?>" required maxlength="4">
              </div>
              <div class="col-sm-12 col-lg-6 form-group">
                <label>Qty</label>
                <input type="text" name="qty" class="form-control only-number" placeholder="Masukan jumlah buku" autocomplete="off" value="<?=$data->qty?>" required maxlength="4">
              </div>
              <div class="col-sm-12 form-group">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control" rows="6" placeholder="Masukan deskripsi" required><?=$data->description?></textarea>
              </div>
              <div class="col-sm-12 ">
                <button type="submit" name="submit" class="btn btn-primary">Simpan perubahan</button>
                <a href="<?=url('?c=book')?>" class="btn btn-light">Kembali</a>
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