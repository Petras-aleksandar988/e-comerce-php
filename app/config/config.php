<?php 
 include 'config-template.php';
 $config= [

   'servername' => "localhost",
   'db_username' => "root" ,
   'db_password' => "" ,
   'database_name' => "shop" ,

 ];
$conn = mysqli_connect($config['servername'],
$config['db_username'],
$config['db_password'],
$config['database_name']);

if(!$conn){
  die("connection fail");
}