<?php
session_start();

include 'function.php'; 
creer_header(); 
creer_navbar(); 
?>


<?php
// Inclusion de votre fichier function.php s'il contient des fonctions nécessaires

// Chemin vers le fichier JSON des employés
$chemin_json = 'employer.json';

// Vérifier si le fichier JSON existe
if (file_exists($chemin_json)) {
    // Lire le contenu du fichier JSON
    $employes_json = file_get_contents($chemin_json);

    // Décoder le JSON en tableau associatif PHP
    $employes = json_decode($employes_json, true);

    // Vérifier si le décodage a réussi
    if ($employes === null && json_last_error() !== JSON_ERROR_NONE) {
        echo '<p>Erreur lors du décodage du fichier JSON.</p>';
    } else {
        // Fonction pour afficher les détails de chaque employé
function afficherEmployes($employes) {
    foreach ($employes as $employe) {
        echo '<div class="employe">';
        echo '<h3>' . (isset($employe['utilisateur']) ? htmlspecialchars($employe['utilisateur']) : 'Nom non spécifié') . '</h3>';
        echo '<p><strong>' . (isset($employe['role']) ? htmlspecialchars($employe['role']) : 'Rôle non spécifié') . '</strong></p>';
        echo '<p>Mail : ' . (isset($employe['email']) ? htmlspecialchars($employe['email']) : 'Email non spécifié') . '</p>';
        echo '<p>Groupes : ';
        if (isset($employe['groupes']) && !empty($employe['groupes'])) {
            echo implode(', ', $employe['groupes']);
        } else {
            echo 'Aucun groupe spécifié';
        }
        echo '</p>';
        echo '</div>';
    }
}


        // Affichage des employés dans une structure HTML
        echo '<!DOCTYPE html>';
        echo '<html lang="fr">';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>Notre Équipe</title>';
        echo '<style>';
        echo 'body { font-family: Arial, sans-serif; background-color: #f7f7f7; margin: 0; padding: 0; }';
        echo '.container { max-width: 800px; margin: 20px auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }';
        echo '.employe { margin-bottom: 20px; padding: 10px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 4px; }';
        echo '.employe h3 { margin-top: 0; color: #007bff; }';
        echo '.employe p { margin: 5px 0; }';
        echo '</style>';
        echo '</head>';
        echo '<body>';
        echo '<div class="container">';
        echo '<h2>Notre Équipe</h2>';

        if (!empty($employes)) {
            afficherEmployes($employes);
        } else {
            echo '<p>Aucun employé trouvé.</p>';
        }

        echo '<a href="index.php">Retour à l\'accueil</a>';
        echo '</div>';
        echo '</body>';
        echo '</html>';
    }
} else {
    echo '<p>Le fichier JSON des employés est introuvable.</p>';
}
?>