<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../assets/css/css/bootstrap.min.css">
  <!-- Style -->
  <link rel="stylesheet" href="../assets/welcomecss/style.css">

  <title>Acceuil</title>
</head>

<?php include 'headerMenu.php'; ?>

<content>
  <!-- <h1><a href="<!?php echo base_url('acueil/etats_financiers_actifs'); ?>">Etats Financiers</a></h1> -->
</content>

  <h1 id="nom_societe"><?php echo $_SESSION['entreprise']['nom']; ?></h1>
  <div id="detail">
    <div id="libelle">
      <p>Adresse : </p>
      <p>Contact : </p>
      <p>Telecopie : </p>
      <p>Debut exercice : </p>
      <p>Fin exercice : </p>
    </div>
    <div id="valeur">
      <p><?php echo $_SESSION['entreprise']['adresse']; ?></p>
      <p><?php echo $_SESSION['entreprise']['tel']; ?></p>
      <p><?php echo $_SESSION['entreprise']['telecopie']; ?></p>
      <p><?php echo $_SESSION['compta']['d_db_exo']; ?></p>
      <p><?php echo $_SESSION['compta']['d_fin_exo']; ?></p>
    </div>
  </div>

<?php include 'footer.php'; ?>