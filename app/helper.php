<?php

function str_random($length = 16){
  $str = '0123456789';
  $str .= 'abcdefghijklmnopqrstuvwxyz';
  $str .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

  return substr(str_shuffle(str_repeat($str, 5)), 0, $length);
}

function asset($url = ''){
  $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
  $base_url = $protocol.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
  $base_url .= $url;
  return $base_url;
}

function url($to = ''){
  $base_url = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
  $base_url .= $to;
  return $base_url;
}

// handle request
function post($name){
  return isset($_POST[$name]) ? $_POST[$name] : null;
}

function get($name){
  return isset($_GET[$name]) ? $_GET[$name] : null;
}

function antiInject($text){
  return stripcslashes(strip_tags($text));
}

function session_flash($name, $value){
  $_SESSION[$name] = $value;
}

function get_session_flash($name){
  $value = isset($_SESSION[$name]) ? $_SESSION[$name] : null;
  if(isset($_SESSION[$name])) unset($_SESSION[$name]);
  return $value;
}
