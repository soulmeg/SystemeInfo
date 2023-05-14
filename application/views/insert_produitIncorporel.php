<!DOCTYPE html>
<html>
<head>
  <title>Formulaire</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<?php include 'headerMenu.php'; ?>
<body>

  <div class="container">
    <h1 class="col-md-12"  style=" color:#0069d9;">Produit(<?php echo $_SESSION['entreprise']['nom']; ?>)</h1>
    <form method="post" action="<?php echo base_url('acueil/insertAnalytique'); ?>" class="mt-4">

      <div class="form-row">
          <div class="col-md-12">
          <?php
              if ($this->session->userdata('error')) {
                  $erreur = $this->session->userdata('error');
                  echo '<div class="alert alert-danger">'.$erreur.'</div>';
              }
              ?>
            <h6 class="mt-2">Produit:</h6>

            <input type="hidden" name="type_charge" value="<?php echo $type; ?>">
            <input type="hidden" name="charge" value="<?php echo $charge; ?>">
            <select class="form-control" id="charge" name="idProduit">
              <?php for($i=0;$i<count($Produit);$i++) { ?>
                <option value="<?php echo $Produit[$i]['idProduit']; ?>"><?php echo $Produit[$i]['nomProduit']; ?></option>
              <?php } ?>
            </select>
            <br>
              <input type="text"  class="form-control" id="unite" placeholder="unite d'oeuvre" name='UE' required><br>
              <h5 class="mt-2">Pourcentage produit :</h5>  
              <input type="decimal" min="0" max="100" class="form-control" name="pourcentage_produit" value="100.0" placeholder="Pourcentage de produit">
        
              <!-- boucle centre -->  
              <?php for($i=0;$i<count($centre);$i++) {?>
              <h6 class="mt-2">Pourcentage <?php echo $centre[$i]['nomCentre'];?> :</h6>
              <input type="decimal" min="0" max="100" class="form-control" name="<?php echo $centre[$i]['nomCentre'];?>" value="0.0" placeholder="Pourcentage de centre (entre 0 a 100)">
              <?php } ?>
          

          </div>
          <br>
      </div>
      <br>
      <button type="submit" class="btn btn-primary" >Valider</button>
      <br>
    </form>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php include 'footer.php'; ?>
