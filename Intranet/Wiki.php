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



<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Wiki du Projet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .content-section {
            margin-bottom: 2rem;
        }
        h2, h3 {
            margin-top: 1.5rem;
        }
        p {
            margin-top: 0.5rem;
        }
        h2 {
            color: #007bff; /* Change to your preferred color for section titles */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Présentation du Site Web de Notre Entreprise</h1>
        
        <div class="content-section">
            <h2>Identité Graphique Numérique</h2>

            <h3>Définition d'un Logo</h3>
            <p>Nous avons entrepris de renouveler l'image de notre entreprise en créant un nouveau logo. Ce logo met en avant le nom de notre entreprise</p>

            <h3>Charte Graphique</h3>
            <p>Pour le design du site vitrine et de l'intranet, nous utilisons Bootstrap comme base. Le style CSS est personnalisé avec les couleurs de l'entreprise.</p>
        </div>

        <div class="content-section">
            <h2>Architecture du Projet</h2>

            <h3>Structure des Modules et Pages</h3>
            <p>Le projet est structuré en plusieurs modules et pages, chacun ayant un rôle spécifique. La communication entre ces modules est clairement définie pour permettre l'intégration de l'intranet avec le site vitrine.</p>

            <h3>Méthodes de Communication Inter-modules</h3>
            <p>Nous avons défini des méthodes pour les appels entre les modules, permettant par exemple d'accéder aux éléments de l'intranet depuis le site vitrine.</p>

            <h3>Groupes d'Utilisateurs et Matrice des Droits</h3>
            <p>Nous avons défini différents groupes d'utilisateurs et une matrice des droits de fichiers par groupe. Cela garantit que chaque utilisateur a accès uniquement aux informations pertinentes à son rôle.</p>
        </div>

        <div class="content-section">
            <h2>Site Vitrine</h2>

            <h3>Accueil</h3>
            <p>La page d'accueil offre une description générale de notre entreprise.</p>

            <h3>Activités</h3>
            <p>Cette page détaille les différentes activités de l'entreprise.</p>

            <h3>Partenaires</h3>
            <p>Nous affichons les logos et les descriptions de nos partenaires.</p>

            <h3>Contacts</h3>
            <p>Les utilisateurs peuvent nous envoyer un message via un formulaire de contact comprenant leur nom, prénom, adresse mail, numéro de téléphone et un message. Les informations de contact de l'entreprise, telles que l'adresse postale, sont également affichées ici.</p>
        </div>

        <div class="content-section">
            <h2>Intranet</h2>

            <h3>Accès Réservé aux Salariés</h3>
            <p>Notre intranet est exclusivement réservé aux employés de l'entreprise. Les visiteurs anonymes n'ont pas accès aux informations internes. Une page de connexion sécurisée est fournie, permettant également la création de comptes salariés, à condition que l'adresse mail utilisée appartienne au domaine de l'entreprise. Un contrôle de cette adresse est obligatoire et un mail de confirmation est envoyé pour valider la création du compte.</p>

            <h3>Gestion des Droits d'Utilisateurs</h3>
            <p>L'intranet permet une gestion fine des droits d'accès pour les utilisateurs, avec différents niveaux de délégation (administrateur, modérateur, utilisateur). Les administrateurs peuvent ajouter ou supprimer des utilisateurs et des groupes, affecter des utilisateurs à des groupes et attribuer des droits spécifiques. Les modérateurs ont des droits similaires mais plus restreints.</p>

            <h3>Espaces de Fichiers</h3>
            <p>Les utilisateurs avec des droits privilégiés peuvent créer et gérer des espaces de fichiers, qui peuvent être publics (accessibles à tous les collaborateurs), privés (accessibles à un groupe donné) ou personnels (accessibles uniquement à l'utilisateur).</p>

            <h3>Gestionnaire de Fichiers</h3>
            <p>Les droits d'ajout et de suppression de fichiers varient selon l'espace de fichiers et le rôle de l'utilisateur. Les administrateurs et modérateurs peuvent gérer les fichiers dans les espaces publics et privés, tandis que les utilisateurs peuvent uniquement ajouter des fichiers dans ces espaces.</p>

            <h3>Annuaire de l'Entreprise</h3>
            <p>Un annuaire complet de l'entreprise, comprenant au moins 20 personnes, est disponible dans l'intranet. Des filtres permettent de retrouver facilement différents groupes de personnels. Les données peuvent être ajoutées, modifiées, supprimées, et certaines informations sont visibles sur le site vitrine.</p>

            <h3>Annuaire des Partenaires et des Clients</h3>
            <p>L'annuaire des partenaires, comprenant au moins 10 partenaires, est géré avec des informations visibles sur le site vitrine. L'annuaire des clients, comprenant au moins 40 clients, est réservé à l'intranet. Les informations clients sont gérées avec des options pour télécharger des fiches clients.</p>

            <h3>Page Wiki</h3>
            <p>Cette page décrit le site et l'utilisation des différentes fonctionnalités. Elle comprend également la liste des identifiants et mots de passe nécessaires pour tester le site.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<?php
creer_footer(); 
?>
