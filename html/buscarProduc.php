<?php
    require '../connection/connection.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INICIO SESION</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Merienda:wght@700&family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../img/LOGOL.png" type="image/x-icon">
</head>

<body>

    <header>
        <div class="content-img">
            <img class="img-logo" src="../img/LOGOL.png" alt="">
        </div>

        <div class="menu">
            <ul>
                <li><a href="../users/admin.php">INICIO</a></li>
                <li><a href="buscarProduc.php">ACTIVIDAD</a></li>
                <li><a href="crearDO.php">CREAR EMPLEADO</a></li>
            </ul>
        </div>
    </header>

    <div id="buscarproducto" class="buscarproducto" >
        <form  class="form1" method="post" name="form1" id="form1" autocomplete="off">
            <br>
            <h1>CONSULTAR PRODUCTO</h1>


            <div class= "buscaproduct">
                <label for="tipo" class= "formulario" >CODIGO DE PRODUCTO:</label><br>     
                <input class="codigo" type="number" id="id_producto" name="id_producto">
            </div>
            <br>           
            <br>

            <input id="boton" type="submit" name="iniciar" value="consultar">
            <input id="boton" type="hidden" name="MM_consulta" value="form1"/>

                  
        </form>      
              
    </div>

</body>

<?php

if ((isset($_POST["MM_consulta"])) && ($_POST["MM_consulta"] == "form1"))
{
    
    $id_producto = $_POST["id_producto"];

    if( $_POST['id_producto'] == "" )
    {
                echo '<script>alert ("Campos vacios no ingreso  todos los datos");</script>';
                echo '<script>window.location="buscarProduc.php"</script>';
    }     
    else

    {  $consultasql = "SELECT productos.id_productos,tipo_producto.nom_tip_product,tipo_dulces.nom_tip_dulces,sabor.nom_sabor,marca_dulces.nom_marca, productos.precio, productos.fecha_vencimiento FROM productos,tipo_dulces,tipo_producto,sabor,marca_dulces WHERE productos.id_productos = '$id_producto' AND tipo_producto.id_tip_producto = productos.id_tip_producto AND tipo_dulces.id_tip_dulces = productos.id_tip_dulces AND sabor.id_sabor = productos.id_sabor AND marca_dulces.id_marca =productos.id_marca";
        $sql = mysqli_query($mysqli ,$consultasql); 
        $info = mysqli_fetch_assoc($sql);

        if ($info) {
            echo('
                <div class="consulta">
                    <h1>DATOS DEL PRODUCTO</h1>
                    <table>
                        <td>codigo de producto: </td>
                        <td>'.$info["id_productos"].'</td>
                        </tr>
                        <td> nombre : </td>
                        <td>'.$info["nom_tip_product"].'</td>
                        </tr>
                        <td>TIPO de dulce: </td>;
                        <td>'.$info["nom_tip_dulces"].'</td>
                        </tr>
                        <td> sabor: </td>
                        <td>'.$info["nom_sabor"].'</td>
                        </tr>
                        <td>Marca: </td>
                        <td>'.$info["nom_marca"].'</td> 
                        </tr>
                        <td>precio: </td>
                        <td>'.$info["precio"].'</td> 
                        </tr>
                        <td> fecha de vencimiento: </td>
                        <td>'.$info["fecha_vencimiento"].'</td> 
                    </table>
                </div>  
                        
            ');        
        }
    }

}
?>