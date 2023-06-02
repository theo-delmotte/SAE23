<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon site web</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
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

    <main>
        <!-- Page de consultation -->
       
            <h2>Consultation</h2>
            <!-- Contenu de la page consultation -->
            <?php
// Informations de connexion à la base de données
$serveur = "localhost";
$utilisateur = "nom_utilisateur";
$motDePasse = "mot_de_passe";
$nomBaseDeDonnees = "nom_base_de_donnees";

// Connexion à la base de données
$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $nomBaseDeDonnees);

// Vérification de la connexion
if (!$connexion) {
    die("Erreur de connexion à la base de données: " . mysqli_connect_error());
}

// Tableau pour stocker les dernières mesures avec la date
$tableauMesures = array();

// Récupération des dernières mesures de 4 capteurs différents
$capteurs = array("Capteur1", "Capteur2", "Capteur3", "Capteur4");

foreach ($capteurs as $capteur) {
    // Requête SQL pour récupérer la dernière mesure et la date du capteur
    $requete = "SELECT mesure, date_mesure FROM mesures WHERE capteur = '$capteur' ORDER BY date_mesure DESC LIMIT 1";
    $resultat = mysqli_query($connexion, $requete);

    // Vérification du résultat de la requête
    if ($resultat && mysqli_num_rows($resultat) > 0) {
        $row = mysqli_fetch_assoc($resultat);

        // Ajout des données dans le tableau des mesures
        $mesure = $row['mesure'];
        $dateMesure = $row['date_mesure'];
        $tableauMesures[$capteur] = array("mesure" => $mesure, "date" => $dateMesure);
    } else {
        // Le capteur n'a pas de mesure
        $tableauMesures[$capteur] = array("mesure" => "N/A", "date" => "N/A");
    }
}

// Affichage du tableau des mesures
foreach ($tableauMesures as $capteur => $donnees) {
    $mesure = $donnees['mesure'];
    $dateMesure = $donnees['date'];
    echo "Capteur: $capteur | Dernière mesure: $mesure | Date: $dateMesure <br>";
}

// Fermeture de la connexion à la base de données
mysqli_close($connexion);
?>
    </main>

    <footer>
        <!-- Pied de page -->
    </footer>
</body>
</html>
