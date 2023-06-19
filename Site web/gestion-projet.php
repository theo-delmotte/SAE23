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
                
            </ul>
        </nav>
    </header>

    <main>
        <!-- Page de gestion de projet -->
        
            <h2>Gestion de projet</h2>
            <!-- Contenu de la page gestion de projet -->

<figure class="gestion">
    <div class="row">
      <figure class="gestion-col">
        <h3>Gantt project</h3>
        <p>Voici le diagramme de gantt.</p>
        <br>
        <a href="https://drive.google.com/file/d/1G-frmEKhodyb2Fy-i3kvlFJ0yCnzgmQL/view?usp=sharing" target= "_blank" class="btn">Accéder au Gantt</a>
      </figure>
      <figure class="gestion-col">
        <img src="./images/Gantt.jpg" alt="gantt">
      </figure>
    </div> 

    <div class="row">
      <figure class="gestion-col">
        <img src="./images/Trello.png" alt="trello">
      </figure>
      <figure class="gestion-col">
        <h3>Trello</h3>
        <p>Et voici le Trello réalisé pour le projet.</p>
        <br>
        <a href="https://drive.google.com/file/d/1Ycwgj-fHVEbgJPW_Hq_ON9tKghce8Rvn/view?usp=sharing" target="_blank" class="btn">Accéder au Trello</a>
      </figure>
    </div> 
  </figure>

            <h2>Synthèse personnelle de chaque membre</h2>
        <br>
        <h3>Axel</h3>
        <br>
        <p class="text">Dans le cadre de mon projet, j'ai créé une solution basée sur Docker, utilisant Node-RED, InfluxDB et Grafana. Au début, j'ai rencontré quelques problèmes liés à InfluxDB, notamment avec les versions, mais une fois ces problèmes résolus, je n'ai pas rencontré de difficultés majeures. Environ 80% de mon travail était axé sur l'aspect graphique et esthétique de la solution. J'ai trouvé que cela prenait un peu de temps, mais ce n'était pas vraiment difficile.
            <br>
            <br>
L'avantage de cette solution basée sur Docker avec Node-RED, InfluxDB et Grafana est qu'elle nécessite moins de connaissances techniques par rapport à la création d'un site web traditionnel utilisant une base de données et du PHP. Avec cette solution, il n'est pas nécessaire de maîtriser des langages de programmation complexes tels que PHP, ni de s'inquiéter de la configuration d'un serveur web ou d'un serveur de base de données. Node-RED propose une interface visuelle conviviale pour configurer les flux de données, ce qui facilite grandement le processus de développement. InfluxDB, quant à lui, offre une base de données spécialement conçue pour les données temporelles, éliminant ainsi la nécessité de travailler avec des langages SQL complexes. Grafana permet de créer facilement des tableaux de bord et des visualisations attrayantes à partir des données stockées. Dans l'ensemble, cette solution offre une alternative plus conviviale pour les personnes ayant moins d'expérience dans le développement web, tout en offrant des fonctionnalités puissantes pour la visualisation des données.
<br>
<br>
En ce qui concerne le cahier des charges, je pense l'avoir rempli. Je trouve cette solution très intéressante et facile à prendre en main.</p>
<br>
        <h3>Théo</h3>
        <br>
        <p class="text">Dans le cadre de ce projet, j'ai été responsable de la création de l'interface du site web, de la gestion de projet à l'aide d'un diagramme de Gantt et de l'utilisation d'un Trello pour la planification et le suivi des tâches. J'ai également développé un script PHP permettant la gestion des capteurs sur le site web, offrant la possibilité d'ajouter ou de supprimer des capteurs ou bien des bâtiments.
            <br>
            <br>
L'objectif principal était de concevoir une interface conviviale et facile à utiliser pour visualiser les données des capteurs. Je suis satisfait du résultat obtenu, car je pense que l'interface réalisée répond aux attentes du cahier des charges. Elle offre une expérience simple et intuitive pour la visualisation des données mesurées par les capteurs.
<br>
<br>
Le diagramme de Gantt et l'utilisation de Trello ont été essentiels pour la gestion efficace du projet. Ils m'ont permis de planifier les différentes étapes, d'attribuer des ressources et de suivre l'avancement du projet.
<br>
<br>
Les administrateurs du site peuvent facilement ajouter de nouveaux capteurs ou supprimer ceux existants, de même avec les bâtiments, offrant ainsi une flexibilité au site.</p>
<br>
        <h3>Paul</h3>
        <br>
        <p class="text">Au cours de la Sae23, j'ai créé la base de données pour le projet. J'ai conçu et mis en place la structure de la base de données en tenant compte des besoins fonctionnels du projet. J'ai défini les tables, les relations entre elles et les attributs nécessaires pour stocker les données.
            <br>
            <br>
En parallèle, j'ai également développé un script de récupération des données en utilisant le langage de script Bash. Ce script avait pour objectif de récupérer les données des capteurs et de les importer dans la base de données. J'ai pu automatiser le processus de récupération.
<br>
<br>
Cependant, j'ai rencontré des difficultés de connexion à la base de données avec le script. Il est fréquent de faire face à des problèmes de ce type lors du développement. J'ai finalement pu le résoudre.
<br>
<br>
Cette expérience m'a permis de renforcer mes compétences en gestion de base de données et en développement de scripts.</p>
<br>
        <h3>Sammy</h3>
        <br>
        <p class="text">Au cours de la Sae23, j'ai contribué au développement du projet en créant le squelette du site web et en collaborant à la création des scripts PHP. Mon travail a principalement porté sur la mise en place d'un système de connexion sécurisé.
            <br>
            <br>
Tout d'abord, j'ai veillé à créer une structure claire et cohérente, en prenant en compte les exigences fonctionnelles et esthétiques du projet.
<br>
<br>
En ce qui concerne les scripts PHP, j'ai participé activement à leur développement. J'ai implémenté la fonction de connexion à la base de données en utilisant les paramètres appropriés tels que le nom d'utilisateur, le mot de passe et la base de données elle-même. Cela m'a permis d'établir une communication sécurisée entre le site web et la base de données.
<br>
<br>
Une fois la connexion établie, j'ai utilisé des requêtes SQL pour vérifier les identifiants entrés dans la page de login. En fonction de ces identifiants, j'ai mis en place un système de redirection vers les pages d'administration et de gestion correspondantes. Cela permet aux utilisateurs authentifiés d'accéder aux fonctionnalités appropriées en fonction de leurs droits d'accès.</p>
<br>
<br>
<br>
<br>

  
    </main>

    <footer>
        <!-- Pied de page -->
        <ul>
            <li>SAÉ 23</li>
            <li>IUT Blagnac</li>
            <li>Département R&T</li>
        </ul>
            <br>
            <br>
            <figure class="validation">
    <a href="https://validator.w3.org/nu/#textarea" target="_blank"> 
    <img src="images/html5-validator.png" alt="HTML5">
  </a>
  <a href="" target="_blank">
    <img src="images/css-validator.png" alt="CSS">
    </a>
</figure>
    </footer>
</body>
</html>
