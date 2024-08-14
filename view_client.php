

<?php
include("config.php");
include("head.php");
include("header.php");

$sql = $bdd->query('SELECT * FROM client');
$clients = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des clients</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .btn-delete {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <h1>Liste des clients</h1>
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
        <?php foreach ($clients as $client): ?>
        <tr>
            <td><?php echo $client['id_client']; ?></td>
            <td><?php echo $client['nom']; ?></td>
            <td><?php echo $client['prenom']; ?></td>
            <td><?php echo $client['adresse']; ?></td>
            <td><?php echo $client['telephone']; ?></td>
            <td><?php echo $client['email']; ?></td>
            <td>
                <a href="form_modif_client.php?id_client=<?php echo $client['id_client']; ?>" class="btn">Modifier</a>
                <a href="delete_client.php?id_client=<?php echo $client['id_client']; ?>" class="btn btn-delete">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>


<style>
body { background: url("image/daniele-levis-pelusi-mkMSXR86kYY-unsplash.jpg");
    /* background-blend-mode:darken ; */
    background-repeat:no-repeat ;
}
form {
  margin-left: 20px;
  width: 60%;
}
</style>