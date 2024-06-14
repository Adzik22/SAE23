<?php
session_start();
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


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Informations et commentaires</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h1 class="text-center mb-4">Informations et commentaires</h1>
        <p>Cette page est dédiée aux commentaires et à l'utilisation de notre site.</p>
        
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Profil</h5>
                        <p class="card-text">Consultez et modifiez votre profil utilisateur.</p>
                        <a href="profil1.php" class="btn btn-primary">Accéder au Profil</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Proposer</h5>
                        <p class="card-text">Proposez un trajet de covoiturage.</p>
                        <a href="proposer1.php" class="btn btn-primary">Proposer un Trajet</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Rechercher</h5>
                        <p class="card-text">Recherchez des trajets disponibles.</p>
                        <a href="rechercher1.php" class="btn btn-primary">Rechercher un Trajet</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Calendrier</h5>
                        <p class="card-text">Consultez le calendrier des trajets disponibles.</p>
                        <a href="calendar1.php" class="btn btn-primary">Voir le Calendrier</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Modifier</h5>
                        <p class="card-text">Modifiez vos informations personnelles.</p>
                        <a href="modifier1.php" class="btn btn-primary">Modifier les Informations</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Administrer</h5>
                        <p class="card-text">Accédez à l'interface d'administration.</p>
                        <a href="administrer1.php" class="btn btn-primary">Accéder à l'Administration</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Connexion</h5>
                        <p class="card-text">Connectez-vous à votre compte.</p>
                        <a href="connexion1.php" class="btn btn-primary">Se Connecter</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Validation Inscription</h5>
                        <p class="card-text">Validez votre inscription sur le site.</p>
                        <a href="validation_inscription1.php" class="btn btn-primary">Valider l'Inscription</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Inscription</h5>
                        <p class="card-text">Inscrivez-vous sur notre site.</p>
                        <a href="inscription1.php" class="btn btn-primary">S'Inscrire</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Accueil</h5>
                        <p class="card-text">Retour à la page d'accueil du site.</p>
                        <a href="index1.php" class="btn btn-primary">Retour à l'Accueil</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Déconnexion</h5>
                        <p class="card-text">Déconnectez-vous de votre compt.</p>
                        <a href="deconnexion1.php" class="btn btn-primary">Se Déconnecter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

<?php
creer_footer(); 
?>
