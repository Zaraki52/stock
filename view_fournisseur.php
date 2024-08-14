

<?php
include("config.php");
include("head.php");
include("header.php");

$sql = $bdd->query('SELECT * FROM fournisseur');
$fournisseurs = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des fournisseurs</title>
    <?php
    include("style_221.php");
    
    ?>
</head>
<body>
    <h1>Liste des fournisseurs</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($fournisseurs as $fournisseur): ?>
        <tr>
            <td><?php echo $fournisseur['id_fournisseur']; ?></td>
            <td><?php echo $fournisseur['nom']; ?></td>
            <td><?php echo $fournisseur['prenom']; ?></td>
            <td><?php echo $fournisseur['adresse']; ?></td>
            <td><?php echo $fournisseur['telephone']; ?></td>
            <td><?php echo $fournisseur['email']; ?></td>
            <td>
                <a href="form_modif_fournisseur.php?id_fournisseur=<?php echo $fournisseur['id_fournisseur']; ?>" class="btn">Modifier</a>
                <a href="delete_fournisseur.php?id_fournisseur=<?php echo $fournisseur['id_fournisseur']; ?>" class="btn btn-delete">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>


<style>
 body { background: url("image/daniele-levis-pelusi-mkMSXR86kYY-unsplash.jpg")rgba(0, 0, 0, 0.6);
    /* background-blend-mode:darken ; */
    background-repeat:no-repeat ;
}

table{
    margin-left: 20px;

}
</style>