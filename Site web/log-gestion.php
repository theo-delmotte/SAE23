
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
// Vérifier l'authentification de l'administrateur
$authenticated = false;
$connection_error = false;

if (isset($_POST['nom_utilisateur']) && isset($_POST['mot_de_passe'])) {
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $mot_de_passe = $_POST['mot_de_passe'];

    // Connexion à la base de données
    $servername = "localhost";
    $username = "admin1";
    $password_db = "passadmin1";
    $dbname = "SAE_23";

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        $connection_error = true;
        echo "Échec de la connexion à la base de données: " . $conn->connect_error;
    } else {
        // Vérifier les identifiants de connexion de l'administrateur
        $query = "SELECT * FROM batiment WHERE login = ? AND mdp = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $nom_utilisateur, $mot_de_passe);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $authenticated = true;

            // Redirection vers les pages correspondantes en fonction du login
            switch ($row['login']) {
                case 'batE':
                    header("Location: gestionBatE.php");
                    break;
                case 'batB':
                    header("Location: gestionBatB.php");
                    break;
                default:
                    // Page de gestion par défaut si le login n'est pas reconnu
                    header("Location: gestionDefault.php");
                    break;
            }
            exit();
        } else {
            echo "<p class='error'>Identifiants de connexion invalides.</p>";
        }

        $stmt->close();
        $conn->close();
    }
}
?>



    <title>Connexion</title>
    <h1>Connexion GESTION</h1>
    <form method="POST" action="">
        <label for="nom_utilisateur">Nom utilisateur:</label>
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



    
