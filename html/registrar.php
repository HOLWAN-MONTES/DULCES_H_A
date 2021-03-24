<?php
    require '../connection/connection.php';
?>


<!-- tipo de documento -->
<?php
    $sql = "SELECT * FROM tipo_documento";
    $query = mysqli_query($mysqli, $sql);
    $fila = mysqli_fetch_assoc($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INICIO SESION</title>
    <link rel="stylesheet" href="../css/registrarU.css">
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Merienda:wght@700&family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../img/LOGOL.png" type="image/x-icon">
</head>

<body>

    <div class="login-box">
        <img src="../img/LOGOL.png" class="avatar" alt="avatar img">
        <div class="inicioSesion" id="inicioSesion">
            <h1>REGISTRATE</h1>

            <form method="POST" id="form1" action="../php/registrarusu.php" autocomplete="off">
                <div class="contenedor">
                    <div class="primera">
                            <!--USERNAME INPUT-->
                        <div class="ads">
                            <label for="username">DOCUMENTO</label>
                            <input  type="text" name="documento"  id="usuario" required pattern="[0-9]{9,12}" title="SOLO números. Tamaño mínimo: 9. Tamaño máximo: 12">

                        </div>    
                       
                        <!--tip_usu INPUT-->
                        <div class="ads">
                            <label for="tip_docu">TIPO DE DOCUMENTO </label>
                            <select name="tip_docu" id="tip_docu" required>   
                            <option >Seleccione el documento</option>                             
                            <?php
                                foreach ($query as $tip) : ?>

                                <option required value="<?php echo $tip['tip_docu'] ?> "><?php echo $tip['nom_tip_docu'] ?> </option>
                            <?php
                             endforeach;
                            ?>
                    
                            </select>
                        </div>
                        
                        <!-- TIPO DE usuario -->
                        <input type="hidden" name="tip_usu" value="2">

                        <!--nombre INPUT-->
                        <div class="ads">
                            <label for="nombre">NOMBRE</label>
                            <input type="text" name="nombre" id="apellido" required pattern="[0-9]{9,12}" title="SOLO números. Tamaño mínimo: 9. Tamaño máximo: 12">
                        </div>
                          <!--apellido INPUT-->
                          <div class="ads">
                            <label for="password">APELLIDO</label>
                            <input type="text" name="apellido" id="apellido" required pattern="[0-9]{9,12}" title="SOLO números. Tamaño mínimo: 9. Tamaño máximo: 12" >
                        </div>
                
                    </div>
                
                    <div class="segunda">
                      
                        <!--PASSWORD INPUT-->
                        <div class="ads">
                            <label for="edad">EDAD</label>
                            <input type="text" name="edad" id="edad"  required pattern="[0-9]{1,2}" title="SOLO números. Tamaño mínimo: 1. Tamaño máximo: 2">   
                        </div>
                
                        <!--PASSWORD INPUT-->
                        <div class="ads">
                            <label for="telefono">TELEFONO</label>
                            <input type="text" name="telefono" id="telefono" required>
                        </div>
                
                        <!--PASSWORD INPUT-->
                        <div class="ads">
                            <label for="clave">CLAVE</label>
                            <input type="password" name="clave" id="clave" required>
                        </div>
                    </div> 
                </div>
              


                <input type="submit" name="inicio" id="inicio" value="REGISTRAR"> <br>
                <a href="../index.html">INICIAR SESION</a>
               
            </form>
        </div>

        
       
      
    </div>
    
</body>
</html>
