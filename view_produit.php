

<?php
include("config.php");
include("head.php");
include("header.php");

$sql = $bdd->query('SELECT * FROM produit');
$produits = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des produits</title>
    <?php
    include("style_221.php");
    
    ?>
</head>
<body>
    <h1>Liste des produits</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>categorie</th>
            <th>Nom</th>
            <th>description</th>
            <th>prix</th>
            <th>stock</th>
            <th>image</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($produits as $produit): ?>
        <tr>
            <td><?php echo $produit['id_produit']; ?></td>
            <td><?php echo $produit['categorie']; ?></td>
            <td><?php echo $produit['nom_p']; ?></td>
            <td><?php echo $produit['description']; ?></td>
            <td><?php echo $produit['prix']; ?></td>
            <td><?php echo $produit['stock']; ?></td>
            <td><?php echo $produit['image']; ?></td>
            <td>
                <a href="form_modif_produit.php?id_produit=<?php echo $produit['id_produit']; ?>" class="btn">Modifier</a>
                <a href="delete_produit.php?id_produit=<?php echo $produit['id_produit']; ?>" class="btn btn-delete">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>


<style>
 body { background: url("image/daniele-levis-pelusi-mkMSXR86kYY-unsplash.jpg");
    /* background-blend-mode:darken ; */
    background-repeat:no-repeat ;
}
form {
  margin-left: 20px;
  width: 60%;
}
</style>
