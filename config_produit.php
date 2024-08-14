<?php
include("config.php");

$idProduit = trim(htmlspecialchars($_POST['id_produit']));
$categorie = trim(htmlspecialchars($_POST['categorie']));
$nomProduit = trim(htmlspecialchars($_POST['nom_p']));
$description = trim(htmlspecialchars($_POST['description']));
$prix = trim(htmlspecialchars($_POST['prix']));
$dateEntree = trim(htmlspecialchars($_POST['date_e']));
$dateFin = trim(htmlspecialchars($_POST['date_f']));
$image = trim(htmlspecialchars($_POST['image']));
$stock = trim(htmlspecialchars($_POST['stock']));

if (empty($idProduit) || empty($categorie) || empty($nomProduit) || empty($prix) || empty($dateEntree) || empty($dateFin)||empty($image)||empty($stock)) {
  echo '<script type="text/javascript">
    alert("Un des champs est vide!!!");
    window.location.href="votre_page.php";
  </script>';
  exit(1);
} else {
  $st = $bdd->prepare('SELECT * FROM produit WHERE id_produit = :id_produit');
  $st->bindValue(':id_produit', $idProduit, PDO::PARAM_STR);
  $st->execute();

  if ($st->rowCount() > 0) {
    echo '<script type="text/javascript">
      alert("L\'ID du produit existe déjà");
      window.location.href="votre_page.php";
    </script>';
    exit(1); 
  }

  $sql = $bdd->prepare('INSERT INTO produit (id_produit, categorie, nom_p, description, prix, date_e, date_f,image, stock) 
    VALUES (:id_produit, :categorie, :nom_p, :description, :prix, :date_e, :date_f, :image, :stock)');

  $sql->bindValue(':id_produit', $idProduit, PDO::PARAM_STR);
  $sql->bindValue(':categorie', $categorie, PDO::PARAM_STR);
  $sql->bindValue(':nom_p', $nomProduit, PDO::PARAM_STR);
  $sql->bindValue(':description', $description, PDO::PARAM_STR);
  $sql->bindValue(':prix', $prix, PDO::PARAM_STR);
  $sql->bindValue(':stock', $stock, PDO::PARAM_STR);
  $sql->bindValue(':date_e', $dateEntree, PDO::PARAM_STR);
  $sql->bindValue(':date_f', $dateFin, PDO::PARAM_STR);
  $sql->bindValue(':image', $dateFin, PDO::PARAM_STR);
  $sql->execute();

  echo '<script type="text/javascript">
    alert("Enregistrement réussi");
    window.location.href="index.php";
  </script>';
  exit(1); 
}
?>