<?php
require("config.php");
include("head.php");
include("header.php");

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" action="config_produit.php" enctype="multipart/form-data">
  <br>
  <div class="form-group">
    <label for="id_produit">ID Produit :</label>
    <input type="text" class="form-control" id="id_produit" name="id_produit" placeholder="Entrez l'ID du produit">
  </div>
  <div class="form-group">
  <select name="categorie">

  <option value="vetements">Vêtements</option>
  <option value="chaussures">Chaussures</option>
  <option value="accessoires">Accessoires</option>
  <option value="electronique">Électronique</option>
  <option value="maison">Maison et jardin</option>
</select>
</select>




  </div>
  <div class="form-group">
    <label for="nom_p">Nom :</label>
    <input type="text" class="form-control" id="nom_p" name="nom_p" placeholder="Entrez le nom du produit">
  </div>
  <br>
  <div class="form-group">
  <label for="image">Image :</label>
  <input type="file" class="form-control-file" id="image" name="image">
</div>
  <div class="form-group">
    <label for="description">Description :</label>
    <textarea class="form-control" id="description" name="description" placeholder="Entrez la description du produit"></textarea>
  </div>
  <div class="form-group">
    <label for="prix">Prix :</label>
    <input type="number" class="form-control" id="prix" name="prix" placeholder="Entrez le prix du produit">
  </div>
  <div class="form-group">
    <label for="prix">Stock :</label>
    <input type="number" class="form-control" id="stock" name="stock" placeholder="Entrez la quantité du produit">
  </div>
  <div class="form-group">
    <label for="date_e">Date d'entrée :</label>
    <input type="date" class="form-control" id="date_e" name="date_e">
  </div>
  <div class="form-group">
    <label for="date_f">Date de fin :</label>
    <input type="date" class="form-control" id="date_f" name="date_f">
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

<div></div>







    </form>
</body>
</html>


<style>
 body { background: url("https://images.unsplash.com/photo-1583339824000-5afecfd41835?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D")rgba(0, 0, 0, 0.6);
    /* background-blend-mode:darken ; */
    background-repeat:no-repeat ;
}
form {
  margin-left: 20px;
  width: 60%;
}
</style>