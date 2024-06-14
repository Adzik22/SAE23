<?php
session_start();
include 'function.php';

$utilisateurs = json_decode(file_get_contents('utilisateurs.json'), true);

creer_header();
creer_navbar();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des clients et du personnel</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Liste des Clients</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Ville</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Chemin vers le fichier JSON
        $fichier_json = 'SAE23\TP R209/utilisateurs.json';

        // Lire le contenu du fichier JSON
        $json_data = file_get_contents($fichier_json);

        // Décoder les données JSON en tableau PHP
        $clients = json_decode($json_data, true);

        // Vérifier si le décodage a réussi
        if ($clients !== null) {
            // Parcourir chaque client et afficher les détails
            foreach ($clients as $client) {
                echo '<tr>';
                echo '<td>' . $client['id'] . '</td>';
                echo '<td>' . $client['nom'] . '</td>';
                echo '<td>' . $client['email'] . '</td>';
                echo '<td>' . $client['ville'] . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="4">Aucun client trouvé.</td></tr>';
        }
        ?>
    </tbody>
</table>

</body>
</html>


<?php
creer_footer();
?>
