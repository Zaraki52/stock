<?php
include("config.php");
$id_client = $_POST['id_client']; // Ajoutez cette ligne pour récupérer l'ID du client à partir du formulaire

$nom = trim(htmlspecialchars($_POST['nom']));
$prenom = trim(htmlspecialchars($_POST['prenom']));
$adresse = $_POST['adresse'];
$email = trim(htmlspecialchars($_POST['email']));
$telephone = trim(htmlspecialchars($_POST['telephone']));

if ( empty($nom) || empty($prenom) || empty($email) || empty($adresse)) {
    echo '<script type="text/javascript">
        alert("Un des champs est vide!!!");
        window.location.href="form_client.php";
    </script>';
    exit(1);
} else {
    $st = $bdd->prepare('SELECT * FROM client WHERE id_client = :id_client');
    $st->bindValue(':id_client', $id_client, PDO::PARAM_INT);
    $st->execute();

    if ($st->rowCount() == 0) {
        echo '<script type="text/javascript">
            alert("Client introuvable");
            window.location.href="form_client.php";
        </script>';
        exit(1);
    }

    $sql = $bdd->prepare('UPDATE client SET nom = :nom, prenom = :prenom, adresse = :adresse, telephone = :telephone, email = :email
     WHERE id_client = :id_client');




$sql->bindValue(':id_client', $id_client); // Utilisez la valeur de $id_client ici

$sql->bindValue(':nom', $nom, PDO::PARAM_STR);
$sql->bindValue(':prenom', $prenom, PDO::PARAM_STR);
$sql->bindValue(':adresse', $adresse, PDO::PARAM_STR);
$sql->bindValue(':telephone', $telephone, PDO::PARAM_STR);
$sql->bindValue(':email', $email, PDO::PARAM_STR);
$sql->execute();
    echo '<script type="text/javascript">
        alert("Modification réussie");
        window.location.href="view_client.php";
    </script>';
    exit(1);
}
?>
