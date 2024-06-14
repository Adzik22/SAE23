<?php
echo "<h2>Page proposer.php</h2>";
echo "<h3>Fonctions utilisées :</h3>";
echo "<ul>";
echo "<li>session_start()</li>";
echo "<li>chargerAnnonces()</li>";
echo "<li>sauvergarderAnnonces()</li>";
echo "</ul>";

echo "<h3>Ce qui fonctionne :</h3>";
echo "<ul>";
echo "<li>Affichage de l'en-tête avec creer_header()</li>";
echo "<li>Affichage de la barre de navigation avec creer_navbar()</li>";
echo "<li>Affichage du formulaire de proposition d'annonce</li>";
echo "<li>Validation des données du formulaire et ajout d'une annonce</li>";
echo "</ul>";

echo "<h3>Ce qui ne fonctionne pas :</h3>";
echo "<ul>";
echo "<li>Aucune fonctionnalité spécifique ne semble ne pas fonctionner sur cette page.</li>";
echo "</ul>";

echo "<h3>Comment utiliser / Comment tester :</h3>";
echo "<ul>";
echo "<li>Ouvrez la page dans un navigateur web pour visualiser le contenu.</li>";
echo "<li>Remplissez le formulaire avec les détails de l'annonce que vous souhaitez proposer.</li>";
echo "<li>Cliquez sur le bouton 'Ajouter l'annonce' pour soumettre l'annonce.</li>";
echo "<li>Si l'annonce est ajoutée avec succès, un message de confirmation sera affiché.</li>";
echo "</ul>";

echo "<h3>Particularités et subtilités :</h3>";
echo "<ul>";
echo "<li>La mise en forme CSS est utilisée pour rendre la page esthétique.</li>";
echo "<li>Les annonces proposées sont enregistrées dans un fichier JSON.</li>";
echo "</ul>";
?>
