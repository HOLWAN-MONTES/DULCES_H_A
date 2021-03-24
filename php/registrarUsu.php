<?php
   require_once("../connection/connection.php");
            $documento = $_POST['documento'];
            $tip_docu = $_POST['tip_docu'];
            $tip_usu = $_POST['tip_usu'];
            $nombre =$_POST['nombre'] ;
            $apellido =$_POST['apellido'] ;
            $edad =$_POST['edad'] ;
            $telefono = $_POST['telefono'];
            $clave = $_POST['clave'];
            

            if($documento != "" &&  $tip_docu != "" && $tip_usu != "" && $nombre != "" && $edad != "" && $telefono != "" && $clave != "" && $apellido != ""){
              
                $consultaF = "INSERT INTO usuario(documento, tip_docu, tip_usu, nombre, apellido, edad, telefono,clave) VALUES ('$documento','$tip_docu', '$tip_usu','$nombre', '$apellido', '$edad', '$telefono', '$clave')";
                $resultadoF = mysqli_query($mysqli,$consultaF);
               
                if($resultadoF){
                    if( $tip_usu == 2){
                        echo '<script> alert("El CLIENTE FUE REGISTRADO CON EXITO"); </script>';
                        echo '<script>window.location="  ../index.html"</script>';
                        
                    }elseif($tip_usu == 3){
                        echo '<script> alert("El EMPLEADO FUE REGISTRADO CON EXITO"); </script>';
                        echo '<script>window.location="  ../html/crearDO.php"</script>';
                        
                    }
        
                }else{
                    
                    echo '<script> alert("VERIFICA QEU TUS DATOS ESTEN LLENOS CORRECTAMENTE "); </script>';
                    
                
                }
            }else{
       
                echo 'llene los campos correctamente';
            }
                

?>