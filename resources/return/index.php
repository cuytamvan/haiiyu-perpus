<?php
  $table = 'borrows';
?>
<div class="container mt-4">
  <h4><?=isset($title) ? $title : '' ?></h4>
  <div class="row">
    <div class="col-sm-12">
      <div class="card c-card">
        <div class="card-body p-4">
          <form id="search-form">
            <div class="row">
              <div class="col-sm-12 col-md-6 form-group">
                <div class="form-group">
                  <label>Kode peminjaman</label>
                  <input type="text" name="code" class="form-control" placeholder="Masukan kode" autocomplete="off" required>
                </div>
                <button class="btn btn-primary">Cari kode</button>
              </div>
            </div>
          </form>
          <hr>
          <form method="post"></form>
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