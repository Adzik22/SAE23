<?php
    function creer_header() {
        // Déclarer la variable pour stocker le message d'erreur
        $erreur = '';
        // Vérifier si le formulaire de connexion a été soumis
        if(isset($_POST['pseudo']) && isset($_POST['motdepasse'])) {
            // Charger les utilisateurs depuis le fichier JSON
            $utilisateurs = json_decode(file_get_contents('employer.json'), true);
            // Vérifier les informations de connexion
            $connexion_reussie = false;
            foreach ($utilisateurs as $utilisateur) {
                if ($utilisateur['utilisateur'] === $_POST['pseudo'] && password_verify($_POST['motdepasse'], $utilisateur['motdepasse'])) {
                    $_SESSION['pseudo'] = $_POST['pseudo'];
                    // Marquer la connexion comme réussie
                    $connexion_reussie = true;
                    break; // Sortir de la boucle une fois la connexion réussie
                }
            }
        // Si la connexion est réussie, rediriger vers accueil.php
        if($connexion_reussie) {
            header('Location: Accueil.php');
            exit();
        } else {
            $erreur = 'Identifiant ou mot de passe incorrect.';
        }
    }

        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Fast Food</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="styles.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            <style>
            .custom-header {
                background-image: url("logo.jpeg");
                background-size: cover; 
                color: white;
                text-align: left;
                padding: 20px;
                height: 500px;
            }
            </style>
        </head>
        <body>  
        <div class="container-fluid p-5 custom-header">
            <h1>Fulguro Miam</h1>
            <p>Intranet</p>';
        // Afficher le message d'erreur s'il y en a un
        if(!empty($erreur)) {
            echo '<div class="alert alert-danger" role="alert">' . $erreur . '</div>';
        }
        // Vérifier si l'utilisateur est connecté
        if(isset($_SESSION['pseudo'])) {
            // Afficher le message de bienvenue avec le pseudo de l'utilisateur et le bouton de déconnexion
            echo '<p>Bonjour ' . $_SESSION['pseudo'] . '!</p>';
            echo '<form method="POST" action=""><button type="submit" name="deconnexion" class="btn btn-light">Se déconnecter</button></form>';
        } else {
            // Afficher le formulaire de connexion et le bouton "S'inscrire" si l'utilisateur n'est pas connecté
            echo '
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="pseudo" class="form-label">Pseudo</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo">
                </div>
                <div class="mb-3">
                    <label for="motdepasse" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="motdepasse" name="motdepasse">
                </div>
                <button type="submit" class="btn btn-light">Connexion</button>
                <a href="inscription.php" class="btn btn-light">S\'inscrire</a>
            </form>';
        }
    // Vérifier si le bouton de déconnexion a été cliqué
    if(isset($_POST['deconnexion'])) {
        // Déconnexion de l'utilisateur en supprimant la variable de session
        unset($_SESSION['pseudo']);
        // Recharger la page actuelle pour mettre à jour l'affichage
        header('Location: ../SiteVitrine/index.php');
        exit();
    }
    echo '</div>
    </body>
    </html>';
}

function creer_navbar() {
    echo '
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="Cloud.php">Cloud</a>
                </li>
            </ul>
        </div>
    </nav>
    ';
}
function creer_footer()
{
    echo '<footer class="jumbotron bg-secondary text-white text-center">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="mb-0">Fulguro Miam</p>
                        <p class="mb-0">contact@fulguromiam.com</p>
                        <p class="mb-0">Votre satisfaction, notre priorité</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="mb-0">&copy; ' . date("Y") . ' Fulguro Miam</p>
                        <p class="mb-0">Adresse IP: ' . $_SERVER['SERVER_ADDR'] . ', Port: ' . $_SERVER['SERVER_PORT'] . '</p>
                    </div>
                </div>
            </div>
        </footer>';
}

?>
