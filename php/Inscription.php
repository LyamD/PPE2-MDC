<?PHP
   
    include_once('connexion-PDO.php'); 
    include_once('CodesOrga.php');
    include_once('requeteSQL.php');

    if( isset($_POST['Nom']) 
    && isset($_POST['Prenom'])  
    && isset($_POST['Email'])  
    && isset($_POST['Password'])  
    && isset($_POST['Telephone'])  
    && isset($_POST['CP'])
    && isset($_POST['Adresse'])
    && isset($_POST['Ville'])
    && isset($_POST['civilite'])
    && isset($_POST['DateNaissance'])
    )
    {

        $isOrga = false;

        //Vérification du code Organisateur
        $codeOrga = isset($_POST['CodeOrga']) ? $_POST['CodeOrga'] : null;
        if (!($codeOrga == null)) {
            if (in_array('AAAAAA',$listecodesOrga)) {
                $isOrga = true;
            }
        }


        //Hachage mdp (Ne marche pas)
        $mdpHash = $_POST['Password'];

        if ($isOrga) {

            //Exécution de la requête 
            $req = $bdd->prepare($sqlInscriptionOrganisateur); 
            $req->execute(array( 
                $_POST['Email'],
                $mdpHash, 
                $_POST['Prenom'],
                $_POST['Nom'],
                $_POST['Adresse'],
                $_POST['Ville'],
                $_POST['CP'],
                $_POST['Telephone'],
                $_POST['DateNaissance']
            ));
        } 
        else {

            //Calcul de l'age, détermination de la catégorie
            $dateNai = $_POST['DateNaissance'];
            $age = date('Y') - date('Y', strtotime($dateNai));
            if (date('md') < date('md', strtotime($dateNai))) {
                $age = $age -1;
            }

            if ( $age >= 0 && $age < 12 ) {
                $categorieInscrit = 1;
            } elseif ($age >= 12 && $age < 16) {
                $categorieInscrit = 2;
            } elseif ($age >= 16 && $age < 18) {
                $categorieInscrit = 3;
            } elseif ( $age >= 18) {
                $categorieInscrit = 4;
            } else {
                $categorieInscrit = 4;
                echo "DateNaissance non valide - placée dans catégorie adulte";
                echo $age;
            }


            //Exécution de la requête 
            $req = $bdd->prepare($sqlInscriptionInscrit); 
            $req->execute(array( 
                $_POST['Email'],
                $mdpHash, 
                $_POST['Prenom'],
                $_POST['Nom'],
                $_POST['civilite'],
                $_POST['Adresse'],
                $_POST['CP'],
                $_POST['Telephone'],
                $_POST['DateNaissance'],
                $categorieInscrit
            ));
        }
        

        

        $bdd=NULL; 
    }
?>