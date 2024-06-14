<?php
session_start(); // Démarrez la session pour utiliser les variables de session

$pseudo = $_POST['Pseudo'];
$mail = $_POST['Mail'];
$motDePasse = password_hash($_POST['MotDePasse'], PASSWORD_DEFAULT); 
$vehicule = $_POST['Vehicule'];
$role = ($_POST['DemandeModerateur'] == 'true') ? 'moderateur' : 'utilisateur'; 

$utilisateurs = json_decode(file_get_contents('utilisateurs.json'), true);

foreach ($utilisateurs as $utilisateur) {
    if ($utilisateur['utilisateur'] === $pseudo) {
        header("Location: erreur_pseudo_existe.php");
        exit();
    }
}

$nouvelUtilisateur = array(
    "utilisateur" => $pseudo,
    "motdepasse" => $motDePasse,
    "vehicule" => $vehicule,
    "email" => $mail,
    "role" => $role
);

$utilisateurs[] = $nouvelUtilisateur;

file_put_contents('utilisateurs.json', json_encode($utilisateurs));

// Définir une variable de session pour indiquer que l'utilisateur est connecté
$_SESSION['pseudo'] = $pseudo;

// Rediriger vers index.php pour afficher le message de bienvenue
header("Location: index.php");
exit();
?>
