<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Clients</title>
    <style>
        /* Style CSS pour le tableau */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            border-collapse: collapse;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Liste des Clients</h2>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Chemin vers le fichier JSON
        $jsonFile = 'client.json';

        // Vérifier si le fichier existe avant de le lire
        if (!file_exists($jsonFile)) {
            die("Le fichier client.json n'existe pas à l'emplacement spécifié.");
        }

        // Lire le contenu du fichier JSON
        $json_data = file_get_contents($jsonFile);

        // Convertir le JSON en tableau associatif PHP
        $clients = json_decode($json_data, true);

        // Vérifier si la conversion a réussi
        if ($clients === null && json_last_error() !== JSON_ERROR_NONE) {
            die("Erreur lors de la lecture du fichier JSON");
        }

        // Afficher les clients dans le tableau HTML
        foreach ($clients as $client) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($client['Nom'] ?? '') . "</td>";
            echo "<td>" . htmlspecialchars($client['Prénom'] ?? '') . "</td>";
            echo "<td>" . htmlspecialchars($client['Email'] ?? '') . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
