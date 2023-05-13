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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Journal</title>
</head>
<?php include 'headerMenu.php'; ?>
  <body>
    <h1>Journal</h1>
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
          <th scope="col">Compte</th>
          <th scope="col">Motifs</th>
          <th scope="col">Libelle</th>
          <th scope="col">Devise</th>
          <th scope="col">Debit</th>
          <th scope="col">Credit</th>
          <th scope="col">Modifier</th>
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
            <td><?php echo $journal[$i]['libelle']; ?></td>
            <td><?php echo $journal[$i]['devise']; ?></td>
            <?php if($journal[$i]['dc'] == "Debit") { ?>
                <td><?php echo $journal[$i]['prix']; ?></td>
                <td>0</td>
            <?php } else if($journal[$i]['dc'] == "Credit") { ?>
                <td>0</td>
                <td><?php echo $journal[$i]['prix']; ?></td>
            <?php } ?>
            <td><a href="<?php echo base_url('acueil/ajplancompta'); ?>?id=<?php echo $journal[$i]['id'];?>"><button class="btn btn-primary"><i class="fa fa-edit"></i></button></a></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </body>
</html>
<?php include 'footer.php'; ?>