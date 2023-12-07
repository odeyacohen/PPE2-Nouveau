

<?php
// action est une variable
// qui va sauvegarder le parametre action de l'url
// $action = $_GET['action'];
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

switch ($action) {
    case 'selectUser':
    // 1. faire la correction
    // 2. MAJ votre code sur GITHUB

    // ecrivez ici le code du modele pour tester
    // se connecte a la B.D.
    $visiteurs=$pdo->getVisiteurs();
    $mois=$pdo->getMois();
    // var_dump($visiteurs);
    // '' modele
    // 1 se connecte a la B.D.
    
    // 2 requetes
    
    // 3 . Recupere
    // '' modele
    // on recupere les 2 tableau
    //On les affiche dans le formulaire avec les 2 listes deroulantes et le bouton ‘valide
    // VUE
    $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
    // Afin de sélectionner par défaut le dernier mois dans la zone de liste
    // on demande toutes les clés, et on prend la première,
    // les mois étant triés décroissants
    $lesCles = array_keys($mois);
    $moisASelectionner = $lesCles[0];
    
    require 'vues/v_validerfrais.php';
    break;

case 'affichefrais' :
    //var_dump($_POST);
   
    $idVisiteur=$_POST['visiteurs'];
    $mois=$_POST['mois'];
    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
    $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
    $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $mois);
    $numAnnee = substr($mois, 0, 4);
    $numMois = substr($mois, 4, 2);
  //  var_dump($_POST);
    //var_dump($lesInfosFicheFrais);
    $libEtat = $lesInfosFicheFrais['libEtat'];
    $montantValide = $lesInfosFicheFrais['montantValide'];
    $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
    $dateModif = dateAnglaisVersFrancais($lesInfosFicheFrais['dateModif']);
    

    require 'vues/v_affichefrais.php';
    break;
}
 
?>

 
