<?php
   require_once("../connection/connection.php");
        $documento = $_POST['documento'];   echo '</br>';
        $id_productos = $_POST['id_productos'];echo '</br>';
        $nom_tip_product = $_POST['nom_tip_product'];echo '</br>';
        $nom_tip_dulces =$_POST['nom_tip_dulces'] ;echo '</br>';
        $nom_sabor =$_POST['nom_sabor'] ;echo '</br>';
        $nom_marca =$_POST['nom_marca'] ;echo '</br>';
        $precio = $_POST['precio'];echo '</br>';
        $fecha_vencimiento = $_POST['fecha_vencimiento'];echo '</br>';
        $numero_pedido = $_POST['numoer'];echo '</br>';

            $precioT = intval($precio);
            $numero_pedidoT = intval($numero_pedido);
            $total= $precioT * $numero_pedidoT;
            $total;
            

            /* HORA */
            $time = time();
            $fechaActual = date("Y-m-d ", $time);
            $hractual = ( date("H:i:s", $time));
            
            
            /*  */
            /* $sqls = "SELECT * FROM usuario ";
            $querys = mysqli_query($mysqli, $sqls);
            $fila = mysqli_fetch_assoc($querys); */
        
            



            $empleado = "SELECT * FROM usuario WHERE id_estado = 1 ";
            $query=mysqli_query($mysqli,$empleado);
            $fila = mysqli_fetch_assoc($query);

            if($fila){
                /* informacion del repartidor  */
                $documentore = $_SESSION['documento'] = $fila['documento']; 
                $_SESSION['tip_usu'] = $fila['tip_usu']; 
                $_SESSION['nombre'] = $fila['nombre'];
                $_SESSION['apellido'] = $fila['apellido'];
                $_SESSION['	edad'] = $fila['telefono'];
                $_SESSION["documento"] = $fila["documento"];
                /* ingresar a la factura  */
               
                    if( $numero_pedido != ""){


                        
                        
                        /* para mostrar la ultima factura del usuario que le muestre todos los pedidos */
                        $sqls = "SELECT * FROM factura WHERE documento = $documento order by fecha DESC LIMIT 1";
                        $querys = mysqli_query($mysqli, $sqls);
                        $filaD = mysqli_fetch_assoc($querys);
                        $id_fact = $_SESSION['id_fact'] = $filaD['id_fac'];
                        
                        

                        $consultab = "INSERT INTO detalle_de_factura (id_fac, id_productos, precio_unitario, precio_agrupado, cantidad) VALUES ('$id_fact', '$id_productos', '$precio', '$total', '$numero_pedidoT')";
                        $resultadoFb = mysqli_query($mysqli,$consultab);
                        

                        /* $total2 = $total */
                        
                        if($resultadoFb){
                            echo '<script> alert("AGREGADO AL CARRITO CORRECTAMENTE  "); </script>';
                            echo '<script>window.location="  ../php/compras.php"</script>'; 
                
                        }else{
                        
                            echo '<script> alert("ELIJA UN PRODUCTO PARA PODER HACER LA COMPRA "); </script>';
                            echo '<script>window.location="  ../php/compras.php"</script>'; 
                        
                        }
                    }else{
            
                        echo '<script> alert("ELIJA UN PRODUCTO PARA PODER HACER LA COMPRA "); </script>';
                        echo '<script>window.location="  ../php/compras.php"</script>'; 
                    }
             


            }else{
                    echo '<script> alert("NO HAY REPARTIDORES DISPONIBLES  "); </script>';
                    echo '<script>window.location="  ../php/compras.php"</script>';    
            }
           

?>