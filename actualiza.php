<?php
include('php/conector.php');
if ($conexion->connect_error) {
    die('Hmmmmm esta mal php / actualiza' . $conexion->connect_error);
} 

    $idu = $_POST['idu'];
    $nom = $_POST['nomb'];
    $uni = $_POST['unive'];
    $car = $_POST['carreu'];

    $areas = [ //a esto se le llama array asociativo
        'Ingenieria en Computacion' => 'Ingenieria y Tecnologia',
        'Medicina' => 'Ciencias de la Salud',
        'Ingenieria Industrial' => 'Ingenieria y Tecnologia',
        'Ciencias de la Computacion' => 'Ingenieria y Tecnologia',
        'Psicologia' => 'Ciencias Sociales',
        'Ingenieria en Energia' => 'Ingenieria y Tecnologia',
        'Ingenieria Civil' => 'Ingenieria y Tecnologia',
        'Derecho' => 'Ciencias Sociales',
        'Ingenieria en Sistemas Computacionales' => 'Ingenieria y Tecnologia',
        'Contaduria Publica' => 'Ciencias Economicas y Administrativas'
    ];
    $ar = $areas[$car];


$consulta="UPDATE registros SET nomu='$nom', universidad='$uni', carrera='$car', area='$ar' where idu='$idu'";
$registros=$conexion->query($consulta);

header('location: ayuda.php');

?>