<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($username) || empty($password) || empty($confirm_password)) {
        echo '<script>
        alert("Un des champs est vide !!!");
        window.location.href="./register.php";
        </script>';
        exit(1);
    }

    // Vérifier que les mots de passe correspondent
    if ($password !== $confirm_password) {
        echo '<script>
        alert("Les mots de passe ne correspondent pas.");
        window.location.href="./register.php";
        </script>';
        exit(1);
    } else {
        // Vérifier si l'utilisateur existe déjà
        $st = $bdd->prepare('SELECT username FROM user WHERE username = :username');
        $st->bindValue(':username', $username, PDO::PARAM_STR);
        $st->execute();

        if ($st->rowCount() > 0) {
            echo '<script>
            alert("Ce nom d\'utilisateur existe déjà !!!");
            window.location.href="../../?app=function";
            </script>';
            exit(1);
        } else {
            // Inscrire l'utilisateur et enregistrer les informations dans la base de données
            $sql = $bdd->prepare('INSERT INTO user (username, password, confirm_password, etat) VALUES (:username, :password, :confirm_password, :etat)');
$sql->bindValue(':username', $username, PDO::PARAM_STR);
$sql->bindValue(':password', md5($password), PDO::PARAM_STR);
$sql->bindValue(':confirm_password', md5($confirm_password), PDO::PARAM_STR);
$sql->bindValue(':etat', 0, PDO::PARAM_INT); // Définir la valeur de 'etat' sur 0

$sql->execute();


            echo '<script>
            alert("Inscription effectuée avec succès, merci de vous connecter sur votre page!!!");
            window.location.href="index.php";
            </script>';
            exit(1);
        }
    }
}
?>
