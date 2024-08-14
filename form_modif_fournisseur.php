<?php
require("config.php");
include("head.php");
include("header.php");

?>
<?php
if (isset($_GET['id_fournisseur'])) {
    $id_fournisseur = $_GET['id_fournisseur'];

    // Récupérer les informations du produit à partir de l'ID
    $stmt = $bdd->prepare('SELECT * FROM fournisseur WHERE id_fournisseur = :id_fournisseur');
    $stmt->bindParam(':id_fournisseur', $id_fournisseur);
    $stmt->execute();
    $fournisseur = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
  echo '<script type="text/javascript">
    alert("Enregistrement réussi");
    window.location.href="view_fournisseur.php;
  </script>';
exit(1);
}
?>



<form method="post" action="modif_fournisseur.php">
  <input type="hidden" name="id_fournisseur" value="<?php echo $fournisseur['id_fournisseur']; ?>">
  
  <div class="form-group">
    <label for="nom">Nom :</label>
    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $fournisseur['nom']; ?>">
  </div>
  
  <div class="form-group">
    <label for="prenom">Prenom :</label>
    <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $fournisseur['prenom']; ?>">
  </div>
  
  <div class="form-group">
    <label for="telephone">Telephone :</label>
    <input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo $fournisseur['telephone']; ?>">
  </div>
  
  <div class="form-group">
    <label for="email">Email :</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo $fournisseur['email']; ?>">
  </div>
  
  <div class="form-group">
    <label for="adresse">Adresse :</label>
    <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo $fournisseur['adresse']; ?>">
  </div>
  
  <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>


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