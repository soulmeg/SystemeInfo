<?php
  $id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../assets/css/css/bootstrap.min.css">
  <!-- Style -->
  <link rel="stylesheet" href="../assets/welcomecss/style.css">

  <title>Affichage ajout plan tiers</title>
</head>
<?php include 'headerMenu.php'; ?>
  <body>
    <div class="flex-container">
    <div class="content-container">
      <div class="form-container">
        <form action="<?php echo base_url('acueil/updateplancomptetiers'); ?>" method="post">
          <h1>
            Ajouter / Modifier<br/>
            Ajout Plan Tiers
          </h1>
          <input type="hidden" name="id" value="<?php echo $id;?>">
          <br>
          <br>
          <span class="subtitle">CODE:</span>
          <br>
          <input type="text" name="code" value="">
          <br>
          <span class="subtitle">NOM:</span>
          <br>
          <input type="text" name="nom" value="">
          <br><br>
          <input type="submit" value="SUBMIT" class="submit-btn">
        </form>
      </div>
    </div>
  </div>
  </body>
</html>
<?php include 'footer.php'; ?>