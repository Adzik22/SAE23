<?php
session_start();

// Exemple de données de covoiturages (à remplacer par vos propres données)
$covoiturages = array(
    array('id' => 1, 'title' => 'Covoiturage 1', 'start' => '2024-04-10', 'participants' => ['user1']),
    array('id' => 2, 'title' => 'Covoiturage 2', 'start' => '2024-04-15', 'participants' => [])
);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier des covoiturages</title>
    <style>
        /* Style CSS pour le calendrier */
        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            border-collapse: collapse;
            width: 100%;
        }

        .calendar-header {
            text-align: center;
            font-weight: bold;
            padding: 10px;
        }

        .calendar-cell {
            border: 1px solid #ccc;
            padding: 10px;
            height: 100px; /* Hauteur des cellules du calendrier */
        }
    </style>
</head>
<body>

<table class="calendar">
    <thead>
    <tr class="calendar-header">
        <th>Lundi</th>
        <th>Mardi</th>
        <th>Mercredi</th>
        <th>Jeudi</th>
        <th>Vendredi</th>
        <th>Samedi</th>
        <th>Dimanche</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php
        // Générer les cellules du calendrier
        $jour = 1;
        $jourSemaine = 1; // 1 pour Lundi, 2 pour Mardi, ... , 7 pour Dimanche

        // Boucle pour les 7 colonnes (jours de la semaine)
        for ($i = 1; $i <= 7; $i++) {
            echo '<td class="calendar-cell">';

            // Vérifier si le jour est un covoiturage
            foreach ($covoiturages as $covoiturage) {
                $covoiturageDate = date('Y-m-d', strtotime($covoiturage['start']));
                $jourActuel = date('Y-m-d', strtotime("+$jourSemaine days"));

                if ($covoiturageDate == $jourActuel) {
                    echo $covoiturage['title'] . '<br>';
                    // Vérifier si l'utilisateur est inscrit à ce covoiturage
                    if (isset($_SESSION["reservation"]) && $_SESSION["reservation"]["annonce_id"] == $covoiturage['id']) {
                        echo "<strong>Inscrit</strong><br>";
                    }
                }
            }

            echo '</td>';

            // Passer au jour suivant
            $jour++;
            $jourSemaine++;
        }
        ?>
    </tr>
    </tbody>
</table>

</body>
</html>
