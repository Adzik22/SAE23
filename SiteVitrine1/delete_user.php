<?php
session_start();

// Vérifier si l'utilisateur est connecté et a les autorisations nécessaires
if(isset($_SESSION['role']) && (strtolower($_SESSION['role']) == 'admin' || strtolower($_SESSION['role']) == 'moderateur')) {
    // Vérifier si l'identifiant de l'utilisateur à supprimer est spécifié
    if(isset($_POST['user_id'])) {
        // Charger les utilisateurs à partir du fichier JSON
        $utilisateurs = json_decode(file_get_contents('utilisateurs.json'), true);

        // Trouver l'index de l'utilisateur à supprimer dans le tableau des utilisateurs
        $userId = $_POST['user_id'];
        $index = array_search($userId, array_column($utilisateurs, 'utilisateur'));

        // Si l'utilisateur est trouvé, le supprimer
        if($index !== false) {
            unset($utilisateurs[$index]);
            $utilisateurs = array_values($utilisateurs);

            // Sauvegarder les utilisateurs mis à jour dans le fichier JSON
            file_put_contents('utilisateurs.json', json_encode($utilisateurs));

            echo 'L\'utilisateur a été supprimé avec succès.';
        } else {
            echo 'Utilisateur non trouvé.';
        }
    } else {
        echo 'ID de l\'utilisateur non spécifié.';
    }
} else {
    echo 'Vous n\'êtes pas autorisé à effectuer cette action.';
}
?>
