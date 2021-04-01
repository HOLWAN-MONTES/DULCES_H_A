<?php
   require_once("../connection/connection.php");
            $documento = $_POST['documento'];
            $id_productos = $_POST['id_productos'];
            $nom_tip_product = $_POST['nom_tip_product'];
            $nom_tip_dulces =$_POST['nom_tip_dulces'] ;
            $nom_sabor =$_POST['nom_sabor'] ;
            $nom_marca =$_POST['nom_marca'] ;
            $precio = $_POST['precio'];
            $fecha_vencimiento = $_POST['fecha_vencimiento'];
            $numero_pedido = $_POST['numoer'];

            /* HORA */
            $time = time();
            $fechaActual = date("Y-m-d ", $time);
            $hractual = ( date("H:i:s", $time));
            
            echo $documento;



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


                        $consultaF = "INSERT INTO factura ( documento, fecha, documento_RE, hora, direccion, precio_total) VALUES ( '$documento', '$fechaActual', '$documentore;', '$hractual', 'qqqqqqqq', '0')";
                        $resultadoF = mysqli_query($mysqli,$consultaF);
                        
                    
                        if($resultadoF){
                            echo  'salio todo bien'; 
                
                        }else{
                        
                            echo 'NO HA NADA';
                        
                        }
                    }else{
            
                        echo 'NO HA ELEGIDO NADA';
                    }
             


            }else{
                    echo '<script> alert("NO HAY REPARTIDORES DISPONIBLES  "); </script>';
                    echo '<script>window.location="  ../users/clienteM.php"</script>';    
            }
           

?>