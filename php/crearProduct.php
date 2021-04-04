<?php
   require_once("../connection/connection.php");
            $numref = $_POST['numref'];
            $tip_produc = $_POST['tip_produc'];
            $marca = $_POST['marca'];
            $sabor =$_POST['sabor'] ;
            $tip_dulces =$_POST['tip_dulces'] ;
            $precio = $_POST['precio'];
            $fechav = $_POST['fechav'];
            
            
$produ = "SELECT * FROM productos ";
$query=mysqli_query($mysqli,$produ);
$fila = mysqli_fetch_array($query);

echo $fila;

/* 
            if($numref != "" &&  $tip_produc != "" && $marca != "" && $sabor != "" && $tip_dulces != "" && $precio != "" && $fechav != ""){
              
                $consultaF = "INSERT INTO productos(id_productos, id_tip_producto, id_marca, id_sabor, id_tip_dulces, precio, fecha_vencimiento) VALUES (' $numref ', '$tip_produc ', '$marca', '$sabor', '$tip_dulces', ' $precio', '$fechav')";
                $resultadoF = mysqli_query($mysqli,$consultaF);
               
                if($resultadoF){
                    echo '<script> alert("El PRODUCTO FUE REGISTRADO CON EXITO"); </script>';
                    echo '<script>window.location="  ../html/crearProducto.php"</script>';
                }else{
                    echo '<script> alert("EL NUMERO DE REFERENCIA YA ESTA CREADO "); </script>';
                    echo '<script>window.location="  ../html/crearProducto.php"</script>';
                }
            }else{
                echo '<script> alert("LLENE LOS CAMPOS CORRECTAMENTE  "); </script>';
                echo '<script>window.location="  ../html/crearProducto.php"</script>';
            }
                
 */
?>