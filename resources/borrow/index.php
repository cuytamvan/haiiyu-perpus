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
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Jumlah&nbsp;buku</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                $data = mysqli_query($conn, "SELECT
                    $table.*,
                    authors.name AS author_name,
                    publishers.name AS publisher_name
                  FROM $table
                  INNER JOIN authors ON authors.id = $table.author_id
                  INNER JOIN publishers ON publishers.id = $table.publisher_id
                  ORDER BY $table.id DESC");
                while($r = mysqli_fetch_object($data)){
              ?>
              <tr>
                <td><?=$no?></td>
                <td><?=$r->title?></td>
                <td><?=$r->author_name?></td>
                <td><?=$r->publisher_name?></td>
                <td><?=$r->year?></td>
                <td><?=$r->qty?></td>
                <td>
                  <a href="<?=url('?c=borrowing-edit&id='.$r->id)?>" class="btn btn-success btn-sm">Edit</a>
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