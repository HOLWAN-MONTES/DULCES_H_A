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
    <link rel="stylesheet" href="../css/dimiciliario.css">
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Merienda:wght@700&family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../img/LOGOL.png" type="image/x-icon">

    
    <title>DOMICILIARIO</title>
</head>
<body>
    <header>
        <div class="content-img">
            <img class="img-logo" src="../img/LOGOL.png" alt="">
        </div>
        <div class="titulo">
            <div style="color:white;font-size:30px;position:absolute;margin-top: -5%;margin-left:10%;">
                BIENVENIDO REPARTIDOR <?= $_SESSION['nombre']?> <br>
            </div>
            <div style="color:white;position:absolute;margin-top: -5%;margin-left:80%;">
                <a style="text-decoration: none;color:white;" href="../php/cerrar.php">cerrar aplicacion</a>   
            </div>
                    
        </div>
        <div class="menu">
            <ul>
                <li><a href="../users/domiciliario.php">PEDIDOS PENDIENTES</a></li>
                <li><a  href="">PEDIDOS ENTREGADOS</a></li>

            </ul>
        </div>
    </header>


</body>
<div class="pedidoS">

    <h1> PEDIDOS PENDIENTES</h1>
    <table class="datos" style="border-collapse: collapse;border:1px solid red;width:1300px;">
        <tr class="nn">
            <td>CODIGO DE FACTURA</td>
            <td>CODIGO DE PRODUCTO</td>
            <td>NOMBRE DEL PRODUCTO</td>
            <td>TIPO DE PRODUCTO</td>
            <td>CANTIDAD</td>
            <td>PRECIO TOTAL</td>	
            <td>DOCUMENTO DEL CLIENTE</td>
            <td>NOMBRE DEL CLIENTE</td>
            <td>APELLIDO DEL CLIENTE</td>
            <td>DIRECCION DE ENVIO</td>
            <td>FECHA DE PEDIDO</td>
            <td>HORA DE PEDIDO</td>
            <td></td>


        </tr>

        <?php 

            $sql= "SELECT factura.id_fac,detalle_de_factura.id_productos,tipo_producto.nom_tip_product,tipo_dulces.nom_tip_dulces, detalle_de_factura.cantidad,factura.precio_total,usuario.documento,usuario.nombre,usuario.apellido,factura.direccion,factura.fecha,factura.hora FROM detalle_de_factura,productos,tipo_producto,tipo_dulces,factura,usuario WHERE (detalle_de_factura.id_fac=factura.id_fac AND detalle_de_factura.id_productos=productos.id_productos AND productos.id_tip_producto=tipo_producto.id_tip_producto AND factura.id_estado = 4 AND productos.id_tip_dulces=tipo_dulces.id_tip_dulces AND factura.documento=usuario.documento) AND (factura.documento_RE= $documento) order by id_fac asc";
            $result=mysqli_query($mysqli,$sql);

        while($mostrar=mysqli_fetch_array($result)){

            ?>
            <tr>
                <td><?php echo $mostrar[0] ?></td>
                <td><?php echo $mostrar[1] ?></td>
                <td><?php echo $mostrar[2] ?></td>
                <td><?php echo $mostrar[3] ?></td>
                <td><?php echo $mostrar[4] ?></td>
                <td><?php echo $mostrar[5] ?></td>
                <td><?php echo $mostrar[6] ?></td>
                <td><?php echo $mostrar[7] ?></td>
                <td><?php echo $mostrar[8] ?></td>
                <td><?php echo $mostrar[9] ?></td>
                <td><?php echo $mostrar[10] ?></td>
                <td><?php echo $mostrar[11] ?></td>
            </tr>
            <?php
            }
            ?>	  
        <?php  
        ?>
    </table>
</div>

</html>



