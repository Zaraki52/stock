<?php
//On demarre les sessions 
session_start();
//Connexion à la base de données 
try{$bdd=new PDO('mysql:host=localhost:3306;dbname=projet_stock; charset=utf8','root','');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} 
catch(Exception $e)
{die('Erreur: ' . $e->getMessage());

}
  
?> 
