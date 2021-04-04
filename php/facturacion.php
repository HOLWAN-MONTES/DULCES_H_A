<?php
   require_once("../connection/connection.php");
   $documento = $_POST['documento'];   
   echo $id_productos = $_POST['id_productos'];
   $nom_tip_product = $_POST['nom_tip_product'];
   $nom_tip_dulces =$_POST['nom_tip_dulces'] ;
   $nom_sabor =$_POST['nom_sabor'] ;
   $nom_marca =$_POST['nom_marca'] ;
   $precio = $_POST['precio'];
   $fecha_vencimiento = $_POST['fecha_vencimiento'];
   $numero_pedido = $_POST['numoer'];

            $precioT = intval($precio);
            $numero_pedidoT = intval($numero_pedido);
            $total= $precioT * $numero_pedidoT;
            $total;
        

           /*  /* HORA */
            $time = time();
            $fechaActual = date("Y-m-d ", $time);
            $hractual = ( date("H:i:s", $time));
            
            
            /*  */
            /* $sqls = "SELECT * FROM usuario ";
            $querys = mysqli_query($mysqli, $sqls);
            $fila = mysqli_fetch_assoc($querys); 
        
            



            $empleado = "SELECT * FROM usuario WHERE id_estado = 1 ";
            $query=mysqli_query($mysqli,$empleado);
            $fila = mysqli_fetch_assoc($query);

            if($fila){
                /* informacion del repartidor  
                $documentore = $_SESSION['documento'] = $fila['documento']; 
                $_SESSION['tip_usu'] = $fila['tip_usu']; 
                $_SESSION['nombre'] = $fila['nombre'];
                $_SESSION['apellido'] = $fila['apellido'];
                $_SESSION['	edad'] = $fila['telefono'];
                $_SESSION["documento"] = $fila["documento"];
                /* ingresar a la factura  
               
                    if( $numero_pedido != ""){


                        
                        
                        /* para mostrar la ultima factura del usuario que le muestre todos los pedidos 
                        $sqls = "SELECT * FROM factura WHERE documento = $documento order by fecha DESC LIMIT 1";
                        $querys = mysqli_query($mysqli, $sqls);
                        $filaD = mysqli_fetch_assoc($querys);
                        $id_fact = $filaD['id_fac'];
                      
                        

                        $consultab = "INSERT INTO detalle_de_factura (id_fac, id_productos, precio_unitario, precio_agrupado, cantidad) VALUES ('$id_fact', '$id_productos', '$precio', '$total', '$numero_pedidoT')";
                        $resultadoFb = mysqli_query($mysqli,$consultab);
                        
                        
                        if($resultadoFb){
                            echo 1;
                
                        }else{
                        
                            echo 2;
                        
                        }
                    }else{
            
                        echo 3;
                    }
             


            }else{
                    echo '<script> alert("NO HAY REPARTIDORES DISPONIBLES  "); </script>';
                    echo '<script>window.location="  ../html/hacerCompra.php"</script>';    
            }
            */

?>