<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/css/bootstrap.min.css">
  <!-- Style -->
  <link rel="stylesheet" href="../assets/welcomecss/style.css">
    <title>Exercice</title>
  </head>
  <?php include 'headerMenu.php'; ?>
  <body>
    <form action="<?php echo base_url('acueil/savejournal'); ?>" method="post">
    <!-- <form action="<?php echo base_url('acueil/achat2'); ?>" method="post"> -->
      	<div class="form-group">
          <label for="daty">Date</label>
          <input type="date" class="form-control" aria-describedby="emailHelp" placeholder="Date" name="daty">
        </div>
        <div class="form-group">
          <label for="refpiece">Ref Piece</label>
          <input type="text" class="form-control" placeholder="Ref Piece" name="refpiece">
        </div>
        <div class="form-group">
          <label for="compte">Compte</label>
          <select class="form-control" name="compte">
            <?php for ($i = 0;$i < count($_SESSION['choice']);$i++) { ?>
              <option value="<?php echo $_SESSION['choice'][$i]['numero']; ?>"><?php echo $_SESSION['choice'][$i]['compte']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="motifs">Motifs</label>
          <input type="text" class="form-control" placeholder="Motifs" name="motifs">
        </div>
        <div class="form-group">
          <label for="qte">Quantite</label>
          <input type="number" class="form-control" placeholder="Quantite" name="qte">
        </div>
        <div class="form-group">
          <label for="tiers">Tiers</label>
          <input type="text" class="form-control" placeholder="Tiers" name="tiers">
        </div>
        <div class="form-group">
          <label for="libelle">Libelle</label>
          <input type="text" class="form-control" placeholder="Libelle" name="libelle">
        </div>
        <div class="form-group">
          <label for="prix">Prix(HT)</label>
          <input type="number" class="form-control" placeholder="Prix" name="prix">
        </div>
        <div class="form-group">
          <label for="devise">Devise</label>
          <select class="form-control" name="devise">
              <option value="Ariary">Ariary</option>
              <option value="Eur">Euro</option>
              <option value="Dollar">Dollar</option>
              <option value="Mur">Roupie</option>
              <option value="Jpy">Yen</option>
          </select>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" name="dc" id="debit" value="Debit">
            <label for="debit">Debit</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" name="dc" id="credit" value="Credit">
            <label for="credit">Credit</label>
        </div><br/>
        <button type="submit" class="btn btn-primary">Suivant</button>
      </form>
      <a href="<?php echo base_url('acueil/deletesession'); ?>">Retour</a>
  </body>
</html>
<?php include 'footer.php'; ?>