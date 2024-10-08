<?php
$conexion = mysqli_connect('localhost', 'root', '', 'peli');
// Check connection
if ($conexion->connect_error) {
    die("Conexion fallida, archivo votos.php: " . $conexion->connect_error);
}
$consPel = $conexion->query("SELECT pelicula, COUNT(pelicula) AS votos FROM pref GROUP BY pelicula");
$consAct = $conexion->query("SELECT actor, COUNT(actor) AS votos FROM pref GROUP BY actor");
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
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Ayuda</title>
</head>

<body>
    <div style="color: white; padding: 5rem;" class="full">
        <h1 >si quieres ver mas tipos checa aqui y en el scrip cambia donde dice type: 'xxxxx'  <a href="https://www.chartjs.org/docs/latest/charts/area.html">Chart Types</a></h1>

        <div class="grafica">
            <h2>Gráfica de Pastel de Votos por Película</h2>
            <canvas id="pelicula-pie-chart"></canvas>
        </div>
        <div class="grafica">
            <h2>Gráfica de Pastel de Votos por Actor</h2>
            <canvas id="actor-pie-chart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- agregamos la libreria -->
    <script>
        // Gráfica de Pastel para Películas
        var peliculaPieChart = document.getElementById('pelicula-pie-chart').getContext('2d');
        new Chart(peliculaPieChart, {
            type: 'pie',  // Tipo de gráfica: pastel
            data: {
                labels: [
                    <?php
                    foreach ($peliAr as $row) {
                        echo "'" . $row['pelicula'] . "', ";
                    }
                    ?>
                ],
                datasets: [{
                    label: 'Votos',
                    data: [
                        <?php
                        foreach ($peliAr as $row) {
                            echo intval($row['votos']) . ", "; // Asegúrate de que sean enteros
                        }
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Distribución de Votos por Película'
                    }
                }
            }
        });

        // Gráfica de Pastel para Actores
        var actorPieChart = document.getElementById('actor-pie-chart').getContext('2d');
        new Chart(actorPieChart, {
            type: 'pie',  // Tipo de gráfica: pastel
            data: {
                labels: [
                    <?php
                    foreach ($actorAr as $row) {
                        echo "'" . $row['actor'] . "', ";
                    }
                    ?>
                ],
                datasets: [{
                    label: 'Votos',
                    data: [
                        <?php
                        foreach ($actorAr as $row) {
                            echo intval($row['votos']) . ", "; // Asegúrate de que sean enteros
                        }
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Distribución de Votos por Actor'
                    }
                }
            }
        });
    </script>
</body>

</html>
