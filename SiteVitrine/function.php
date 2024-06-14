    <?php
    function creer_header() {
        // Déclarer la variable pour stocker le message d'erreur
        $erreur = '';
        // Vérifier si le formulaire de connexion a été soumis
        if(isset($_POST['pseudo']) && isset($_POST['motdepasse'])) {
            // Charger les utilisateurs depuis le fichier JSON
            $utilisateurs = json_decode(file_get_contents('utilisateurs.json'), true);
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
            // Si la connexion n'est pas réussie, définir le message d'erreur
            if(!$connexion_reussie) {
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
            <p>Site de fast food IUT R&T Saint Malo</p>';

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
                     // Ajouter le bouton Intranet
         echo '<form method="POST" action="">
         <button type="submit" name="intranet" class="btn btn-light">Intranet</button>
       </form>';
        }

    // Vérifier si le bouton de déconnexion a été cliqué
    if(isset($_POST['deconnexion'])) {
        // Déconnexion de l'utilisateur en supprimant la variable de session
        unset($_SESSION['pseudo']);
        // Recharger la page actuelle pour mettre à jour l'affichage
        header("Refresh:0");
        exit();
    }
    // Vérifier si le bouton Intranet a été cliqué
    if(isset($_POST['intranet'])) {
        // Rediriger vers l'intranet
        header("Location: ../Intranet/index.php");
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
                <li class="nav-item active">
                    <a class="nav-link" href="menu.php">Menu <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="commander.php">Commander</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Administrer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profil.php">Mon Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="inscription.php">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="infos.php">Infos</a>
                </li>
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



function creer_inscription() {
    echo '
    <div style="margin-right: auto; margin-left: auto; width: 50%; text-align: center;">
        <div style="margin-right: 10px; margin-left: 5px; border-bottom: 1px dotted grey; border-radius: 10px 0px 0 0; padding-top: 10px; padding-bottom: 10px; font-family: "Lucida Handwriting", Arial, serif; text-align:left; padding-left: 15px; font-size: 1.5em; color: #333;">Inscription</div>
        <form action="validation.php" method="post" style="margin-top: 20px; text-align: left;">
            <div style="padding: 10px; border-radius: 10px; background-color: #f9f9f9; display: inline-block; text-align: left;">
                <p><label for="Pseudo" style="font-size: 1.2em;">Pseudo</label><br/> <input placeholder="Pseudo" id="Pseudo" name="Pseudo" class="input_perso"/></p>
                <p><label for="Mail" style="font-size: 1.2em;">Adresse Mail</label><br/> <input placeholder="Exemple: nom@nom.com" id="Mail" name="Mail" class="input_perso"/></p>
                <p><label for="mdp" style="font-size: 1.2em;">Mot de passe</label><br/> <input type="password" placeholder="Mot de passe" id="MDP" name="MotDePasse" class="input_perso"/></p>
                <p><button type="submit" style="background-color: #333; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 1.2em;">S\'inscrire</button></p>
            </div>
        </form>
    </div>
    ';
}


function modifier_profil() {

    echo '<main>
        <div class="container">
            <h1>Modifier votre profil</h1>';
    
    // Charger les informations de l'utilisateur à partir du fichier JSON
    $utilisateur = null;
    $pseudo = $_SESSION['pseudo']; // Supposons que le pseudo soit stocké dans la session
    $utilisateurs = json_decode(file_get_contents('utilisateurs.json'), true);

    // Trouver l'utilisateur correspondant au pseudo
    foreach ($utilisateurs as $user) {
        if ($user['utilisateur'] === $pseudo) {
            $utilisateur = $user;
            break;
        }
    }

    if ($utilisateur) {
        // Traitement du formulaire de modification du profil
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Gérer la modification du véhicule
            $nouveauVehicule = isset($_POST['vehicule']) ? $_POST['vehicule'] : null;
            if ($nouveauVehicule !== null) {
                // Mettre à jour les informations de l'utilisateur dans le tableau
                $utilisateur['vehicule'] = $nouveauVehicule;
                // Enregistrer les modifications dans le fichier JSON
                $index = array_search($pseudo, array_column($utilisateurs, 'utilisateur'));
                $utilisateurs[$index]['vehicule'] = $nouveauVehicule;
                file_put_contents('utilisateurs.json', json_encode($utilisateurs));
            }

            // Gérer la modification du mot de passe
            $nouveauMotDePasse = isset($_POST['motdepasse']) ? $_POST['motdepasse'] : null;
            if ($nouveauMotDePasse !== null) {
                // Mettre à jour les informations de l'utilisateur dans le tableau
                $utilisateur['motdepasse'] = password_hash($nouveauMotDePasse, PASSWORD_DEFAULT);
                // Enregistrer les modifications dans le fichier JSON
                $index = array_search($pseudo, array_column($utilisateurs, 'utilisateur'));
                $utilisateurs[$index]['motdepasse'] = $utilisateur['motdepasse'];
                file_put_contents('utilisateurs.json', json_encode($utilisateurs));
            }

            // Gérer la modification de l'adresse email
            $nouvelleEmail = isset($_POST['email']) ? $_POST['email'] : null;
            if ($nouvelleEmail !== null) {
                // Mettre à jour les informations de l'utilisateur dans le tableau
                $utilisateur['email'] = $nouvelleEmail;
                // Enregistrer les modifications dans le fichier JSON
                $index = array_search($pseudo, array_column($utilisateurs, 'utilisateur'));
                $utilisateurs[$index]['email'] = $nouvelleEmail;
                file_put_contents('utilisateurs.json', json_encode($utilisateurs));
            }
        }
        echo '<form method="post" enctype="multipart/form-data">
                <label for="vehicule">Véhicule actuel: ' . (isset($utilisateur['vehicule']) ? $utilisateur['vehicule'] : '') . '</label><br>
                <input type="text" id="vehicule" name="vehicule" placeholder="Nouveau véhicule"><br><br>

                <label for="motdepasse">Nouveau mot de passe:</label><br>
                <input type="password" id="motdepasse" name="motdepasse" placeholder="Nouveau mot de passe"><br><br>

                <label for="email">Nouvelle adresse email:</label><br>
                <input type="email" id="email" name="email" placeholder="Nouvelle adresse email"><br><br>

                <label for="image">Choisir une nouvelle image de profil:</label><br>
                <input type="file" id="image" name="image"><br><br>

                <button type="submit">Enregistrer les modifications</button>
            </form>';
    } else {
        echo "Utilisateur non trouvé.";
    }
    echo '</div>
    </main>

    <a href="calendar.php" class="btn">Voir mon calendrier de covoiturages</a>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form {
            margin-top: 20px;
            text-align: center;
        }
        label {
            font-size: 1.2em;
            color: #333;
        }
        input[type="text"], input[type="file"], input[type=email], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2em;
        }
        button:hover {
            background-color: #555;
        }
        .btn {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1.2em;
            width: 200px;
            margin: 20px auto;
        }
        .btn:hover {
            background-color: #555;
        }
    </style>';

}

function afficher_menu() {
    $menu = json_decode(file_get_contents('menu.json'), true);

    echo '<div class="container">
        <h1>Notre Menu</h1>
        <div class="row">';

    foreach ($menu as $item) {
        echo '<div class="col-md-4">
            <div class="card mb-4">
                <img class="card-img-top" src="' . $item['image'] . '" alt="' . $item['nom'] . '">
                <div class="card-body">
                    <h5 class="card-title">' . $item['nom'] . '</h5>
                    <p class="card-text">' . $item['description'] . '</p>
                    <p class="card-text">Prix: ' . $item['prix'] . '€</p>
                    <a href="commander.php?id=' . $item['id'] . '" class="btn btn-primary">Commander</a>
                </div>
            </div>
        </div>';
    }
    echo '</div></div>';
}

?>
