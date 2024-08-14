<?php
include("config.php");

$id_produit = $_POST['id_produit'];
$categorie = trim(htmlspecialchars($_POST['categorie']));
$nom_p = trim(htmlspecialchars($_POST['nom_p']));
$description = trim(htmlspecialchars($_POST['description']));
$prix = trim(htmlspecialchars($_POST['prix']));
$stock= trim(htmlspecialchars($_POST['stock']));
$image=trim(htmlspecialchars($_POST['image']));
if (empty($categorie) || empty($nom_p) || empty($prix) || empty($description)) {
    echo '<script type="text/javascript">
        alert("Un des champs est vide!!!");
        window.location.href="form_produit.php";
    </script>';
    exit(1);
} else {
    $st = $bdd->prepare('SELECT * FROM produit WHERE id_produit = :id_produit');
    $st->bindValue(':id_produit', $id_produit, PDO::PARAM_INT);
    $st->execute();

    if ($st->rowCount() == 0) {
        echo '<script type="text/javascript">
            alert("Produit introuvable");
            window.location.href="form_produit.php";
        </script>';
        exit(1);
    }

    $sql = $bdd->prepare('UPDATE produit SET categorie=:categorie, nom_p=:nom_p, description=:description, prix=:prix,stock=:stock, image=:image WHERE id_produit = :id_produit');

    $sql->bindValue(':id_produit', $id_produit, PDO::PARAM_INT);
    $sql->bindValue(':categorie', $categorie, PDO::PARAM_STR);
    $sql->bindValue(':nom_p', $nom_p, PDO::PARAM_STR);
    $sql->bindValue(':description', $description, PDO::PARAM_STR);
    $sql->bindValue(':prix', $prix, PDO::PARAM_STR);
    $sql->bindValue(':image', $image, PDO::PARAM_STR);
    $sql->bindValue(':stock', $stock, PDO::PARAM_STR);
    $sql->execute();

    echo '<script type="text/javascript">
        alert("Modification réussie");
        window.location.href="view_produit.php";
    </script>';
    exit(1);
}
?>
