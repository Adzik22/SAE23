<?php
session_start();
include 'function.php';

// Charger les utilisateurs à partir du fichier JSON
$utilisateurs = json_decode(file_get_contents('utilisateurs.json'), true);
creer_header();
creer_navbar();
?>

<main class="container mt-5">
    <h2>Liste des utilisateurs</h2>
    <!-- Tableau pour afficher les utilisateurs -->
    <table class="table">
        <thead>
            <tr>
                <th>Utilisateur</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Boucle pour afficher chaque utilisateur -->
            <?php foreach($utilisateurs as $utilisateur): ?>
                <tr>
                    <td><?= $utilisateur['utilisateur'] ?></td>
                    <td><?= $utilisateur['email'] ?></td>
                    <td><?= $utilisateur['role'] ?></td>
                    <td>
                        <!-- Formulaire de modification du rôle -->
                        <form class="role-form">
                            <input type="hidden" name="user_id" value="<?= $utilisateur['utilisateur'] ?>">
                            <select class="form-select" name="role">
                                <option value="utilisateur" <?= $utilisateur['role'] == 'utilisateur' ? 'selected' : '' ?>>Utilisateur</option>
                                <option value="moderateur" <?= $utilisateur['role'] == 'moderateur' ? 'selected' : '' ?>>Modérateur</option>
                                <option value="admin" <?= $utilisateur['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                            </select>
                            <button type="submit" class="btn btn-primary btn-sm">Modifier</button>
                        </form>
                        <!-- Bouton de suppression d'utilisateur -->
                        <button class="btn btn-danger btn-sm delete-user" data-user-id="<?= $utilisateur['utilisateur'] ?>">Supprimer</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<!-- Scripts pour gérer les actions de modification et de suppression via AJAX -->
<script>
    // AJAX pour la modification du rôle
    $('.role-form').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'update_role.php', // Mettez le chemin correct vers votre script PHP pour la modification du rôle
            data: formData,
            success: function(response) {
                alert(response); // Afficher la réponse (par exemple, "Rôle mis à jour avec succès")
            }
        });
    });

    // AJAX pour la suppression d'utilisateur
    $(document).on('click', '.delete-user', function() {
        var userId = $(this).data('user-id');
    $.ajax({
            type: 'POST',
            url: 'delete_user.php', // Mettez le chemin correct vers votre script PHP pour la suppression de l'utilisateur
            data: { user_id: userId },
            success: function(response) {
                alert(response); // Afficher la réponse (par exemple, "Utilisateur supprimé avec succès")
                // Rafraîchir la page après la suppression de l'utilisateur
                location.reload();
            }
        });
    });

</script>

<?php
creer_footer();
?>
