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
                <li><a href="consultation.php">Consultation</a></li>
                <li><a href="gestion-projet.php">Gestion de projet</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <!-- Page d'administration -->
        <h2>Gestion des capteurs</h2>
        
        <!-- Formulaire d'ajout de capteur -->
        <h3>Ajouter un capteur</h3>
        <form method="POST" action="">
            <label for="ID_capteur">ID Capteur :</label>
            <input type="text" id="ID_capteur" name="ID_capteur" required><br>

            <label for="nom_capteur">Nom du capteur :</label>
            <input type="text" id="nom_capteur" name="nom_capteur" required><br>

            <label for="type_capteur">Type du capteur :</label>
            <input type="text" id="type_capteur" name="type_capteur" required><br>

            <label for="ID_batiment">ID du bâtiment :</label>
            <input type="text" id="ID_batiment" name="ID_batiment" required><br>

            <input type="submit" value="Ajouter">
        </form>

        <!-- Formulaire de suppression de capteur -->
        <h3>Supprimer un capteur</h3>
        <form method="POST" action="">
            <label for="ID_capteur_suppr">ID du capteur :</label>
            <input type="text" id="ID_capteur_suppr" name="ID_capteur_suppr" required><br>

            <input type="submit" value="Supprimer">
        </form>

        <!-- Formulaire dajout de bâtiment -->
        <h3>Ajouter un bâtiment</h3>
        <form method="POST" action="">
            <label for="nom_batiment">Nom du bâtiment :</label>
            <input type="text" id="nom_batiment" name="nom_batiment" required><br>

            <label for="login">Login :</label>
            <input type="text" id="login" name="login" required><br>

            <label for="mdp">Mot de passe :</label>
            <input type="password" id="mdp" name="mdp" required><br>

            <label for="ID_batiment">ID du bâtiment :</label>
            <input type="text" id="ID_batiment" name="ID_batiment" required><br>

            <input type="submit" value="Ajouter">
        </form>

        <!-- Formulaire de suppression de bâtiment -->
        <h3>Supprimer un bâtiment</h3>
        <form method="POST" action="">
            <label for="ID_batiment_suppr">ID du bâtiment :</label>
            <input type="text" id="ID_batiment_suppr" name="ID_batiment_suppr" required><br>

            <input type="submit" value="Supprimer">
        </form>

        <?php
        // Connexion à la base de données
        $servername = "localhost";
        $username = "admin1";
        $password_db = "passadmin1";
        $dbname = "SAE_23";

        $conn = new mysqli($servername, $username, $password_db, $dbname);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Échec de la connexion à la base de données: " . $conn->connect_error);
        }

        // Traitement de l'ajout de capteur
        if (isset($_POST['ID_capteur']) && isset($_POST['nom_capteur']) && isset($_POST['type_capteur']) && isset($_POST['ID_batiment'])) {
            $ID_capteur = $_POST['ID_capteur'];
            $nom_capteur = $_POST['nom_capteur'];
            $type_capteur = $_POST['type_capteur'];
            $ID_batiment = $_POST['ID_batiment'];

            // Vérifier si le capteur existe déjà
            $existingQuery = "SELECT * FROM capteur WHERE ID_capteur = '$ID_capteur'";
            $existingResult = $conn->query($existingQuery);
            if ($existingResult->num_rows > 0) {
                echo "<p>Erreur : Le capteur avec l'ID $ID_capteur existe déjà.</p>";
            } else {
                // Exécuter la requête d'ajout de capteur
                $query = "INSERT INTO capteur (ID_capteur, nom, ID_batiment, type) VALUES ('$ID_capteur', '$nom_capteur', '$ID_batiment', '$type_capteur')";
                $result = $conn->query($query);

                if ($result) {
                    echo "<p>Capteur ajouté avec succès.</p>";
                } else {
                    echo "<p>Erreur lors de l'ajout du capteur : " . $conn->error . "</p>";
                }
            }
        }

        // Traitement de la suppression de capteur
        if (isset($_POST['ID_capteur_suppr'])) {
            $ID_capteur_suppr = $_POST['ID_capteur_suppr'];

            // Vérifier si le capteur existe
            $existingQuery = "SELECT * FROM capteur WHERE ID_capteur = '$ID_capteur_suppr'";
            $existingResult = $conn->query($existingQuery);
            if ($existingResult->num_rows === 0) {
                echo "<p>Erreur : Le capteur avec l'ID $ID_capteur_suppr n'existe pas.</p>";
            } else {
                // Vérifier si le capteur est utilisé dans un bâtiment
                $usedQuery = "SELECT * FROM capteur WHERE ID_capteur = '$ID_capteur_suppr' AND ID_batiment IS NOT NULL";
                $usedResult = $conn->query($usedQuery);
                if ($usedResult->num_rows > 0) {
                    echo "<p>Erreur : Le capteur avec l'ID $ID_capteur_suppr est utilisé dans un bâtiment et ne peut pas être supprimé.</p>";
                } else {
                    // Exécuter la requête de suppression de capteur
                    $query = "DELETE FROM capteur WHERE ID_capteur = '$ID_capteur_suppr'";
                    $result = $conn->query($query);

                    if ($result) {
                        echo "<p>Cap</p>";
                    } else {
                        echo "<p>Erreur lors de la suppression du capteur : " . $conn->error . "</p>";
                    }
                }
            }
        }
            // Traitement de l'ajout de bâtiment
    if (isset($_POST['nom_batiment']) && isset($_POST['login']) && isset($_POST['mdp']) && isset($_POST['ID_batiment'])) {
        $nom_batiment = $_POST['nom_batiment'];
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        $ID_batiment = $_POST['ID_batiment'];

        // Vérifier si le bâtiment existe déjà
        $existingQuery = "SELECT * FROM batiment WHERE ID_batiment = '$ID_batiment'";
        $existingResult = $conn->query($existingQuery);
        if ($existingResult->num_rows > 0) {
            echo "<p>Erreur : Le bâtiment avec l'ID $ID_batiment existe déjà.</p>";
        } else {
            // Exécuter la requête d'ajout de bâtiment
            $query = "INSERT INTO batiment (nom, login, mdp, ID_batiment) VALUES ('$nom_batiment', '$login', '$mdp', '$ID_batiment')";
            $result = $conn->query($query);

            if ($result) {
                echo "<p>Bâtiment ajouté avec succès.</p>";
            } else {
                echo "<p>Erreur lors de l'ajout du bâtiment : " . $conn->error . "</p>";
            }
        }
    }

    // Traitement de la suppression de bâtiment
    if (isset($_POST['ID_batiment_suppr'])) {
        $ID_batiment_suppr = $_POST['ID_batiment_suppr'];

        // Vérifier si le bâtiment existe
        $existingQuery = "SELECT * FROM batiment WHERE ID_batiment = '$ID_batiment_suppr'";
        $existingResult = $conn->query($existingQuery);
        if ($existingResult->num_rows === 0) {
            echo "<p>Erreur : Le bâtiment avec l'ID $ID_batiment_suppr n'existe pas.</p>";
        } else {
            // Vérifier si le bâtiment contient des capteurs
            $capteurQuery = "SELECT * FROM capteur WHERE ID_batiment = '$ID_batiment_suppr'";
            $capteurResult = $conn->query($capteurQuery);
            if ($capteurResult->num_rows > 0) {
                echo "<p>Erreur : Le bâtiment avec l'ID $ID_batiment_suppr contient des capteurs et ne peut pas être supprimé.</p>";
            } else {
                // Exécuter la requête de suppression de bâtiment
                $query = "DELETE FROM batiment WHERE ID_batiment = '$ID_batiment_suppr'";
                $result = $conn->query($query);

                if ($result) {
                    echo "<p>Bâtiment supprimé avec succès.</p>";
                } else {
                    echo "<p>Erreur lors de la suppression du bâtiment : " . $conn->error . "</p>";
                }
            }
        }
    }

    // Récupérer les capteurs groupés par bâtiment
    $query = "SELECT capteur.ID_capteur, capteur.nom, capteur.type, batiment.nom AS nom_batiment FROM capteur INNER JOIN batiment ON capteur.ID_batiment = batiment.ID_batiment ORDER BY capteur.ID_batiment";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<h2>Liste des capteurs par bâtiment :</h2>";
        $current_batiment = "";
        while ($row = $result->fetch_assoc()) {
            $ID_capteur = $row['ID_capteur'];
            $nom_batiment = $row['nom_batiment'];
            $type_capteur = $row['type'];
            $nom_capteur = $row['nom'];

            if ($current_batiment !== $nom_batiment) {
                $current_batiment = $nom_batiment;
                echo "<h3>Bâtiment : $nom_batiment </h3>";
                echo "<ul>";
            }

            echo "<li>Type : $type_capteur, Nom : $nom_capteur (ID : $ID_capteur)</li>";
        }

        echo "</ul>";
    } else {
        echo "<p>Aucun capteur trouvé.</p>";
    }

    // Récupérer la liste des bâtiments
    $batimentQuery = "SELECT ID_batiment, nom FROM batiment";
    $batimentResult = $conn->query($batimentQuery);

    if ($batimentResult->num_rows > 0) {
        echo "<h2>Liste des bâtiments :</h2>";
        echo "<ul>";
        while ($row = $batimentResult->fetch_assoc()) {
            $ID_batiment = $row['ID_batiment'];
            $nom_batiment = $row['nom'];
            echo "<li>Nom : $nom_batiment (ID : $ID_batiment)</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Aucun bâtiment trouvé.</p>";
    }

    $conn->close();
    ?>
</main>

<footer>
    <!-- Pied de page -->
</footer>
</body>
</html>
