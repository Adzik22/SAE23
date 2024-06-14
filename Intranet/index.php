<?php
session_start();
if (!isset($_SESSION['USER'])) {
    $_SESSION['USER'] = "anonymous";
    $_SESSION['email'] = "";
    $_SESSION['role'] = "visitor";
}
include 'function2.php'; 
?>
<main>
    <div class="container">
        <h1>Connectez-vous</h1>
        </div>
    </div>
</main>
<?php
creer_header(); 
?>
<style>
    /* Style pour la section de description */
    .description {
        margin-bottom: 30px;
    }
    .description p {
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 15px;
    }
    /* Style pour les témoignages */
    .testimonials {
        margin-top: 50px;
    }
    .testimonial {
        background-color: #f9f9f8;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
    }
    .testimonial p {
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 10px;
    }
    .testimonial em {
        font-style: italic;
    }
    /* Style pour le bouton de commande */
    .btn-primary {
        background-color: #ff4500;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #cc3700;
    }
</style>
<?php
creer_footer();
?>