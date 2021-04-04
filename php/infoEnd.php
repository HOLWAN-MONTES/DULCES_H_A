<?php

require_once("../connection/connection.php");
session_start();

$documento= $_SESSION['documento'];
/* $id_factu= $_SESSION['id_fact']; */

$sqla = "SELECT * FROM factura WHERE documento = $documento order by fecha DESC LIMIT 1";
$querya = mysqli_query($mysqli, $sqla);
$filaa = mysqli_fetch_assoc($querya);
$idfa=$filaa['id_fac'];
$fechaF = $filaa['fecha'];
$hora = $filaa['hora'];
$direccion = $filaa['direccion'];


$sqls = "SELECT SUM(precio_agrupado) FROM detalle_de_factura WHERE id_fac=$idfa";
$querys = mysqli_query($mysqli, $sqls);
$filaD = mysqli_fetch_array($querys);

$agrupp =$filaD[0];

$actumonto ="UPDATE factura SET precio_total = '$agrupp' WHERE factura.id_fac = $idfa";
$resultadoD = mysqli_query($mysqli,$actumonto);



?>
<?php
    $sql = "SELECT detalle_de_factura.id_productos,marca_dulces.nom_marca,tipo_producto.nom_tip_product,precio_unitario,precio_agrupado,cantidad FROM detalle_de_factura,tipo_producto,marca_dulces,productos WHERE detalle_de_factura.id_productos=productos.id_productos and productos.id_tip_producto=tipo_producto.id_tip_producto and productos.id_marca=marca_dulces.id_marca and id_fac = $idfa";
    $queryl = mysqli_query($mysqli, $sql);
    $fila = mysqli_fetch_assoc($queryl);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/clienteM.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Merienda:wght@700&family=Special+Elite&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="../img/LOGOL.png" type="image/x-icon">

    <title>CLIENTE MAYORISTA</title>
</head>

<body class="content-infoend">

    <div class="contentFact">
        <div class="content">
            <h1>NUMERO DE FACTUA:</h1>
            <span>
                <?=$idfa?>
            </span>
        </div>
        <div class="content">
            <h1>DOCUMENTO:</h1>
            <span>
                <?=$documento?>
            </span>
        </div>
        <div class="content">
            <h1>FECHA:</h1>
            <span>
                <?=$fechaF?>
            </span>
        </div>
        <div class="content">
            <h1>HORA:</h1>
            <span>
                <?=$hora?>
            </span>
        </div>
        <div class="content">
            <h1>NOMBRE DEL REPARTIDOR:</h1>
            <span>nombre</span>
        </div>

        <div class="content">
            <h1>DIRECCION A ENVIAR:</h1>
            <span>
                <?=$direccion?>
            </span>
        </div>
        <div class="content">
            <h1>FECHA DE ENTREGA:</h1>
            <span>nombre</span>
        </div>
        <div class="content">
            <h1>HORA DE ENTREGA:</h1>
            <span>nombre</span>
        </div>

        <div class="content hooo">
            <h1>PRODUCTOS PEDIDOS:</h1>
            <table>
            <thead>
            <tr>
            <th>id producto</th>
            <th>marca</th>
            <th>producto</th>
            <th>precio unidad</th>
            <th>cantidad</th>
            <th>precio total</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <?php
            foreach($fila as $products){
                ?><td>$products["id_productos"]</td>
                <td>$products["nom_marca"]</td>
                <td>$products["nom_tip_product"]</td>
                <td>$products["precio_unitario"]</td>
                <td>$products["cantidad"]</td>
                <td>$products["precio_agrupado"]</td>
            <?php
            }
            ?>
            
            </tr>
            </tbody>
            </table>
            
            
           
         
        </div>


        <div class="content">
            <h1>PRECIO TOTAL:</h1>
            <span>
                <?=$agrupp?> $
            </span>
        </div>



    </div>

    <!-- the pretty -->

    <script src="../javasCript/main.js"></script>

    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>


</body>

</html>