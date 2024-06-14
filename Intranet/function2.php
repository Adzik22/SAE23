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
            header('Location: intra_accueil.php');
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
                color: black;
                text-align:  left;
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
        <a class="navbar-brand" href="accueil.php">accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="Cloud_Groupe.php">Cloud_Groupe</a>
                </li>
                                <li class="nav-item">
                    <a class="nav-link" href="Cloud.php">Cloud_Perso</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="inscription.php">Inscriptions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Annuaire_clients.php">Nos clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="annuaire_employes.php">Nos employés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Annuaire_partenaires.php">Nos partenaires</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Wiki.php">Wiki</a>
                </li>              
            </ul>
        </div>
    </nav>
    ';
}


function supprimer_utilisateur() {
    if (!isset($_GET['id'])) {
        return;
    }
    $id = $_GET['id'];
    $utilisateurs = json_decode(file_get_contents("employer.json"), true);
    if ($utilisateurs === null) {
        return;
    }
    if (array_key_exists($id, $utilisateurs)) {
        unset($utilisateurs[$id]);
        file_put_contents("employer.json", json_encode(array_values($utilisateurs)));
    }
}

function ajouter_utilisateur() {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && !isset($_POST['id'])) {
        $nom = $_POST['nom'] ?? "";
        $email = $_POST['email'] ?? "";
        $motdepasse = password_hash($_POST['motdepasse'] ?? "", PASSWORD_BCRYPT);
        $role = $_POST['role'] ?? "utilisateur";
        $utilisateurs = json_decode(file_get_contents("employer.json"), true) ?: [];
        array_push($utilisateurs, [
            "utilisateur" => $nom,
            "email" => $email,
            "motdepasse" => $motdepasse,
            "role" => $role,
            "groupes" => [] // Initialise avec un tableau vide de groupes
        ]);
        file_put_contents("employer.json", json_encode($utilisateurs));
        echo "L'utilisateur a été créé avec succès.";
    }
}


function modifier_role_utilisateur() {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id']) && isset($_POST['role'])) {
        $id = $_POST['id'];
        $role = $_POST['role'];
        $utilisateurs = json_decode(file_get_contents("employer.json"), true);
        if ($utilisateurs === null || !array_key_exists($id, $utilisateurs)) {
            return;
        }
        $utilisateurs[$id]['role'] = $role;
        file_put_contents("employer.json", json_encode($utilisateurs));
    }
}

function ajouter_groupe() {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['action']) && $_POST['action'] === "ajouter_groupe") {
        $nom_groupe = $_POST['nom_groupe'];
        $groupes = json_decode(file_get_contents("groupes.json"), true) ?: [];
        if (!in_array($nom_groupe, $groupes)) {
            $groupes[] = $nom_groupe;
            file_put_contents("groupes.json", json_encode($groupes));
        }
    }
}
function ajouter_groupe_utilisateur() {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['action']) && $_POST['action'] === "ajouter_groupe_utilisateur") {
        $id = $_POST['id'];
        $groupe = $_POST['groupe'];
        $utilisateurs = json_decode(file_get_contents("employer.json"), true);
        
        if ($utilisateurs === null || !array_key_exists($id, $utilisateurs)) {
            return;
        }
        
        // Vérifier si l'utilisateur a déjà ce groupe
        if (!in_array($groupe, $utilisateurs[$id]['groupes'])) {
            $utilisateurs[$id]['groupes'][] = $groupe;
            file_put_contents("employer.json", json_encode($utilisateurs));
        }
    }
}



function retirer_groupe_utilisateur() {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['action']) && $_POST['action'] === "retirer_groupe_utilisateur") {
        $id = $_POST['id'];
        $groupe = $_POST['groupe'];
        $utilisateurs = json_decode(file_get_contents("employer.json"), true);
        
        if ($utilisateurs === null || !array_key_exists($id, $utilisateurs)) {
            return;
        }
        
        // Trouver l'index du groupe dans le tableau et le retirer
        $index = array_search($groupe, $utilisateurs[$id]['groupes']);
        if ($index !== false) {
            unset($utilisateurs[$id]['groupes'][$index]);
            $utilisateurs[$id]['groupes'] = array_values($utilisateurs[$id]['groupes']);
            file_put_contents("employer.json", json_encode($utilisateurs));
        }
    }
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


function test_admin() {
    if (isset($_SESSION["USER"]) && $_SESSION["USER"] === "admin") {
        return true;
    } else {
        return false;
    }   
}

function test_moderateur() {
    if (isset($_SESSION["USER"]) && $_SESSION["USER"] === "moderateur") {
        return true;
    } else {
        return false;
    }   

}
function test_utilisateur() {
    if (isset($_SESSION["USER"]) && $_SESSION["USER"] === "utilisateur") {
        return true;
    } else {
        return false;
    }   
}
?>
