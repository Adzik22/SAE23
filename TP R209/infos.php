<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Titre</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
session_start();
include 'function.php'; 

creer_header(); 
creer_navbar(); 
?>

<div class="container">
    <h1>Vous pouvez retrouver ici les différentes informations des pages du site.</h1>
    <p>Choisissez une page ci-dessous :</p>

    <div class="button-container">
        <button><a href="infos_index.php">Page d'Accueil</a></button>
        <button><a href="infos_rechercher.php">Page de Recherche</a></button>
        <button><a href="infos_proposer.php">Page de Proposition</a></button>
        <button><a href="infos_administrer.php">Page d'Administration</a></button>
        <button><a href="infos_profil.php">Page de Profil</a></button>
        <button><a href="infos_inscription.php">Page d'Inscription</a></button>
        <button><a href="infos_infos.php">Page d'Informations</a></button>
    </div>

    <p>Explorez les informations des différentes pages pour en apprendre plus sur notre site.</p>
</div>

<?php
creer_footer(); 
?>

</body>
</html>
