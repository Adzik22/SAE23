<?php
include 'function.php';

creer_header();
creer_navbar();
?>

<main>
    <div class="container">
        <h1>Qui sommes-nous</h1>
        <p>Notre entreprise est spécialisée dans la restauration rapide de qualité. Nous utilisons des ingrédients frais et locaux pour préparer nos plats.</p>
        <p>Fondée en 2000, notre mission est de fournir une nourriture délicieuse et un service impeccable à tous nos clients.</p>
        <p>Notre restaurant est situé à Saint-Malo. Venez nous rendre visite !</p>
        <div id="map" style="height: 500px; width: 100%;"></div>
    </div>
</main>

<?php
creer_footer();
?>

<script>
function initMap() {
    // Localisation du restaurant à Saint-Malo
    const saintMalo = { lat: 48.649337, lng: -2.025674 };
    // Création de la carte centrée sur Saint-Malo
    const map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: saintMalo
    });
    // Ajout d'un marqueur sur Saint-Malo
    const marker = new google.maps.Marker({
        position: saintMalo,
        map: map
    });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1V_86IPgpGKdAPd-gjMfIHwfM08_ODSw&callback=initMap" async defer></script>
