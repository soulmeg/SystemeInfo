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
    <h1 class="mt-2"  style="color:#1f77b3">Analytique</h1>
    <?php if(count($analytique2) !=0 ){?>
    <h4 class="mt-2" >Nom du produit : <?php echo $analytique2[0]['nomProduit']; }?></h4>
    <table class="table mt-4">
      <thead class="thead-blue">
      <tr>
          <th scope="col">RUBRIQUES</th>
          <th scope="col">TOTAL</th>
          <th scope="col">UNITE D'ŒUVRE</th>
          <th scope="col">COUT D'UNITE D'ŒUVRE</th>
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
          <th scope="col"></th>

        <?php for($i=0;$i<count($centre);$i++){?>
          <th scope="col">%</th>
          <th scope="col">FIXE</th>
          <th scope="col">VARIABLE</th>
        <?php } ?>
          <th scope="col">FIXE</th>
          <th scope="col">VARIABLE</th>
        
        </tr>
        <?php for($i=0;$i<count($achateffectue);$i++) { 
          $totalValeurCentreFixe = 0;
          $totalValeurCentreVariable = 0;
          
          ?>
          
        <tr>
          <td scope="col"><?php echo $analytique2[$i]['rubrique']; ?></td>
          <td scope="col"><?php echo $analytique2[$i]['valeur_produit']; ?></td>
          <td scope="col"><?php echo $analytique2[$i]['unite']; ?></td>
          <td scope="col"><?php echo $analytique2[$i]['prixUnitaire']; ?></td>
          <td scope="col"><?php echo $analytique2[$i]['typeCharge']; ?></td>
      
        <?php if($analytique2[$i]['typeCharge'] == "variable") {?>
          <?php $totalValeurCentre = array_sum($liste[$i]['valeur_centre']); ?>
                <?php for ($j = 0; $j < count($centre); $j++):
                    ?>
              <?php if (isset($liste[$i]['pourcentage'][$j]) && isset($liste[$i]['valeur_centre'][$j])): 
                ?>
                  <td scope="col"><?php echo $liste[$i]['pourcentage'][$j]; ?>%</td>
                  <td scope="col">-</td>
                  <td scope="col"><?php echo $liste[$i]['valeur_centre'][$j]; ?></td>
              <?php else: ?>
                  <td scope="col">NULL</td>
                  <td scope="col">-</td>
                  <td scope="col">NULL</td>
              <?php endif; ?>
                <?php endfor; ?>
                    <td scope="col">-</td>
                    <td scope="col"><?php echo $totalValeurCentre; ?></td>
              <?php } ?>
          

        <?php if($analytique2[$i]['typeCharge'] == "fixe") { ?>
          <?php $totalValeurCentre = array_sum($liste[$i]['valeur_centre']); ?>
            <?php for ($j = 0; $j < count($centre); $j++):
               ?>
              
              <?php if (isset($liste[$i]['pourcentage'][$j]) && isset($liste[$i]['valeur_centre'][$j])): 
                ?>
                    <td scope="col"><?php echo $liste[$i]['pourcentage'][$j]; ?>%</td>
                    <td scope="col"><?php echo $liste[$i]['valeur_centre'][$j]; ?></td>
                    <td scope="col">-</td>
                <?php else: ?>
                    <td scope="col">-</td>
                    <td scope="col">NULL</td>
                    <td scope="col">NULL</td>
                <?php endif; ?>
                  <?php endfor; ?>
                      <td scope="col"><?php echo $totalValeurCentre; ?></td>
                      <td scope="col">-</td>
                <?php } ?>
        <?php } ?>

        </tr>
        <?php if($total==NULL) $total=0 ;?>
        <tr>
        <th scope="col">TOTAL</th>
          <th scope="col"><?php echo $total; ?></th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>

        <?php for($i=0;$i<count($centre);$i++){?>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col">vola par centre</th>
        <?php } ?>
        <?php if($total_fixe==NULL) $total_fixe=0 ;?>
        <?php if($total_variable==NULL) $total_variable=0 ;?>
        <td scope="col"><?php echo $total_fixe; ?></td>
        <td scope="col"><?php echo $total_variable; ?></td>    
        
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php include 'footer.php'; ?>

          <!--for ($j = 0; $j < count($liste[$i]['idCentre']); $j++): ?> -->