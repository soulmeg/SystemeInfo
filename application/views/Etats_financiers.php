<?php
    $brut_non_courants = 0;
    $ammort_non_courants = 0;
    $net_non_courants = 0;
    $brut_courants = 0;
    $ammort_courants = 0;
    $net_courants = 0;
    $brut_total = 0;
    $ammort_total = 0;
    $net_total = 0;
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
          <tr>
            <th scope="col" width="300px"></th>
            <th scope="col"></th>
            <th scope="col">
              <table>
                <tr>
                  <th scope="col" width="210px">Brut</th>
                  <th scope="col" width="210px">Amort./Prov.</th>
                  <th scope="col" width="210px">Net</th>
                </tr>
              </table>
            </th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <!---Actifs Non Courants --->
          <tr>
              <th>ACTIFS NON COURANTS</th>
          </tr>
          <?php for($i = 0;$i < count($compte);$i++) { ?>
            <tr>
              <td><?php echo $nom_actifs[$i]; ?></td>
              <td><?php echo $compte[$i]; ?>...</td>
              <td>
                  <table>
                    <tr>
                      <td width="210px"><?php echo $actifs[$i]; ?></td>
                      <td width="210px"><?php echo $ammort; ?></td>
                      <?php $valnet = intval($actifs[$i]) - intval($ammort) ; ?>
                      <td width="210px"><?php echo $valnet; ?></td>
                      <?php
                          $brut_non_courants += $actifs[$i];
                          $ammort_non_courants += $ammort;
                          $net_non_courants += $valnet;
                      ?>
                    </tr>
                  </table>
                </td>
              <td><?php echo $date; ?></td>
            </tr>
          <?php } ?>
          <tr>
              <th>TOTAL ACTIFS NON COURANTS</th>
              <th></th>
              <th>
                <table>
                  <tr>
                    <th scope="col" width="210px"><?php echo $brut_non_courants; ?></th>
                    <th scope="col" width="210px"><?php echo $ammort_non_courants; ?></th>
                    <th scope="col" width="210px"><?php echo $net_non_courants; ?></th>
                  </tr>
                </table>
              </th>
          </tr>
          <!--- Actifs Courants -->
          <tr>
              <th>ACTIFS COURANTS</th>
          </tr>
          <?php for($i = 0;$i < count($courants);$i++) { ?>
            <tr>
              <td><?php echo $nom_courants[$i]; ?></td>
              <td><?php echo $compte1[$i]; ?>...</td>
              <td>
                  <table>
                    <tr>
                      <td width="210px"><?php echo $courants[$i]; ?></td>
                      <td width="210px"><?php echo $ammort; ?></td>
                      <?php $valnet1 = intval($courants[$i]) - intval($ammort) ; ?>
                      <td width="210px"><?php echo $valnet1; ?></td>
                      <?php
                          $brut_courants += $courants[$i];
                          $ammort_courants += $ammort;
                          $net_courants += $valnet1;
                      ?>
                    </tr>
                  </table>
                </td>
              <td><?php echo $date; ?></td>
            </tr>
          <?php } ?>
          <tr>
              <th>TOTAL ACTIFS COURANTS</th>
              <th></th>
              <th>
                <table>
                  <tr>
                    <th scope="col" width="210px"><?php echo $brut_courants; ?></th>
                    <th scope="col" width="210px"><?php echo $ammort_courants; ?></th>
                    <th scope="col" width="210px"><?php echo $net_courants; ?></th>
                    <?php
                        $brut_total = intval($brut_non_courants) + intval($brut_courants);
                        $ammort_total = intval($ammort_non_courants) + intval($ammort_courants);
                        $net_total = intval($net_non_courants) + intval($net_courants);
                    ?>
                  </tr>
                </table>
              </th>
          </tr>
          <tr>
              <th>TOTAL DES ACTIFS</th>
              <th></th>
              <th>
                <table>
                  <tr>
                    <th scope="col" width="210px"><?php echo $brut_total; ?></th>
                    <th scope="col" width="210px"><?php echo $ammort_total; ?></th>
                    <th scope="col" width="210px"><?php echo $net_total; ?></th>
                  </tr>
                </table>
              </th>
          </tr>
        </tbody>
      </table>
      <h1><a href="<?php echo base_url('acueil/etats_financiers_passifs'); ?>">Etats Financiers Passifs</a></h1>
  </body>
</html>
<?php include 'footer.php'; ?>