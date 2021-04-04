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
$fechaen = $filaa['fecha_entrega'];
$documentoR = $filaa['documento_RE'];

$sqls = "SELECT SUM(precio_agrupado) FROM detalle_de_factura WHERE id_fac=$idfa";
$querys = mysqli_query($mysqli, $sqls);
$filaD = mysqli_fetch_array($querys);

$agrupp =$filaD[0];

if($agrupp == ''){
    echo '<script> alert("NO HAS ELEGIDO NADA PARA COMPRAR"); </script>';
    echo '<script>window.location="  ../php/compras.php"</script>';
}


$actumonto ="UPDATE factura SET precio_total = '$agrupp' WHERE factura.id_fac = $idfa";
$resultadoD = mysqli_query($mysqli,$actumonto);




$consult = "SELECT nombre FROM usuario WHERE documento = $documentoR  ";
$resul=mysqli_query($mysqli,$consult);
$f = mysqli_fetch_assoc($resul);
$nom = $f['nombre'];

?>
<?php
    $sql = "SELECT detalle_de_factura.id_productos,marca_dulces.nom_marca,tipo_producto.nom_tip_product,precio_unitario,precio_agrupado,cantidad FROM detalle_de_factura,tipo_producto,marca_dulces,productos WHERE detalle_de_factura.id_productos=productos.id_productos and productos.id_tip_producto=tipo_producto.id_tip_producto and productos.id_marca=marca_dulces.id_marca and id_fac = $idfa";
    $queryl = mysqli_query($mysqli, $sql);
    
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


<div>
    <form action="../users/clienteM.php" method="post"><button type="submit">REGRESAR</button></form>

</div>
    <div class="contentFact">

        <h1 class="ttl">FACTURA DE ENTREGA</h1>
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
            <span>
                <?=$nom?>
            </span>
        </div>

        <div class="content">
            <h1>DIRECCION A ENVIAR:</h1>
            <span>
                <?=$direccion?>
            </span>
        </div>
        <div class="content">
            <h1>FECHA DE ENTREGA:</h1>
            <span>
                <?=$fechaen?>
            </span>
        </div>
    
        <div class="content">
            <h1>PRECIO TOTAL:</h1>
            <span>
            $ <?=$agrupp?> 
            </span>
        </div>
        <div class=" hooo">
            <h1>PRODUCTOS PEDIDOS:</h1>
            <table class="aaa">
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
            
            <?php
                foreach($queryl as $pro){
            ?>
            <tr>
                <td><?=$pro["id_productos"]?></td>
                <td><?=$pro["nom_marca"]?></td>
                <td><?=$pro["nom_tip_product"]?></td>
                <td><?=$pro["precio_unitario"]?></td>
                <td><?=$pro["cantidad"]?></td>
                <td><?=$pro["precio_agrupado"]?></td>
            </tr> 
            <?php
            }
            ?>
            
            </tbody>
           
         
        </div>


        



    </div>

    <!-- the pretty -->

    <script src="../javasCript/main.js"></script>

    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>


</body>

</html>