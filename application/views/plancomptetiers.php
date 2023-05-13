<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="http://localhost/SystemeInfo/assets/fonts/icomoon/style.css">

  <link rel="stylesheet" href="http://localhost/SystemeInfo/assets/css/css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="http://localhost/SystemeInfo/assets/css/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="../assets/css/css/bootstrap.min.css">
  <!-- Style -->
  <link rel="stylesheet" href="../assets/welcomecss/style.css">
  <!-- <link rel="stylesheet" href="http://localhost/SystemeInfo/assets/css/css/style.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Affichage Plan Compte Tiers</title>
</head>
<?php include 'headerMenu.php'; ?>
  <body>
    <h1>Plan de comptes tiers</h1>
    <table class="table custom-table">
      <thead>
        <tr>

          <th scope="col">
            <label class="control control--checkbox">
              <input type="checkbox"  class="js-check-all"/>
              <div class="control__indicator"></div>
            </label>
          </th>

          <th scope="col">Type</th>
          <th scope="col">Code</th>
          <th scope="col">Nom</th>
          <th scope="col">Intitulé du comptes</th>
           <th scope="col">Colonne de modification</th>
          <th scope="col">Colonne de suppression</th>
        </tr>
      </thead>
      <tbody>
        <?php for($i = 0; $i<count($plancomptetiers); $i++) { ?>
          <tr scope="row">
            <th scope="row">
              <label class="control control--checkbox">
                <input type="checkbox"/>
                <div class="control__indicator"></div>
              </label>
            </th>
            <td>

            </td>
            <td><?php echo $plancomptetiers[$i]['code']; ?></td>
            <td><?php echo $plancomptetiers[$i]['nom']; ?></td>
            <td><?php echo $type[$i]; ?></td>
            <td><a href="<?php echo base_url('acueil/ajplancomptetiers'); ?>?id=<?php echo $plancomptetiers[$i]['id']; ?>"><button class="btn btn-primary"><i class="fa fa-edit"></i></button></a></td>
            <td><a href="<?php echo base_url('acueil/deleteplancomptetiers'); ?>?id=<?php echo $plancomptetiers[$i]['id']; ?>"><button class="btn btn-primary"><i class="fa fa-trash"></i></button></a></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <a href="<?php echo base_url('acueil/ajplancomptetiers'); ?>?id=0">Ajouter plan tiers</a>
  </body>
</html>
<?php include 'footer.php'; ?>