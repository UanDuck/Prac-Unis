<?php
include('php/conector.php');
if ($conexion->connect_error) {
    die('Hmmmmm esta mal registrar' . $conexion->connect_error);
} else {

    $nom = $_POST['nombre'];
    $uni = $_POST['univ'];
    $car = $_POST['carr'];
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
    
    if ($uni == 'N/A') {
        header('location: index.php?error=Debes llenar el campo Universidad');
        exit;
    } else {
        $consulta = "INSERT INTO registros(nomu, universidad, carrera, area) values('$nom','$uni','$car','$ar')";
        if ($conexion->query($consulta) == true) {
            header('location: index.php?exito=Registro exitoso');
            exit;
        } else {
            header('location: index.php?error=' . $conexion->error);
            exit;
        }
    }
}
$conexion->close();

?>