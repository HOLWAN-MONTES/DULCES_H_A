<?php
    session_start();
    $documento =$_SESSION["documento"];
    if ($documento == "" || $documento == null) {
        header("location: ../index.html");
    }
    require '../connection/connection.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   hola domiciliario <?= $_SESSION['nombre']?> <br>
    <a href="../php/cerrar.php">cerrar aplicacion</a>
</body>
</html>