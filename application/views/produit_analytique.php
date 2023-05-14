<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <title>Tableau des rubriques</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

</head>
<?php include 'headerMenu.php'; ?>
<body>
  <div class="container">
    <h1 class="mt-5">Analytique</h1>

    <table class="table mt-4" border='1'>
      <thead class="thead-blue">
      <tr>
          <th scope="col">RUBRIQUES</th>
          <th scope="col">TOTAL</th>
          <th scope="col">UNITE D'ŒUVRE</th>
          <th scope="col">NATURE</th>
        <?php for($i=0;$i<count($centre);$i++){?>
          <th scope="col"></th>
          <th scope="col"><?php echo $centre[$i]['nomCentre'];?></th>
          <th scope="col"></th>
        <?php } ?>
          <th scope="col"></th>
          <th scope="col">TOTAL</th>
        </tr>
        <tr>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>

        <?php for($i=0;$i<count($centre);$i++){?>
          <th scope="col">%</th>
          <th scope="col">FIXE</th>
          <th scope="col">VARIABLE</th>
        <?php } ?>
          <th scope="col">FIXE</th>
          <th scope="col">VARIABLE</th>
        
        </tr>
        <tr>
          <td scope="col">Achat de semence</td>
          <td scope="col">4321600</td>
          <td scope="col">KG</td>
          <td scope="col">V</td>
          <td scope="col">0.00%</td>
          <td scope="col">-</td>
          <td scope="col">-</td>
          <td scope="col">0.00%</td>
          <td scope="col">-</td>
          <td scope="col">-</td>
          <td scope="col">100%</td>
          <td scope="col">-</td>
          <td scope="col">4321600.00</td>
          <td scope="col">-</td>
          <td scope="col">4321600.00</td>
        
        </tr>
      </thead>
      <tbody>
        <!-- Ajoutez ici les lignes de données -->
      </tbody>
    </table>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php include 'footer.php'; ?>
