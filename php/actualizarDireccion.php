<?php

require_once("../connection/connection.php");
$direccion = $_POST['direccion'];   


    
    $sqls = "SELECT * FROM factura ORDER BY factura.documento DESC LIMIT 1";
    $querys = mysqli_query($mysqli, $sqls);
    $fila = mysqli_fetch_assoc($querys);
    
    $id_fac = $_SESSION['id_fac'] = $fila['id_fac'];
  
        
    $actuDireccion ="UPDATE factura SET direccion = '$direccion' WHERE factura.id_fac = $id_fac";
    $resultadoD = mysqli_query($mysqli,$actuDireccion);

    if($resultadoD){
        echo 1;
    }else{
        echo 2;
    }

?>