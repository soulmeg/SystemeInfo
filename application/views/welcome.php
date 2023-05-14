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
  <br>
  <table class="table table-striped table-bordered">
  <tbody>
    <tr>
      <th>Adresse :</th>
      <td><?php echo $_SESSION['entreprise']['adresse']; ?></td>
    </tr>
    <tr>
      <th>Contact :</th>
      <td><?php echo $_SESSION['entreprise']['tel']; ?></td>
    </tr>
    <tr>
      <th>Télécopie :</th>
      <td><?php echo $_SESSION['entreprise']['telecopie']; ?></td>
    </tr>
    <tr>
      <th>Début exercice :</th>
      <td><?php echo $_SESSION['compta']['d_db_exo']; ?></td>
    </tr>
    <tr>
      <th>Fin exercice :</th>
      <td><?php echo $_SESSION['compta']['d_fin_exo']; ?></td>
    </tr>
  </tbody>
</table>

<?php include 'footer.php'; ?>