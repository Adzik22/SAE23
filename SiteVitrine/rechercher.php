<?php
session_start();
include 'function.php';

creer_header();
creer_navbar();

// Fonction pour charger les annonces depuis le fichier JSON
function chargerAnnonces()
{
    $annonces = file_get_contents('Annonces.json');
    return json_decode($annonces, true);
}

// Fonction pour afficher les annonces filtrées
function afficherAnnoncesFiltrees()
{
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["date"]) && isset($_GET["places"]) && isset($_GET["trajet"])) {
        // Charger les annonces
        $annonces = chargerAnnonces();

        // Filtrer les annonces selon les critères de recherche
        $annonces_filtrees = array_filter($annonces, function ($annonce) {
            return $annonce["Date"] == $_GET["date"] && $annonce["Places"] >= $_GET["places"] && ($annonce["Depart"] == $_GET["trajet"] || $annonce["Arrivee"] == $_GET["trajet"]);
        });

        // Afficher les annonces filtrées
        foreach ($annonces_filtrees as $annonce) {
            echo "<div>";
            echo "<strong>Date de départ:</strong> " . $annonce["Date"] . "<br>";
            echo "<strong>Ville de départ:</strong> " . $annonce["Depart"] . "<br>";
            echo "<strong>Ville d'arrivée:</strong> " . $annonce["Arrivee"] . "<br>";
            echo "<strong>Places disponibles:</strong> " . $annonce["Places"] . "<br>";
            echo "<strong>Commentaire:</strong> " . $annonce["Commentaire"] . "<br>";

            // Ajouter le bouton pour s'inscrire sur cette annonce
            if (!empty($_SESSION["pseudo"])) {
                echo '<form method="post" action="calendar.php">';
                echo '<input type="hidden" name="annonce_id" value="' . $annonce['ID'] . '">';
                echo '<input type="submit" name="submit_reservation" value="S\'inscrire">';
                echo '</form>';
            }
            echo "</div><br>";
        }
    } else {
        // Afficher le formulaire de recherche
        ?>
        <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="date">Date de départ:</label><br>
            <input type="date" id="date" name="date" required><br><br>

            <label for="places">Nombre de places disponibles:</label><br>
            <input type="number" id="places" name="places" min="1" required><br><br>

            <label for="trajet">Trajet (ville de départ ou ville d'arrivée):</label><br>
            <input type="text" id="trajet" name="trajet" required><br><br>

            <input type="submit" value="Rechercher">
        </form>
    <?php
    }
}

?>

<main>
    <div class="container">
        <h1>Rechercher des trajets</h1>
        <p>Utilisez le formulaire ci-dessous pour trouver des trajets disponibles.</p>
        <?php afficherAnnoncesFiltrees(); ?>
    </div>
</main>

<style>
    .container {
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    

    .search-form {
        max-width: 600px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="date"],
    input[type="number"],
    input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        box-sizing: border-box;
    }

    button.btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button.btn-primary:hover {
        background-color: #0056b3;
    }
</style>

<?php
creer_footer();
?>
