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

$time = time();
$fechaActual = date("Y-m-d ", $time);
$hractual = ( date("H:i:s", $time));





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
    

 
$fecha_actual = date("Y-m-d");
//sumo 1 día
 $hrs =date("Y-m-d",strtotime($fecha_actual."+ 3 days"));
        


            $consultaF = "INSERT INTO factura ( documento, fecha, documento_RE, hora, direccion, precio_total,id_estado,fecha_entrega) VALUES ( '$documento', '$fechaActual', '$documentore;', '$hractual', '', '0','3', '$hrs')";
            $resultadoF = mysqli_query($mysqli,$consultaF);

            $actuus ="UPDATE usuario SET id_estado = '2' WHERE usuario.documento =  $documentore;";
            $resultadoD = mysqli_query($mysqli,$actuus);
            if ($resultadoF) {
                echo 1;
              
            }else{
                echo 3;
            }


        


}else{
    echo 4;
}
?>



