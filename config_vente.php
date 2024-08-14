<?php

require("config.php");

// Vérifier si le formulaire a été soumis

// Récupérer les valeurs du formulaire
$article = $_POST["article"];
$client = $_POST["client"];
$quantite = $_POST["quantite"];
$prix = $_POST["prix"];

// Vérifier si le stock est épuisé
$sqlStock = "SELECT stock FROM produit WHERE id_produit = :id_produit";
$stmtStock = $bdd->prepare($sqlStock);
$stmtStock->bindParam(":id_produit", $article); // Utiliser $article comme id_produit
$stmtStock->execute();
$stock = $stmtStock->fetchColumn();
if ($stock - $quantite < 0) {
  echo '<script type="text/javascript">
    alert("Le stock est épuisé. Impossible de vendre ce produit.");
    window.location.href="index.php";
  </script>';
  exit(1);
}

// Insérer la vente dans la table de ventes
$sql = "INSERT INTO `vente`(`id_client`, `id_article`, `quantite`, `prix`, `date_vente`) 
        VALUES (:id_client, :id_article, :quantite, :prix, NOW())";
$stmt = $bdd->prepare($sql);
$stmt->bindParam(":id_client", $client);
$stmt->bindParam(":id_article", $article);
$stmt->bindParam(":quantite", $quantite);
$stmt->bindParam(":prix", $prix);
$stmt->execute();

// Mettre à jour le stock du produit
$sqlUpdate = "UPDATE produit SET stock = stock - :quantite WHERE id_produit = :id_produit";
$stmtUpdate = $bdd->prepare($sqlUpdate);
$stmtUpdate->bindParam(":quantite", $quantite);
$stmtUpdate->bindParam(":id_produit", $article); // Utiliser $article comme id_produit
$stmtUpdate->execute();

// Autres actions à effectuer si nécessaire (envoi d'e-mails, notifications, etc.)

// Redirection vers une page de confirmation ou autre
echo '<script type="text/javascript">
  alert("Enregistrement réussi");
  window.location.href="index.php";
</script>';

?>
