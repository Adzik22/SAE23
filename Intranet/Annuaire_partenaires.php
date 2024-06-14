<?php
session_start();
if (!isset($_SESSION['USER'])) {
    $_SESSION['USER'] = "anonymous";
    $_SESSION['email'] = "";
    $_SESSION['role'] = "visitor";
}
include 'function2.php'; 
creer_header(); 
creer_navbar(); 
?>
<?php
include("function2.php");

// Handle user actions
supprimer_utilisateur();
ajouter_utilisateur();
modifier_role_utilisateur();
ajouter_groupe();
ajouter_groupe_utilisateur();
retirer_groupe_utilisateur();

// Fetch data from JSON files
$utilisateurs = json_decode(file_get_contents("./employer.json"), true);
$groupes = json_decode(file_get_contents("./groupes.json"), true);

// Generate navigation bar
creer_navbar();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Administration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h1 class="py-4 text-center">Informations employé</h1>
    <div class="container">
        <div class="row ligne-nombre-utilisateurs">
            <div class="offset-2 col-3">
                <span class="align-middle">Nombre d'utilisateurs : <?php echo count($utilisateurs) ?></span>
            </div>
            <div class="offset-3 col-3">
            </div>
        </div>
        <div class="row ligne-tableau-utilisateurs">
            <div class="offset-2 col-8">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Utilisateur</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Mot de passe</th>
                            <th scope="col">Rôle</th>
                            <th scope="col">Groupes</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($utilisateurs as $id => $utilisateur) : ?>
                            <tr>
                                <td><?php echo $utilisateur['utilisateur'] ?></td>
                                <td><?php echo $utilisateur['email'] ?></td>
                                <td><?php echo $utilisateur['motdepasse'] ?></td>
                                <td><?php echo $utilisateur['role'] ?></td>
                                <td><?php echo isset($utilisateur['groupes']) ? implode(", ", $utilisateur['groupes']) : '' ?></td>
                                <td>
                                    <a href="Annuaire_employer.php?action=supprimer_user&id=<?php echo $id ?>" class="btn btn-sm btn-danger material-icons">Supprimer</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <form action="Annuaire_employer.php" method="post" class="row">
                                        <div class="col">
                                            <select class="form-control" name="role" required>
                                                <option value="utilisateur" <?php if ($utilisateur['role'] == 'utilisateur') echo 'selected'; ?>>Utilisateur</option>
                                                <option value="admin" <?php if ($utilisateur['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                                                <option value="moderateur" <?php if ($utilisateur['role'] == 'moderateur') echo 'selected'; ?>>Modérateur</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <input type="submit" class="btn btn-primary btn-block" value="Modifier Rôle">
                                        </div>
                                    </form>
                                    <form action="Annuaire_employer.php" method="post" class="row mt-2">
                                        <div class="col">
                                            <select class="form-control" name="groupe" required>
                                                <?php foreach ($groupes as $groupe) : ?>
                                                    <option value="<?php echo $groupe; ?>"><?php echo $groupe; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <input type="hidden" name="action" value="ajouter_groupe_utilisateur">
                                            <input type="submit" class="btn btn-secondary btn-block" value="Ajouter au Groupe">
                                        </div>
                                    </form>
                                    <form action="Annuaire_employer.php" method="post" class="row mt-2">
                                        <div class="col">
                                            <select class="form-control" name="groupe" required>
                                                <?php foreach ($utilisateur['groupes'] ?? [] as $groupe) : ?>
                                                    <option value="<?php echo $groupe; ?>"><?php echo $groupe; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <input type="hidden" name="action" value="retirer_groupe_utilisateur">
                                            <input type="submit" class="btn btn-warning btn-block" value="Retirer du Groupe">
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="bg-light">
        <div class="container">
            <h4 class="my-4 col">Ajouter un utilisateur</h4>
            <form action="Annuaire_employer.php" method="post" class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Nom" name="nom" required>
                </div>
                <div class="col">
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                </div>
                <div class="col">
                    <input type="password" class="form-control" placeholder="Mot de passe" name="motdepasse" required>
                </div>
                <div class="col">
                    <select class="form-control" name="role" required>
                        <option value="utilisateur">Utilisateur</option>
                        <option value="admin">Admin</option>
                        <option value="moderateur">Modérateur</option>
                    </select>
                </div>
                <div class="col">
                    <input type="submit" class="btn btn-success btn-block" value="Ajouter">
                </div>
            </form>
        </div>
    </div>
    
    <div class="bg-light mt-4">
        <div class="container">
            <h4 class="my-4 col">Créer un groupe</h4>
            <form action="Annuaire_employer.php" method="post" class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Nom du groupe" name="nom_groupe" required>
                </div>
                <div class="col">
                    <input type="hidden" name="action" value="ajouter_groupe">
                    <input type="submit" class="btn btn-primary btn-block" value="Créer Groupe">
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<main>
    <div class="container">
        <h1>Bienvenue sur L'intranet</h1>
<?php
creer_footer(); 
?>
