<?php
session_start();
include 'function.php'; 

// Récupérer les données du menu
$menu = json_decode(file_get_contents('menu.json'), true);

creer_header(); 
creer_navbar(); 
?>

<main>
    <div class="container">
        <h1>Commander un plat</h1>
        <form action="traitement_commande.php" method="post">
            <div class="form-group">
                <label for="plat">Plat</label>
                <select class="form-control" id="plat" name="plat" required>
                    <?php foreach ($menu as $item) { ?>
                        <option value="<?php echo htmlspecialchars($item['id']); ?>">
                            <?php echo htmlspecialchars($item['nom']); ?> - <?php echo htmlspecialchars($item['prix']); ?>€
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" required>
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="tel" class="form-control" id="telephone" name="telephone" required>
            </div>
            <div class="form-group">
                <label for="quantite">Quantité</label>
                <input type="number" class="form-control" id="quantite" name="quantite" min="1" value="1" required>
            </div>
            <button type="submit" class="btn btn-primary">Passer la commande</button>
        </form>
    </div>
</main>

<?php
creer_footer(); 
?>
