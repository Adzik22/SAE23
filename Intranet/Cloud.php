<?php
session_start();
include 'function2.php'; 

// Chemin de base pour le stockage des fichiers
$basePath = 'C:/wamp64/www/SAE INFORMATIQUE FAST FOOD/SAE INFORMATIQUE/Site Intranet/TP_R209_2/TP R209/';

function lister_fichiers($dossier, $pseudo) {
    $fichiers = scandir($dossier);
    foreach($fichiers as $fichier) {
        if($fichier != '.' && $fichier != '..') {
            $filePath = $pseudo . '/' . $fichier;
            echo "<li>$fichier <a href=\"?download=$filePath\">Télécharger</a> | <a href=\"?delete=$filePath\" style=\"color: red;\">Supprimer</a></li>";
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
// Si un fichier est à télécharger
if (isset($_GET['download'])) {
    $file = $_GET['download'];
    $pseudo = $_SESSION['pseudo'];
    $filePath = $basePath . $file;

    if (strpos($filePath, $basePath . $pseudo) !== 0) {
        die("Accès refusé.");
    }
    if (file_exists($filePath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        flush(); // Flush system output buffer
        readfile($filePath);
        exit;
    } else {
        die("Le fichier n'existe pas.");
    }
}

// Si un fichier est à supprimer
if (isset($_GET['delete'])) {
    $file = $_GET['delete'];
    $pseudo = $_SESSION['pseudo'];
    $filePath = $basePath . $file;

    if (strpos($filePath, $basePath . $pseudo) !== 0) {
        die("Accès refusé.");
    }

    if (file_exists($filePath)) {
        unlink($filePath);
        $message = "Le fichier a été supprimé avec succès.";
    } else {
        $message = "Le fichier n'existe pas.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud perso</title>
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
                lister_fichiers($userDir, $_SESSION['pseudo']);
            } else {
                echo "<li>Aucun fichier trouvé.</li>";
            }
        }
        ?>
    </ul>
    <h2>Cloud Groupe</h2>
</div>
<?php
creer_footer(); 
?>
</body>
</html>
