<?php
session_start();
include 'function.php'; 

creer_header(); 

creer_navbar(); 
?>

<main>
    <div class="container">
        <h1>Proposer une annonce</h1>
        <p>Utilisez le formulaire ci-dessous pour créer une annonce.</p>

        <div class="proposal-form">
            <?php
            // Fonction pour charger les annonces depuis le fichier JSON
            function chargerAnnonces() {
                $annonces = file_get_contents('Annonces.json');
                return json_decode($annonces, true);
            }

            // Fonction pour sauvegarder les annonces dans le fichier JSON
            function sauvegarderAnnonces($annonces) {
                $json = json_encode($annonces, JSON_PRETTY_PRINT);
                file_put_contents('Annonces.json', $json);
            }

            // Vérifier si le formulaire a été soumis
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Récupérer les données du formulaire
                $annonce = array(
                    "Pseudo" => $_POST["pseudo"],
                    "Date" => $_POST["date"],
                    "Heure" => $_POST["heure"],
                    "Depart" => $_POST["depart"],
                    "Arrivee" => $_POST["arrivee"],
                    "Places" => $_POST["places"],
                    "Commentaire" => $_POST["commentaire"],
                    "Inscrits" => array()
                );

                // Charger les annonces existantes
                $annonces = chargerAnnonces();

                // Ajouter la nouvelle annonce
                $annonces[] = $annonce;

                // Sauvegarder les annonces mises à jour
                sauvegarderAnnonces($annonces);

                // Afficher un message de confirmation
                echo "Annonce ajoutée avec succès.";

                // Réinitialiser les variables du formulaire
                $_POST = array();
            } else {
                // Afficher le formulaire pour ajouter une annonce
            ?>
                <form method="post" action="proposer.php">
                    <div class="form-group">
                        <label for="pseudo">Pseudo:</label><br>
                        <input type="text" id="pseudo" name="pseudo" required><br>
                    </div>

                    <div class="form-group">
                        <label for="date">Date de départ:</label><br>
                        <input type="date" id="date" name="date" required><br>
                    </div>

                    <div class="form-group">
                        <label for="heure">Heure de départ:</label><br>
                        <input type="time" id="heure" name="heure" required><br>
                    </div>

                    <div class="form-group">
                        <label for="depart">Ville de départ:</label><br>
                        <input type="text" id="depart" name="depart" required><br>
                    </div>

                    <div class="form-group">
                        <label for="arrivee">Ville d'arrivée:</label><br>
                        <input type="text" id="arrivee" name="arrivee" required><br>
                    </div>

                    <div class="form-group">
                        <label for="places">Places disponibles:</label><br>
                        <input type="number" id="places" name="places" required><br>
                    </div>

                    <div class="form-group">
                        <label for="commentaire">Commentaire:</label><br>
                        <textarea id="commentaire" name="commentaire"></textarea><br>
                    </div>

                    <input type="submit" class="btn-primary" value="Ajouter l'annonce">
                </form>
            <?php
            }
            ?>
        </div>
    </div>
</main>

<?php
creer_footer(); 
?>

<style>
    .container {
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .proposal-form {
        max-width: 600px;
        margin: 0 auto; /* Pour centrer horizontalement */
        padding: 20px;
        border-radius: 10px;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="date"],
    input[type="time"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
