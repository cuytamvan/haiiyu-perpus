<nav class="navbar navbar-expand-lg custom-navbar">
  <a class="navbar-brand" href="<?=url()?>">Haiiyu perpus</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?=url()?>">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="nav-master" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Master data
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="nav-master">
          <a class="dropdown-item" href="<?=url('?c=publisher')?>">Penerbit</a>
          <a class="dropdown-item" href="<?=url('?c=author')?>">Pengarang</a>
          <a class="dropdown-item" href="<?=url('?c=book')?>">Buku</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?=url('?c=member')?>">Member</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#!" id="nav-transaction" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Transaksi
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="nav-transaction">
          <a class="dropdown-item" href="<?=url('?c=borrowing')?>">Peminjaman</a>
          <a class="dropdown-item" href="<?=url('?c=return')?>">Pengembalian</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=url('?c=user')?>">User</a>
      </li>
      <li class="nav-item">
        <a class="nav-link logout" href="#!">Logout</a>
      </li>
      <?php
        if(isset($_POST['logout'])){
          unset($_SESSION['auth']);
          header('location: '.url('login.php'));
        }
      ?>
      <form method="post" class="d-none" id="form-logout">
        <input type="hidden" name="logout">
      </form>
    </ul>
  </div>
</nav>
