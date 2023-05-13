<!DOCTYPE html>
<html>
<head>
  <title></title>
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

  <title>2e achat</title>
</head>
<?php include 'headerMenu.php'; ?>
<body>
  <div class="container">
    <h1 class="mt-5">Type de charge</h1>

    <form method="post" action="insertion_produit.php" class="mt-4">
     
      <div class="form-group">
        <label for="charge">Charge :</label>
        <select class="form-control" id="charge" name="charge">
          <option value="incorporable">Charge incorporable</option>
          <option value="non-incorporable">Charge non incorporable</option>
          <option value="suppletive">Charge supplétive</option>
        </select>
      </div>

      <div class="form-group">
        <label for="type">Type de charge :</label>
        <select class="form-control" id="type" name="type">
          <option value="variable">Charge variable</option>
          <option value="fixe">Charge fixe</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">valider</button>
    </form>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php include 'footer.php'; ?>
