<?php
require("config.php");
include("head.php");
include("header.php");
?>

<!-- // Vérifier si l'ID du produit est passé en paramètre -->
<?php
if (isset($_GET['id_produit'])) {
    $id_produit = $_GET['id_produit'];

    // Récupérer les informations du produit à partir de l'ID
    $stmt = $bdd->prepare('SELECT * FROM produit WHERE id_produit = :id_produit');
    $stmt->bindParam(':id_produit', $id_produit);
    $stmt->execute();
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
  echo '<script type="text/javascript">
    alert("Enregistrement réussi");
    window.location.href="view_produit.php;
  </script>';
exit(1);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier produit</title>
</head>

<body>
    <form method="POST" action="modif_produit.php">
        <h1>MODIFIER PRODUIT</h1>
        <div class="form-group">
            <label for="id_produit">ID Produit :</label>
            <input type="text" class="form-control" id="id_produit" name="id_produit" value="<?php echo $produit['id_produit']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="categorie">Catégorie :</label>
            <select name="categorie">
                <option value="vetements" <?php if ($produit['categorie'] === 'vetements') echo 'selected'; ?>>Vêtements</option>
                <option value="chaussures" <?php if ($produit['categorie'] === 'chaussures') echo 'selected'; ?>>Chaussures</option>
                <option value="accessoires" <?php if ($produit['categorie'] === 'accessoires') echo 'selected'; ?>>Accessoires</option>
                <option value="electronique" <?php if ($produit['categorie'] === 'electronique') echo 'selected'; ?>>Électronique</option>
                <option value="maison" <?php if ($produit['categorie'] === 'maison') echo 'selected'; ?>>Maison et jardin</option>
            </select>
        </div>
        <!-- exemple -->
        <div class="form-group">
            <label for="nom_p">Nom :</label>
            <input type="text" class="form-control" id="nom_p" name="nom_p" value="<?php echo $produit['nom_p']; ?>">
        </div>
                <!-- exemple -->

        <div class="form-group ">
            <label for="image">Image :</label>
            <br>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea class="form-control" id="description" name="description"><?php echo $produit['description']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="prix">Prix :</label>
            <input type="number" class="form-control" id="prix" name="prix" value="<?php echo $produit['prix']; ?>">
        </div>
        <div class="form-group">
            <label for="stock">Stock :</label>
            <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $produit['stock']; ?>">
        </div>
        <div class="form-group">
            <label for="date_e">Date d'entrée :</label>
            <input type="date" class="form-control" id="date_e" name="date_e" value="<?php echo $produit['date_e']; ?>"   >
        </div>
        <div class="form-group">
            <label for="date_f">Date de fin :</label>
            <input type="date" class="form-control" id="date_f" name="date_f">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
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