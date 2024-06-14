<?php
session_start(); // Démarrez la session pour accéder aux variables de session

// Déconnexion de l'utilisateur en supprimant la variable de session
unset($_SESSION['pseudo']);

// Rediriger vers la page d'accueil ou une autre page après la déconnexion
header("Location: index.php");
exit();
?>
