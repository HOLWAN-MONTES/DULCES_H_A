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
<!-- tipo de porducto -->
<?php
    $sql = "SELECT * FROM tipo_producto  ORDER BY nom_tip_product ASC";
    $queryl = mysqli_query($mysqli, $sql);
    $fila = mysqli_fetch_assoc($queryl);
?>
<!-- marca  de dulces -->
<?php
    $sqlm = "SELECT * FROM marca_dulces ORDER BY nom_marca ASC";
    $querym = mysqli_query($mysqli, $sqlm);
    $fila = mysqli_fetch_assoc($querym);
?>

<!-- sabor  de dulces -->
<?php
    $sqls = "SELECT * FROM sabor ORDER BY nom_SABOR ASC ";
    $querys = mysqli_query($mysqli, $sqls);
    $fila = mysqli_fetch_assoc($querys);
?>

<!-- sabor  de dulces -->
<?php
    $sqld = "SELECT * FROM tipo_dulces ORDER BY nom_tip_dulces ASC ";
    $queryd = mysqli_query($mysqli, $sqld);
    $fila = mysqli_fetch_assoc($queryd);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Merienda:wght@700&family=Special+Elite&display=swap"
        rel="stylesheet">
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
                <li><a href="../users/admin.php">INICIO</a></li>
                <li><a href="../html/buscarProduc.php">ACTIVIDAD</a></li>
                <li><a href="../html/crearDO.php">CREAR EMPLEADO</a></li>
                <li><a style="background:white;color:black;" href="">ASIGNAR FECHA DE VENCIMIENTO</a></li>
            </ul>
        </div>
    </header>
  
    <main>

        <div class="contCrearProduct">
            <h1>REGISTRAR PRODUCTO</h1>


            <form method="POST" action="../php/crearProduct.php" autocomplete="off">
                <div class="contenedora">
                    <div class="primeraa">
                        <!--numreferencia INPUT-->
                        <div class="adsa">
                            <label class="label" for="username">NUMERO DE REFERENCIA </label>
                            <input class="inpu" type="number" name="numref" required pattern="{1,25}" title="TAMAÑO MINIMO 1, MAXIMO 25">

                        </div>

                        <!--tip_producto INPUT-->
                        <div class="adsa">
                            <label class="label" for="tip_produc">TIPO DE PRODUCTO </label>
                            <select name="tip_produc" id="tip_produc" required>
                                <option>Seleccione el documento</option>
                                <?php
                                foreach ($queryl as $tip) : ?>

                                <option value="<?php echo $tip['id_tip_producto']; ?> ">
                                    <?php echo $tip['nom_tip_product']; ?>
                                </option>
                                <?php
                             endforeach;
                            ?>

                            </select>
                        </div>

                        <!--MARCA INPUT-->
                        <div class="adsa">
                            <label class="label" for="marca">MARCA</label>
                            <select name="marca" id="marca" required>
                                <option>SELECCIONE LA MARCA DEL PRODUCTO</option>

                                <?php
                                foreach ($querym as $tipm) : ?>

                                <option required value="<?php echo $tipm['id_marca'] ?> ">
                                    <?php echo $tipm['nom_marca'] ?>
                                </option>
                                <?php
                             endforeach;
                            ?>

                            </select>
                        </div>
                        <!--sabor INPUT-->
                        <div class="adsa">
                            <label class="label" for="sabor">SABOR</label>
                            <select name="sabor" id="sabor" required>
                                <option>SELECCIONE LA sabor DEL PRODUCTO</option>

                                <?php
                                foreach ($querys as $tips) : ?>

                                <option required value="<?php echo $tips['id_sabor'] ?> ">
                                    <?php echo $tips['nom_sabor'] ?>
                                </option>
                                <?php
                             endforeach;
                            ?>

                            </select>
                        </div>

                    </div>

                    <div class="segundaa">
                                  <!--precio INPUT-->
                                  <div class="adsa">
                            <label class="label" for="precio">PRECIO </label>
                            <input class="inpu" name="precio" type="number" id="precio" required>
                        </div>
 
                    
                    <!--tip dulces INPUT-->
                        <div class="adsa">
                            <label class="label" for="tip_dulces">TIPO DE DULCES</label>
                            <select name="tip_dulces" id="tip_dulces" required>
                                <option>SELECCIONE EL TIPO DE DULCES </option>

                                <?php
                                foreach ($queryd as $tipd) : ?>

                                <option required value="<?php echo $tipd['id_tip_dulces'] ?> ">
                                    <?php echo $tipd['nom_tip_dulces'] ?>
                                </option>
                                <?php
                             endforeach;
                            ?>

                            </select>
                        </div>
          

                        <!--FECHA INPUT-->
                        <div class="adsa">
                            <label class="label" for="fechav">FECHA DE VENCIMIENTO</label>
                            <input type="date" name="fechav" id="fechav" required>
                        </div>
                       

                      
                    </div>
                </div>



                <input class="btn" type="submit" name="inicio" id="inicio" value="CREAR PRODUCTO"> <br>

            </form>
        </div>

    </main>

</body>

</html>