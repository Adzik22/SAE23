<?php
session_start();
include 'function.php'; 

creer_header(); 
creer_navbar(); 
?>

<main>
    <div class="container">
        <?php afficher_menu(); ?>
    </div>
</main>

<?php
creer_footer(); 
?>
