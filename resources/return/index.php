<?php
  $table = 'borrows';

  if(isset($_POST['return'])){
    $id = antiInject(post('id'));
    $date = date('Y-m-d');

    $q = mysqli_multi_query($conn, "UPDATE borrows set `status`=1, return_date='$date' where id='$id'; UPDATE books set qty=qty+1 where id='$book_id'");
    if($q){
      echo '<script>
        alert(\'Berhasil dikembalikan\');
        document.location.href=\''.url('?c=return').'\'
      </script>';
    }else{
      echo '<script>
        alert(\'Gagal dikembalikan\');
        document.location.href=\''.url('?c=return').'\'
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
          <form id="search-form" method="POST">
            <div class="row">
              <div class="col-sm-12 col-md-6 form-group">
                <div class="form-group">
                  <label>Kode peminjaman</label>
                  <input type="text" name="code" class="form-control" placeholder="Masukan kode" autocomplete="off" required value="<?=isset($_POST['code']) ? antiInject(post('code')) : ''?>">
                </div>
                <button class="btn btn-primary" name="search">Cari kode</button>
              </div>
            </div>
          </form>
          <hr>
          <?php
            if(isset($_POST['search'])) {
              $code = antiInject(post('code'));
              $data = mysqli_fetch_object(mysqli_query($conn, "SELECT 
                *,
                books.title AS book_title,
                books.year AS book_year,
                members.name AS member_name,
                members.phone_number AS member_phone_number
                FROM borrows
                INNER JOIN books ON books.id = borrows.book_id
                INNER JOIN members ON members.id = borrows.member_id
                where code='$code'
                ORDER BY borrows.id DESC"
              ));
          ?>
          <form method="post">
            <input type="hidden" name="id" value="<?=$data->id?>">
            <input type="hidden" name="book_id" value="<?=$data->book_id?>">
            <table>
              <tr>
                <td>Kode</td>
                <td>:</td>
                <td><?=$data->code?></td>
              </tr>
              <tr>
                <td>Buku</td>
                <td>:</td>
                <td><?=$data->book_title?> (<?=$data->book_year?>)</td>
              </tr>
              <tr>
                <td>Member</td>
                <td>:</td>
                <td><?=$data->member_name?> (<?=$data->member_phone_number?>)</td>
              </tr>
              <tr>
                <td>Tanggal Pinjam</td>
                <td>:</td>
                <td><?=date('d M Y', strtotime($data->borrow_date))?></td>
              </tr>
              <tr>
                <td>Max Tanggal Pinjam</td>
                <td>:</td>
                <td><?=date('d M Y', strtotime($data->max_borrow_date))?></td>
              </tr>
              <tr>
                <td>Tanggal Dikembalikan</td>
                <td>:</td>
                <td><?=$data->return_date ? date('d M Y', strtotime($data->return_date)) : '-'?></td>
              </tr>
              <tr>
                <td>Status</td>
                <td>:</td>
                <td>
                  <?php
                    if($data->status == '0'){
                      echo '<span class="badge badge-pill badge-secondary">Belum dikembalikan</span>';
                    }else if($data->status == '1'){
                      echo '<span class="badge badge-pill badge-info">Selesai</span>';
                    }else{
                      echo '<span class="badge badge-pill badge-warning">Belum lunas</span>';
                    }
                  ?>
                </td>
              </tr>
              <?php if($data->status != 1){ ?> 
              <tr>
                <td colspan="2"></td>
                <td>
                  <button class="btn btn-primary" name="return">Dikembalikan</button>
                </td>
              </tr>
              <?php } ?>
            </table>
          </form>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php function script(){ ?>
  <script>
    $(document).ready(function () {
      $('#search-form').submit(function(e){ 
        
      })
    });
  </script>
<?php } ?>