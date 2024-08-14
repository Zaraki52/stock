<?php
require("config.php");
include("head.php");
include("header.php");
?>
<?php
if (isset($_GET['id_client'])) {
    $id_client = $_GET['id_client'];

    // Récupérer les informations du produit à partir de l'ID
    $stmt = $bdd->prepare('SELECT * FROM client WHERE id_client = :id_client');
    $stmt->bindParam(':id_client', $id_client);
    $stmt->execute();
    $client = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
  echo '<script type="text/javascript">
    alert("Enregistrement réussi");
    window.location.href="view_client.php;
  </script>';
exit(1);
}
?>


<form method="post" action="modif_client.php">
  <input type="hidden" name="id_client" value="<?php echo $client['id_client']; ?>">
<br>
<body>
  <div class="container">
    
    <h1>Modifier les Client</h1>
    <form method="Post" action="modif_client.php">
      <div class="form-group">
        <label for="nom">Nom :</label>
        <input type="name" class="form-control" id="nom" name="nom"  value="<?php echo $client['nom']    ;    ?>">
      </div>
      <div class="form-group">
        <label for="Prenom">Prenom :</label>
        <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $client['prenom']    ;    ?>">
      </div>
      <div class="form-group">
        <label for="telephone">Telephone :</label>
        <input type="number" class="form-control" id="telephone" name="telephone" value="<?php echo $client['telephone']    ;    ?>">
      </div>
      <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $client['email']    ;    ?>">
      </div>
      <div class="form-group">
        <label for="adresse">Adresse :</label>
        <input type="text"   class="form-control" id="adresse" name="adresse" value="<?php echo $client['adresse']    ;    ?>">
      </div>
      <button type="submit" class="btn btn-warning">Envoyer</button>
    </form>
  </div>

  
</body>
</html>
<style>

</style>

    </div>
  </div>
</div>

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