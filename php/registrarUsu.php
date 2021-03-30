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
                
                if($tip_usu == 3){
                    $consultaF = "INSERT INTO usuario(documento, tip_docu, tip_usu, nombre, apellido, edad, telefono,clave,id_estado) VALUES ('$documento','$tip_docu', '$tip_usu','$nombre', '$apellido', '$edad', '$telefono', '$clave',1)";
                    $resultadoF = mysqli_query($mysqli,$consultaF);
                }elseif($tip_usu != 3){
                    $consultaF = "INSERT INTO usuario(documento, tip_docu, tip_usu, nombre, apellido, edad, telefono,clave) VALUES ('$documento','$tip_docu', '$tip_usu','$nombre', '$apellido', '$edad', '$telefono', '$clave')";
                    $resultadoF = mysqli_query($mysqli,$consultaF);
                }
                
                
               
                if($resultadoF){
                    if( $tip_usu == 2){
                        echo '<script> alert("El CLIENTE FUE REGISTRADO CON EXITO"); </script>';
                        echo '<script>window.location="  ../index.html"</script>';
                        
                    }elseif($tip_usu == 3 ){
                        echo '<script> alert("El EMPLEADO FUE REGISTRADO CON EXITO"); </script>';
                        echo '<script>window.location="  ../html/crearDO.php"</script>';
                        
                    }elseif($tip_usu == 1){
                        echo '<script> alert("El ADMINISTRADOR FUE REGISTRADO CON EXITO"); </script>';
                        echo '<script>window.location="  ../html/crearDO.php"</script>';
                    }
        
                }else{
                    if( $tip_usu == 2){
                        echo '<script> alert("VERIFICA QEU TUS DATOS ESTEN LLENOS CORRECTAMENTE "); </script>';
                        echo '<script>window.location="  ../index.html"</script>';
                        
                    }elseif($tip_usu == 3){
                        echo '<script> alert("VERIFICA QEU TUS DATOS ESTEN LLENOS CORRECTAMENTE "); </script>';
                        echo '<script>window.location="  ../html/crearDO.php"</script>';
                        
                    }
                    
                    
                
                }
            }else{
       
                echo 'llene los campos correctamente';
            }
                

?>