<?php
include("config.php");

$id_client = $_GET['id_client'];

if (empty($id_client)) {
    echo '<script type="text/javascript">
        alert("ID du client manquant");
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

    $sql = $bdd->prepare('DELETE FROM client WHERE id_client = :id_client');
    $sql->bindValue(':id_client', $id_client, PDO::PARAM_INT);
    $sql->execute();

    echo '<script type="text/javascript">
        alert("Suppression réussie");
        window.location.href="form_client.php";
    </script>';
    exit(1);
}
?>
