<?php
session_start();
include 'function.php'; 

// Chemin de base pour le stockage des fichiers
$basePath = 'C:/wamp64/www/SAE INFORMATIQUE FAST FOOD/SAE INFORMATIQUE/Site Intranet/TP_R209_2/TP R209/';

function lister_fichiers($dossier) {
    $fichiers = scandir($dossier);
    foreach($fichiers as $fichier) {
        if($fichier != '.' && $fichier != '..') {
            echo "<li>$fichier</li>";
        }
    }
}

// Si un fichier est uploadé
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fichier'])) {
    $pseudo = $_SESSION['pseudo'];
    $userDir = $basePath . $pseudo;

    // Créer le dossier de l'utilisateur s'il n'existe pas
    if (!file_exists($userDir)) {
        mkdir($userDir, 0777, true);
    }

    $targetFile = $userDir . '/' . basename($_FILES['fichier']['name']);
    
    if (move_uploaded_file($_FILES['fichier']['tmp_name'], $targetFile)) {
        $message = "Le fichier a été téléchargé avec succès.";
    } else {
        $message = "Désolé, une erreur s'est produite lors du téléchargement du fichier.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud</title>
</head>
<body>

<?php
creer_header(); 
creer_navbar(); 
?>

<div class="container">
    <h2>Uploader un fichier</h2>
    <?php if(isset($message)) { echo "<p>$message</p>"; } ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="fichier" required>
        <button type="submit">Uploader</button>
    </form>
    
    <h2>Liste des fichiers</h2>
    <ul>
        <?php
        if (isset($_SESSION['pseudo'])) {
            $userDir = $basePath . $_SESSION['pseudo'];
            if (file_exists($userDir)) {
                lister_fichiers($userDir);
            } else {
                echo "<li>Aucun fichier trouvé.</li>";
            }
        }
        ?>
    </ul>
</div>

<?php
creer_footer(); 
?>
</body>
</html>
