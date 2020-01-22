<?php
$hostname = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'uts_perpus';

$conn = mysqli_connect($hostname, $username, $password, $database) or die('connection error.');
