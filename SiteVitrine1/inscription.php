<?php
session_start();
include 'function.php'; 

creer_header(); 

creer_navbar(); 

?>

<main>
    <div class="container">
        <h1>Page d'inscription</h1>
        <p>Utilisez le formulaire ci-dessous pour créer votre compte.</p>
    </div>
</main>

<?php
creer_inscription();
?>

<?php
creer_footer(); 
?>
