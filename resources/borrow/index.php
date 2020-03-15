<?php
  $table = 'borrows';

  if(isset($_POST['remove'])){
    $id = antiInject(post('id'));
    $q = mysqli_query($conn, "DELETE from `$table` where id='$id'");
    if($q){
      echo '<script>
        alert(\'Berhasil dihapus\');
        document.location.href=\''.url('?c=borrowing').'\'
      </script>';
    }else{
      echo '<script>
        alert(\'Gagal dihapus\');
        document.location.href=\''.url('?c=borrowing').'\'
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
          <a href="<?=url('?c=borrowing-create')?>" class="btn btn-primary mb-2">Tambah data</a>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 20px;">No</th>
                <th>Kode</th>
                <th>Buku Judul</th>
                <th>Member</th>
                <th>Tgl</th>
                <th>Max Tgl Dikembalikan</th>
                <th>Tgl Dikembalikan</th>
                <th>status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                $data = mysqli_query($conn, "SELECT
                    $table.*,
                    books.title AS book_title,
                    books.year AS book_year,
                    members.name AS member_name,
                    members.phone_number AS member_phone_number
                  FROM $table
                  INNER JOIN books ON books.id = $table.book_id
                  INNER JOIN members ON members.id = $table.member_id
                  ORDER BY $table.id DESC");
                  // echo mysqli_error($conn);
                while($r = mysqli_fetch_object($data)){
              ?>
              <tr>
                <td><?=$no?></td>
                <td><?=$r->code?></td>
                <td><?=$r->book_title?> (<?=$r->book_year?>)</td>
                <td><?=$r->member_name?> (<?=$r->member_phone_number?>)</td>
                <td><?=date('d M Y', strtotime($r->borrow_date))?></td>
                <td><?=date('d M Y', strtotime($r->max_borrow_date))?></td>
                <td><?=$r->return_date ? date('d M Y', strtotime($r->return_date)) : '-'?></td>
                <td>
                  <?php
                    if($r->status == '0'){
                      echo '<span class="badge badge-pill badge-secondary">Belum dikembalikan</span>';
                    }else if($r->status == '1'){
                      echo '<span class="badge badge-pill badge-info">Selesai</span>';
                    }else{
                      echo '<span class="badge badge-pill badge-warning">Belum lunas</span>';
                    }
                  ?>
                </td>
                <td class="text-center">
                  <form method="post" class="d-inline-block">
                    <input type="hidden" name="id" value="<?=$r->id?>">
                    <button class="btn btn-danger btn-sm" name="remove" onclick="return confirm('Hapus data tersebut?')">Hapus</button>
                  </form>
                </td>
              </tr>
              <?php
                  $no++;
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>