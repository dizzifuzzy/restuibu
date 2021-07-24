<?php
session_start();
error_reporting(0);
$servertim = 'localhost'; // e.g 'localhost' or '192.168.1.100'
$usertim   = 'root'; // username database
$passtim   = ''; // password database
$dbtim   = 'restu_ibu'; // nama database
$conn = new mysqli($servertim, $usertim, $passtim, $dbtim);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}
?>