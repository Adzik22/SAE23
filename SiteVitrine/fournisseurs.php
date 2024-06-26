<!DOCTYPE html>
<head>
  <title>Nos Fournisseurs</title>
  <meta charset="utf-8">
  <lang>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<?php

session_start();

if (!isset($_SESSION['USER'])) {
    $_SESSION['USER'] = "anonymous";
    $_SESSION['email'] = "";
    $_SESSION['role'] = "visitor";
}

include 'function.php';
creer_header();
creer_navbar();
?>
<html>

<div class="card" style="width:400px">
  <div class="card-body">
    <h4 class="card-title">Metro France</h4>
    <p class="card-text">Notre fournisseur de denrées alimentaires simples (farine, oeufs, épices).</p>
  </div>
</div>
<br>
<div class="card" style="width:400px">
  <div class="card-body">
    <h4 class="card-title">Poissonnerie Guinemer</h4>
    <p class="card-text">Nous choississons toujours le poisson local.</p>
  </div>
</div>
<br>
<div class="card" style="width:400px">
  <div class="card-body">
    <h4 class="card-title">Cheville 35</h4>
    <p class="card-text">Pour une viande de qualité.</p>
  </div>
</div>
<br>
<div class="card" style="width:400px">
  <div class="card-body">
    <h4 class="card-title">Fromages et Terroirs</h4>
    <p class="card-text">Du bon fromage dans un burger, c'est toujours meilleur.</p>
  </div>
</div>
<br>
<div class="card" style="width:400px">
  <div class="card-body">
    <h4 class="card-title">Sanchez Artisan Glacier</h4>
    <p class="card-text">Une glace après un burger ça vous dit?</p>
  </div>
</div>
<br>
<div class="card" style="width:400px">
  <div class="card-body">
    <h4 class="card-title">Intermarché Saint-Malo</h4>
    <p class="card-text">Pour des fruits et légumes toujours au top.</p>
  </div>
</div>
<br>
<div class="card" style="width:400px">
  <div class="card-body">
    <h4 class="card-title">Boulangerie Saint-Servan</h4>
    <p class="card-text">un pain moelleux et croustillant à la fois.</p>
  </div>
</div>
<br>
<div class="card" style="width:400px">
  <div class="card-body">
    <h4 class="card-title">Brasserie de Bretagne</h4>
    <p class="card-text">Les bières se boivent aussi avec les burgers.</p>
  </div>
</div>
