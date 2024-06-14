<?php
session_start();

// Vérifier si l'utilisateur est connecté
if(isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'modo')) {
    // Vérifier si l'ID de l'utilisateur est fourni dans la requête GET
    if(isset($_GET['id'])) {
        // Charger les utilisateurs depuis le fichier JSON
        $utilisateurs = json_decode(file_get_contents('utilisateurs.json'), true);

        // Rechercher l'utilisateur avec l'ID fourni dans la requête GET
        $id = $_GET['id'];
        $index = array_search($id, array_column($utilisateurs, 'id'));

        // Vérifier si l'utilisateur a été trouvé
        if($index !== false) {
            // Mettre à jour le rôle de l'utilisateur
            $utilisateurs[$index]['role'] = 'moderateur'; // Remplacer 'moderateur' par le nouveau rôle désiré

            // Enregistrer les modifications dans le fichier JSON
            file_put_contents('utilisateurs.json', json_encode($utilisateurs));

            echo 'Le rôle de l\'utilisateur a été mis à jour avec succès.';
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
