<?php
session_start();
// Inclusion des fonctions utilitaires
include 'function2.php'; 
creer_header(); 
creer_navbar(); 
// Chemin de base pour le stockage des fichiers
define('BASE_PATH', '/var/www/html/Intranet/');
define('EMPLOYER_JSON', BASE_PATH . 'employer.json');
define('UPLOAD_DIR', BASE_PATH . 'groupes/');

// Chargement des informations utilisateur depuis le fichier JSON employer.json
if (!file_exists(EMPLOYER_JSON)) {
    die("Fichier des employeurs introuvable.");
}

$employers_data = json_decode(file_get_contents(EMPLOYER_JSON), true);
if ($employers_data === null) {
    die("Erreur de chargement des données JSON.");
}

// Fonction pour obtenir les données d'un utilisateur par pseudo
function obtenir_utilisateur($employers_data, $pseudo) {
    foreach ($employers_data as $employe) {
        if ($employe['utilisateur'] === $pseudo) {
            return $employe;
        }
    }
    return null;
}

function lister_fichiers($dir) {
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
                if ($file != "." && $file != "..") {
                    echo "<li><a href='?download=$file'>$file</a> | <a href='?delete=$file'>Supprimer</a></li>";
                }
            }
            closedir($dh);
        }
    } else {
        echo "<p>Le répertoire $dir n'existe pas.</p>";
    }
}

// Si un fichier est uploadé
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fichier'])) {
    if (!isset($_SESSION['pseudo'])) {
        die("Session utilisateur non définie.");
    }
    $pseudo = $_SESSION['pseudo'];

    $utilisateur = obtenir_utilisateur($employers_data, $pseudo);
    if ($utilisateur) {
        // Vérifier les groupes auxquels l'utilisateur appartient
        if (!empty($utilisateur['groupes'])) {
            $groupe_selectionne = $_POST['groupe_selectionne'];
            
            $groupDir = UPLOAD_DIR . $groupe_selectionne;
            if (!file_exists($groupDir)) {
                mkdir($groupDir, 0777, true);
            }

            // Déplacer le fichier dans le dossier du groupe
            $targetFile = $groupDir . '/' . basename($_FILES['fichier']['name']);
            if (move_uploaded_file($_FILES['fichier']['tmp_name'], $targetFile)) {
                $message = "Le fichier a été téléchargé avec succès dans le groupe $groupe_selectionne.";
            } else {
                $message = "Désolé, une erreur s'est produite lors du téléchargement du fichier.";
            }
        } else {
            die("Aucun groupe trouvé pour l'utilisateur $pseudo.");
        }
    } else {
        die("Utilisateur non trouvé.");
    }
}

// Si un fichier est à télécharger
if (isset($_GET['download'])) {
    if (!isset($_SESSION['pseudo'])) {
        die("Session utilisateur non définie.");
    }
    $file = basename($_GET['download']);
    $pseudo = $_SESSION['pseudo'];

    $utilisateur = obtenir_utilisateur($employers_data, $pseudo);
    if ($utilisateur) {
        // Vérifier les groupes auxquels l'utilisateur appartient
        if (!empty($utilisateur['groupes'])) {
            $fileFound = false;
            foreach ($utilisateur['groupes'] as $groupe) {
                $filePath = UPLOAD_DIR . $groupe . '/' . $file;
                if (file_exists($filePath)) {
                    // Autoriser le téléchargement du fichier
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
                }
            }
        }
    }
    die("Le fichier $file n'existe pas ou vous n'avez pas accès.");
}

// Si un fichier est à supprimer
if (isset($_GET['delete'])) {
    if (!isset($_SESSION['pseudo'])) {
        die("Session utilisateur non définie.");
    }
    $file = basename($_GET['delete']);
    $pseudo = $_SESSION['pseudo'];

    $utilisateur = obtenir_utilisateur($employers_data, $pseudo);
    if ($utilisateur) {
        // Vérifier les groupes auxquels l'utilisateur appartient
        if (!empty($utilisateur['groupes'])) {
            $groupes = $utilisateur['groupes'];
            foreach ($groupes as $groupe) {
                $filePath = UPLOAD_DIR . $groupe . '/' . $file;
                if (file_exists($filePath)) {
                    if (unlink($filePath)) {
                        $message = "Le fichier $file a été supprimé avec succès.";
                    } else {
                        $message = "Erreur lors de la suppression du fichier $file.";
                    }
                } else {
                    $message = "Le fichier $file n'existe pas.";
                }
            }
        } else {
            die("Aucun groupe trouvé pour l'utilisateur $pseudo.");
        }
    } else {
        die("Utilisateur non trouvé.");
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
        <?php
        if (isset($_SESSION['pseudo'])) {
            $pseudo = $_SESSION['pseudo'];
            $utilisateur = obtenir_utilisateur($employers_data, $pseudo);
            if ($utilisateur && !empty($utilisateur['groupes'])) {
                echo '<select name="groupe_selectionne" required>';
                foreach ($utilisateur['groupes'] as $groupe) {
                    echo "<option value=\"$groupe\">$groupe</option>";
                }
                echo '</select>';
            }
        }
        ?>
        <button type="submit">Uploader</button>
    </form>
    
    <h2>Liste des fichiers</h2>
    <ul>
        <?php
        if (isset($_SESSION['pseudo'])) {
            $pseudo = $_SESSION['pseudo'];
            $utilisateur = obtenir_utilisateur($employers_data, $pseudo);
            if ($utilisateur) {
                if (!empty($utilisateur['groupes'])) {
                    foreach ($utilisateur['groupes'] as $groupe) {
                        echo "<h3>Fichiers du groupe $groupe</h3>";
                        $groupDir = UPLOAD_DIR . $groupe;
                        echo "<ul>";
                        lister_fichiers($groupDir);
                        echo "</ul>";
                    }
                } else {
                    echo "<p>Aucun groupe trouvé pour l'utilisateur $pseudo.</p>";
                }
            } else {
                echo "<p>Utilisateur non trouvé.</p>";
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
