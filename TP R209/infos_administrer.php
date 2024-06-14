<?php
echo "<h2>Page administrer.php</h2>";
echo "<h3>Fonctions utilisées :</h3>";
echo "<ul>";
echo "<li>session_start()</li>";
echo "<li>update_role.php</li>";
echo "<li>delete_user.php</li>";
echo "</ul>";

echo "<h3>Ce qui fonctionne :</h3>";
echo "<ul>";
echo "<li>Affichage de l'en-tête avec creer_header()</li>";
echo "<li>Affichage de la barre de navigation avec creer_navbar()</li>";
echo "<li>Affichage de la liste des utilisateurs avec leurs informations</li>";
echo "<li>Formulaire de modification du rôle fonctionnel avec AJAX</li>";
echo "<li>Bouton de suppression d'utilisateur fonctionnel avec AJAX</li>";
echo "</ul>";

echo "<h3>Ce qui ne fonctionne pas :</h3>";
echo "<ul>";
echo "<li>L'admin n'a pas les droits de modifier alors qu'avec le code, cela est censé fonctionné.</li>";
echo "</ul>";

echo "<h3>Comment utiliser / Comment tester :</h3>";
echo "<ul>";
echo "<li>Ouvrez la page dans un navigateur web pour visualiser la liste des utilisateurs.</li>";
echo "<li>Utilisez les formulaires de modification de rôle pour changer le rôle d'un utilisateur.</li>";
echo "<li>Utilisez les boutons de suppression pour supprimer un utilisateur.</li>";
echo "</ul>";

echo "<h3>Particularités et subtilités :</h3>";
echo "<ul>";
echo "<li>La mise en forme CSS Bootstrap est utilisée pour rendre la page esthétique.</li>";
echo "<li>Les actions de modification et de suppression sont gérées via AJAX pour une expérience utilisateur fluide.</li>";
echo "</ul>";
?>
