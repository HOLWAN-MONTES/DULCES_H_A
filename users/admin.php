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
    <link rel="stylesheet" href="../css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Merienda:wght@700&family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../img/LOGOL.png" type="image/x-icon">

    <title>ADMIN</title>
</head>
<body>
    <header>
        <div class="content-img">
            <img class="img-logo" src="../img/LOGOL.png" alt="">
        </div>
        <div class="titulo">
            <div style="color:white;font-size:30px;position:absolute;margin-top: -5%;margin-left:10%;">
                BIENVENIDO ADMINISTRADOR  <?= $_SESSION['nombre']?> <br>
            </div>
            <div style="color:white;position:absolute;margin-top: -5%;margin-left:80%;">
            <a style="text-decoration: none;color:white;" href="../php/cerrar.php">cerrar aplicacion</a>   
            </div>
            
        </div>
        <div class="menu">
            <ul>
                <li><a style="background:black;"href="">INICIO</a></li>
                <li><a href="../html/buscarProduc.php">ACTIVIDAD</a></li>
                <li><a href="../html/crearDO.php">CREAR EMPLEADO</a></li>
                <li><a href="../html/crearProducto.php">CREAR PRODUCTO</a></li>
            </ul>
        </div>
    </header>
    <div class="titulo">
    </div>
    
    <main>
    </main>

    <footer>
    
    </footer>
</body>
</html>