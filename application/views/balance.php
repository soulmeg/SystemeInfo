<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="http://localhost/SystemeInfo/assets/fonts/icomoon/style.css">

  <link rel="stylesheet" href="http://localhost/SystemeInfo/assets/css/css/owl.carousel.min.css">

  <link rel="stylesheet" href="../assets/css/css/bootstrap.min.css">
  <!-- Style -->
  <link rel="stylesheet" href="../assets/welcomecss/style.css">
  <link rel="stylesheet" href="http://localhost/SystemeInfo/assets/css/css/style.css">

  <title>Affichage Balance</title>
</head>
<?php include 'headerMenu.php'; ?>
  <body>
    <h1>Balance</h1>
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
          <th scope="col">Date</th>
          <th scope="col">Ref Piece</th>
          <th scope="col">Comptes</th>
          <th scope="col">Motifs</th>
          <th scope="col">Tiers</th>
          <th scope="col">Intitule</th>
          <th scope="col">Libelle</th>
          <th scope="col">Devise</th>
          <th scope="col">Debit</th>
          <th scope="col">Credit</th>
        </tr>
      </thead>
      <tbody>
        <?php for($i = 0; $i<count($journal); $i++) { ?>
          <tr scope="row">
            <th scope="row">
              <label class="control control--checkbox">
                <input type="checkbox"/>
                <div class="control__indicator"></div>
              </label>
            </th>
            <td>

            </td>
            <td><?php echo $journal[$i]['daty']; ?></td>
            <td><?php echo $journal[$i]['ref_piece']; ?></td>
            <td><?php echo $journal[$i]['compte']; ?></td>
            <td><?php echo $journal[$i]['motifs']; ?></td>
            <td><?php echo $journal[$i]['tiers']; ?></td>
            <td></td>
            <td><?php echo $journal[$i]['libelle']; ?></td>
            <td><?php echo $journal[$i]['devise']; ?></td>
            <?php if($journal[$i]['dc'] == "Debit") { ?>
                <td><?php echo $journal[$i]['prix']; ?></td>
                <td>0</td>
            <?php } else if($journal[$i]['dc'] == "Credit") { ?>
                <td>0</td>
                <td><?php echo $journal[$i]['prix']; ?></td>
            <?php } ?>
          </tr>
        <?php } ?>
        <?php if($reste > 0) { ?>
          <tr>
            <th>Desequilibre</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">VALEUR MANQUANTE</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">Ariary</th>
            <th scope="col">0</th>
            <th scope="col"><?php echo $reste; ?></th>
          </tr>
        <?php } else if ($reste < 0) { ?>
          <tr>
            <th>Desequilibre</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">VALEUR MANQUANTE</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">Ariary</th>
            <th scope="col"><?php echo abs($reste); ?></th>
            <th scope="col">0</th>
          </tr>
        <?php } ?>
        <tr>
          <th>Total</th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col">Ariary</th>
          <th scope="col"><?php echo $debit; ?></th>
          <th scope="col"><?php echo $credit; ?></th>
        </tr>
      </tbody>
    </table>

  </body>
</html>
<?php include 'footer.php'; ?>