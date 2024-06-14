<?php
echo "<h2>Page rechercher.php</h2>";
echo "<h3>Fonctions utilisées :</h3>";
echo "<ul>";
echo "<li>session_start()</li>";
echo "<li>chargerAnnonces()</li>";
echo "<li>afficherAnnoncesFiltrees()</li>";
echo "</ul>";

echo "<h3>Ce qui fonctionne :</h3>";
echo "<ul>";
echo "<li>Affichage de l'en-tête avec creer_header()</li>";
echo "<li>Affichage de la barre de navigation avec creer_navbar()</li>";
echo "<li>Affichage du formulaire de recherche</li>";
echo "<li>Affichage des annonces filtrées</li>";
echo "</ul>";

echo "<h3>Ce qui ne fonctionne pas :</h3>";
echo "<ul>";
echo "<li>Le bouton s'incrire n'envoie pas les bonnes données pour retrouvez la reservation sur le profil</li>";
echo "</ul>";

echo "<h3>Comment utiliser / Comment tester :</h3>";
echo "<ul>";
echo "<li>Ouvrez la page dans un navigateur web pour visualiser le contenu.</li>";
echo "<li>Utilisez le formulaire de recherche pour rechercher des trajets disponibles en spécifiant une date de départ, le nombre de places nécessaires et le trajet (ville de départ ou ville d'arrivée).</li>";
echo "<li>Les annonces correspondant aux critères de recherche seront affichées.</li>";
echo "<li>Si vous êtes connecté, vous pouvez vous inscrire sur une annonce en cliquant sur le bouton 'S'inscrire'.</li>";
echo "</ul>";

echo "<h3>Particularités et subtilités :</h3>";
echo "<ul>";
echo "<li>La mise en forme CSS est utilisée pour rendre la page esthétique.</li>";
echo "<li>Les annonces sont chargées à partir d'un fichier JSON et filtrées en fonction des critères de recherche.</li>";
echo "<li>Si l'utilisateur est connecté, un bouton 'S'inscrire' est affiché pour chaque annonce, lui permettant de s'inscrire sur cette annonce.</li>";
echo "</ul>";
?>
