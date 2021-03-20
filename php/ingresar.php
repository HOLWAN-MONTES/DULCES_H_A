<?php
    require '../connection/connection.php';   
    session_start();
            $documento = $_POST["documento"];
            $clave = $_POST["clave"];
            
                $consul = "SELECT * FROM usuario WHERE documento = '$documento'  and clave = '$clave'";
                $query=mysqli_query($mysqli,$consul);
                $fila = mysqli_fetch_assoc($query);


                        if($fila){
                            $_SESSION['tip_usu'] = $fila['tip_usu'];
                            $_SESSION['nombre'] = $fila['nombre'];
                            $_SESSION['apellido'] = $fila['apellido'];
                            $_SESSION['	edad'] = $fila['telefono'];
                            $_SESSION["documento"] = $fila["documento"];
                         
                                if($_SESSION["tip_usu"] == 1 ){

                                    header("location: ../users/admin.php");
                                    exit();
                                }
                                elseif($_SESSION["tip_usu"] == 2 ){
                                    header("location: ../users/clienteM.php");
                                    exit();
                                }elseif($_SESSION["tip_usu"] == 3){
                                    header("location: ../users/domiciliario.php");
                                }else{
                                    header("location: ../index.html");
                                    }         
                                
                        } else{
                            
                            echo'<script type="text/javascript">
                                            alert("Documento y/o contraseña incorrecta, por favor revise los datos ingresados");
                                            window.location.href="../index.html";
                                </script>';
                         
                             
                        }  
                                                

?>     