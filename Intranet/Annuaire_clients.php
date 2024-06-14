<?php
session_start();
<<<<<<< HEAD
if (!isset($_SESSION['USER'])) {
    $_SESSION['USER'] = "anonymous";
    $_SESSION['email'] = "";
    $_SESSION['role'] = "visitor";
}
include 'function2.php'; 
creer_header(); 
creer_navbar(); 
?>

<main>
    <div class="container">
        <h1>Bienvenue sur L'intranet</h1>
<?php
creer_footer(); 
=======

include 'function.php'; 
creer_header(); 
creer_navbar(); 
?>


<?php
// Chemin vers le fichier JSON des clients
$chemin_json = 'client.json';

// Vérifier si le fichier JSON existe
if (file_exists($chemin_json)) {
    // Lire le contenu du fichier JSON
    $clients_json = file_get_contents($chemin_json);

    // Décoder le JSON en tableau associatif PHP
    $clients = json_decode($clients_json, true);

    // Vérifier si le décodage a réussi
    if ($clients === null && json_last_error() !== JSON_ERROR_NONE) {
        echo '<p>Erreur lors du décodage du fichier JSON.</p>';
    } else {
        // Fonction pour afficher les détails de chaque client
    function afficherClients($clients) {
        foreach ($clients as $client) {
            echo '<div class="client">';
            echo '<h3>' . (isset($client['nom']) ? htmlspecialchars($client['nom']) : 'Nom non spécifié') . '</h3>';
            echo '<p><strong>' . (isset($client['statut']) ? htmlspecialchars($client['statut']) : 'Statut non spécifié') . '</strong></p>';
            echo '<p>Email : ' . (isset($client['email']) ? htmlspecialchars($client['email']) : 'Email non spécifié') . '</p>';
            echo '<p>Numéro de téléphone : ' . (isset($client['telephone']) ? htmlspecialchars($client['telephone']) : 'Numéro non spécifié') . '</p>';
            echo '<p>Ville : ' . (isset($client['ville']) ? htmlspecialchars($client['ville']) : 'Ville non spécifiée') . '</p>';
            echo '</div>';
        }
    }


        // Affichage des clients dans une structure HTML
        echo '<!DOCTYPE html>';
        echo '<html lang="fr">';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>Nos Clients</title>';
        echo '<style>';
        echo 'body { font-family: Arial, sans-serif; background-color: #f7f7f7; margin: 0; padding: 0; }';
        echo '.container { max-width: 800px; margin: 20px auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }';
        echo '.client { margin-bottom: 20px; padding: 10px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 4px; }';
        echo '.client h3 { margin-top: 0; color: #007bff; }';
        echo '.client p { margin: 5px 0; }';
        echo '</style>';
        echo '</head>';
        echo '<body>';
        echo '<div class="container">';
        echo '<h2>Nos Clients</h2>';

        if (!empty($clients)) {
            afficherClients($clients);
        } else {
            echo '<p>Aucun client trouvé.</p>';
        }

        echo '<a href="index.php">Retour à l\'accueil</a>';
        echo '</div>';
        echo '</body>';
        echo '</html>';
    }
} else {
    echo '<p>Le fichier JSON des clients est introuvable.</p>';
}
>>>>>>> e03d64e47a951130e36ba9f38678a23aa5dd196c
?>
