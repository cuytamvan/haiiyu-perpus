<?php
  $c_book      = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM books"));
  $c_author    = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM authors"));
  $c_publisher = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM publishers"));
  $c_member    = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM members"));
?>
<div class="container mt-4">
  <div class="row">
    <div class="col-sm-12 col-md-6 col-lg-3">
      <div class="card c-card">
        <div class="card-body p-4">
          <h4 class="text-right"><?=$c_book?></h4>
          <h6>Jumlah Buku</h6>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
      <div class="card c-card">
        <div class="card-body p-4">
          <h4 class="text-right"><?=$c_author?></h4>
          <h6>Jumlah penerbit</h6>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
      <div class="card c-card">
        <div class="card-body p-4">
          <h4 class="text-right"><?=$c_publisher?></h4>
          <h6>Jumlah pengarang</h6>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
      <div class="card c-card">
        <div class="card-body p-4">
          <h4 class="text-right"><?=$c_member?></h4>
          <h6>Jumlah Member</h6>
        </div>
      </div>
    </div>
  </div>
</div>