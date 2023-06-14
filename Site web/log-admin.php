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
                <li><a href="log-gestion.php">Gestion</a></li>
                <li><a href="consultation.php">Consultation</a></li>
                <li><a href="gestion-projet.php">Gestion de projet</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <!-- Page log -->
       
        <?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$dbname = "SAE_23";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier les erreurs de connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$login = $_POST['login'];
$mdp = $_POST['mdp'];

// Requête pour vérifier les informations de connexion
$sql = "SELECT * FROM administration WHERE login = '$login' AND mdp = '$mdp'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // L'utilisateur est authentifié
    echo "Connexion réussie!";
    // Effectuez ici les actions appropriées (par exemple, rediriger l'utilisateur vers une autre page)
    header("Location: admin.php");
    exit();
} else {
    // Échec de la connexion
    echo "Identifiants invalides!";
}

// Fermer la connexion à la base de données
$conn->close();
?>


    <title>Connexion</title>
    <h1>Connexion ADMIN</h1>
    <form method="POST" action="">
        <label for="nom_utilisateur">Nom d'utilisateur:</label>
        <input type="text" name="nom_utilisateur" required><br>

        <label for="mot_de_passe">Mot de passe:</label>
        <input type="password" name="mot_de_passe" required><br>

        <input type="submit" name="submit" value="Se connecter">
    </form>

       
    </main>

    <footer>
        <!-- Pied de page -->
    </footer>
</body>
</html>
