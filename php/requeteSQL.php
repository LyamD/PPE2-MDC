<?php

    // Requetes INSCRIPTION ---------------

    //Insertion Organisateurs
    $sqlInscriptionOrganisateur =  "INSERT INTO Organisateur (emailOrga, mdpOrga, prenomOrga, nomOrga, adresseOrga, codePostalOrga, telephoneOrga, dateNaissanceOrga)  
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)"; 

    //Insertion Inscrit
    $sqlInscriptionInscrit =  "INSERT INTO Inscrit (emailInscrit, mdpInscrit, prenomInscrit, nomInscrit, sexe, adresseInscrit, codePostalInscrit, telephoneInscrit, dateNaissanceInscrit, idCategorie, idEquipe)  
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, null )"; 

    // Requetes SELECTION ---------------

    //Liste des Inscrits
    $sqlListeInscrit = "SELECT * FROM Inscrit LIMIT 0 , 30";

    //Liste des Inscrit, Ordonné par catégorie
    $sqlListeInscritOrdonne = "SELECT * FROM Inscrit ORDER BY idCategorie LIMIT 0 , 30";

    //Nombres d'inscrit par catégorie
    $sqlCountCateg = "SELECT idCategorie, COUNT(*) as nbr FROM Inscrit GROUP BY idCategorie LIMIT 0 , 30";

    //Nombres d'inscrit
    $sqlCountInscrit = "SELECT COUNT(*) as nbr FROM Inscrit LIMIT 0 , 30";

?>