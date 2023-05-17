<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="http://localhost/SystemeInfo/assets/css/css/bootstrap.min.css">
  <!-- Style -->
  <link rel="stylesheet" href="http://localhost/SystemeInfo/assets/welcomecss/style.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="http://localhost/SystemeInfo/assets/css/js/bootstrap.bundle.min.js"></script>
  <script src="http://localhost/SystemeInfo/vendor/chart/chart.min.js"></script>


</head>
  <nav class="navbar navbar-expand-lg" id="nav">
    <div class="container">
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nvbCollapse" aria-controls="nvbCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="nvbCollapse">
        <a style="font-weight:bold" class="nav-link" href="<?php echo base_url('acueil/welcome'); ?>">Accueil</a>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item pl-1">
            <a class="nav-link" href="<?php echo base_url('acueil/getcodejournaux'); ?>">Code journal</a>
          </li>
          <li class="nav-item pl-1">
            <a class="nav-link" href="<?php echo base_url('acueil/getplancompta'); ?>">Comptes general</a>
          </li>
          <li class="nav-item pl-1">
            <a class="nav-link" href="<?php echo base_url('acueil/getplancomptetiers'); ?>">Comptes tiers</a>
          </li>
          <li class="nav-item pl-1">
            <a class="nav-link" href="<?php echo base_url('acueil/getjournal'); ?>">Journal</a>
          </li>
          <li class="nav-item pl-1">
            <a class="nav-link" href="<?php echo base_url('acueil/getgrandlivre'); ?>">Grand Livre</a>
          </li>
          <li class="nav-item pl-1">
            <a class="nav-link" href="<?php echo base_url('acueil/insertCenterView'); ?>">Ajout Centre</a>
          </li>
          <li class="nav-item pl-1">
            <a class="nav-link" href="<?php echo base_url('acueil/insertProductView'); ?>">Ajout Produit</a>
          </li>
          <li class="nav-item pl-1">
            <a class="nav-link" href="<?php echo base_url('acueil/getProductAnalytique'); ?>"></i>Analytique</a>
          </li>
          <li class="nav-item pl-1">
            <a class="nav-link" href="<?php echo base_url('acueil/getbalance'); ?>"></i>Balance</a>
          </li>
          <!-- <li>
           <div class="form-group">
            <select class="form-control" id="type" name="type">
              <option value="variable" href="#">Ajout</option>
              <option value="fixe" href="<?php echo base_url('acueil/getbalance'); ?>">Ajout Centre</option>
              <option value="fixe" href="<?php echo base_url('acueil/getbalance'); ?>">Ajout Produit</option>
            </select>
           </div>
          </li> -->
         
          <li class="nav-item pl-1">
            <a class="nav-link" href="<?php echo base_url('acueil/deconnect'); ?>">Deconnexion</a>
          </li>
        </ul>
      </div>
    </div>
    </nav>
<div class="nav flex-column nav-pills" id="menu_verti">
  <div id="img"><img src="../assets/image/logo.PNG" width="100" heigh="100"></div>
  <div id="exo" ><h4>Exercices</h4> </div>
  <a class="nav-link" href="<?php echo base_url('acueil/exo'); ?>?exo=0">Achats</a>
  <a class="nav-link" href="<?php echo base_url('acueil/exo'); ?>?exo=1">Ventes</a>
  <a class="nav-link" href="<?php echo base_url('acueil/exo'); ?>?exo=2">Verser en Banque</a>
  <a class="nav-link" href="<?php echo base_url('acueil/exo'); ?>?exo=3">Verser en Caisse</a>
  <a class="nav-link" href="<?php echo base_url('acueil/exo'); ?>?exo=4">Capitaux</a>


</div>

<div id="info">
