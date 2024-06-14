<?php
include 'function.php';

creer_header();
creer_navbar();
?>

<main>
    <div class="container">
        <h1>Notre Histoire</h1>
        <p>Depuis notre création en 2000, notre restaurant a évolué pour devenir une référence dans la région. Voici quelques moments clés de notre histoire :</p>
        <div id="timeline-embed" style="width: 100%; height: 600px"></div>
    </div>
</main>

<?php
creer_footer();
?>

<link rel="stylesheet" type="text/css" href="https://cdn.knightlab.com/libs/timeline3/latest/css/timeline.css">
<script src="https://cdn.knightlab.com/libs/timeline3/latest/js/timeline.js"></script>
<script>
    const timelineData = {
        "title": {
            "media": {
                "url": "cafe.png",
                "caption": "Notre logo"
            },
            "text": {
                "headline": "L'Histoire de notre Restaurant",
                "text": "<p>Découvrez les moments clés de notre histoire.</p>"
            }
        },
        "events": [
            {
                "media": {
                    "url": "open.jpeg",
                    "caption": "Ouverture"
                },
                "start_date": {
                    "year": "2014"
                },
                "text": {
                    "headline": "Ouverture du Restaurant",
                    "text": "<p>Nous avons ouvert notre premier restaurant en 2014 avec l'objectif de fournir une expérience culinaire exceptionnelle.</p>"
                }
            },
            {
                "media": {
                    "url": "expension.jpg",
                    "caption": "Expansion"
                },
                "start_date": {
                    "year": "2020"
                },
                "text": {
                    "headline": "Expansion",
                    "text": "<p>En 2020, nous avons ouvert notre deuxième établissement pour répondre à la demande croissante.</p>"
                }
            }
            // Ajoutez plus d'événements ici
        ]
    };

    window.timeline = new TL.Timeline('timeline-embed', timelineData);
</script>
