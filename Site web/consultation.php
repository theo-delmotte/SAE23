<!DOCTYPE html>
<html>
<head>
    <title>Consultation des dernières valeurs de capteurs</title>
</head>
<link rel="stylesheet" href="./css/style.css">
<body>
<header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="log-admin.php">Administration</a></li>
                <li><a href="log-gestion.php">Gestion</a></li>
             
                <li><a href="gestion-projet.php">Gestion de projet</a></li>
            </ul>
        </nav>
    </header>
    <h1>Consultation des dernières valeurs de capteurs</h1>
</br>
    <?php
// Étape 1 : Établir une connexion à la base de données
$servername = "localhost";
$username = "admin1";
$password_db = "passadmin1";
$dbname = "SAE_23";

$conn = new mysqli($servername, $username, $password_db, $dbname);
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Étape 2 : Récupérer la dernière valeur de chaque capteur pour tous les bâtiments
$query = "SELECT c.nom AS capteur_nom, c.type AS capteur_type, m.date, m.heure, m.valeur, b.nom AS batiment_nom, b.login
          FROM capteur AS c
          INNER JOIN batiment AS b ON c.ID_batiment = b.ID_batiment
          INNER JOIN mesure AS m ON c.ID_capteur = m.ID_capteur
          INNER JOIN (
              SELECT MAX(ID_mesure) AS last_measure, ID_capteur
              FROM mesure
              GROUP BY ID_capteur
          ) AS last ON m.ID_mesure = last.last_measure AND c.ID_capteur = last.ID_capteur
          GROUP BY c.ID_capteur
          ORDER BY b.nom";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Étape 3 : Afficher les résultats
    $current_batiment = "";
    while ($row = $result->fetch_assoc()) {
        $capteur_nom = $row['capteur_nom'];
        $capteur_type = $row['capteur_type'];
        $date = $row['date'];
        $heure = $row['heure'];
        $valeur = $row['valeur'];
        $batiment_nom = $row['batiment_nom'];
        $login = $row['login'];

        // Vérifier si le bâtiment a changé
        if ($current_batiment != $batiment_nom) {
            $current_batiment = $batiment_nom;
            echo "<h3>Bâtiment : $batiment_nom (Login : $login)</h3>";
        }

        // Afficher les informations de la dernière mesure
        echo "<p>Capteur : $capteur_nom (Type : $capteur_type)</p>";
        echo "<p>Date : $date</p>";
        echo "<p>Heure : $heure</p>";
        echo "<p>Valeur : $valeur</p>";
        echo "<hr>";
        
    }
    
} else {
    echo "Aucun résultat trouvé.";
}

$conn->close();
?>






</body>
</html>
