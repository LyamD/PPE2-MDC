<?php

    //Inclusion du fichier contenant la connexion à la BD
    include_once('connexion-PDO.php');
    include_once('requeteSQL.php');

    //Recherche des données
    $sth = $bdd->query($sqlCountCateg);

    // Résultats sous la forme d’un tableau associatif
    $result1 = $sth->fetchAll();

    $sth = $bdd->query($sqlCountInscrit);
    $result2 = $sth->fetchAll();

    echo "NombreInscrit : <br>";
    foreach ($result2 as $row) {
        echo $row['nbr']; echo '<br>';
    }

    //Affichage des résultats
    echo "Liste par categorie <br>";

    foreach ($result1 as $row) {
        echo "categorie : ";echo $row['idCategorie'];echo ' - ';
        echo $row['nbr']; echo '<br>';
        
    }
    $dbh=NULL;


    

?>