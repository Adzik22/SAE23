<?php
session_start();
include 'function.php'; // Inclusion de votre fichier de fonctions si nécessaire

// Inclusion du header et de la navbar si vous les avez définis dans 'function.php'
creer_header();
creer_navbar();

// Lecture du contenu du fichier JSON
$employes_json = file_get_contents('employer.json');

// Décodage du JSON en tableau associatif PHP
$employes = json_decode($employes_json, true);

// Fonction pour afficher les détails de chaque employé
function afficherEmployes($employes) {
    foreach ($employes as $employe) {
        echo '<div class="employe">';
        echo '<h3>' . htmlspecialchars($employe['nom']) . '</h3>';
        echo '<p><strong>' . htmlspecialchars($employe['poste']) . '</strong></p>';
        echo '<p>' . htmlspecialchars($employe['description']) . '</p>';
        echo '</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notre Équipe</title>
    <style>
        /* Vos styles CSS ici */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #007bff;
            text-align: center;
        }

        .employe {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .employe h3 {
            margin-top: 0;
            color: #007bff;
        }

        .employe p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Notre Équipe</h2>

    <?php
    // Vérifie s'il y a des employés à afficher
    if (!empty($employes)) {
        afficherEmployes($employes);
    } else {
        echo '<p>Aucun employé trouvé.</p>';
    }
    ?>
    
    <a href="index.php">Retour à l'accueil</a>
</div>

<?php
// Appel de la fonction footer si définie dans 'function.php'
creer_footer();
?>

</body>
</html>
