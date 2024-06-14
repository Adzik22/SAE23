<?php
session_start();
include 'function.php'; 

creer_header(); 
creer_navbar(); 
?>

<main>
    <div class="container">
        <h1>Bienvenue sur Fulguro Miam !</h1>
        <p>Le site de restauration rapide qui satisfait vos envies gourmandes.</p>

        <!-- Description esthétique du site -->
        <div class="description">
            <p>Fulguro Miam est votre compagnon idéal pour commander des plats délicieux rapidement et facilement. Notre plateforme conviviale vous permet de parcourir notre menu varié, de passer vos commandes en ligne et de les recevoir en un rien de temps.</p>
            <p>Que vous ayez une petite faim ou que vous souhaitiez partager un repas en famille, Fulguro Miam vous offre une solution pratique et savoureuse pour tous vos repas. Rejoignez notre communauté dès aujourd'hui et découvrez tous les avantages de la commande en ligne avec Fulguro Miam !</p>
        </div>

        <!-- Bouton vers la page de commande -->
        <a href="menu.php" class="btn btn-primary">Voir le menu</a>

        <!-- Témoignages fictifs -->
        <div class="testimonials">
            <h2>Témoignages de nos clients</h2>
            <div class="testimonial">
                <p>"Fulguro Miam m'a permis de trouver rapidement de délicieux repas pour toute la famille. Un service vraiment pratique et rapide!"</p>
                <p><em>- John Doe</em></p>
            </div>
            <div class="testimonial">
                <p>"J'ai utilisé Fulguro Miam pour commander des plats pour une fête et j'ai été impressionné par la qualité et la rapidité du service."</p>
                <p><em>- Jane Smith</em></p>
            </div>
        </div>
    </div>
</main>

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
        background-color: #f9f9f9;
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
