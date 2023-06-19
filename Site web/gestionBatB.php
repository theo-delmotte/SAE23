<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./css/style.css">
    <title>Sélection des valeurs du bâtiment</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="log-admin.php">Administration</a></li>
                <li><a href="log-gestion.php">Gestion</a></li>
                <li><a href="consultation.php">Consultation</a></li>
                <li><a href="gestion-projet.php">Gestion de projet</a></li>
            </ul>
        </nav>
    </header>
    <h2> Batiment B </h2>
    <script>
 
        // Fonction pour créer un graphique Canva
        function createChart(labels, data, metricName) {
            var ctx = document.getElementById(metricName).getContext('2d');
            var chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: metricName,
                        data: data,
                        backgroundColor: 'rgba(0, 123, 255, 0.2)',
                        borderColor: 'rgba(0, 123, 255, 1)',
                     
                       
                        
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,


                    scales: {
                        x: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Date'
                            }
                        },
                        y: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Value'
                            }
                        }
                    }
                }
            });
        }
    </script>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "admin1";
    $password_db = "passadmin1";
    $dbname = "SAE_23";

    // Connexion à la base de données
    $conn = new mysqli($servername, $username, $password_db, $dbname);
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Récupération des métriques disponibles
    $queryMetrics = "SELECT DISTINCT type FROM capteur";
    $resultMetrics = $conn->query($queryMetrics);

    // Vérification si des métriques existent
    if ($resultMetrics->num_rows > 0) {
        // Création du formulaire pour sélectionner la plage de temps
        echo '<form method="post" action="">';
        echo 'Plage de temps : ';
        echo '<input type="number" name="plage_temps" placeholder="Nombre de jours" required>';
        echo '<input type="submit" name="submit" value="Afficher">';
        echo '</form>';

        // Traitement du formulaire
        if (isset($_POST['plage_temps'])) {
            $plage_temps = $_POST['plage_temps'];

            // Date d'aujourd'hui
            $date_now = date('Y-m-d');

            // Date à X jours en arrière
            $date_start = date('Y-m-d', strtotime("-$plage_temps days"));

            // Tableau pour stocker les métriques et leurs données
            $metricsData = array();

            // Parcourir les métriques disponibles
            while ($rowMetrics = $resultMetrics->fetch_assoc()) {
                $metric = $rowMetrics['type'];

                // Récupération des données pour chaque métrique
                $queryData = "SELECT mesure.date, mesure.valeur
                            FROM mesure
                            INNER JOIN capteur ON mesure.ID_capteur = capteur.ID_capteur
                            WHERE capteur.ID_batiment = 82467 AND capteur.type = '$metric'
                            AND mesure.date BETWEEN '$date_start' AND '$date_now'";

                $resultData = $conn->query($queryData);

                // Tableaux pour stocker les données de chaque métrique
                $labels = array();
                $values = array();

                // Parcourir les données et les ajouter aux tableaux
                while ($rowData = $resultData->fetch_assoc()) {
                    $labels[] = $rowData['date'];
                    $values[] = $rowData['valeur'];
                }

                // Stocker les données de la métrique dans le tableau global
                $metricsData[$metric] = array(
                    'labels' => $labels,
                    'values' => $values
                );
            }

            // Affichage des statistiques (moyenne, minimum, maximum)
            echo '<h2>Statistiques :</h2>';
            foreach ($metricsData as $metric => $data) {
                $values = $data['values'];
                $count = count($values);
                $average = $count > 0 ? array_sum($values) / $count : 0;
                $minimum = $count > 0 ? min($values) : 0;
                $maximum = $count > 0 ? max($values) : 0;

                echo "<h3>Métrique : $metric</h3>";
                echo "Moyenne : $average<br>";
                echo "Minimum : $minimum<br>";
                echo "Maximum : $maximum<br>";

                // Créer le graphique Canva pour chaque métrique
                echo '<canvas id="' . $metric . '"></canvas>';
                echo '<script>';
                echo 'var labels = ' . json_encode($data['labels']) . ';';
                echo 'var values = ' . json_encode($data['values']) . ';';
                echo "createChart(labels, values, '$metric');";
                echo '</script>';
            }
        }
    } else {
        echo "<p>Aucune métrique trouvée.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
