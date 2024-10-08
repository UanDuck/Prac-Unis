<?php
include('php\conector.php');
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

    $consulta = "INSERT INTO registros(nomu, universidad, carrera, area) values('$nom','$uni','$car','$ar')";
    if ($conexion->query($consulta) == true) {
        header('location: index.php');
    } else {
        echo '<div class="resultado">';
        echo "Error: " . $consulta . '<br>' . $conexion->error;
        echo '</div>';
    }


}
$conexion->close();

?>