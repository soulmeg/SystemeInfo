<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/JSP_Servlet/Html.html to edit this template
-->
<html>
    <head>
        <title>Insertion</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
        <!-- Style -->
        <link rel="stylesheet" href="http://localhost/SystemeInfo/assets/insc/style.css">
        <script src="https://use.fontawesome.com/6a4ab084c1.js"></script>
    </head>
    <body>
<div class="testbox">
  <h1>Registration</h1>

  <form action="<?php echo base_url('acueil/save'); ?>" method="post">
      <hr>
    <div class="accounttype">
      <input type="radio" value="None" id="radioOne" name="account" checked/>
      <label for="radioOne" class="radio">Insertion de Votre société</label>
    </div>
  <hr>
      <label id="icon" for="name"><i class="fa fa-university" aria-hidden="true"></i></label>
  <input type="text" name="nom" id="nom" placeholder="Nom de votre antité" required/>
  <label id="icon" for="name"><i class=""></i></label>
  <input type="text" name="adr" id="objet" placeholder="Adresse / Siege" required/>
  <label id="icon" for="name"><i class=""></i></label>
  <input type="password" name="mdp" id="siege_adresse" placeholder="Mot de passe" required/>
    <label id="icon" for="name"><i class=""></i></label>
  <input type="text" name="tel" id="siege_exploitation" placeholder="Telephone" required/>
  <label id="icon" for="name"><i class=""></i></label>
  <input type="text" name="telecopie" id="siege_exploitation" placeholder="Telecopie" required/>
      </br>      </br>
  <label id="icon1" for="name"><i class=""></i> Date debut exercice</label>
      <input type="date" name="deb" id="date_creation"required/></br><br/>
      <label id="icon1" for="name"><i class=""></i> Date fin exercice</label>

          <input type="date" name="dfin" id="date_creation"required/></br>
  <label id="icon" for="name"><i class=""></i></label>
  <input type="text" name="name" id="statut" placeholder="Statut" required/>

    <label id="icon" for="name"><i class=""></i></label>
  <input type="text" name="name" id="nom_pdg" placeholder="Nom du Pdg" required/>

  <label id="icon" for="name"><i class=""></i></label>
  <input type="text" name="name" id="num_reg_com" placeholder="Num. Reg. Com." required/>
  <label id="icon" for="name"><i class=""></i></label>
  <input type="text" name="name" id="num_id_fisc" placeholder="Num. Id. Fisc." required/>
   <label id="icon" for="name"><i class=""></i></label>
  <input type="text" name="name" id="num_stat" placeholder="Num. Statistique" required/>
  <br/>
  <br/>
     <label id="icon" for="name"><i class=""></i>Tenue compte</label>
     <select name="dvcompte">
         <option value="Ariary">Ariary</option>
         <option value="Eur">Euro</option>
         <option value="Dollar">Dollar</option>
         <option value="Mur">Roupie</option>
         <option value="Jpy">Yen</option>
     </select><br/><br/>
   <label id="icon" for="name"><i class=""></i>Devise d'equivalence</label>
   <select name="equiv">
       <option value="Eur">Euro</option>
       <option value="Dollar">Dollar</option>
       <option value="Mur">Roupie</option>
       <option value="Jpy">Yen</option>
   </select>
       </br>      </br>

      <a href="plancomptable.php" class="button" type="submit"> Valider</a>
  </form>
</div>

    </body>
</html>
