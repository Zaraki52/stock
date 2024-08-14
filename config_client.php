<?php    
include("config.php");

$nom = trim(htmlspecialchars($_POST['nom']));
$prenom = trim(htmlspecialchars($_POST['prenom']));
$adresse = trim(htmlspecialchars($_POST['adresse']));
$email = trim(htmlspecialchars($_POST['email']));
$telephone = trim(htmlspecialchars($_POST['telephone']));

if (empty($nom) || empty($prenom) || empty($email) || empty($adresse)) {
  echo '<script type="text/javascript">
    alert("Un des champs est vide!!!");
    window.location.href="form_client.php";
  </script>';
  exit(1);
} else {
  $st = $bdd->prepare('SELECT * FROM client WHERE nom = :nom AND prenom = :prenom AND email = :email AND adresse = :adresse');
  $st->bindValue(':nom', $nom, PDO::PARAM_STR);
  $st->bindValue(':prenom', $prenom, PDO::PARAM_STR);
  $st->bindValue(':email', $email, PDO::PARAM_STR);
  $st->bindValue(':adresse', $adresse, PDO::PARAM_STR);
  $st->execute();

  if ($st->rowCount() > 0) {
    echo '<script type="text/javascript">
      alert("Le nom, prénom, adresse et email existent déjà");
      window.location.href="form_client.php";
    </script>';
    exit(1); 
  }

  $sql = $bdd->prepare('INSERT INTO client (id_client, nom, prenom, adresse, telephone, email) 
    VALUES (:id_client, :nom, :prenom, :adresse, :telephone, :email)');
$sql->bindValue(':id_client', null);

  $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
  $sql->bindValue(':prenom', $prenom, PDO::PARAM_STR);
  $sql->bindValue(':adresse', $adresse, PDO::PARAM_STR);
  $sql->bindValue(':telephone', $telephone, PDO::PARAM_STR);
  $sql->bindValue(':email', $email, PDO::PARAM_STR);
  $sql->execute();

  echo '<script type="text/javascript">
    alert("Enregistrement réussi");
    window.location.href="form_client.php";
  </script>';
  exit(1); 
}
?>
