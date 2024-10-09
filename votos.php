<?php
$conexion = mysqli_connect('localhost', 'root', '', 'unii');
// Check connection
if ($conexion->connect_error) {
    die("Conexion fallida, archivo votos php: " . $conn->connect_error);
}
$consPel = $conexion->query(" select universidad, count(universidad) votos from registros group by universidad");
$consAct = $conexion->query(" select carrera, count(carrera) votos from registros group by carrera");
$consAr = $conexion->query(" select area, count(area) votos from registros group by area");
$conexion->close();

// Convertir los resultados a arrays
$peliAr = array();
while ($row = $consPel->fetch_assoc()) {
    $peliAr[] = $row;
}

$actorAr = array();
while ($row = $consAct->fetch_assoc()) {
    $actorAr[] = $row;
}

$areaAr = array();
while ($row = $consAr->fetch_assoc()) {
    $areaAr[] = $row;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Ayuda</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<nav class="nav">
        <div>
            <a href="index.php">Inicio</a>
            <a href="votos.php">Votos</a>
            <a href="ayuda.php">Ayuda</a>
            <a href="ayuda.php">Editar o Eliminar</a>
        </div>
    </nav>

    <div class="full" style="background: #cbd6e9;">
        <h1>Graficas</h1>
        <div class="grafica">
            <canvas id="pelicula-chart"></canvas>
        </div>
        <div class="grafica">
            <canvas id="actor-chart"></canvas>
        </div>
        
        <div class="grafica">
            <canvas id="area-chart"></canvas>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- agregamos la libreria -->
    <script>
        // Pelicula chart
        var peliculaChart = document.getElementById('pelicula-chart').getContext('2d');
        new Chart(peliculaChart, {
            type: 'pie',
            data: {
                labels: [
                    <?php
                    foreach ($peliAr as $row) {
                        echo "'" . $row['universidad'] . "', ";
                    }
                    ?>
                ],
                datasets: [{
                    label: 'Votos',
                    data: [
                        <?php
                        foreach ($peliAr as $row) {
                            echo round($row['votos']) . ", ";  //intente redondear a entero pero no puede, ni ocon intval, floor, round
                        }               //por un cosito que este mal ya no se muestra la grafica
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 3
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                fontColor: '#fff',
            }
        });



        // Actor chart
        var actorChart = document.getElementById('actor-chart').getContext('2d');
        new Chart(actorChart, {
            type: 'doughnut',
            data: {
                labels: [
                    <?php
                    foreach ($actorAr as $row) {
                        echo "'" . $row['carrera'] . "', ";
                    }
                    ?>
                ],
                datasets: [{
                    label: 'Votos',
                    data: [
                        <?php
                        foreach ($actorAr as $row) {
                            echo floor($row['votos']) . ", ";
                        }
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        ' rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 3
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                fontColor: '#fff',
            }
        });



        var areaChart = document.getElementById('area-chart').getContext('2d');
        new Chart(areaChart, {
            type: 'polarArea',
            data: {
                labels: [
                    <?php
                    foreach ($areaAr as $row) {
                        echo "'" . $row['area'] . "', ";
                    }
                    ?>
                ],
                datasets: [{
                    label: 'Votos',
                    data: [
                        <?php
                        foreach ($areaAr as $row) {
                            echo floor($row['votos']) . ", ";
                        }
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        ' rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 3
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                fontColor: '#fff',
            }
        });
    </script>
</body>

</html>