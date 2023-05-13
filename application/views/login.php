<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--JS-->
    <script src="http://localhost/SystemeInfo/vendor/parsley/parsley.min.js"></script>
     <!-- Style -->
    <link rel="stylesheet" href="http://localhost/SystemeInfo/assets/css/style.css">

    <title>Affichage login</title>
  </head>
  <body>
  <div class="flex-container">
  <div class="content-container">
    <div class="form-container">
      <form action="<?php echo base_url('acueil/connection'); ?>" method="post" id="login-form">
        <h1>
          Login
        </h1>
        <br>
        <br>
        <span class="subtitle">ENTREPRISE:</span>
        <br>
        <input type="text" id="nom" name="nom" value="" required data-parsley-minlength="4" data-parsley-maxlength="20">
        <br>
        <span class="subtitle">PASSWORD:</span>
        <br>
        <input type="password" id="mdp" name="mdp" value="" required data-parsley-pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$">
        <br><br>
        <input type="submit" value="SUBMIT" class="submit-btn">
      </form>
      <script src="http://localhost/SystemeInfo/vendor/parsley/validate.js"></script>
      <a href="<?php echo base_url('acueil/index'); ?>">Ajout Entreprise</a>
    </div>
  </div>
</div>
  </body>
</html>
