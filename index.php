<?php
  require 'app/autoload.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Haiiyu perpus</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?=asset('assets/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?=asset('assets/css/style.css')?>">
  <link rel="shortcut icon" href="favicon.png" type="image/png">
</head>
<body>
  <?php include 'resources/inc/navbar.php'; ?>

  <?php
    $content = isset($_GET['c']) ? $_GET['c'] : '';
    switch ($content) {
      // publisher
      case 'publisher':
        $title = 'Penerbit';
        include 'resources/publisher/index.php'; break;
      case 'publisher-create': 
        $title = 'Tambah penerbit';
        include 'resources/publisher/create.php'; break;
      case 'publisher-edit': 
        $title = 'Edit penerbit';
        include 'resources/publisher/edit.php'; break;

      // author
      case 'author': 
        $title = 'Pengarang';
        include 'resources/author/index.php'; break;
      case 'author-create': 
        $title = 'Tambah Pengarang';
        include 'resources/author/create.php'; break;
      case 'author-edit': 
        $title = 'Edit Pengarang';
        include 'resources/author/edit.php'; break;

      // member
      case 'member': 
        $title = 'Anggota';
        include 'resources/member/index.php'; break;
      case 'member-create': 
        $title = 'Tambah Anggota';
        include 'resources/member/create.php'; break;
      case 'member-edit': 
        $title = 'Edit Anggota';
        include 'resources/member/edit.php'; break;
      
      default:
        include 'resources/dashboard.php';
      break;
    }
  ?>

  <script src="<?=asset('assets/js/jquery.min.js')?>"></script>
  <script src="<?=asset('assets/js/bootstrap.min.js')?>"></script>
  <script src="<?=asset('assets/js/init.js')?>"></script>
</body>
</html>