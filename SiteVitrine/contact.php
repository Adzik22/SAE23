<?php
include 'function.php'; 

// Fonction pour traiter la soumission du formulaire
function handle_contact_form_submission() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $subject = htmlspecialchars($_POST['subject']);
        $message = htmlspecialchars($_POST['message']);

        // Ajoutez ici la logique pour envoyer un email ou enregistrer les données dans une base de données
        // Pour l'instant, on affiche simplement un message de confirmation
        echo "<div class='confirmation'>";
        echo "<h1>Merci de nous avoir contactés, $name.</h1>";
        echo "<p>Nous vous répondrons bientôt à l'adresse $email.</p>";
        echo "</div>";
    }
}

creer_header();
creer_navbar();
?>

<main>
    <div class="container">
        <h1>Contactez-nous</h1>
        <p>Nous serions ravis de recevoir vos commentaires et vos questions. Veuillez remplir le formulaire ci-dessous :</p>
        <form action="contact.php" method="POST">
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="subject">Sujet :</label>
                <input type="text" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="message">Message :</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit">Envoyer</button>
        </form>
    </div>
</main>

<?php
creer_footer();
handle_contact_form_submission();
?>

<style>
    .container {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input, textarea {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
    }

    button {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    .confirmation {
        margin-top: 20px;
        padding: 15px;
        background-color: #e7f3e7;
        border: 1px solid #4CAF50;
        color: #4CAF50;
    }
</style>
