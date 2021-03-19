<?php
  
  $hostname="localhost";
  $userName="root";
  $password= "";
  $database="dulces";
  $mysqli = new mysqli($hostname,$userName,$password,$database);

  if($mysqli ->connect_errno){
    die("fallo la conexion con la base de datos $database" . mysqli_connect_errno());
  }
?>