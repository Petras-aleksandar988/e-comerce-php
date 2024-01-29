<?php 
 include 'config-template.php';

$conn = mysqli_connect($config['servername'],
$config['db_username'],
$config['db_password'],
$config['database_name']);

if(!$conn){
  die("connection fail");
}