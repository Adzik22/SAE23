<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $plat_id = isset($_POST['plat']) ? (int)$_POST['plat'] : 0;
    $nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
    $adresse = isset($_POST['adresse']) ? trim($_POST['adresse']) : '';
    $telephone = isset($_POST['telephone']) ? trim($_POST['telephone']) : '';
    $quantite = isset($_POST['quantite']) ? (int)$_POST['quantite'] : 1;

    // Récupérer les données du menu
    $menu = json_decode(file_get_contents('menu.json'), true);
    $item = null;

    foreach ($menu as $menuItem) {
        if ($menuItem['id'] === $plat_id) {
            $item = $menuItem;
            break;
        }
    }

    if ($item && $nom && $adresse && $telephone && $quantite > 0) {
        // Simuler l'enregistrement de la commande
        $commande = [
            'plat' => $item['nom'],
            'prix' => $item['prix'],
            'nom' => $nom,
            'adresse' => $adresse,
            'telephone' => $telephone,
            'quantite' => $quantite,
            'total' => $item['prix'] * $quantite
        ];

        // Afficher une page de confirmation
        echo "<h1>Merci pour votre commande!</h1>";
        echo "<p>Vous avez commandé {$quantite}x {$commande['plat']} pour un total de {$commande['total']}€.</p>";
        echo "<p>Votre commande sera livrée à: {$commande['adresse']}.</p>";
        echo "<p>Nous vous contacterons au: {$commande['telephone']}.</p>";
    } else {
        echo "<p>Erreur dans les données soumises. Veuillez réessayer.</p>";
    }
} else {
    header('Location: commander.php');
    exit;
}
?>
