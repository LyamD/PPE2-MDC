<?php 

    include_once('connexion-PDO.php'); 
    session_start();

    //  Récupération de l'utilisateur et de son pass 
    $reqI = $bdd->prepare('SELECT idInscrit, mdpInscrit FROM Inscrit WHERE emailInscrit = :email');
    $reqI->execute(array(
        'email' => $_POST['EmailConnexion']));
    $resultatI = $reqI->fetch();

    //  On recherche aussi dans les organisateurs
    $reqO = $bdd->prepare('SELECT idOrganisateur, mdpOrga FROM Organisateur WHERE emailInscrit = :email');
    $reqO->execute(array(
        'email' => $_POST['EmailConnexion']));
    $resultatO = $reqO->fetch();

    


    // Comparaison du pass envoyé via le formulaire avec la base (Ne marche pas)
    //$isPasswordCorrect = password_verify($_POST['passwordConnexion'], $resultat['mdpInscrit']);



    if (!$resultatO)
    {
        if (!$resultatI) {
            echo 'Mauvais identifiant ou mot de passe ! 1';
        } else {
            if ($_POST['passwordConnexion'] == $resultatI['mdpInscrit']) {
                session_start();
                $_SESSION['id'] = $resultatI['idInscrit'];
                $_SESSION['email'] = $_POST['EmailConnexion'];
                $_SESSION['isOrga'] = false;
                echo 'Vous êtes connecté !';
            }
    
            else {
                echo 'Mauvais identifiant ou mot de passe ! 2';
            }
        }

    } else
    {
        if ($_POST['passwordConnexion'] == $resultatO['mdpInscrit']) {
            session_start();
            $_SESSION['id'] = $resultatO['idOrganisateur'];
            $_SESSION['email'] = $_POST['EmailConnexion'];
            $_SESSION['isOrga'] = true;
            echo 'Vous êtes connecté ! Orga';
        }

        else {
            echo 'Mauvais identifiant ou mot de passe ! 2';
        }
    }

?>