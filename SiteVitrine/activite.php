<?php
include 'function.php';

creer_header();
creer_navbar();
?>

<main>
    <div class="container">
        <h1>Nos Activités</h1>
        <p>Découvrez les diverses activités que nous organisons pour nos clients, des cours de cuisine aux dégustations de vins :</p>
        <div class="gallery">
            <a href="cours.jpg" data-lightbox="activities" data-title="Cours de Cuisine">
                <img src="chef.webp" alt="Cours de Cuisine">
            </a>
            <a href="degustation.jpeg" data-lightbox="activities" data-title="Dégustation de Vins">
                <img src="bouteille.jpg" alt="Dégustation de Vins">
            </a>
            <a href="cours_c.jpeg" data-lightbox="activities" data-title="Atelier Cocktail">
                <img src="cocktail.jpeg" alt="Cokctail">
            </a>
        </div>
    </div>
</main>

<?php
creer_footer();
?>

<link href="https://cdn.rawgit.com/lokesh/lightbox2/master/dist/css/lightbox.css" rel="stylesheet">
<script src="https://cdn.rawgit.com/lokesh/lightbox2/master/dist/js/lightbox-plus-jquery.js"></script>

<style>
    .gallery {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }
    .gallery a {
        flex: 1 1 calc(25% - 40px);
        max-width: calc(25% - 40px);
        margin: 10px;
        box-sizing: border-box;
    }
    .gallery img {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 8px;
        box-shadow: 0 
