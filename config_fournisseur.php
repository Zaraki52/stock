
<?php    
// include("config.php");
// $nom = "";
// $prenom = "";
// $adresse="";
// $email="";
// $telephone="";
// echo $nom = trim(htmlentities($_POST['nom']));
// echo $prenom = trim(htmlentities($_POST['prenom']));
// echo $adresse = trim(htmlentities($_POST['adresse']));
// echo $email = trim(htmlentities($_POST['email']));
// echo  $telephone = trim(htmlentities($_POST['telephone']));

// if ((((empty($nom)) || (empty($prenom))) || (empty($email)) || (empty($adresse)))) {
//   echo '<script type="text/javascript">
//     alert("Un des champs est vide!!!");
//     window.location.href="form_fournisseur.php";
//   </script>';
//   exit(1);
// }
// elseif ((((empty($nom)) || (empty($prenom))) || (empty($email)) || (empty($adresse)))) {
  
//   $st = $bdd->prepare('SELECT * FROM fournisseur ');
//   $st->bindValue(':nom', $nom, PDO::PARAM_STR);
//   $st->bindValue(':prenom', $prenom, PDO::PARAM_STR);
//   $st->bindValue(':email', $email, PDO::PARAM_STR);
//   $st->bindValue(':adresse', $adresse, PDO::PARAM_STR);
//   $st->bindValue(':telephone', $telephone, PDO::PARAM_STR);
//   $st->execute();

//   if ($st->rowCount() > 0) {
//     echo '<script type="text/javascript">
//       alert("Le nom ou le caption existe déjà");
//       window.location.href="form_fournisseur.php";
//     </script>';
//     exit(1); 
//   }
 
// //   $sql = $bdd->prepare('INSERT INTO `group`(id,nom_group,caption,etat,deletable,date_enreg) 
// //     VALUES(:id,:nom_group,:caption,:etat,:deletable,:date_enreg)');
//    $sql=$bdd->prepare(' INSERT INTO fournisseur (id_fournisseur, nom, prenom, adresse, telephone, email) 
//     VALUES (:id_fournisseur,:nom,:prenom,:adresse,:telephone,:email)');
//   $sql->bindValue('id_fournisseur', '', PDO::PARAM_INT);
//   $sql->bindValue('nom', $nom, PDO::PARAM_STR);
//   $sql->bindValue('prenom', $prenom, PDO::PARAM_STR);
//   $sql->bindValue('adresse', $adresse, PDO::PARAM_STR);
//   $sql->bindValue('telephone', $telephone, PDO::PARAM_STR);
//   $sql->bindValue('email', $email, PDO::PARAM_STR);
//   $sql->execute();

//   echo '<script type="text/javascript">
//     alert("Enregistrement réussi");
//     window.location.href="form_fournisseur.php";
//   </script>';
//   exit(1); 
// }
?>

<?php  
include("config.php");

$nom = trim(htmlspecialchars($_POST['nom']));
$prenom = trim(htmlspecialchars($_POST['prenom']));
$adresse = ($_POST['adresse']);
$email = trim(htmlspecialchars($_POST['email']));
$telephone = trim(htmlspecialchars($_POST['telephone']));

if (empty($nom) || empty($prenom) || empty($email) || empty($adresse)) {
  echo '<script type="text/javascript">
    alert("Un des champs est vide!!!");
    window.location.href="form_fournisseur.php";
  </script>';
  exit(1);
} else {
  $st = $bdd->prepare('SELECT * FROM fournisseur WHERE nom = :nom AND prenom = :prenom AND email = :email AND adresse = :adresse');
  $st->bindValue(':nom', $nom, PDO::PARAM_STR);
  $st->bindValue(':prenom', $prenom, PDO::PARAM_STR);
  $st->bindValue(':email', $email, PDO::PARAM_STR);
  $st->bindValue(':adresse', $adresse, PDO::PARAM_INT);
  $st->execute();

  if ($st->rowCount() > 0) {
    echo '<script type="text/javascript">
      alert("Le nom, prénom, adresse et email existent déjà");
      window.location.href="form_fournisseur.php";
    </script>';
    exit(1); 
  }

  $sql = $bdd->prepare('INSERT INTO fournisseur (id_fournisseur, nom, prenom, adresse, telephone, email) 
    VALUES (:id_fournisseur, :nom, :prenom, :adresse, :telephone, :email)');
 $sql->bindValue(':id_fournisseur', null);

  $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
  $sql->bindValue(':prenom', $prenom, PDO::PARAM_STR);
  $sql->bindValue(':adresse', $adresse, PDO::PARAM_STR);
  $sql->bindValue(':telephone', $telephone, PDO::PARAM_STR);
  $sql->bindValue(':email', $email, PDO::PARAM_STR);
   $sql->execute();
  
  echo '<script type="text/javascript">
    alert("Enregistrement réussi");
    window.location.href="form_fournisseur.php";
  </script>';
  exit(1); 
}
?>



?>

