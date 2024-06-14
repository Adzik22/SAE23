<?php
session_start();

// Inclusion des fonctions utilitaires
include 'function2.php'; 

// Chemin de base pour le stockage des fichiers
define('BASE_PATH', 'C:/wamp64/www/SAE INFORMATIQUE FAST FOOD/LUI/Intranet/');
define('EMPLOYER_JSON', 'employer.json');
define('UPLOAD_DIR', BASE_PATH . 'groupes/');

// Chargement des informations utilisateur depuis le fichier JSON employer.json
$employers_json = EMPLOYER_JSON;
if (!file_exists($employers_json)) {
    die("Fichier des employeurs introuvable.");
}

$employers_data = json_decode(file_get_contents($employers_json), true);
if ($employers_data === null) {
    die("Erreur de chargement des données JSON.");
}

// Si un fichier est uploadé
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fichier'])) {
    $pseudo = $_SESSION['pseudo'];
    $userDir = UPLOAD_DIR . $pseudo;

    // Vérifier les groupes auxquels l'utilisateur appartient
    if (isset($employers_data[$pseudo]['groupes'])) {
        $groupes = $employers_data[$pseudo]['groupes'];

        // Créer les dossiers des groupes s'ils n'existent pas
        foreach ($groupes as $groupe) {
            $groupDir = UPLOAD_DIR . $groupe;
            if (!file_exists($groupDir)) {
                mkdir($groupDir, 0777, true);
            }
        }

        // Déplacer le fichier dans le dossier de l'utilisateur
        $targetFile = $userDir . '/' . basename($_FILES['fichier']['name']);
        if (move_uploaded_file($_FILES['fichier']['tmp_name'], $targetFile)) {
            $message = "Le fichier a été téléchargé avec succès.";
        } else {
            $message = "Désolé, une erreur s'est produite lors du téléchargement du fichier.";
        }
    } else {
        die("Aucun groupe trouvé pour l'utilisateur $pseudo.");
    }
}

// Si un fichier est à télécharger
if (isset($_GET['download'])) {
    $file = basename($_GET['download']);
    $pseudo = $_SESSION['pseudo'];
    $filePath = UPLOAD_DIR . $pseudo . '/' . $file;

    // Vérifier si l'utilisateur a accès au fichier dans son groupe
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
        die("Le fichier $file n'existe pas.");
    }
}

// Si un fichier est à supprimer
if (isset($_GET['delete'])) {
    $file = basename($_GET['delete']);
    $pseudo = $_SESSION['pseudo'];
    $filePath = UPLOAD_DIR . $pseudo . '/' . $file;

    // Vérifier si l'utilisateur a accès au fichier dans son groupe
    if (file_exists($filePath)) {
        if (unlink($filePath)) {
            $message = "Le fichier $file a été supprimé avec succès.";
        } else {
            $message = "Erreur lors de la suppression du fichier $file.";
        }
    } else {
        $message = "Le fichier $file n'existe pas.";
    }


// Chargement des données utilisateurs depuis le fichier JSON
$employers_json = 'employer.json';
if (file_exists($employers_json)) {
    $employers_data = json_decode(file_get_contents($employers_json), true);
    if ($employers_data === null) {
        die("Erreur de chargement des données JSON.");
    }
    // Débogage pour vérifier les données chargées
    echo "<pre>";
    print_r($employers_data);
    echo "</pre>";
} else {
    die("Fichier des employeurs introuvable.");
}


}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud personnel</title>
</head>
<body>
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
            $pseudo = $_SESSION['pseudo'];
            $userDir = UPLOAD_DIR . $pseudo;
            if (isset($employers_data[$pseudo]['groupes'])) {
                echo "<h3>Fichiers de $pseudo</h3>";
                echo "<ul>";
                lister_fichiers($userDir);
                echo "</ul>";
            } else {
                echo "<p>Aucun fichier trouvé pour l'utilisateur $pseudo.</p>";
            }
        }
        ?>
    </ul>
</div>
</body>
</html>
