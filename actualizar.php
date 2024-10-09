<?php
include('php/conector.php');
if ($conexion->connect_error) {
    die('Hmmmmm esta mal actualizar actualizaRRRRR php' . $conexion->connect_error);
}

$idu = $_GET['idu'];

$consulta = "select idu, nomu, universidad, carrera, area from registros where idu=$idu";
$registros = $conexion->query($consulta);
$reg = mysqli_fetch_array($registros);
$nombrec = $reg['nomu'];
$unic = $reg['universidad'];
$carrec = $reg['carrera'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/ayud.css">
</head>

<body>
    <nav>
    <div class="all-nav">
            <div class="links">
                <a href="index.php">Inicio</a>
                <a href="buscar.php">Buscar</a>
                <a href="ayuda.php">Ayuda Eliminar/Actualizar</a>
            </div>
        </div>
    </nav>

    <div class="full">
        <h1>Editar</h1>
        <div class="formulario">
            <form action="actualiza.php" method="post">
                <input type="hidden" name="idu" value="<?php echo $idu; ?>"><br><br>

                <label for="">Escribe tu Nombre</label>
                <input type="text" max="50" name="nomb" <?php echo "value='$nombrec'"; ?>><br><br><br>

                <label>¿Qué universidad prefieres?</label><br>
                <select name="unive" >
                    <option value="IPN" <?php if ($unic == "IPN") { echo 'selected'; } ?>>IPN</option>
                    <option value="UNAM" <?php if ($unic == "UNAM") { echo 'selected'; } ?>>UNAM</option>
                    <option value="UAM" <?php if ($unic == "UAM") { echo 'selected'; } ?>>UAM</option>
                    <option value="UAMex" <?php if ($unic == "UAMex") { echo 'selected'; } ?>>UAMex</option>
                </select><br><br><br>

                <label>¿En que carrea estas interesado/a?</label><br>
                <select name="carreu" id="">
                    <option value="Ingenieria en Computacion"  <?php if ($carrec == "Ingenieria en Computacion") { echo 'selected'; } ?> >Ingenieria en Computación</option>
                    <option value="Medicina" <?php if ($carrec == "Medicina") { echo 'selected'; } ?>>Medicina</option>
                    <option value="Ingenieria Industrial" <?php if ($carrec == "Ingenieria Industrial") { echo 'selected'; } ?>>Ingenieria Industrial</option>
                    <option value="Ciencias de la Computacion" <?php if ($carrec == "Ciencias de la Computacion") { echo 'selected'; } ?>>Ciencias de la Computacion</option>
                    <option value="Psicologia" <?php if ($carrec == "Psicologia") { echo 'selected'; } ?>>Psicologia</option>
                    <option value="Ingenieria en Energia" <?php if ($carrec == "Little") { echo 'selected'; } ?>>Ingenieria en Energia</option>
                    <option value="Ingenieria Civil" <?php if ($carrec == "Ingenieria Civil") { echo 'selected'; } ?>>Ingenieria Civil</option>
                    <option value="Derecho" <?php if ($carrec == "Derecho") { echo 'selected'; } ?>>Derecho</option>
                    <option value="Ingenieria en Sistemas Computacionales" <?php if ($carrec == "Ingenieria en Sistemas Computacionales") { echo 'selected'; } ?>>Ingenieria en Sistemas Computacionales
                    </option>
                    <option value="Contaduria Publica" <?php if ($carrec == "Contaduria Publica") { echo 'selected'; } ?>>Contaduria Publica</option>
                </select><br><br><br>

                <input type="submit" value="Guardar">
            </form>
        </div>

    </div>
</body>

</html>