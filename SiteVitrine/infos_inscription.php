<?php
echo "<h2>Page d'inscription</h2>";
echo "<h3>Fonctions utilisées :</h3>";
echo "<ul>";
echo "<li>session_start()</li>";
echo "<li>creer_isncription</li>";
echo "</ul>";

echo "<h3>Ce qui fonctionne :</h3>";
echo "<ul>";
echo "<li>Affichage de l'en-tête avec creer_header()</li>";
echo "<li>Affichage de la barre de navigation avec creer_navbar()</li>";
echo "<li>Affichage du formulaire d'inscription</li>";
echo "<li>Traitement de l'inscription des utilisateurs</li>";
echo "</ul>";

echo "<h3>Ce qui ne fonctionne pas :</h3>";
echo "<ul>";
echo "<li>Aucune fonctionnalité spécifique ne semble ne pas fonctionner sur cette page.</li>";
echo "</ul>";

echo "<h3>Comment utiliser / Comment tester :</h3>";
echo "<ul>";
echo "<li>Ouvrez la page dans un navigateur web pour accéder au formulaire d'inscription.</li>";
echo "<li>Remplissez les champs avec les informations nécessaires pour créer un compte.</li>";
echo "<li>Cliquez sur le bouton 'S'inscrire' pour créer le compte.</li>";
echo "</ul>";

echo "<h3>Particularités et subtilités :</h3>";
echo "<ul>";
echo "<li>La mise en forme CSS est gérée par le fichier CSS externe.</li>";
echo "<li>Le formulaire d'inscription est généré par la fonction creer_inscription() qui se trouve dans le fichier function.php.</li>";
echo "</ul>";
?>
