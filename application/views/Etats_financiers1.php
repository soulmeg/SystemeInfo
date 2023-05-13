<?php
    $total_capitaux = 0;
    $total_non_courants = 0;
    $total_courants = 0;
    $total = 0;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://localhost/SystemeInfo/assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="http://localhost/SystemeInfo/assets/css/css/owl.carousel.min.css">

    <link rel="stylesheet" href="../assets/css/css/bootstrap.min.css">
  <!-- Style -->
  <link rel="stylesheet" href="../assets/welcomecss/style.css">
    <link rel="stylesheet" href="http://localhost/SystemeInfo/assets/css/css/style.css">
    <title></title>
  </head>
  <?php include 'headerMenu.php'; ?>
  <body>
      <h2>Societe : <?php echo $_SESSION['entreprise']['nom']; ?></h2>
      <h2>Adresse : <?php echo $_SESSION['entreprise']['adresse']; ?></h2>
      <h2>Capital : Antananarivo</h2>
      <h2>CIF : </h2>
      <h2>STAT : 123 456 789 123 45</h2>
      <br/>
      <h2>Bilan</h2>
      <h2>EXERCICE CLOS AU 2023-03-31</h2>
      <h2>Unite Monetaire : ARIARY</h2>
      <br/>
      <table class="table custom-table">
        <thead>
          <tr>
            <th scope="col" width="300px">ACTIF</th>
            <th scope="col">Compte</th>
            <th scope="col" width="550px">DATE FIN EXERCICE N</th>
            <th scope="col">DATE FIN EXERCICE N-1</th>
          </tr>
          <tr>
            <th scope="col" width="300px"></th>
            <th scope="col"></th>
            <th scope="col" width="550px">MONTANT</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <!---Capital --->
          <tr>
              <th>CAPITAUX PROPRES</th>
          </tr>
          <?php for($i = 0;$i < count($capital);$i++) { ?>
            <tr>
              <td><?php echo $nom_capital[$i]; ?></td>
              <td><?php echo $capital[$i]; ?>...</td>
              <td><?php echo $mcapital[$i]; ?></td>
              <td><?php echo $date; ?></td>
            </tr>
            <?php
                $total_capitaux += $mcapital[$i];
            ?>
          <?php } ?>
          <tr>
              <th>TOTAL CAPITAUX</th>
              <th></th>
              <th><?php echo $total_capitaux; ?></th>
          </tr>
          <!---Passifs non courants --->
          <tr>
              <th>PASSIFS NON COURANTS</th>
          </tr>
          <?php for($i = 0;$i < count($passifnc);$i++) { ?>
            <tr>
              <td><?php echo $nom_passifnc[$i]; ?></td>
              <td><?php echo $passifnc[$i]; ?>...</td>
              <td><?php echo $ncourants[$i]; ?></td>
              <td><?php echo $date; ?></td>
            </tr>
            <?php
                $total_non_courants += $ncourants[$i];
            ?>
          <?php } ?>
          <tr>
              <th>TOTAL NON COURANTS</th>
              <th></th>
              <th><?php echo $total_non_courants; ?></th>
          </tr>
          <!---Passifs courants --->
          <tr>
              <th>PASSIFS COURANTS</th>
          </tr>
          <?php for($i = 0;$i < count($passifc);$i++) { ?>
            <tr>
              <td><?php echo $nom_passifc[$i]; ?></td>
              <td><?php echo $passifc[$i]; ?>...</td>
              <td><?php echo $courants[$i]; ?></td>
              <td><?php echo $date; ?></td>
            </tr>
            <?php
                $total_courants += $courants[$i];
            ?>
          <?php } ?>
          <tr>
              <th>TOTAL COURANTS</th>
              <th></th>
              <th><?php echo $total_courants; ?></th>
          </tr>
          <?php
              $total = intval($total_non_courants) + intval($total_courants) + intval($total_capitaux);
          ?>
          <tr>
              <th>TOTAL</th>
              <th></th>
              <th><?php echo $total; ?></th>
          </tr>
        </tbody>
      </table>
  </body>
</html>
<?php include 'footer.php'; ?>