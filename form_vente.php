
<?php
require("config.php");
include("head.php");
include("header.php");
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <div class="container">
    <h1>Effectuer une vente</h1>
    <form method="post" action="config_vente.php">
      <div class="form-group">
        <label for="nom">Article :</label>
        <!-- // pour selectionner un produit deja crée -->
                                                        <label for=""> </label>
                                                        <br>
                                                        <select  name="article"class="form-control"placeholder="votre produit" >

                                                            <?php

                                                                $sql="SELECT * FROM produit    ";
                                                    
                                                                 //va dans notre base donner pour effctuer la requette
                                                                 $exe=$bdd->query($sql);


                                                                 //on regarde le nombre de ligne quil a trouve apres notre requette
                                                                $nbre=$exe->rowCount();


                                                                //on effectue nos conditions

                                                                //si le nombre de ligne est different de 0 
                                                                    if($nbre!=0)
                                                                    {
                                                                    //on mets l'execute $exe dans notre variable $line
                                                                    //on recupere ligne par ligne en recuperant les enregistrement dans la base de donne d'ou le while

                                                                    while($line=$exe->fetch(PDO::FETCH_ASSOC))
                                                                        
                                                                        { 

                                                                        //on extrait les lignes de la base de donne 
                                                                        extract(($line));
                                                                        $nom=$line['nom_p'];
                                                                        $id=$line['id_produit'];
                                                                        ?>

                                                                    
                                                            

                                                                        <!--- On liste les information dans notre base de donne--->
                                                                    

                                                                        <option value="<?php echo $id_produit;?>"> <?php echo $nom_p ?> </option> 

                                                                    <?php }
                                                                    }
                                                                    ?>;  
</select>
                                                                </div>
    
      <div class="form-group">
        <label for="client">Client :</label>
       

        <div class="input-group mb-4">
<!--                                // pour selectionner un client deja crée -->
                                                        <label for=""> </label>
                                                        <br>
                                                        <select  name="client"class="form-control"placeholder="votre client" >

                                                            <?php

                                                                $sql="SELECT * FROM client    ";
                                                    
                                                                 //va dans notre base donner pour effctuer la requette
                                                                 $exe=$bdd->query($sql);


                                                                 //on regarde le nombre de ligne quil a trouve apres notre requette
                                                                $nbre=$exe->rowCount();


                                                                //on effectue nos conditions

                                                                //si le nombre de ligne est different de 0 
                                                                    if($nbre!=0)
                                                                    {
                                                                    //on mets l'execute $exe dans notre variable $line
                                                                    //on recupere ligne par ligne en recuperant les enregistrement dans la base de donne d'ou le while

                                                                    while($line=$exe->fetch(PDO::FETCH_ASSOC))
                                                                        
                                                                        { 

                                                                        //on extrait les lignes de la base de donne 
                                                                        extract(($line));
                                                                        $nom=$line['nom'];
                                                                        $id=$line['id_client'];
                                                                        ?>

                                                                    
                                                            

                                                                        <!--- On liste les information dans notre base de donne--->
                                                                    

                                                                        <option value="<?php echo $id_client;?>"> <?php echo $nom ?> </option> 

                                                                    <?php }
                                                                    }
                                                                    ?>;  
</select>
                                                                </div>
    
        
        </select>
      </div>
      <div class="form-group">
        <label for="quantite">Quantité :</label>
        <input type="number" class="form-control" id="quantite" name="quantite" placeholder="Entrez la quantité">
      </div>
      <div class="form-group">
        <label for="email">Prix :</label>
        <input type="prix" class="form-control" id="email" name="prix" placeholder="Entrez le prix de votre produit ">
      </div>
    
      <br>
      <button type="submit" class="btn btn-warning">Envoyer</button>
    </form>
  </div>
</body>
</html>


<style>
 body { background: url("image/daniele-levis-pelusi-mkMSXR86kYY-unsplash.jpg")rgba(0, 0, 0, 0.6);
    /* background-blend-mode:darken ; */
    background-repeat:no-repeat ;
}
form {
  margin-left: 20px;
  width: 60%;
}
</style>