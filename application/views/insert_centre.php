<!DOCTYPE html>
<html>
<head>
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

  <title>Affichage insertion centre</title>
</head>
<?php include 'headerMenu.php'; ?>
<body>
  <div class="container">

  <h1 class="mt-2"  style="color:#1f77b3">Ajouter un Centre</h1>

    <form method="post" action="<?php echo base_url('acueil/insertCenter'); ?>" class="mt-4">
      <div class="form-group">
          <label for="nom">Entrer le nom du Centre :</label>
          <input type="text" class="form-control" id="nom" name="nomC" required>
      </div>
        <button type="submit" class="btn btn-primary">Ajouter le Centre</button>
    </form>

  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php include 'footer.php'; ?>