<?php
require("config.php");
include("head.php");
include("header.php");

?>
  
    <div class="col">
    </div>
    <div class="col">

<br>
<body>
  <div class="container">
    <h1>Nouveau Client</h1>
    <form method="Post" action="config_client.php">
      <div class="form-group">
        <label for="nom">Nom :</label>
        <input type="name" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom">
      </div>
      <div class="form-group">
        <label for="Prenom">Prenom :</label>
        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre Prenom">
      </div>
      <div class="form-group">
        <label for="email">Telephone :</label>
        <input type="number" class="form-control" id="telephone" name="telephone" placeholder="Entrez votre adresse Telephone">
      </div>
      <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre adresse email">
      </div>
      <div class="form-group">
        <label for="adresse">Adresse :</label>
        <input type="text"   class="form-control" id="adresse" name="adresse"  placeholder="Entrez votre Adresse">
      </div>
      <button type="submit" class="btn btn-warning">Envoyer</button>
    </form>
  </div>

  
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