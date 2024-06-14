<?php
include 'function.php';

creer_header();
creer_navbar();
?>

<main>
    <div class="container">
        <h1>Nos Partenaires</h1>
        <p>Nous collaborons avec plusieurs partenaires de confiance pour vous offrir les meilleurs produits et services :</p>
        <div id="partners-map" style="height: 500px; width: 100%;"></div>
    </div>
</main>

<?php
creer_footer();
?>

<script>
function initMap() {
    const map = new google.maps.Map(document.getElementById('partners-map'), {
        zoom: 5,
        center: { lat: 48.8566, lng: 2.3522 } // Centre sur la France
    });

    const partners = [
        { name: "Partenaire 1", lat: 48.8566, lng: 2.3522 },
        { name: "Partenaire 2", lat: 45.7640, lng: 4.8357 },
        // Ajoutez plus de partenaires ici
    ];

    partners.forEach(partner => {
        new google.maps.Marker({
            position: { lat: partner.lat, lng: partner.lng },
            map: map,
            title: partner.name
        });
    });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1V_86IPgpGKdAPd-gjMfIHwfM08_ODSw&callback=initMap" async defer></script>
