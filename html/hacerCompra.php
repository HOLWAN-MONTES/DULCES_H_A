<?php
    require '../connection/connection.php';
?>

<?php
    session_start();
    $documento =$_SESSION["documento"];
    if ($documento == "" || $documento == null) {
        header("location: ../index.html");
    }
    require '../connection/connection.php';
?>
    <!--NUMOERO DE CEDULA  -->

<?php
    
        $sqls = "SELECT * FROM usuario ";
        $querys = mysqli_query($mysqli, $sqls);
        $fila = mysqli_fetch_assoc($querys);
    
?>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/clienteM.css">
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Merienda:wght@700&family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../img/LOGOL.png" type="image/x-icon">

    <title>CLIENTE MAYORISTA</title>
</head>
<body>
    <header>
        <div class="content-img">
            <img class="img-logo" src="../img/LOGOL.png" alt="">
        </div>
        <div class="titulo">
            <div style="color:white;font-size:30px;position:absolute;margin-top: -5%;margin-left:10%;">
                BIENVENIDO CLIENTE  <?= $_SESSION['nombre']?> <br>
            </div>
            <div style="color:white;position:absolute;margin-top: -5%;margin-left:80%;">
            <a style="text-decoration: none;color:white;" href="../php/cerrar.php">cerrar aplicacion</a>   
            </div>
            
        </div>
        <div class="menu">
            <ul>
                <li id="boton"><a id="boton" href="../users/clienteM.php">CATALOGO DE PRODUCTOS</a></li>
                <li id="boton"><a id="boton" href="productosPedidos.php">PRODUCTOS PEDIDOS</a></li>
                <li id="boton"><a id="boton" href="">HACER COMPRA</a></li>
                <a href=""><i class="icono fas fa-cart-arrow-down"></i></a>
                <span class="carrito" id="carrito"><?=$resultado ?></span>
            </ul>
        </div>
    </header>
  
<div class="tabla" id="tabla">

<h1> PROCUCTOS EN VENTA</h1>
    <table class="datos" style="border-collapse: collapse;width:900px;">
        <caption></caption>
		<tr class="nn hola">
			<td>CODIGO DE PRODUCTO</td>
			<td>NOMBRE</td>
			<td>TIPO DE PRODUCTO</td>
			<td>SABOR</td>
			<td>MARCA</td>	
            <td>PRECIO</td>	
            <td>FECHA DE VENCIMIENTO</td>
            <td>DIAS FALTANTES</td>
            <td>NUMERO DE PEDIDOS</td>
            <td>COMPRAR</td>


		</tr>

		<?php 
		$sql="SELECT  productos.id_productos,tipo_producto.nom_tip_product,tipo_dulces.nom_tip_dulces,sabor.nom_sabor,marca_dulces.nom_marca, productos.precio, productos.fecha_vencimiento FROM productos,tipo_dulces,tipo_producto,sabor,marca_dulces  WHERE tipo_producto.id_tip_producto = productos.id_tip_producto AND tipo_dulces.id_tip_dulces = productos.id_tip_dulces AND sabor.id_sabor = productos.id_sabor AND marca_dulces.id_marca =productos.id_marca order by fecha_vencimiento asc";
		$result=mysqli_query($mysqli,$sql);

		while($mostrar=mysqli_fetch_array($result)){
            $fechaac = date ("Y-m-d");
            $holaaa= date_create ($fechaac);
            $ddd= $mostrar['fecha_vencimiento'];
            $vencimiento = date_create($ddd);
            $dias = date_diff($holaaa,$vencimiento);
            $dia = $dias->format("%R%a dia");
            if($dia > 0){

            ?>
            <tr>
                <td><?php echo $id_pro = $mostrar['id_productos'] ?></td>
                <td><?php echo $mostrar['nom_tip_product'] ?></td>
                <td><?php echo $mostrar['nom_tip_dulces'] ?></td>
                <td><?php echo $mostrar['nom_sabor'] ?></td>
                <td><?php echo $mostrar['nom_marca'] ?></td>
                <td><?php echo $mostrar['precio'] ?></td>
                <td><?php echo $mostrar['fecha_vencimiento'] ?></td>
                <td <?php ?> ><?php echo $dia ?></td>
                <div style="display:none;">
                <form  id="form_todos_productos" method="POST">
                    <input type="hidden" name="documento" value=" <?= $_SESSION['documento']?>">
                    <input type="hidden" value="<?php echo $id_pro ?>" name="id_productos">
                    <input type="hidden" value="<?php echo $mostrar['nom_tip_product'] ?>" name="nom_tip_product">
                    <input type="hidden" value="<?php echo $mostrar['nom_tip_dulces'] ?>" name="nom_tip_dulces">
                    <input type="hidden" value="<?php echo $mostrar['nom_sabor'] ?>" name="nom_sabor">
                    <input type="hidden" value="<?php echo $mostrar['nom_marca'] ?>" name="nom_marca">
                    <input type="hidden" value="<?php echo $mostrar['precio'] ?>" name="precio">
                    <input type="hidden" value="<?php echo $mostrar['fecha_vencimiento'] ?>" name="fecha_vencimiento">
                    <td><input type="number" name="numoer" id="" placeholder="numero de pedido" ></td>
                    <td><button id="boton_todos_los_productos" type="submit">COMPRAR</button></td>
                </form>
                </div>

               
            </tr>
            <?php
            }
		 ?>	  
	<?php
	}   
	 ?>
	</table>
</div>

<form id ="factura" method="POST">
    <input type="hidden" name="documento" value=" <?= $_SESSION['documento']?>">
    <input type="hidden" value="<?php echo $id_pro ?>" name="id_productos">
    <input type="hidden" value="<?php echo $mostrar['nom_tip_product'] ?>" name="nom_tip_product">
    <input type="hidden" value="<?php echo $mostrar['nom_tip_dulces'] ?>" name="nom_tip_dulces">
    <input type="hidden" value="<?php echo $mostrar['nom_sabor'] ?>" name="nom_sabor">
    <input type="hidden" value="<?php echo $mostrar['nom_marca'] ?>" name="nom_marca">
    <input type="hidden" value="<?php echo $mostrar['precio'] ?>" name="precio">
    <input type="hidden" value="<?php echo $mostrar['fecha_vencimiento'] ?>" name="fecha_vencimiento">
    <input type="hidden" name="numoer" id="" value = 0 >
    <button type="buttom" class="btn-hacerfactura" id="btn-hacerfactura">crear factura</button>
                
</form>

<div class="direccion" id="direccion">

    <form id="form_direccion" method="post" class="hacerCompras">
        <label for="">DIRECCION A ENVIAR </label>
        <input  type="text" value="" name="direccion"  placeholder="DIGITA LA DIRECCIÓN" require>
        <button id="crearDireccion" class="BOTONeNVIAR" type="submit">CREAR</button>
    </form>



</div>


<script src="../javasCript/main.js"></script>
</body>