<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/ayud.css">
</head>

<body>
<nav >
        <div class="nav">
            <a href="index.php">Inicio</a>
            <a href="votos.php">Votos</a>
            <a href="ayuda.php">Ayuda </a>
            <a href="ayuda.php"> Editar / Eliminar</a>
        </div>
    </nav>

    <div class="full">
        <h1>Registros</h1>
        <?php
        include("php/conector.php");
        if ($conexion->connect_error) {
            die('Hmmmmm esta mal   ayuda php' . $conexion->connect_error);
        }

        $consulta = "select idu, nomu, universidad, carrera, area from registros";
        $registros = $conexion->query($consulta);
        echo '<div class="formulario">';
        echo '<table>';
        echo '<tr>';
        echo '<th> </th>';
        echo '<th>' . 'Nombre' . '</th>';
        echo '<th>' . 'Universidad' . '</th>';
        echo '<th>' . 'Carrera' . '</th>';
        echo '<th>' . 'Area' . '</th>';
        echo '<th>' . 'Actualizar  Eliminar' . '</th>';
        echo '</tr>';
        while ($reg = mysqli_fetch_array($registros)) {
            $idu = $reg['idu'];
            echo '<td>';
            echo '';
            echo '';
            echo '<td>' . $reg['nomu'] . '</td>';
            echo '<td>' . $reg['universidad'] . '</td>';
            echo '<td>' . $reg['carrera'] . '</td>';
            echo '<td>' . $reg['area'] . '</td>';


            echo '<td><a href="actualizar.php?idu=' . $idu . '"><img style="height: 33px;" src="img/refresh.png" alt="actualizar"</a>';
            echo "     ";
            echo '<a href="#"  onclick=eliminar(' . $idu . ')><img style="height: 33px;" src="img/trash.png" alt="delete"</a></td>';
            echo '</tr>';
        }
        echo "</table>";
        echo "</div>";
        ?>
    </div>
</body>
<script type="text/javascript">
    function eliminar(idu) {
        if (confirm('Estas seguro de eliminar este registro?')) {
            location.href = "elimina.php?idu=" + idu;
        }
    }
</script>

</html>