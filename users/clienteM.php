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

        <div class="menu">
            <ul>
                <li><a href="">INICIO</a></li>
                <li id="boton"><a id="boton" href="">CATALOGO DE PRODUCTOS</a></li>
                <li><a href="">GENERAR COMPRA</a></li>
            </ul>
        </div>
    </header>
    <div class="texto" id="texto">
    <p>BIENVENIDO CLIENTE <?= $_SESSION['nombre']?></p>
    <br>
    <a href="../php/cerrar.php">cerrar aplicacion</a>
    </div>
   


    <div id="contenedor2" class="contenedor2">

        <p class="titulo2">PRODUCTOS TRULULU</p>
        <div class="tarjetas">
            <div class="card">
                <img  src="../img/trululu1.PNG" alt="">
                <h4>Trululu Snacks Aros/Caja x 12 Bolsas</h4><br>
                <p>Aros de gomita aciditos, doble sabor frutal. </p>
                <br>
                <h2>$ 14,900</h2><br>

                <div class="contador">
                    <input type="number" name="" value="1" id="contador">
                    <a href="" title="Agregar al carrito" class="btn" >Agregar</a>
                </div>

            </div>
            <div class="card">
                <img  src="../img/trululu2.PNG" alt="">
                <h4>Trululu Snacks Casquitos/Caja x 12 Bolsas</h4><br>
                <p>Deliciosos casquitos de gomita sabor a mandarina con vitamina C</p>
                <br>
                <h2>$ 14,900</h2><br>

                <div class="contador">
                    <input type="number" name="" value="1" id="contador">
                    <a href="" title="Agregar al carrito" class="btn" >Agregar</a>

                </div>

            </div>
            <div class="card">
                <img src="../img/trululu3.PNG" alt="">
                <h4>Trululu Snacks Dinos/Caja x 12 bolsas</h4><br>
                <p>Increíbles dinosaurios de gomita. Puedes compartirlos, ¡o comértelos solo!</p>
                <br>
                <h2>$ 14,900</h2><br>

                <div class="contador">
                    <input type="number" name="" value="1" id="contador">
                    <a href="" title="Agregar al carrito" class="btn" >Agregar</a>

                </div>

            </div>
        </div>

        <p class="titulo2">PRODUCTOS BARRILETE</p>
        <div class="tarjetas">
            <div class="card">
                <img  src="../img/barri1.PNG" alt="">
                <h4>Piñata Surtida Super 1.000 gr</h4><br>
                <p>Las marcas preferidas por los consumidores en un solo surtido de gomitas y 
                    caramelos masticables: Trululu aros, Barrilete,
                     Lokiño surtido, Bianchi chocolate blanco, Bianchi chocolate de leche </p>
                <br>
                <h2>$ 11,900</h2><br>

                <div class="contador">
                    <input type="number" name="" value="1" id="contador">
                    <a href="" title="Agregar al carrito" class="btn" >Agregar</a>

                </div>

            </div>
            <div class="card">
                <img  src="../img/barri2.PNG" alt="">
                <h4>Barrilete/Bolsa x 40 Unidades</h4><br>
                <p>Barra masticable con sabor original a barrilete, con su mágico tricolor de siempre 
                    . Ahora con 50% mas contnido por barra .</p>
                <br>
                <h2>$ 6,500</h2><br>

                <div class="contador">
                    <input type="number" name="" value="1" id="contador">
                    <a href="" title="Agregar al carrito" class="btn" >Agregar</a>

                </div>

            </div>
            <div class="card">
                <img src="../img/barri3.PNG" alt="">
                <h4>Bombón Barrilete/Bolsa x 24 Unidades</h4><br>
                <p>el sabor único del barrilete de siempre, en un bombón con relleno de chicle.
                Estos deliciosos bombones son perfectos para decorar cualquier mesa de dulces.</p>
                <br>
                <h2>$ 5,900</h2><br>

                <div class="contador">
                    <input type="number" name="" value="1" id="contador">
                    <a href="" title="Agregar al carrito" class="btn" >Agregar</a>

                </div>

            </div>
        </div>

        <p class="titulo2">PRODUCTOS OKA LOKA</p>
        <div class="tarjetas">
            <div class="card">
                <img  src="../img/okaloka1.PNG" alt="">
                <h4>Oka Loka Ovnis Frutos Rojos/Display x 12 Unidades</h4><br>
                <p>Divertidos ovnis masticables con sabores rojos de otros mundos. </p>
                <br>
                <h2>$ 5,900</h2><br>

                <div class="contador">
                    <input type="number" name="" value="1" id="contador">
                    <a href="" title="Agregar al carrito" class="btn" >Agregar</a>

                </div>

            </div>
            <div class="card">
                <img  src="../img/okaloka2.PNG" alt="">
                <h4>Oka Loka Caramelo Revolcón/Bolsa x 50 Unidades</h4><br>
                <p>El caramelo masticable más ácido de la galaxia Oka Loka , ¡Ahora en presentación individual!.</p>
                <br>
                <h2>$ 4,500</h2><br>

                <div class="contador">
                    <input type="number" name="" value="1" id="contador">
                    <a href="" title="Agregar al carrito" class="btn" >Agregar</a>

                </div>

            </div>
            <div class="card">
                <img src="../img/okaloka3.PNG" alt="">
                <h4>Oka Loka Unicornio Barra Masticable/Bolsa x 24 Unidades</h4><br>
                <p>El Unicornio más diferente y divertido de la galaxia Oka Loka ha
                 llegado con un increíble sabor y además stickers coleccionables!.</p>
                <br>
                <h2>$ 3,900</h2><br>

                <div class="contador">
                    <input type="number" name="" value="1" id="contador">
                    <a href="" title="Agregar al carrito" class="btn" >Agregar</a>

                </div>

            </div>
        </div>
    </div>
    <script src="../javasCript/main.js"></script>

</body>
</html>

