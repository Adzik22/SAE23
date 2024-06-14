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

<main>
    <div class="container">
        <h1>Bienvenue sur L'intranet</h1>
<?php
creer_footer(); 
?>
