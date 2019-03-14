<?php

        //Inclusion du fichier contenant la connexion à la BD
    include_once('connexion-PDO.php');
    include_once('requeteSQL.php');

        //Recherche des données
    $sth = $bdd->query($sqlListeInscritOrdonne);

        // Résultats sous la forme d’un tableau associatif
    $result = $sth->fetchAll();

        //Affichage des résultats
    foreach ($result as $row) {
        echo $row['emailInscrit'];echo ' - ';
        echo $row['prenomInscrit'];echo ' - ';
        echo $row['nomInscrit'];echo ' - ';
        echo $row['dateNaissanceInscrit'];echo ' - ';
        echo $row['idCategorie'];echo '<br/>';
    }
    $dbh=NULL;

?>