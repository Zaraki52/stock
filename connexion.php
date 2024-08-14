<?php
// session_start();
include('config.php');
// Définir le fuseau horaire de Dakar
date_default_timezone_set('Africa/Dakar');
$date = date('Y/m/d H:i:s');

// Vérifier si les clés existent dans la variable $_POST
if (isset($_POST['username'], $_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  // Création de la requête pour récupérer les informations de l'utilisateur
  $sql = $bdd->prepare("SELECT * FROM user WHERE username = :username ");

  // Remplacement du paramètre avec la valeur de la variable $username
  $sql->bindValue(':username', $username, PDO::PARAM_STR);

  $sql->execute();

  $nb = $sql->rowCount();

  if ($nb != 0) {
    $line = $sql->fetch(PDO::FETCH_ASSOC);

    extract($line);

    $nom = $line['username'];
    $pass1 = $line['password'];

    // Vérification du mot de passe
    if ($password === $pass1) {
      // Enregistrer le username dans la variable de session
      $_SESSION['utilisateur'] = $username; // Remplacez $username par la valeur appropriée

      echo '<script type="text/javascript">
      alert("Bienvenue '.$username.' dans votre espace membres");
      window.location.href="./";
      </script>';
      exit(1);
    } else {
      echo '<script type="text/javascript">
      alert("Vérifier votre Mot de Passe");
      window.location.href="login.php";
      </script>';
      exit(1);
    }
  } else {
    echo '<script type="text/javascript">
    alert("Utilisateur non trouvé");
    window.location.href="login.php";
    </script>';
    exit(1);
  }
} else {
  // Afficher une erreur si les clés n'existent pas dans la variable $_POST
  echo "Erreur: Paramètres manquants.";
}
$_SESSION['utilisateur'] = $username; // Remplacez $username par la valeur appropriée

?>
