# Aplikasi Haiiyu perpus
Aplikasi ini bertujuan untuk mempermudah dalam pencatatan peminjaman, dan melihat list buku yang tersisa tinggal berapa

## Cara install aplikasi
1. buat database dengan nama "uts_perpus" (tanpa tanda kutip)
2. import database.sql
3. setting koneksi di app/connection.php

## Cara setting koneksi
```
$hostname = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'uts_perpus';
```
> Jika file app/connection.php tidak ada, maka copy `connection.example.php` lalu rename jadi `connection.php`
