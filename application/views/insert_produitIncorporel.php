<!DOCTYPE html>
<html>
<head>
  <title>Formulaire</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1 class="mt-5"  style=" color:#0069d9;">Produit</h1>

    <form>
        <!-- <h5 class="mt-5">Produit : Semence</h5> -->
      <div class="form-row">
        <div class="col-md-2">
          <label for="nom">Mais :</label>
        </div>
        <div class="col-md-4">
        
            <input type="number" min="0" max="100" class="form-control" id="nom" placeholder="Pourcentage de produit">
        <!-- boucle centre -->
          <h6 class="mt-2">Pourcentage c1:</h6>
          <input type="number" min="0" max="100" class="form-control" id="nom" placeholder="Pourcentage de centre (entre 0 a 100)">
          <h6 class="mt-2">Pourcentage c2:</h6>
          <input type="number" min="0" max="100" class="form-control" id="nom" placeholder="Pourcentage de centre (entre 0 a 100)">

        </div>
      </div>
      
      <button type="submit" class="btn btn-primary">Valider</button>
    </form>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
