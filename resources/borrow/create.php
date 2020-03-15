<?php
  $table = 'borrows';

  if(isset($_POST['submit'])){
    $code        = 'B'.date('YmdHis');
    $book_id     = antiInject(post('book_id'));
    $member_id   = antiInject(post('member_id'));
    $description = antiInject(post('description'));
    $status      = 0;
    $date        = date('Y-m-d');
    $next_week   = strtotime($date) + (60 * 60 * 24 * 7);
    $check_book  = mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM books where id='$book_id'"));

    if($check_book){
      if($check_book->qty > 0){
        $q = mysqli_multi_query($conn, "INSERT INTO `$table` (`code`, `book_id`, `member_id`, `borrow_date`, `max_borrow_date`, `status`, `description`) values ('$code', '$book_id', '$member_id', '$date', ``, '$status', '$description'); UPDATE books set qty=(qty - 1) where id='$book_id'");

        if($q){
          echo '<script>
            alert(\'Berhasil\');
            document.location.href=\''.url('?c=borrowing').'\'
          </script>';
        }else{
          echo '<script>
            alert(\'Gagal\');
            document.location.href=\''.url('?c=borrowing-create').'\'
          </script>';
        }
      }else{
        echo '<script>
          alert(\'Buku sudah habis\');
          document.location.href=\''.url('?c=borrowing-create').'\'
        </script>';
      }
    }else{
      echo '<script>
        alert(\'Buku tidak ada\');
        document.location.href=\''.url('?c=borrowing-create').'\'
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
                <label>Buku</label>
                <select name="book_id" class="form-control">
                  <?php
                    $q = mysqli_query($conn, "SELECT * FROM books");
                    while($r = mysqli_fetch_object($q)){
                  ?>
                  <option value="<?=$r->id?>"><?=$r->title?> (<?=$r->year?>)</option>
                    <?php } ?>
                </select>
              </div>
              <div class="col-sm-12 col-md-6 form-group">
                <label>Anggota</label>
                <select name="member_id" class="form-control">
                  <?php
                    $q = mysqli_query($conn, "SELECT * FROM members");
                    while($r = mysqli_fetch_object($q)){
                  ?>
                  <option value="<?=$r->id?>"><?=$r->name?> (<?=$r->phone_number?>)</option>
                    <?php } ?>
                </select>
              </div>
              <div class="col-sm-12 form-group">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control" rows="6" placeholder="Masukan deskripsi" required></textarea>
              </div>
              <div class="col-sm-12 ">
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                <a href="<?=url('?c=borrowing')?>" class="btn btn-light">Kembali</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>