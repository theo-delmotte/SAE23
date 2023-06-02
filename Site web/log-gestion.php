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
                <li><a href="consultation.php">Consultation</a></li>
                <li><a href="gestion-projet.php">Gestion de projet</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <!-- Page log -->
      
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

// Traitement du formulaire de connexion
if (isset($_POST['submit'])) {
    // Récupération des données saisies dans le formulaire
    $nomUtilisateur = $_POST['nom_utilisateur'];
    $motDePasse = $_POST['mot_de_passe'];

    // Requête SQL pour vérifier les informations d'identification de l'utilisateur
    $requete = "SELECT * FROM utilisateurs WHERE nom_utilisateur = '$nomUtilisateur' AND mot_de_passe = '$motDePasse'";
    $resultat = mysqli_query($connexion, $requete);

    // Vérification du résultat de la requête
    
if (mysqli_num_rows($resultat) == 1) {
    // L'utilisateur est authentifié avec succès
    session_start();
    $_SESSION['nom_utilisateur'] = $nomUtilisateur;

    // Redirection vers la page appropriée après la connexion réussie
    header("Location: gestion.php");
    exit();

    } else {
        // Les informations d'identification sont incorrectes
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion GESTION</h1>
    <form method="POST" action="">
        <label for="nom_utilisateur">Nom d'utilisateur:</label>
        <input type="text" name="nom_utilisateur" required><br>

        <label for="mot_de_passe">Mot de passe:</label>
        <input type="password" name="mot_de_passe" required><br>

        <input type="submit" name="submit" value="Se connecter">
    </form>
</body>
</html>

        
    </main>

    <footer>
        <!-- Pied de page -->
    </footer>
</body>
</html>
