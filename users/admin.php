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


        <div class="pedido">

            <h1> PEDIDOS</h1>
            <table class="datos" style="border-collapse: collapse;border:1px solid red;width:1300px;">
                <tr class="nn">
                    <td>CODIGO DE FACTURA</td>
                    <td>DOCUMENTO DEL CLIENTE</td>
                    <td>NOMBRE DEL CLIENTE</td>
                    <td>APELLIDO DEL CLIENTE</td>
                    <td>DIRECCION DE ENVIO</td>
                    <td>DOCUMENTO DE DOMICILIARIO</td>
                    <td>NOMBRE DE DOMICILIARIO</td>
                    <td>PRECIO TOTAL</td>	
                    <td>FECHA DE PEDIDO</td>
                    <td>HORA DE PEDIDO</td>
                    <td>DIAS FALTANTES</td>

                </tr>

                <?php 
                $sql= "SELECT factura.id_fac,usuario.documento,usuario.nombre,usuario.apellido,factura.documento_RE,factura.direccion,factura.fecha,factura.hora,factura.precio_total FROM factura,usuario WHERE (factura.documento=usuario.documento)  order by fecha asc";
                $result=mysqli_query($mysqli,$sql);

                while($mostrar=mysqli_fetch_array($result )){
                    $fechaac = date ("Y-m-d");
                    $holaaa= date_create ($fechaac);
                    $ddd= $mostrar['fecha'];
                    $vencimiento = date_create($ddd);
                    $dias = date_diff($holaaa,$vencimiento);
                    $dia = $dias->format("%R%a dia");
                    ?>
                    <tr>
                        <td><?php echo $mostrar['id_fac'] ?></td>
                        <td><?php echo $mostrar['documento'] ?></td>
                        <td><?php echo $mostrar['nombre'] ?></td>
                        <td><?php echo $mostrar['apellido'] ?></td>
                        <td><?php echo $mostrar['direccion'] ?></td>
                        <td><?php echo $mostrar['documento_RE'] ?></td>

                    <?php
                    $domiciliario =  $mostrar['documento_RE'];
                    $consult = "SELECT nombre FROM usuario WHERE documento = '$domiciliario' ";
                    $resul=mysqli_query($mysqli,$consult);
                    $f = mysqli_fetch_assoc($resul);
                    ?>
                        <td><?php echo $f['nombre'] ?></td> 
                        <td><?php echo $mostrar['precio_total'] ?></td>
                        <td><?php echo $mostrar['fecha'] ?></td>
                        <td><?php echo $mostrar['hora'] ?></td>
                        <td><?php echo $dia ?></td>
                    </tr>	  
                <?php
                }   
                ?>
            </table>
        </div>
        
    </body>




</html>