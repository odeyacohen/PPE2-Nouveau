

<?php
// action est une variable
// qui va sauvegarder le parametre action de l'url
// $action = $_GET['action'];
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

      
$mois = getMois(date('d/m/Y'));
$numAnnee = substr($mois, 0, 4);
$numMois = substr($mois, 4, 2);

switch ($action) {
    case 'selectUser':
 
    $visiteurs=$pdo->getVisiteurs();
    $mois=$pdo->getMois();
    //$lesMois = $pdo->getLesMoisDisponibles($idVisiteur);

    $lesCles = array_keys($mois);
    $moisASelectionner = $lesCles[0];
    
    require 'vues/v_validerfrais.php';
    break;

case 'affichefrais' :
 
    $idVisiteur= $_POST['visiteurs'];
    $mois= $_POST['mois'];

    // // Cree lesbvariables en session
     $_SESSION['visiteur_selection']=$idVisiteur;
     $_SESSION['mois_selection']=$mois;



    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
    $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
    $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $mois);
    $numAnnee = substr($mois, 0, 4);
    $numMois = substr($mois, 4, 2);
    //var_dump($_POST);
    //var_dump($lesInfosFicheFrais);
    $libEtat = $lesInfosFicheFrais['libEtat'];
    $montantValide = $lesInfosFicheFrais['montantValide'];
    $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
    $dateModif = dateAnglaisVersFrancais($lesInfosFicheFrais['dateModif']);
    

    require 'vues/v_affichefrais.php';
    break;

    case 'validerMajFraisForfait':
//var_dump($_POST);
//var_dump($_SESSION);


 // Cree lesbvariables en session
 $idVisiteur = $_SESSION['visiteur_selection'];
 $mois = $_SESSION['mois_selection'];
 $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
 $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
    
     $lesFrais = filter_input(INPUT_POST, 'lesFrais', FILTER_SANITIZE_STRING);
       $lesFrais=$_POST['lesFrais'];
        if (lesQteFraisValides($lesFrais)) {
            $pdo->majFraisForfait($idVisiteur, $mois, $lesFrais);

        } else {
            ajouterErreur('Les valeurs des frais doivent être numériques');
            include 'vues/v_erreurs.php';
        }
        require 'vues/v_affichefrais.php';
       break;

case 'modifierFrais':
   //var_dump($_GET);
  $idVisiteur = $_SESSION['visiteur_selection'];
  $mois = $_SESSION['mois_selection'];
  
   $idFrais = filter_input(INPUT_GET, 'idFrais', FILTER_SANITIZE_STRING);  
  // echo "testtttttt".$idFrais;
   $laLigne=$pdo->recupererLibelle($idFrais);
  // var_dump($laLigne);

   
   if (str_contains($laLigne['libelle'], 'REFUSE :')){
      echo "le mot est deja present";
    }else {
      echo "je suis une AS en php";
      $libelleModifier=$pdo->modifierFraisHorsForfait($idFrais,$laLigne);
    }

   $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
   $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
  
  require 'vues/v_affichefrais.php';
  break;

  case 'validerFiche':
     $idVisiteur = $_SESSION['visiteur_selection'];
     $mois = $_SESSION['mois_selection'];
     $etat= 'VA';
     $valider=$pdo->majEtatFicheFrais($idVisiteur, $mois, $etat);   
           require 'vues/v_validerFiche.php';
           break;
}

?>

 
