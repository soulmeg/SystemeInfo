<?php
    $j = 0;
?>
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
  <link rel="stylesheet" href="../assets/welcomecss/style.css">
  <link rel="stylesheet" href="http://localhost/SystemeInfo/assets/css/css/style.css">

  <title>Affichage Grand Livre</title>
</head>
<?php include 'headerMenu.php'; ?>
  <body>
    <h1>Grand Livre</h1>
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
          <th scope="col">Motifs</th>
          <th scope="col">Tiers</th>
          <th scope="col">Libelle</th>
          <th scope="col">Devise</th>
          <th scope="col">Debit</th>
          <th scope="col">Credit</th>
        </tr>
      </thead>
      <tbody>
        <?php for($i = 0; $i<count($journal); $i++) { ?>
          <?php if ($i==0 || $journal[$i]['compte']!= $journal[$i-1]['compte']) { ?>
            <tr scope="row">
                <td><h6>Compte <?php echo $journal[$i]['compte']; ?></h6></td>
            </tr>
          <?php } ?>
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
            <td><?php echo $journal[$i]['motifs']; ?></td>
            <td><?php echo $journal[$i]['tiers']; ?></td>
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
          <?php if($i<count($journal)-1 && $journal[$i]['compte']!= $journal[$i+1]['compte'] || $journal[$i]['compte'] == $journal[count($journal)-1]['compte']) { ?>
            <tr>
              <th>Solde Debiteur/Crediteur</th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
              <?php if($total[$j]>0) {?>
                  <th scope="col">Ariary</th>
                  <th scope="col"></th>
                  <th scope="col"><?php echo $total[$j]; ?></th>
              <?php } ?>
              <?php if($total[$j]<0) {?>
                  <th scope="col">Ariary</th>
                  <th scope="col"><?php echo abs($total[$j]); ?></th>
                  <th scope="col"></th>
              <?php } ?>
            <?php if($total[$j]==0) {?>
                  <th scope="col">Ariary</th>
                  <th scope="col">0</th>
                  <th scope="col">0</th>
              <?php } ?>
            </tr>
            <?php $j++; ?>
          <?php } ?>
        <?php } ?>
      </tbody>
    </table>
  </body>
</html>
<?php include 'footer.php'; ?>