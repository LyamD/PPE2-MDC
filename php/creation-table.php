<?php 
//Inclusion du fichier contenant la connexion à la BD
 include_once('connexion-PDO.php');
  //Création de la table personne
 $sql="CREATE TABLE infos_tbl ( 
    id int(11) UNSIGNED not null AUTO_INCREMENT primary key,
    nom varchar(30), 
    prenom varchar(30), 
    email varchar(30), 
    titre varchar(30), 
    url varchar(30) 
    )" ; 
 $sth = $dbh->query($sql); 
 $dbh=NULL; 
?>