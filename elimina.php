<?php
$idu=$_GET['idu'];

include('php/conector.php');
if ($conexion->connect_error) {
    die('Hmmmmm esta mal elimina' . $conexion->connect_error);
} 

$consulta=mysqli_query($conexion,"delete from registros where idu='$idu'");

header('location: ayuda.php');

?>